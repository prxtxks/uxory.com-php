import * as React from 'react';
import { motion } from 'framer-motion';

export interface BlogCardProps {
  imageUrl: string;
  title: string;
  subtitle: string; // category / eyebrow
  description: string; // excerpt
  highlights?: string[]; // tags (kept for API compatibility; not rendered)
  meta?: string; // e.g. "6 min read"
  href: string;
}

// Clean editorial blog card: image with a floating category chip, tight
// content, and a lift-on-hover (no whole-card scale — that was getting clipped
// by the section's overflow-hidden and looked "cut").
export function BlogCard({ imageUrl, title, subtitle, description, meta, href }: BlogCardProps) {
  return (
    <motion.a
      href={href}
      whileHover={{ y: -6 }}
      transition={{ type: 'spring', stiffness: 300, damping: 24 }}
      className="group relative flex w-full max-w-[380px] flex-col overflow-hidden rounded-2xl border border-secondary/10 dark:border-white/10 bg-white dark:bg-[#161616] shadow-sm transition-[box-shadow,border-color] duration-300 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/10"
    >
      {/* Image with floating category chip */}
      <div className="relative aspect-[16/10] w-full overflow-hidden">
        <img
          src={imageUrl}
          alt={title}
          loading="lazy"
          className="h-full w-full object-cover transition-transform duration-[600ms] ease-out group-hover:scale-105"
        />
        <span className="absolute left-3 top-3 rounded-full bg-black/55 px-3 py-1 text-[11px] font-medium uppercase tracking-wide text-white backdrop-blur-sm">
          {subtitle}
        </span>
      </div>

      {/* Content */}
      <div className="flex flex-1 flex-col p-5">
        <h3 className="text-lg font-bold leading-snug text-secondary transition-colors duration-200 line-clamp-2 group-hover:text-primary dark:text-backgroundBody">
          {title}
        </h3>
        <p className="mt-2.5 text-sm leading-relaxed text-secondary/65 line-clamp-2 dark:text-backgroundBody/65">
          {description}
        </p>

        <div className="mt-5 flex items-center justify-between border-t border-secondary/10 pt-4 dark:border-white/10">
          <span className="inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
            Read article
            <svg
              width="15"
              height="15"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              strokeWidth="2"
              className="transition-transform duration-200 group-hover:translate-x-0.5"
            >
              <path strokeLinecap="round" strokeLinejoin="round" d="M5 12h14M13 6l6 6-6 6" />
            </svg>
          </span>
          {meta && (
            <span className="text-xs text-secondary/45 dark:text-backgroundBody/45">{meta}</span>
          )}
        </div>
      </div>
    </motion.a>
  );
}
