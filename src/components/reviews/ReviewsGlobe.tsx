import { useEffect, useRef, useCallback, useMemo, useState } from 'react';
import createGlobe from 'cobe';

export interface GlobeReview {
  id: string;
  author_name: string;
  company_name?: string | null;
  rating: number;
  review_text: string;
  city?: string | null;
  country?: string | null;
  lat?: number | null;
  lng?: number | null;
}

interface Marker {
  id: string;
  location: [number, number];
  pos3: [number, number, number]; // location on the cobe sphere (radius 0.8)
  name: string;
  label: string; // company name, falling back to author name (mobile pin label)
  rating: number;
  text: string;
  place: string;
  rotate: number;
}

// Mirror of cobe's internal U(): lat/lng -> 3D point on its render sphere
// (radius ee = 0.8). Lets us project markers to screen space every frame.
function toSphere([lat, lng]: [number, number]): [number, number, number] {
  const r = (lat * Math.PI) / 180;
  const a = (lng * Math.PI) / 180 - Math.PI;
  return [-Math.cos(r) * Math.cos(a) * 0.8, Math.sin(r) * 0.8, Math.cos(r) * Math.sin(a) * 0.8];
}

const ROTATIONS = [-5, 4, -3, 6, -4, 3, -6, 5];

/**
 * Auto-rotating interactive globe (cobe) with review "polaroids" pinned to
 * client locations. Cards use CSS Anchor Positioning where supported
 * (Chromium); elsewhere a rAF loop mirrors cobe's anchor-div coordinates onto
 * the cards, so the effect works in Safari/Firefox too.
 */
