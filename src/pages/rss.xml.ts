import type { APIRoute } from 'astro';
import { fetchPublishedBlogs } from '../lib/blog';
import { SITE_URL } from '../config';

export const prerender = false;

function esc(s: string): string {
  return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

export const GET: APIRoute = async () => {
  const posts = await fetchPublishedBlogs();
  const items = posts
    .map((p) => {
      const url = `${SITE_URL}${p.link || `/blogs/${p.slug}`}`;
      const date = p.created_at ? new Date(p.created_at).toUTCString() : new Date().toUTCString();
      return `    <item>
      <title>${esc(p.title)}</title>
      <link>${url}</link>
      <guid>${url}</guid>
      <pubDate>${date}</pubDate>
      <description>${esc(p.excerpt || '')}</description>
    </item>`;
    })
    .join('\n');

  const xml = `<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
  <channel>
    <title>Uxory Blog</title>
    <link>${SITE_URL}/blog-listings</link>
    <description>Insights on software, AI agents, web development and digital marketing from Uxory.</description>
    <language>en-us</language>
${items}
  </channel>
</rss>`;

  return new Response(xml, {
    headers: { 'Content-Type': 'application/xml; charset=utf-8', 'Cache-Control': 'public, max-age=3600' },
  });
};
