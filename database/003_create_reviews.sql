-- =============================================
-- Table: reviews
-- Stores public client reviews with star ratings
-- =============================================

create table if not exists reviews (
  id            uuid         primary key default gen_random_uuid(),
  author_name   text         not null,
  company_name  text,
  email         text         not null,
  rating        smallint     not null check (rating between 1 and 5),
  review_text   text         not null,
  delete_token  text         not null,
  ip_hash       text,
  created_at    timestamptz  default now()
);

-- Row Level Security
alter table reviews enable row level security;

create policy "Anyone can read reviews"
  on reviews for select using (true);

create policy "Service role can insert reviews"
  on reviews for insert with check (true);

create policy "Service role can delete reviews"
  on reviews for delete using (true);
