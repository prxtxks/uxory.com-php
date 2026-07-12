-- =============================================
-- Reviews: email verification (OTP) + location for the globe
-- Every new review must verify its email via a 6-digit code, making
-- reviews traceable to a real inbox. Location powers the reviews globe.
-- =============================================

alter table reviews
  add column if not exists verified boolean not null default false,
  add column if not exists city    text,
  add column if not exists country text,
  add column if not exists lat     double precision,
  add column if not exists lng     double precision;

-- One pending code per email. Codes are stored hashed.
create table if not exists review_otps (
  email      text primary key,
  code_hash  text not null,
  expires_at timestamptz not null,
  attempts   int not null default 0,
  created_at timestamptz default now()
);

alter table review_otps enable row level security;

create policy "Service role manages review_otps"
  on review_otps for all
  using (true)
  with check (true);
