import * as React from 'react';
import type { BlogPost } from './BlogGrid';

// Swipeable stacked-card deck for mobile (adapted from the Dub "News"
// component). Cards stack on top of each other; swipe/drag the top card away to
// reveal the next, tap to open. Desktop uses the grid in BlogGrid instead.

const OFFSET_FACTOR = 4;
const SCALE_FACTOR = 0.03;
const OPACITY_FACTOR = 0.1;

const cx = (...c: (string | false | undefined)[]) => c.filter(Boolean).join(' ');

export default function MobileBlogStack({ posts }: { posts: BlogPost[] }) {
  const [dismissed, setDismissed] = React.useState<string[]>([]);
  const cards = posts.filter((p) => !dismissed.includes(p.link));
  const cardCount = cards.length;
  const [showCaughtUp, setShowCaughtUp] = React.useState(true);

  React.useEffect(() => {
    let t: ReturnType<typeof setTimeout> | undefined;
    if (cardCount === 0) t = setTimeout(() => setShowCaughtUp(false), 2700);
    return () => clearTimeout(t);
  }, [cardCount]);

  if (!cards.length && !showCaughtUp) return null;

  return (
    <div className="group overflow-hidden px-3 pb-3 pt-6" data-active={cardCount !== 0}>
      <div className="relative size-full">
        {[...cards].reverse().map((post, idx) => {
          const depth = cardCount - (idx + 1); // 0 = top card
          return (
            <div
              key={post.link}
              className={cx(
                'absolute left-0 top-0 size-full transition-[opacity,transform] duration-200',
                depth > 3
                  ? 'opacity-0'
                  : ''
              )}
              style={{
                transform: `translateY(-${depth * OFFSET_FACTOR}%) scale(${1 - depth * SCALE_FACTOR})`,
                opacity: depth >= 6 ? 0 : 1 - depth * OPACITY_FACTOR,
              }}
              aria-hidden={idx !== cardCount - 1}
            >
              <StackCard
                post={post}
                active={idx === cardCount - 1}
                hideContent={depth > 2}
                onDismiss={() => setDismissed((d) => [post.link, ...d.slice(0, 50)])}
              />
            </div>
          );
        })}

        {/* invisible spacer sizes the container - use max-height content (2-line
            title + 2-line excerpt) so no real card overflows and gets clipped */}
        <div className="pointer-events-none invisible" aria-hidden>
          <StackCard
            post={{
              title: 'Two line placeholder heading that wraps across the card',
              excerpt: 'A two line placeholder description that wraps across the width of the card here.',
              image: '',
              link: '#',
            }}
          />
        </div>

        {showCaughtUp && !cardCount && (
          <div className="absolute inset-0 flex flex-col items-center justify-center gap-3 rounded-2xl border border-secondary/15 dark:border-white/15">
            <span className="flex h-10 w-10 items-center justify-center rounded-full bg-primary/15 text-primary">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                <path strokeLinecap="round" strokeLinejoin="round" d="M5 13l4 4L19 7" />
              </svg>
            </span>
            <span className="text-xs font-medium text-secondary/60 dark:text-backgroundBody/60">
              You're all caught up!
            </span>
          </div>
        )}
      </div>
    </div>
  );
}

