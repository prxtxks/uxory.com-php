-- =============================================
-- Migration: strip legacy .php suffix from blog links
-- Safe to run repeatedly. Fixes rows seeded before the PHP->Astro migration.
-- =============================================
update blogs
set link = regexp_replace(link, '\.php$', '')
where link like '%.php';
