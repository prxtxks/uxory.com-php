/**
 * Uxory Instant Estimate - rate card.
 *
 * EVERY tunable number lives here. The engine (engine.ts) is pure math over
 * this file. Rates are "friendly new-agency" (~60–70% of average local agency
 * rates). All effort values are HOURS unless stated otherwise; money-typed
 * values are per-region {IN, GLOBAL}.
 *
 * Floors anchor to the public packages on /website-dev:
 *   Starter Spark  ₹24,999 / $299  → any website quote never goes below this
 *   Commerce Catalyst ₹44,999 / $639 → any e-commerce quote never goes below this
 */

export type Region = 'IN' | 'GLOBAL';

export const HOURLY_RATE: Record<Region, number> = {
  IN: 700, // ₹/hr blended
  GLOBAL: 35, // $/hr blended
};

export const CURRENCY: Record<Region, 'INR' | 'USD'> = {
  IN: 'INR',
  GLOBAL: 'USD',
};

// ── Base builds (hours) ─────────────────────────────────────────
export const WEBSITE_BASE_HOURS: Record<string, number> = {
  landing: 16,
  portfolio: 24,
  business: 36,
  webapp: 80,
};

export const ECOM_BASE_HOURS: Record<string, number> = {
  shopify: 50,
  woocommerce: 60,
  custom: 110,
};

export const MOBILE_BASE_HOURS: Record<string, number> = {
  android: 120,
  ios: 120,
  cross: 150, // React Native / Flutter, both stores
};

export const AI_BOT_BASE_HOURS = 40;
export const AUTOMATION_HOURS_PER_WORKFLOW = 10;

// ── Website / shared adders ────────────────────────────────────
/**
 * Pages included in each website base before per-page pricing kicks in.
 * Business base (36h ≈ ₹25,200 / Starter Spark floor) bundles 5 pages;
 * smaller site types bundle fewer.
 */
export const WEBSITE_PAGES_INCLUDED: Record<string, number> = {
  landing: 1,
  portfolio: 4,
  business: 5,
};
export const HOURS_PER_EXTRA_PAGE = 3;

export const DESIGN_TIER_MULTIPLIER: Record<string, number> = {
  template: 1.0,
  custom: 1.3,
  premium: 1.6, // custom + rich animations
};

/** Feature adders (hours). Keys are wizard feature ids. */
export const FEATURE_HOURS: Record<string, number> = {
  // website / shared
  blog_cms: 8,
  booking: 10,
  live_chat: 4,
  whatsapp: 4,
  multilingual: 12,
  dark_mode: 4,
  seo_setup: 6,
  analytics: 3,
  newsletter: 4,
  // e-commerce
  inventory: 8,
  coupons: 5,
  product_reviews: 6,
  wishlist: 5,
  shipping_integration: 8,
  cod: 4, // India cash-on-delivery flows
  subscriptions: 12,
  multi_gateway: 6, // more than one payment gateway
  // mobile
  push_notifications: 8,
  in_app_payments: 12,
  offline_mode: 14,
  chat: 12,
  maps: 8,
  store_publishing: 8,
  // auth
  auth_email: 6,
  auth_google: 4,
  auth_apple: 5,
  auth_phone_otp: 10, // + DLT note for India
  // ai bot
  bot_crm: 8,
  bot_sheets: 5,
  bot_calendar: 6,
  bot_extra_language: 6, // per language beyond the first
  // automation
  custom_code_step: 8,
};

// ── Backend / database ─────────────────────────────────────────
export const BACKEND_HOURS: Record<string, number> = {
  none: 0,
  supabase: 16,
  custom: 46, // supabase-equivalent scope + 30h custom build
  existing_api: 10,
};

/** Discount applied to backend-related hours when Supabase is chosen. */
export const SUPABASE_DISCOUNT = 0.2;

// ── AI bot specifics ───────────────────────────────────────────
export const BOT_KNOWLEDGE_HOURS: Record<string, number> = {
  docs: 6,
  website_crawl: 8,
  database: 12,
};
export const BOT_CHANNEL_HOURS: Record<string, number> = {
  web_widget: 0, // included in base
  whatsapp: 10,
  instagram: 10,
  internal: 6,
};
export const BOT_VOLUME_MULTIPLIER: Record<string, number> = {
  low: 1.0, // < 500 chats/mo
  medium: 1.15, // 500–5k
  high: 1.35, // 5k+
};

// ── Automation specifics ───────────────────────────────────────
export const AUTOMATION_COMPLEXITY_MULTIPLIER: Record<string, number> = {
  simple: 1.0,
  medium: 1.4,
  complex: 2.0,
};

// ── Mobile specifics ───────────────────────────────────────────
export const SCREEN_BAND_HOURS: Record<string, number> = {
  s: 0, // ≤8 screens, included in base
  m: 24, // 9–15
  l: 56, // 16–25
  xl: 100, // 25+
};

