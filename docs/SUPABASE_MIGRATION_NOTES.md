# Supabase Migration Notes

## Overview

All data has been migrated from MySQL (`uxory_db`) to Supabase (PostgreSQL). MySQL is no longer used anywhere in the project.

| Table | Purpose | Status |
|-------|---------|--------|
| `subscribers` | Newsletter subscriptions | Migrated |
| `blogs` | Blog listing metadata | Migrated |
| `leads` | Contact form submissions | New |

---

## Required Configuration in `config/secrets.php`

```php
<?php
return [
    'resend_api_key'       => 'YOUR_RESEND_API_KEY',
    'supabase_url'         => 'https://YOUR_PROJECT_REF.supabase.co',
    'supabase_service_key' => 'YOUR_SERVICE_ROLE_SECRET_KEY',
    'recaptcha_secret'     => 'YOUR_RECAPTCHA_SECRET',
];
```

> **Service Role Key**: Use the **service_role** key (secret), NOT the anon key.
> Find it at: Supabase Dashboard > Settings > API > service_role key.

---

## Table Schemas

### `subscribers` (existing)

```sql
create table subscribers (
  id uuid primary key default gen_random_uuid(),
  email text not null unique,
  status text not null default 'active',
  subscribed_at timestamptz default now(),
  unsubscribed_at timestamptz
);
```

### `blogs`

```sql
create table blogs (
  id uuid primary key default gen_random_uuid(),
  title text not null,
  slug text not null unique,
  excerpt text not null,
  image text not null,
  link text not null,
  read_time int not null default 5,
  created_at timestamptz default now()
);

-- Seed data
insert into blogs (title, slug, excerpt, image, link, read_time, created_at) values
(
  '5 Business Operations You''re Still Doing Manually',
  'operations-you-should-automate',
  'Your competitors already automated lead follow-up, invoicing, onboarding, reporting, and support routing. Here''s what you''re leaving on the table.',
  '/images/blog-img/blog-img-1.webp',
  '/blogs/blog-operations-you-should-automate.php',
  6,
  '2026-03-01T10:00:00Z'
),
(
  'Custom Software vs. Off-the-Shelf: The Real Cost of Good Enough',
  'custom-software-vs-off-the-shelf',
  'Paying for 10 SaaS tools that don''t talk to each other? The hidden costs of "good enough" are bigger than you think.',
  '/images/blog-img/blog-img-2.webp',
  '/blogs/blog-custom-software-vs-off-the-shelf.php',
  7,
  '2026-02-15T10:00:00Z'
),
(
  'How Small Businesses Are Using AI to Compete with Enterprise Companies',
  'ai-for-small-businesses',
  'AI isn''t just for billion-dollar companies. See how SMBs are using chatbots, predictive analytics, and automation to punch above their weight.',
  '/images/blog-img/blog-img-3.webp',
  '/blogs/blog-ai-for-small-businesses.php',
  6,
  '2026-02-01T10:00:00Z'
);
```

### `leads`

```sql
create table leads (
  id uuid primary key default gen_random_uuid(),
  name text not null,
  email text not null,
  phone text,
  company text,
  message text,
  submitted_at timestamptz default now()
);
```

---

## Files That Use Supabase

| File | Table(s) | Operations |
|------|----------|------------|
| `php/subscribe.php` | `subscribers` | SELECT, INSERT, PATCH |
| `php/unsubscribe-script.php` | `subscribers` | SELECT, PATCH |
| `blog-listings.php` | `blogs` | SELECT (paginated) |
| `php/contact.php` | `leads` | INSERT |

---

## Status Values

**Subscribers:** `'active'` = subscribed, `'inactive'` = unsubscribed

---

## Testing Checklist

- [ ] Run the three `insert into blogs` statements in Supabase SQL Editor
- [ ] Run the `create table leads` statement in Supabase SQL Editor
- [ ] Verify blog-listings.php loads blogs from Supabase
- [ ] Verify contact form saves leads to Supabase
- [ ] Verify subscribe/unsubscribe still works
