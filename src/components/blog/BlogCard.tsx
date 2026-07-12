import * as React from 'react';
import { motion } from 'framer-motion';

export interface BlogCardProps {
  imageUrl: string;
  title: string;
  subtitle: string; // category / eyebrow
  description: string; // excerpt
  highlights?: string[]; // e.g. tags
  meta?: string; // e.g. "6 min read"
  href: string;
}

// Adapted from the client-supplied ElitePlanCard: image-top with parallax,
// fade into a black content panel, brand-teal accents + CTA.
export function BlogCard({ imageUrl, title, subtitle, description, highlights = [], meta, href }: BlogCardProps) {
  return (
    <motion.a
      href={href}
      whileHover={{ scale: 1.02 }}
      transition={{ type: 'spring', stiffness: 250, damping: 20 }}
      className="group relative flex w-full max-w-sm flex-col overflow-hidden rounded-3xl bg-black hover:shadow-xl hover:shadow-primary/10"
    >
      {/* Top image with parallax on hover */}
      <div className="relative h-56 w-full overflow-hidden">
        <img
          src={imageUrl}
          alt={title}
          loading="lazy"
          className="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
        />
        {/* Fade connecting the image to the black panel */}
        <div className="absolute bottom-0 h-32 w-full bg-gradient-to-t from-black via-black/80 to-transparent" />
      </div>

      {/* Content */}
      <div className="relative z-10 flex flex-1 flex-col p-6 bg-black text-white">
        <p className="text-xs uppercase tracking-[2px] text-primary">{subtitle}</p>
        <h3 className="mt-1.5 text-xl font-bold leading-snug">{title}</h3>
        <p className="mt-3 text-sm leading-relaxed text-gray-300 line-clamp-3">{description}</p>

        {highlights.length > 0 && (
          <ul className="mt-4 flex flex-wrap gap-2 text-[11px] text-gray-400">
            {highlights.slice(0, 4).map((item, idx) => (
              <li key={idx} className="flex items-center gap-1.5 rounded-md bg-gray-800/60 px-2 py-1">
                <span className="h-1.5 w-1.5 rounded-full bg-primary" />
                {item}
              </li>
            ))}
          </ul>
        )}

        <div className="mt-6 flex items-center justify-between">
          <span className="inline-flex items-center gap-1.5 rounded-full bg-white px-4 py-2 text-sm font-medium text-black transition-colors group-hover:bg-primary">
            Read article
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
              <path strokeLinecap="round" strokeLinejoin="round" d="M5 12h14M13 6l6 6-6 6" />
            </svg>
          </span>
          {meta && <span className="text-xs text-gray-500">{meta}</span>}
        </div>
      </div>
    </motion.a>
  );
}