function StackCard({
  post,
  onDismiss,
  hideContent,
  active,
}: {
  post: BlogPost;
  onDismiss?: () => void;
  hideContent?: boolean;
  active?: boolean;
}) {
  const ref = React.useRef<HTMLDivElement>(null);
  const drag = React.useRef({ start: 0, delta: 0, startTime: 0, maxDelta: 0 });
  const anim = React.useRef<Animation | undefined>(undefined);
  const [dragging, setDragging] = React.useState(false);

  const onMove = (e: PointerEvent) => {
    if (!ref.current) return;
    const dx = e.clientX - drag.current.start;
    drag.current.delta = dx;
    drag.current.maxDelta = Math.max(drag.current.maxDelta, Math.abs(dx));
    ref.current.style.setProperty('--dx', dx.toString());
  };

  const dismiss = () => {
    if (!ref.current) return;
    const w = ref.current.getBoundingClientRect().width;
    const tx = Math.sign(drag.current.delta || 1) * w;
    anim.current = ref.current.animate(
      { opacity: 0, transform: `translateX(${tx}px)` },
      { duration: 150, easing: 'ease-in-out', fill: 'forwards' }
    );
    anim.current.onfinish = () => onDismiss?.();
  };

  const stop = (cancelled: boolean) => {
    if (!ref.current) return;
    unbind();
    setDragging(false);
    const dx = drag.current.delta;
    if (Math.abs(dx) > ref.current.clientWidth / (cancelled ? 2 : 3)) {
      dismiss();
      return;
    }
    anim.current = ref.current.animate({ transform: 'translateX(0)' }, { duration: 150, easing: 'ease-in-out' });
    anim.current.onfinish = () => ref.current?.style.setProperty('--dx', '0');
    drag.current = { start: 0, delta: 0, startTime: 0, maxDelta: 0 };
  };

  const bind = () => {
    document.addEventListener('pointermove', onMove);
    document.addEventListener('pointerup', () => stop(false), { once: true });
    document.addEventListener('pointercancel', () => stop(true), { once: true });
  };
  const unbind = () => {
    document.removeEventListener('pointermove', onMove);
  };

  const onPointerDown = (e: React.PointerEvent) => {
    if (!active || !ref.current || anim.current?.playState === 'running') return;
    bind();
    setDragging(true);
    drag.current.start = e.clientX;
    drag.current.startTime = Date.now();
    drag.current.delta = 0;
    ref.current.style.setProperty('--w', ref.current.clientWidth.toString());
  };

  const onClick = () => {
    if (!ref.current) return;
    const d = drag.current;
    if (d.maxDelta < ref.current.clientWidth / 10 && (!d.startTime || Date.now() - d.startTime < 250)) {
      window.location.href = post.link;
    }
  };

  return (
    <div
      ref={ref}
      className={cx(
        'relative select-none rounded-2xl border border-secondary/10 bg-white p-4 shadow-sm dark:border-white/10 dark:bg-[#161616]',
        'transition-shadow',
        dragging && 'shadow-lg'
      )}
      style={{
        transform: 'translateX(calc(var(--dx, 0) * 1px)) rotate(calc(var(--dx, 0) * 0.04deg))',
        opacity: 'calc(1 - max(var(--dx, 0), -1 * var(--dx, 0)) / var(--w, 1) / 2)',
        touchAction: 'pan-y',
      }}
      onPointerDown={onPointerDown}
      onClick={onClick}
    >
      <div className={cx(hideContent && 'invisible')}>
        <div className="relative mb-3 aspect-[16/9] w-full overflow-hidden rounded-xl bg-secondary/5 dark:bg-white/5">
          {post.image && (
            <img src={post.image} alt="" draggable={false} className="h-full w-full object-cover" />
          )}
        </div>
        <span className="text-[11px] font-medium uppercase tracking-wide text-primary">
          {prettyCategory(post.category)}
        </span>
        <h3 className="mt-1 line-clamp-2 text-base font-medium leading-snug text-secondary dark:text-backgroundBody">
          {post.title}
        </h3>
        <p className="mt-1.5 line-clamp-2 text-sm leading-relaxed text-secondary/65 dark:text-backgroundBody/65">
          {post.excerpt}
        </p>
        <div className="mt-3 flex items-center justify-between pt-1 text-xs">
          <span className="font-semibold text-primary">Read article →</span>
          {onDismiss && (
            <button
              type="button"
              onClick={(e) => {
                e.stopPropagation();
                onDismiss();
              }}
              className="text-secondary/45 hover:text-secondary dark:text-backgroundBody/45"
            >
              Dismiss
            </button>
          )}
        </div>
      </div>
    </div>
  );
}

function prettyCategory(cat?: string | null): string {
  if (!cat) return 'Insights';
  return cat.replace(/-/g, ' ').replace(/\b\w/g, (c) => c.toUpperCase());
}
