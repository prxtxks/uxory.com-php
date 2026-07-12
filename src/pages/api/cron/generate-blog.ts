import type { APIRoute } from 'astro';
import Parser from 'rss-parser';
import { getSupabaseAdmin, pickHeroImage, estimateReadTime, CATEGORIES } from '../../../lib/blog';

export const prerender = false;

const GEMINI_MODEL = import.meta.env.GEMINI_MODEL || process.env.GEMINI_MODEL || 'gemini-2.0-flash';

// Free, key-less RSS sources per category.
const FEEDS: Record<string, string[]> = {
  'web-dev': ['https://www.smashingmagazine.com/feed/', 'https://dev.to/feed/tag/webdev'],
  'ai-agents': ['https://dev.to/feed/tag/ai', 'https://hnrss.org/newest?q=AI+agent&count=25'],
  'marketing': ['https://www.searchenginejournal.com/feed/', 'https://dev.to/feed/tag/marketing'],
  'sde': ['https://dev.to/feed/tag/programming', 'https://hnrss.org/frontpage'],
  'general': ['https://dev.to/feed/'],
};

function slugify(s: string): string {
  return s
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/^-+|-+$/g, '')
    .slice(0, 80);
}

function json(body: unknown, status = 200) {
  return new Response(JSON.stringify(body), { status, headers: { 'Content-Type': 'application/json' } });
}

async function fetchFeedItems(category: string) {
  const parser = new Parser({ timeout: 10000 });
  const urls = FEEDS[category] || FEEDS.general;
  const items: { title: string; link: string; snippet: string }[] = [];
  for (const url of urls) {
    try {
      const feed = await parser.parseURL(url);
      for (const it of (feed.items || []).slice(0, 6)) {
        if (it.title && it.link) {
          items.push({
            title: it.title,
            link: it.link,
            snippet: (it.contentSnippet || it.content || '').slice(0, 300),
          });
        }
      }
    } catch {
      /* skip a dead feed */
    }
  }
  return items.slice(0, 6);
}

async function generatePost(
  apiKey: string,
  category: string,
  items: { title: string; link: string; snippet: string }[],
) {
  const sourceList = items.map((i, n) => `${n + 1}. ${i.title} — ${i.snippet} (${i.link})`).join('\n');
  const prompt = `You are a senior writer for Uxory, a software/AI agency. Using the recent ${category} news items below as inspiration, write ONE original, insightful blog post (do NOT copy text — synthesize and analyse). Audience: business owners and founders. Tone: clear, practical, confident, no fluff.

Recent items:
${sourceList}

Return ONLY valid JSON matching this shape:
{
  "title": "compelling, specific title (<70 chars)",
  "excerpt": "1-2 sentence hook (<160 chars)",
  "tags": ["3-5", "lowercase", "tags"],
  "content_md": "800-1200 word article in Markdown with ## subheadings, short paragraphs, and a bulleted takeaways section. End with a short 'Why this matters for your business' paragraph."
}`;

  const url = `https://generativelanguage.googleapis.com/v1beta/models/${GEMINI_MODEL}:generateContent?key=${apiKey}`;
  const res = await fetch(url, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      contents: [{ role: 'user', parts: [{ text: prompt }] }],
      generationConfig: {
        temperature: 0.8,
        maxOutputTokens: 4096,
        responseMimeType: 'application/json',
      },
    }),
  });
  if (!res.ok) throw new Error(`Gemini ${res.status}: ${await res.text()}`);
  const data = await res.json();
  const text = data?.candidates?.[0]?.content?.parts?.map((p: { text?: string }) => p.text || '').join('') || '';
  const parsed = JSON.parse(text);
  if (!parsed.title || !parsed.content_md) throw new Error('Missing fields in generated post');
  return parsed as { title: string; excerpt: string; tags: string[]; content_md: string };
}

async function handle(request: Request): Promise<Response> {
  const apiKey = import.meta.env.GEMINI_API_KEY || process.env.GEMINI_API_KEY;
  const cronSecret = import.meta.env.CRON_SECRET || process.env.CRON_SECRET;

  // Auth: Vercel Cron sends `Authorization: Bearer <CRON_SECRET>`.
  const auth = request.headers.get('authorization') || '';
  const provided = auth.replace(/^Bearer\s+/i, '');
  if (!cronSecret || provided !== cronSecret) return json({ error: 'Unauthorized' }, 401);
  if (!apiKey) return json({ error: 'GEMINI_API_KEY not set' }, 503);

  const supabase = getSupabaseAdmin();
  if (!supabase) return json({ error: 'Supabase not configured' }, 503);

  // Rotate category deterministically by day-of-year so topics vary.
  const day = Math.floor(Date.now() / 86400000);
  const category = CATEGORIES[day % CATEGORIES.length];

  const items = await fetchFeedItems(category);
  if (items.length === 0) return json({ error: `No feed items for ${category}` }, 502);

  // Dedupe: skip if we've already used any of these source links.
  const links = items.map((i) => i.link);
  const { data: existing } = await supabase
    .from('blogs')
    .select('source_urls')
    .overlaps('source_urls', links);
  if (existing && existing.length > 0) {
    return json({ skipped: true, reason: 'sources already used', category });
  }

  let post;
  try {
    post = await generatePost(apiKey, category, items);
  } catch (e) {
    return json({ error: 'Generation failed', detail: (e as Error).message }, 502);
  }

  let slug = slugify(post.title);
  // Ensure slug uniqueness
  const { data: clash } = await supabase.from('blogs').select('id').eq('slug', slug).maybeSingle();
  if (clash) slug = `${slug}-${day}`;

  // Pick a category hero avoiding the last few used.
  const { data: recent } = await supabase
    .from('blogs')
    .select('hero_image')
    .eq('category', category)
    .order('created_at', { ascending: false })
    .limit(4);
  const recentWide = (recent || []).map((r) => r.hero_image).filter(Boolean) as string[];
  const hero = pickHeroImage(category, recentWide, day);

  const row = {
    title: post.title,
    slug,
    excerpt: post.excerpt || post.title,
    image: hero.wide,
    hero_image: hero.wide,
    link: `/blogs/${slug}`,
    read_time: estimateReadTime(post.content_md),
    content_md: post.content_md,
    category,
    tags: post.tags || [],
    status: 'published',
    source_urls: links,
  };

  const { error } = await supabase.from('blogs').insert(row);
  if (error) return json({ error: 'Insert failed', detail: error.message }, 500);

  return json({ ok: true, category, slug, title: post.title });
}

// Vercel Cron issues GET; allow POST for manual triggering too.
export const GET: APIRoute = ({ request }) => handle(request);
export const POST: APIRoute = ({ request }) => handle(request);
