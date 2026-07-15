// Blog data + rendering helpers shared by the listing, [slug] page, RSS and cron.
import { createClient } from '@supabase/supabase-js';
import { marked } from 'marked';
import sanitizeHtml from 'sanitize-html';
import manifest from '../../public/images/blog-lib/manifest.json';

export interface BlogRow {
  id?: string;
  title: string;
  slug: string;
  excerpt: string;
  image: string; // wide hero (also OG)
  link: string; // canonical path
  read_time: number;
  created_at?: string;
  content_md?: string | null;
  category?: string | null;
  tags?: string[] | null;
  status?: string | null;
  source_urls?: string[] | null;
  hero_image?: string | null;
}

export type Category = keyof typeof manifest;
export const CATEGORIES = Object.keys(manifest) as Category[];

// The 3 original posts remain as static pages; used as a safe fallback if the
// DB is unreachable/empty so the listing never breaks.
export const STATIC_BLOGS: BlogRow[] = [
  {
    title: 'Operations You Should Automate',
    slug: 'operations-you-should-automate',
    excerpt: "Your competitors already automated these five workflows. Here's what you're leaving on the table.",
    image: '/images/blog-img/blog-img-1.webp',
    link: '/blogs/blog-operations-you-should-automate',
    read_time: 6,
    created_at: '2026-03-01T10:00:00Z',
    category: 'ai-agents',
  },
  {
    title: 'Custom Software vs. Off-the-Shelf',
    slug: 'custom-software-vs-off-the-shelf',
    excerpt: "Paying for 10 SaaS tools that don't talk to each other? The real cost of “good enough” is bigger than you think.",
    image: '/images/blog-img/blog-img-2.webp',
    link: '/blogs/blog-custom-software-vs-off-the-shelf',
    read_time: 7,
    created_at: '2026-02-15T10:00:00Z',
    category: 'sde',
  },
  {
    title: 'AI for Small Businesses',
    slug: 'ai-for-small-businesses',
    excerpt: "AI isn't just for billion-dollar companies. See how SMBs are using it to punch above their weight.",
    image: '/images/blog-img/blog-img-3.webp',
    link: '/blogs/blog-ai-for-small-businesses',
    read_time: 6,
    created_at: '2026-02-01T10:00:00Z',
    category: 'ai-agents',
  },
];

export function getSupabaseAdmin() {
  const url = import.meta.env.SUPABASE_URL || process.env.SUPABASE_URL;
  const key = import.meta.env.SUPABASE_SERVICE_KEY || process.env.SUPABASE_SERVICE_KEY;
  if (!url || !key) return null;
  return createClient(url, key);
}

/** Published posts, newest first. Falls back to the static 3 when DB is absent. */
export async function fetchPublishedBlogs(): Promise<BlogRow[]> {
  try {
    const supabase = getSupabaseAdmin();
    if (!supabase) return STATIC_BLOGS;
    const { data, error } = await supabase
      .from('blogs')
      .select('*')
      .eq('status', 'published')
      .order('created_at', { ascending: false });
    if (error || !data || data.length === 0) return STATIC_BLOGS;
    return data as BlogRow[];
  } catch {
    return STATIC_BLOGS;
  }
}

/** A single DB-backed post by slug (only ones with content_md render via [slug]). */
export async function fetchBlogBySlug(slug: string): Promise<BlogRow | null> {
  try {
    const supabase = getSupabaseAdmin();
    if (!supabase) return null;
    const { data, error } = await supabase
      .from('blogs')
      .select('*')
      .eq('slug', slug)
      .eq('status', 'published')
      .maybeSingle();
    if (error || !data) return null;
    return data as BlogRow;
  } catch {
    return null;
  }
}

/** Render + sanitize markdown to safe HTML for SSR. */
export function renderMarkdown(md: string): string {
  const raw = marked.parse(md, { async: false }) as string;
  return sanitizeHtml(raw, {
    allowedTags: sanitizeHtml.defaults.allowedTags.concat(['h1', 'h2', 'img', 'figure', 'figcaption']),
    allowedAttributes: {
      ...sanitizeHtml.defaults.allowedAttributes,
      img: ['src', 'alt', 'loading', 'width', 'height'],
      a: ['href', 'name', 'target', 'rel'],
    },
    transformTags: {
      a: (tagName, attribs) => ({
        tagName,
        attribs: { ...attribs, rel: 'noopener noreferrer', target: '_blank' },
      }),
    },
  });
}

/**
 * Pick a category-appropriate hero image, avoiding the N most recently used
 * (relevant AND non-repetitive). Deterministic given the same inputs - pass an
 * index seed to vary. Returns {wide, tall}.
 */
export function pickHeroImage(
  category: string,
  recentlyUsedWide: string[] = [],
  seed = 0,
): { wide: string; tall: string } {
  const cat = (CATEGORIES.includes(category as Category) ? category : 'general') as Category;
  const pool = manifest[cat];
  const available = pool.filter((p) => !recentlyUsedWide.includes(p.wide));
  const list = available.length > 0 ? available : pool;
  return list[Math.abs(seed) % list.length];
}

export function estimateReadTime(md: string): number {
  const words = md.trim().split(/\s+/).length;
  return Math.max(3, Math.round(words / 200));
}
