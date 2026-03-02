-- =============================================
-- Table: review_replies
-- Stores threaded replies to reviews
-- =============================================

create table if not exists review_replies (
  id            uuid         primary key default gen_random_uuid(),
  review_id     uuid         not null references reviews(id) on delete cascade,
  author_name   text         not null,
  company_name  text,
  reply_text    text         not null,
  ip_hash       text,
  created_at    timestamptz  default now()
);

-- Row Level Security
alter table review_replies enable row level security;

create policy "Anyone can read replies"
  on review_replies for select using (true);

create policy "Service role can insert replies"
  on review_replies for insert with check (true);
