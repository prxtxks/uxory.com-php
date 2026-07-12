-- =============================================
-- Table: ai_rate_limits
-- Sliding-window rate limit for the anonymous Uxory AI chat (/api/chat).
-- Keyed on a hashed client IP. Managed by the service role only.
-- =============================================

create table if not exists ai_rate_limits (
  ip_hash      text        primary key,
  window_start timestamptz not null default now(),
  count        int         not null default 0
);

alter table ai_rate_limits enable row level security;

create policy "Service role manages ai_rate_limits"
  on ai_rate_limits for all
  using (true)
  with check (true);
