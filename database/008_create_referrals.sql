-- =============================================
-- Table: referrals
-- Stores "Refer & Earn" submissions. Referrer earns 10% of the referred
-- client's spend, capped at $1,000 USD.
-- =============================================

create table if not exists referrals (
  id             uuid        primary key default gen_random_uuid(),
  referrer_email text        not null,
  referrer_name  text,
  client_email   text        not null,
  client_name    text,
  message        text,
  status         text        not null default 'new'
                 check (status in ('new','contacted','converted','paid','rejected')),
  ip_hash        text,
  created_at     timestamptz default now()
);

alter table referrals enable row level security;

create policy "Service role manages referrals"
  on referrals for all
  using (true)
  with check (true);
