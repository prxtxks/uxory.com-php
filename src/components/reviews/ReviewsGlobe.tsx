import { useEffect, useRef, useCallback, useMemo, useState } from 'react';
import createGlobe from 'cobe';

export interface GlobeReview {
  id: string;
  author_name: string;
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
  name: string;
  rating: number;
  text: string;
  place: string;
  rotate: number;
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
          name: r.author_name,
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
    let syncId: number;
    let phi = 0;
    const speed = 0.003;

    function init() {
      const width = canvas.offsetWidth;
      if (width === 0 || globe) return;

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
        markers: markers.map((m) => ({ location: m.location, size: 0.025, id: m.id })),
        arcs: [],
        opacity: 0.85,
      } as any);

      function animate() {
        if (!isPausedRef.current) phi += speed;
        globe!.update({
          phi: phi + phiOffsetRef.current + dragOffset.current.phi,
          theta: 0.2 + thetaOffsetRef.current + dragOffset.current.theta,
        });
        animationId = requestAnimationFrame(animate);
      }
      animate();
      setTimeout(() => canvas && (canvas.style.opacity = '1'));

      // Position the polaroids with JS every frame (reliable on all browsers —
      // CSS Anchor Positioning is Chromium-only and misaligns on mobile Safari).
      // cobe wraps the canvas in its own relative div and appends 1px anchor
      // divs there at left/top% for each marker; we mirror those coords onto our
      // cards (which sit in the same-sized outer wrapper) and drive visibility
      // from the --cobe-visible-* custom properties cobe writes to :root.
      if (wrapRef.current) {
        const wrap = wrapRef.current;
        const sync = () => {
          const rootCS = getComputedStyle(document.documentElement);
          for (const m of markers) {
            const card = wrap.querySelector<HTMLElement>(`[data-card="${m.id}"]`);
            if (!card) continue;
            const anchor = wrap.querySelector<HTMLElement>(`[style*="--cobe-${m.id}"]`);
            if (anchor && anchor.style.left) {
              card.style.left = anchor.style.left;
              card.style.top = anchor.style.top;
              card.style.transform = `translate(-50%, calc(-100% - 10px)) rotate(${m.rotate}deg)`;
            }
            // cobe sets --cobe-visible-<id> (to a flag) only while the marker
            // faces the camera, and removes it otherwise. Present = show.
            const visible = rootCS.getPropertyValue(`--cobe-visible-${m.id}`).trim() !== '';
            card.style.opacity = visible ? '1' : '0';
            card.style.visibility = visible ? 'visible' : 'hidden';
          }
          syncId = requestAnimationFrame(sync);
        };
        sync();
      }
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
      if (syncId) cancelAnimationFrame(syncId);
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
          className="w-[130px] sm:w-[150px] bg-white text-left"
          style={{
            position: 'absolute',
            left: '50%',
            top: '50%',
            transformOrigin: 'bottom center',
            transform: `translate(-50%, calc(-100% - 10px)) rotate(${m.rotate}deg)`,
            padding: '10px 10px 8px',
            boxShadow: '0 2px 8px rgba(0,0,0,0.18), 0 1px 2px rgba(0,0,0,0.1)',
            borderRadius: 4,
            pointerEvents: 'none' as const,
            opacity: 0,
            visibility: 'hidden',
            transition: 'opacity 0.25s ease, filter 0.25s ease',
            zIndex: 10,
          }}
        >
          <div style={{ color: '#f5b50a', fontSize: '0.6rem', letterSpacing: 1 }}>
            {'★'.repeat(m.rating)}
            <span style={{ color: '#d5d5d5' }}>{'★'.repeat(5 - m.rating)}</span>
          </div>
          <p
            style={{
              margin: '4px 0 6px',
              fontSize: '0.62rem',
              lineHeight: 1.45,
              color: '#333',
              fontStyle: 'italic',
            }}
          >
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
      ))}
    </div>
  );
}
