import React from 'react';

interface StarsProps {
  value: number;
  size?: number;
  className?: string;
}

/** Read-only star row (supports half via rounding to nearest for display). */
export function Stars({ value, size = 16, className = '' }: StarsProps) {
  return (
    <div className={`inline-flex gap-0.5 ${className}`} aria-label={`${value} out of 5 stars`} role="img">
      {[1, 2, 3, 4, 5].map((i) => (
        <svg
          key={i}
          width={size}
          height={size}
          viewBox="0 0 20 20"
          fill={i <= Math.round(value) ? '#12D8CC' : 'none'}
          stroke={i <= Math.round(value) ? '#12D8CC' : 'currentColor'}
          strokeWidth={1.5}
          className={i <= Math.round(value) ? '' : 'text-secondary/25 dark:text-backgroundBody/25'}
          aria-hidden="true"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.367 2.446a1 1 0 00-.364 1.118l1.287 3.957c.3.922-.755 1.688-1.54 1.118l-3.366-2.446a1 1 0 00-1.175 0l-3.366 2.446c-.784.57-1.838-.196-1.539-1.118l1.286-3.957a1 1 0 00-.363-1.118L2.05 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.958z"
          />
        </svg>
      ))}
    </div>
  );
}

interface StarInputProps {
  value: number;
  onChange: (v: number) => void;
}

/** Interactive star selector for the review form. */
export function StarInput({ value, onChange }: StarInputProps) {
  const [hover, setHover] = React.useState(0);
  const shown = hover || value;
  return (
    <div className="flex gap-1" role="radiogroup" aria-label="Select a rating">
      {[1, 2, 3, 4, 5].map((i) => (
        <button
          key={i}
          type="button"
          role="radio"
          aria-checked={value === i}
          aria-label={`${i} star${i > 1 ? 's' : ''}`}
          onMouseEnter={() => setHover(i)}
          onMouseLeave={() => setHover(0)}
          onClick={() => onChange(i)}
          className="transition-transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-primary rounded"
        >
          <svg
            width={32}
            height={32}
            viewBox="0 0 20 20"
            fill={i <= shown ? '#12D8CC' : 'none'}
            stroke={i <= shown ? '#12D8CC' : 'currentColor'}
            strokeWidth={1.5}
            className={i <= shown ? '' : 'text-secondary/30 dark:text-backgroundBody/30'}
          >
            <path
              strokeLinecap="round"
              strokeLinejoin="round"
              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.958a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.367 2.446a1 1 0 00-.364 1.118l1.287 3.957c.3.922-.755 1.688-1.54 1.118l-3.366-2.446a1 1 0 00-1.175 0l-3.366 2.446c-.784.57-1.838-.196-1.539-1.118l1.286-3.957a1 1 0 00-.363-1.118L2.05 9.385c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.958z"
            />
          </svg>
        </button>
      ))}
    </div>
  );
}

interface AvatarProps {
  name: string;
  color: string;
  initials: string;
  size?: number;
}

export function Avatar({ name, color, initials, size = 44 }: AvatarProps) {
  return (
    <div
      className="flex items-center justify-center rounded-full font-medium text-white shrink-0 select-none"
      style={{ width: size, height: size, backgroundColor: color, fontSize: size * 0.4 }}
      aria-hidden="true"
      title={name}
    >
      {initials}
    </div>
  );
}