export default function ReviewsGlobe({ reviews }: { reviews: GlobeReview[] }) {
  const canvasRef = useRef<HTMLCanvasElement>(null);
  const wrapRef = useRef<HTMLDivElement>(null);
  const pointerInteracting = useRef<{ x: number; y: number } | null>(null);
  const dragOffset = useRef({ phi: 0, theta: 0 });
  const phiOffsetRef = useRef(0);
  const thetaOffsetRef = useRef(0);
  const isPausedRef = useRef(false);
  const [dark, setDark] = useState(false);

  const markers: Marker[] = useMemo(
    () =>
      reviews
        .filter((r) => typeof r.lat === 'number' && typeof r.lng === 'number')
        .slice(0, 12)
        .map((r, i) => ({
          id: `rev-${r.id}`,
          location: [r.lat as number, r.lng as number],
          pos3: toSphere([r.lat as number, r.lng as number]),
          name: r.author_name,
          label: r.company_name || r.author_name,
          rating: r.rating,
          text: r.review_text.length > 110 ? r.review_text.slice(0, 107).trimEnd() + '…' : r.review_text,
          place: [r.city, r.country].filter(Boolean).join(', '),
          rotate: ROTATIONS[i % ROTATIONS.length],
        })),
    [reviews]
  );

  // Track the site's dark-mode class so globe colors match the theme.
  useEffect(() => {
    const html = document.documentElement;
    const update = () => setDark(html.classList.contains('dark'));
    update();
    const mo = new MutationObserver(update);
    mo.observe(html, { attributes: true, attributeFilter: ['class'] });
    return () => mo.disconnect();
  }, []);

  const handlePointerDown = useCallback((e: React.PointerEvent) => {
    pointerInteracting.current = { x: e.clientX, y: e.clientY };
    if (canvasRef.current) canvasRef.current.style.cursor = 'grabbing';
    isPausedRef.current = true;
  }, []);

  const handlePointerUp = useCallback(() => {
    if (pointerInteracting.current !== null) {
      phiOffsetRef.current += dragOffset.current.phi;
      thetaOffsetRef.current += dragOffset.current.theta;
      dragOffset.current = { phi: 0, theta: 0 };
    }
    pointerInteracting.current = null;
    if (canvasRef.current) canvasRef.current.style.cursor = 'grab';
    isPausedRef.current = false;
  }, []);

  useEffect(() => {
    const handlePointerMove = (e: PointerEvent) => {
      if (pointerInteracting.current !== null) {
        dragOffset.current = {
          phi: (e.clientX - pointerInteracting.current.x) / 300,
          theta: (e.clientY - pointerInteracting.current.y) / 1000,
        };
      }
    };
    window.addEventListener('pointermove', handlePointerMove, { passive: true });
    window.addEventListener('pointerup', handlePointerUp, { passive: true });
    return () => {
      window.removeEventListener('pointermove', handlePointerMove);
      window.removeEventListener('pointerup', handlePointerUp);
    };
  }, [handlePointerUp]);

  useEffect(() => {
    if (!canvasRef.current) return;
    const canvas = canvasRef.current;
    let globe: ReturnType<typeof createGlobe> | null = null;
    let animationId: number;
    let phi = 0;
    const speed = 0.003;

    function init() {
      const width = canvas.offsetWidth;
      if (width === 0 || globe) return;

      // On phones the labels themselves are the pins, so hide cobe's dots.
      const isMobile = window.matchMedia('(max-width: 639px)').matches;

      globe = createGlobe(canvas, {
        devicePixelRatio: Math.min(window.devicePixelRatio || 1, 2),
        width,
        height: width,
        phi: 0,
        theta: 0.2,
        dark: dark ? 1 : 0,
        diffuse: 1.5,
        mapSamples: 16000,
        mapBrightness: dark ? 5 : 9,
        baseColor: dark ? [0.12, 0.12, 0.12] : [1, 1, 1],
        markerColor: [0.07, 0.85, 0.8], // uxory teal
        glowColor: dark ? [0.08, 0.25, 0.24] : [0.94, 0.93, 0.91],
        markerElevation: 0,
        markers: isMobile ? [] : markers.map((m) => ({ location: m.location, size: 0.025 })),
        arcs: [],
        opacity: 0.85,
      } as any);

      const wrap = wrapRef.current;
      const cardEls = new Map<string, HTMLElement>(
        markers
          .map((m) => [m.id, wrap?.querySelector<HTMLElement>(`[data-card="${m.id}"]`)] as const)
          .filter((e): e is readonly [string, HTMLElement] => !!e[1])
      );

      // cobe positions its marker anchors only once at init, so cards pinned to
      // them freeze while the globe rotates. Instead we replicate cobe's own
      // projection (dist O()/U(): sphere radius 0.8, scale 1, offset 0, square
      // canvas) with the exact phi/theta we feed it — cards track every frame.
      function animate() {
        if (!isPausedRef.current) phi += speed;
        const f = phi + phiOffsetRef.current + dragOffset.current.phi;
        const l = 0.2 + thetaOffsetRef.current + dragOffset.current.theta;
        globe!.update({ phi: f, theta: l });

        const cf = Math.cos(f);
        const sf = Math.sin(f);
        const cl = Math.cos(l);
        const sl = Math.sin(l);
        for (const m of markers) {
          const card = cardEls.get(m.id);
          if (!card) continue;
          const [px, py, pz] = m.pos3;
          const front = -sf * cl * px + sl * py + cf * cl * pz;
          if (front > 0.08) {
            const c = cf * px + sf * pz;
            const s = sf * sl * px + cl * py - cf * sl * pz;
            card.style.left = `${(((c + 1) / 2) * 100).toFixed(3)}%`;
            card.style.top = `${(((-s + 1) / 2) * 100).toFixed(3)}%`;
            card.style.opacity = '1';
            card.style.visibility = 'visible';
          } else {
            card.style.opacity = '0';
            card.style.visibility = 'hidden';
          }
        }
        animationId = requestAnimationFrame(animate);
      }
      animate();
      setTimeout(() => canvas && (canvas.style.opacity = '1'));
    }

    if (canvas.offsetWidth > 0) {
      init();
    } else {
      const ro = new ResizeObserver((entries) => {
        if (entries[0]?.contentRect.width > 0) {
          ro.disconnect();
          init();
        }
      });
      ro.observe(canvas);
    }

    return () => {
      if (animationId) cancelAnimationFrame(animationId);
      if (globe) globe.destroy();
    };
  }, [markers, dark]);

  return (
    <div ref={wrapRef} className="relative aspect-square select-none w-full max-w-lg lg:max-w-3xl mx-auto">
      <canvas
        ref={canvasRef}
        onPointerDown={handlePointerDown}
        style={{
          width: '100%',
          height: '100%',
          cursor: 'grab',
          opacity: 0,
          transition: 'opacity 1.2s ease',
          borderRadius: '50%',
          touchAction: 'none',
        }}
      />
      {markers.map((m) => (
        <div
          key={m.id}
          data-card={m.id}
          style={{
            position: 'absolute',
            left: '50%',
            top: '50%',
            transform: 'translate(-50%, -100%)',
            pointerEvents: 'none' as const,
            opacity: 0,
            visibility: 'hidden',
            transition: 'opacity 0.25s ease',
            zIndex: 10,
          }}
        >
          {/* Desktop / tablet: full review polaroid, floating above the dot */}
          <div
            className="hidden sm:block w-[150px] bg-white text-left"
            style={{
              marginBottom: 10,
              padding: '10px 10px 8px',
              boxShadow: '0 2px 8px rgba(0,0,0,0.18), 0 1px 2px rgba(0,0,0,0.1)',
              borderRadius: 4,
              transformOrigin: 'bottom center',
              transform: `rotate(${m.rotate}deg)`,
            }}
          >
            <div style={{ color: '#f5b50a', fontSize: '0.6rem', letterSpacing: 1 }}>
              {'★'.repeat(m.rating)}
              <span style={{ color: '#d5d5d5' }}>{'★'.repeat(5 - m.rating)}</span>
            </div>
            <p style={{ margin: '4px 0 6px', fontSize: '0.62rem', lineHeight: 1.45, color: '#333', fontStyle: 'italic' }}>
              “{m.text}”
            </p>
            <span
              style={{
                display: 'block',
                fontSize: '0.55rem',
                color: '#777',
                letterSpacing: '0.02em',
                borderTop: '1px solid #eee',
                paddingTop: 5,
              }}
            >
              <strong style={{ color: '#333' }}>{m.name}</strong>
              {m.place ? ` · ${m.place}` : ''}
            </span>
          </div>

          {/* Mobile: iMessage-style bubble whose tail tip sits on the exact
              location (cobe dots are hidden on mobile — the bubble is the pin). */}
          <div className="sm:hidden relative" style={{ marginBottom: 4 }}>
            <div
              className="inline-block whitespace-nowrap rounded-xl bg-primary text-[#0d0d0d] shadow-md"
              style={{ padding: '4px 10px', fontSize: '0.62rem', fontWeight: 600, letterSpacing: '0.01em' }}
            >
              {m.label}
            </div>
            <div
              className="bg-primary"
              style={{
                position: 'absolute',
                left: '50%',
                bottom: -3,
                width: 8,
                height: 8,
                transform: 'translateX(-50%) rotate(45deg)',
                borderRadius: 1,
              }}
            />
          </div>
        </div>
      ))}
    </div>
  );
}
