import * as React from 'react';

export interface BlogCardProps {
  imageUrl: string;
  title: string;
  category?: string | null;
  description: string;
  meta?: string; // e.g. "6 minute read"
  href: string;
}

function prettyCategory(cat?: string | null): string {
  if (!cat) return 'Insights';
  return cat.replace(/-/g, ' ').replace(/\b\w/g, (c) => c.toUpperCase());
}

// Desktop blog card - close to the original live layout: portrait image, title,
// excerpt, "minute read" link. Fills its grid column (no max-width) so cards sit
// close together. Hover is a gentle image zoom (clipped by the rounded frame) -
// no whole-card scale/rotate, which previously looked "cut".
export function BlogCard({ imageUrl, title, category, description, meta, href }: BlogCardProps) {
  return (
    <div className="group flex w-full flex-col">
      <a href={href} className="flex flex-1 flex-col">
        <figure className="relative mb-5 aspect-[4/3] overflow-hidden rounded-2xl bg-secondary/5 dark:bg-white/5">
          <img
            src={imageUrl}
            alt={title}
            loading="lazy"
            className="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
          />
          <span className="absolute left-3 top-3 rounded-full bg-black/55 px-3 py-1 text-[11px] font-medium uppercase tracking-wide text-white backdrop-blur-sm">
            {prettyCategory(category)}
          </span>
        </figure>

        <h3 className="text-[21px] font-medium leading-snug text-secondary transition-colors duration-200 line-clamp-2 group-hover:text-primary dark:text-backgroundBody lg:text-[23px]">
          {title}
        </h3>
      </a>

      <p className="mt-3 text-[15px] leading-relaxed text-secondary/65 line-clamp-2 dark:text-backgroundBody/65">
        {description}
      </p>

      {meta && (
        <a
          href={href}
          className="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-primary"
        >
          {meta}
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
        </a>
      )}
    </div>
  );
}
