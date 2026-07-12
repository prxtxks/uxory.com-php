-- =============================================
-- Table: blogs
-- Stores blog post metadata for listings/homepage
-- =============================================

create table if not exists blogs (
  id         uuid         primary key default gen_random_uuid(),
  title      text         not null,
  slug       text         not null unique,
  excerpt    text         not null,
  image      text         not null,
  link       text         not null,
  read_time  int          not null default 5,
  created_at timestamptz  default now()
);

-- Row Level Security
alter table blogs enable row level security;

create policy "Allow public read access on blogs"
  on blogs for select
  using (true);

-- Seed data
insert into blogs (title, slug, excerpt, image, link, read_time, created_at) values
(
  'Operations You Should Automate',
  'operations-you-should-automate',
  'Your competitors already automated these five workflows. Here''s what you''re leaving on the table.',
  '/images/blog-img/blog-img-1.webp',
  '/blogs/blog-operations-you-should-automate',
  6,
  '2026-03-01T10:00:00Z'
),
(
  'Custom Software vs. Off-the-Shelf',
  'custom-software-vs-off-the-shelf',
  'Paying for 10 SaaS tools that don''t talk to each other? The real cost of "good enough" is bigger than you think.',
  '/images/blog-img/blog-img-2.webp',
  '/blogs/blog-custom-software-vs-off-the-shelf',
  7,
  '2026-02-15T10:00:00Z'
),
(
  'AI for Small Businesses',
  'ai-for-small-businesses',
  'AI isn''t just for billion-dollar companies. See how SMBs are using it to punch above their weight.',
  '/images/blog-img/blog-img-3.webp',
  '/blogs/blog-ai-for-small-businesses',
  6,
  '2026-02-01T10:00:00Z'
);
