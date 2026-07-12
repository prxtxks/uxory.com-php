-- =============================================
-- Migration: extend `blogs` for the automated blog system
-- Adds full-content + metadata columns so posts can be rendered from the DB
-- by /blogs/[slug].astro instead of being hardcoded pages.
-- Safe to run repeatedly.
-- =============================================

alter table blogs add column if not exists content_md  text;
alter table blogs add column if not exists category    text default 'general';
alter table blogs add column if not exists tags        text[] default '{}';
alter table blogs add column if not exists status      text default 'published';
alter table blogs add column if not exists source_urls text[] default '{}';
alter table blogs add column if not exists hero_image  text;
alter table blogs add column if not exists updated_at  timestamptz default now();

-- Fast lookups for the listing (published, newest first) and slug pages.
create index if not exists blogs_status_created_idx on blogs (status, created_at desc);
create index if not exists blogs_slug_idx on blogs (slug);

-- Backfill: the 3 seeded rows keep their existing static pages; mark them published.
update blogs set status = 'published' where status is null;
