-- =============================================
-- Table: subscribers (reference only — already deployed)
-- Stores newsletter subscriptions
-- =============================================

create table if not exists subscribers (
  id              uuid         primary key default gen_random_uuid(),
  email           text         not null unique,
  status          text         not null default 'active',
  subscribed_at   timestamptz  default now(),
  unsubscribed_at timestamptz
);

-- Row Level Security
alter table subscribers enable row level security;

create policy "Allow service role full access on subscribers"
  on subscribers for all
  using (true)
  with check (true);