// ── E-commerce product pricing (money, per product) ────────────
export const PRODUCTS_INCLUDED = 10;
export const PRODUCT_UNIT_PRICE: Record<Region, number> = {
  IN: 1500, // ₹1,500 / product
  GLOBAL: 25, // ~$25 / product
};
/** Package discounts by total product count (applied to per-product price). */
export const PRODUCT_PACKAGE_DISCOUNTS: Array<{ upTo: number; discount: number }> = [
  { upTo: 25, discount: 0 },
  { upTo: 50, discount: 0.2 },
  { upTo: 100, discount: 0.35 },
  // beyond 100 → custom volume pricing line, priced at the 100-tier rate
];

// ── Global modifiers ───────────────────────────────────────────
export const RUSH_MULTIPLIER = 1.25;

/** Indicative range half-width around the point estimate. */
export const RANGE_SPREAD = 0.12;

/** Monthly maintenance (money/month) - shown as a separate line, not summed. */
export const MAINTENANCE_MONTHLY: Record<Region, number> = {
  IN: 1999,
  GLOBAL: 29,
};

/** Uxory SMB hosting (money/year) - separate line, not summed. */
export const HOSTING_YEARLY: Record<Region, number> = {
  IN: 9999,
  GLOBAL: 139,
};

// ── Web app / SaaS (deep estimator) ────────────────────────────
/**
 * Baseline hours every custom web app carries regardless of features:
 * architecture, project setup, auth scaffolding, database design, CI/CD,
 * responsive shell, and QA. Feature modules add on top of this.
 */
export const WEBAPP_BASE_HOURS = 30;

/**
 * Reference module library for custom web apps / SaaS. The LLM scoper is
 * grounded in these hour norms and its per-module hours are clamped to
 * WEBAPP_MODULE_CLAMP. Hours are a mid-complexity baseline; the LLM (or the
 * manual picker) shifts within the clamp based on the described complexity.
 * `key` is stable; the LLM may also propose modules not in this list (still
 * clamped), which is why the engine prices from the returned hours, not a
 * fixed table.
 */
export const WEBAPP_MODULES: Array<{ key: string; label: string; hours: number; group: string }> = [
  { key: 'auth_roles', label: 'Authentication & user roles', hours: 24, group: 'Core' },
  { key: 'user_profiles', label: 'User profiles & account settings', hours: 16, group: 'Core' },
  { key: 'dashboard', label: 'Main dashboard', hours: 26, group: 'Core' },
  { key: 'admin_panel', label: 'Admin / management panel', hours: 40, group: 'Core' },
  { key: 'crud_entity', label: 'Data module (create, list, edit, delete)', hours: 20, group: 'Data' },
  { key: 'search_filter', label: 'Search & advanced filtering', hours: 14, group: 'Data' },
  { key: 'file_uploads', label: 'File uploads & media handling', hours: 16, group: 'Data' },
  { key: 'import_export', label: 'Import / export data', hours: 12, group: 'Data' },
  { key: 'reporting', label: 'Reports, charts & analytics', hours: 30, group: 'Data' },
  { key: 'audit_logs', label: 'Audit logs & activity history', hours: 14, group: 'Data' },
  { key: 'payments', label: 'Payments & checkout', hours: 34, group: 'Commerce' },
  { key: 'subscriptions', label: 'Subscriptions & recurring billing', hours: 40, group: 'Commerce' },
  { key: 'notifications', label: 'Email & in-app notifications', hours: 14, group: 'Engagement' },
  { key: 'chat_messaging', label: 'In-app chat / messaging', hours: 34, group: 'Engagement' },
  { key: 'realtime', label: 'Real-time / live updates', hours: 28, group: 'Engagement' },
  { key: 'onboarding_flow', label: 'Onboarding & guided setup', hours: 14, group: 'Engagement' },
  { key: 'integration', label: 'Third-party integration', hours: 16, group: 'Integrations' },
  { key: 'public_api', label: 'Public / partner API', hours: 30, group: 'Integrations' },
  { key: 'maps_location', label: 'Maps & location', hours: 14, group: 'Integrations' },
  { key: 'ai_features', label: 'AI-powered features', hours: 40, group: 'Advanced' },
  { key: 'multi_tenant', label: 'Multi-tenant / organizations', hours: 44, group: 'Advanced' },
  { key: 'public_pages', label: 'Public marketing pages', hours: 16, group: 'Advanced' },
];

/** Per-module hour clamp applied to whatever the LLM proposes. */
export const WEBAPP_MODULE_CLAMP = { min: 6, max: 90 };
/** Safety cap on total module hours before the base is added. */
export const WEBAPP_TOTAL_HOURS_CAP = 1400;

// ── Price floors (money) ───────────────────────────────────────
export const FLOORS: Record<string, Record<Region, number>> = {
  website: { IN: 24999, GLOBAL: 299 },
  ecommerce: { IN: 44999, GLOBAL: 639 },
  mobile: { IN: 79999, GLOBAL: 3999 },
  webapp: { IN: 79999, GLOBAL: 2499 },
  ai_bot: { IN: 24999, GLOBAL: 999 },
  automation: { IN: 9999, GLOBAL: 299 },
  custom: { IN: 24999, GLOBAL: 999 },
};

/** LLM adjustment clamp (percent of hours), applied server-side only. */
export const LLM_ADJUSTMENT_CLAMP = { min: -15, max: 40 };
