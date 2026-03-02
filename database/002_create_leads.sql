-- =============================================
-- Table: leads
-- Stores contact form submissions
-- =============================================

create table if not exists leads (
  id           uuid         primary key default gen_random_uuid(),
  name         text         not null,
  email        text         not null,
  phone        text,
  company      text,
  message      text,
  submitted_at timestamptz  default now()
);

-- Row Level Security
alter table leads enable row level security;

create policy "Allow service role insert on leads"
  on leads for insert
  with check (true);
