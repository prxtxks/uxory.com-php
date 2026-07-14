-- =============================================
-- Table: quote_requests
-- Instant Estimate (/get-quote) submissions: wizard answers, computed
-- indicative price range, and lead contact details.
-- =============================================

create table if not exists quote_requests (
  id          uuid        primary key default gen_random_uuid(),
  category    text        not null,
  region      text        not null check (region in ('IN','GLOBAL')),
  currency    text        not null check (currency in ('INR','USD')),
  answers     jsonb       not null,
  hours       numeric     not null,
  price_low   numeric     not null,
  price_high  numeric     not null,
  line_items  jsonb       not null,
  comment     text,
  llm_used    boolean     not null default false,
  name        text        not null,
  email       text        not null,
  company     text,
  phone       text,
  ip_hash     text,
  status      text        not null default 'new'
              check (status in ('new','contacted','quoted','won','lost')),
  created_at  timestamptz default now()
);

alter table quote_requests enable row level security;

create policy "Service role manages quote_requests"
  on quote_requests for all
  using (true)
  with check (true);
