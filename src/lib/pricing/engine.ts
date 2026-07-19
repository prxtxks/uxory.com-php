/**
 * Uxory Instant Estimate - deterministic pricing engine.
 *
 * Pure function over rateCard.ts: same answers in → same quote out, on both
 * client (live preview) and server (source of truth at submit). The LLM layer
 * may only nudge `hours` via a clamped percentage - it never prices anything
 * itself.
 */
import {
  HOURLY_RATE,
  CURRENCY,
  WEBSITE_BASE_HOURS,
  ECOM_BASE_HOURS,
  MOBILE_BASE_HOURS,
  AI_BOT_BASE_HOURS,
  AUTOMATION_HOURS_PER_WORKFLOW,
  PAGES_INCLUDED,
  HOURS_PER_EXTRA_PAGE,
  DESIGN_TIER_MULTIPLIER,
  FEATURE_HOURS,
  BACKEND_HOURS,
  SUPABASE_DISCOUNT,
  BOT_KNOWLEDGE_HOURS,
  BOT_CHANNEL_HOURS,
  BOT_VOLUME_MULTIPLIER,
  AUTOMATION_COMPLEXITY_MULTIPLIER,
  SCREEN_BAND_HOURS,
  PRODUCTS_INCLUDED,
  PRODUCT_UNIT_PRICE,
  PRODUCT_PACKAGE_DISCOUNTS,
  RUSH_MULTIPLIER,
  RANGE_SPREAD,
  MAINTENANCE_MONTHLY,
  HOSTING_YEARLY,
  FLOORS,
  WEBAPP_BASE_HOURS,
  WEBAPP_MODULE_CLAMP,
  WEBAPP_TOTAL_HOURS_CAP,
  type Region,
} from './rateCard';

export type Category = 'website' | 'ecommerce' | 'mobile' | 'webapp' | 'ai_bot' | 'automation' | 'custom';

/** A scoped web-app module: a label and the hours it is estimated at. */
export interface AppModule {
  label: string;
  hours: number;
}

export interface QuoteAnswers {
  category: Category;
  // website
  websiteType?: keyof typeof WEBSITE_BASE_HOURS;
  pages?: string[]; // selected standard pages
  extraPages?: number;
  designTier?: keyof typeof DESIGN_TIER_MULTIPLIER;
  // ecommerce
  platform?: keyof typeof ECOM_BASE_HOURS;
  techStack?: string; // nextjs | astro | other (informational)
  productCount?: number;
  // mobile
  mobilePlatform?: keyof typeof MOBILE_BASE_HOURS;
  screenBand?: keyof typeof SCREEN_BAND_HOURS;
  // ai bot
  botChannel?: keyof typeof BOT_CHANNEL_HOURS;
  botKnowledge?: keyof typeof BOT_KNOWLEDGE_HOURS;
  botLanguages?: number;
  botVolume?: keyof typeof BOT_VOLUME_MULTIPLIER;
  // web app / saas
  appModules?: AppModule[]; // scoped modules (from the AI scoper or manual picker)
  appSummary?: string; // the client's own description, kept for the agency
  appHints?: string[]; // structured toggles that seed the AI scoper (informational)
  // automation
  workflowCount?: number;
  automationComplexity?: keyof typeof AUTOMATION_COMPLEXITY_MULTIPLIER;
  automationTool?: string; // zapier | make | n8n | custom (custom adds code steps)
  // shared
  features?: string[]; // FEATURE_HOURS keys
  backend?: keyof typeof BACKEND_HOURS;
  hosting?: 'uxory' | 'own';
  maintenance?: boolean;
  rush?: boolean;
  // custom category
  description?: string;
}

export interface LineItem {
  label: string;
  /** Money amount in the quote currency; null = informational note line. */
  amount: number | null;
  note?: string;
}

export interface Quote {
  currency: 'INR' | 'USD';
  region: Region;
  hours: number;
  low: number;
  high: number;
  point: number;
  lineItems: LineItem[];
  flooredTo?: number; // set when the package floor kicked in
}

const r2 = (n: number) => Math.round(n * 100) / 100;

/** Round money to friendly numbers: ₹→…999, $→…9. */
function friendly(amount: number, region: Region): number {
  if (region === 'IN') return Math.max(999, Math.round(amount / 1000) * 1000 - 1);
  return Math.max(9, Math.round(amount / 10) * 10 - 1);
}

function money(hours: number, region: Region): number {
  return hours * HOURLY_RATE[region];
}

/** Per-product price after package discount for a given total count. */
export function productUnitPrice(count: number, region: Region): number {
  const tier =
    PRODUCT_PACKAGE_DISCOUNTS.find((t) => count <= t.upTo) ??
    PRODUCT_PACKAGE_DISCOUNTS[PRODUCT_PACKAGE_DISCOUNTS.length - 1];
  return PRODUCT_UNIT_PRICE[region] * (1 - tier.discount);
}

export function estimate(a: QuoteAnswers, region: Region, llmAdjustPct = 0): Quote {
  const items: LineItem[] = [];
  let hours = 0;
  const supabase = a.backend === 'supabase';

  const addHours = (label: string, h: number, note?: string) => {
    if (h <= 0) return;
    hours += h;
    items.push({ label, amount: friendlyless(money(h, region)), note });
  };
  // line item amounts are exact (not friendly-rounded) so they sum sensibly
  const friendlyless = r2;

  // ── Category bases ──
  switch (a.category) {
    case 'website': {
      const base = WEBSITE_BASE_HOURS[a.websiteType ?? 'business'] ?? WEBSITE_BASE_HOURS.business;
      addHours(labelForWebsite(a.websiteType), base);
      const pageCount = (a.pages?.length ?? 0) + (a.extraPages ?? 0);
      const extra = Math.max(0, pageCount - PAGES_INCLUDED);
      if (extra > 0)
        addHours(`${extra} additional page${extra > 1 ? 's' : ''}`, extra * HOURS_PER_EXTRA_PAGE);
      break;
    }
    case 'ecommerce': {
      const platform = a.platform ?? 'shopify';
      addHours(labelForEcom(platform, a.techStack), ECOM_BASE_HOURS[platform]);
      const count = a.productCount ?? 0;
      const billable = Math.min(Math.max(0, count - PRODUCTS_INCLUDED), 100 - PRODUCTS_INCLUDED);
      if (billable > 0) {
        const unit = productUnitPrice(count, region);
        items.push({
          label: `Product setup × ${billable}`,
          amount: r2(billable * unit),
          note: count > 25 ? 'package discount applied' : undefined,
        });
      }
      if (count > 100) {
        items.push({
          label: `Products beyond 100 (${count - 100})`,
          amount: null,
          note: 'custom volume pricing - we’ll confirm on the call',
        });
      }
      break;
    }
    case 'mobile': {
      const p = a.mobilePlatform ?? 'cross';
      addHours(labelForMobile(p), MOBILE_BASE_HOURS[p]);
      addHours('Additional screens', SCREEN_BAND_HOURS[a.screenBand ?? 's']);
      break;
    }
    case 'webapp': {
      addHours('Architecture, setup & core scaffolding', WEBAPP_BASE_HOURS);
      let moduleHours = 0;
      for (const m of a.appModules ?? []) {
        if (!m?.label) continue;
        const h = Math.max(WEBAPP_MODULE_CLAMP.min, Math.min(WEBAPP_MODULE_CLAMP.max, Math.round(m.hours || 0)));
        // Respect the total cap: stop adding billable module hours past it.
        const room = WEBAPP_TOTAL_HOURS_CAP - moduleHours;
        if (room <= 0) {
          items.push({ label: m.label, amount: null, note: 'scoped on our call' });
          continue;
        }
        const billable = Math.min(h, room);
        moduleHours += billable;
        addHours(m.label, billable);
      }
      break;
    }
    case 'ai_bot': {
      addHours('AI assistant build & training', AI_BOT_BASE_HOURS);
      addHours('Channel integration', BOT_CHANNEL_HOURS[a.botChannel ?? 'web_widget']);
      addHours('Knowledge base setup', BOT_KNOWLEDGE_HOURS[a.botKnowledge ?? 'docs']);
      const extraLangs = Math.max(0, (a.botLanguages ?? 1) - 1);
      if (extraLangs > 0)
        addHours(`${extraLangs} extra language${extraLangs > 1 ? 's' : ''}`, extraLangs * FEATURE_HOURS.bot_extra_language);
      break;
    }
    case 'automation': {
      const n = Math.max(1, a.workflowCount ?? 1);
      addHours(
        `${n} workflow${n > 1 ? 's' : ''} automated`,
        n * AUTOMATION_HOURS_PER_WORKFLOW
      );
      if (a.automationTool === 'custom') addHours('Custom code steps', FEATURE_HOURS.custom_code_step);
      break;
    }
    case 'custom': {
      // Deterministic fallback: business-website-sized starting scope; the
      // LLM adjustment (clamped) refines around it when available.
      addHours('Base scope (from your description)', WEBSITE_BASE_HOURS.business);
      break;
    }
  }

  // ── Shared adders ──
  for (const f of a.features ?? []) {
    const h = FEATURE_HOURS[f];
    if (h) addHours(featureLabel(f), h);
  }

  const backendKey = a.backend ?? 'none';
  let backendHours = BACKEND_HOURS[backendKey] ?? 0;
  if (supabase) backendHours *= 1 - SUPABASE_DISCOUNT;
  addHours(
    backendKey === 'supabase'
      ? 'Supabase backend (recommended - cost saving applied)'
      : backendKey === 'custom'
        ? 'Custom backend & database'
        : backendKey === 'existing_api'
          ? 'Integration with your existing API'
          : '',
    backendHours
  );

  // ── Multipliers (applied to hours; shown as lines) ──
  let multiplier = 1;
  const tier = a.designTier ?? 'template';
  if ((a.category === 'website' || a.category === 'ecommerce') && tier !== 'template') {
    multiplier *= DESIGN_TIER_MULTIPLIER[tier];
    items.push({
      label: tier === 'premium' ? 'Premium design & animations' : 'Fully custom design',
      amount: null,
      note: `×${DESIGN_TIER_MULTIPLIER[tier]}`,
    });
  }
  if (a.category === 'ai_bot' && a.botVolume && a.botVolume !== 'low') {
    multiplier *= BOT_VOLUME_MULTIPLIER[a.botVolume];
    items.push({ label: 'Higher chat volume', amount: null, note: `×${BOT_VOLUME_MULTIPLIER[a.botVolume]}` });
  }
  if (a.category === 'automation' && a.automationComplexity && a.automationComplexity !== 'simple') {
    multiplier *= AUTOMATION_COMPLEXITY_MULTIPLIER[a.automationComplexity];
    items.push({
      label: `${a.automationComplexity === 'complex' ? 'Complex' : 'Moderate'} integration depth`,
      amount: null,
      note: `×${AUTOMATION_COMPLEXITY_MULTIPLIER[a.automationComplexity]}`,
    });
  }
  if (a.rush) {
    multiplier *= RUSH_MULTIPLIER;
    items.push({ label: 'Priority delivery', amount: null, note: `×${RUSH_MULTIPLIER}` });
  }

  hours *= multiplier;

  // ── LLM adjustment (already clamped by caller) ──
  if (llmAdjustPct !== 0) {
    hours *= 1 + llmAdjustPct / 100;
    items.push({
      label: 'Scope adjustment from your notes',
      amount: null,
      note: `${llmAdjustPct > 0 ? '+' : ''}${llmAdjustPct}%`,
    });
  }

  hours = r2(hours);

  // ── Money: hours + product line items already in money terms ──
  const productMoney = items
    .filter((i) => i.label.startsWith('Product setup'))
    .reduce((s, i) => s + (i.amount ?? 0), 0);
  // Point price = total (multiplied) hours × rate, plus money-based product
  // lines. Hour line-item amounts are pre-multiplier and informational.
  let point = money(hours, region) + productMoney;

  // ── Floor to public packages ──
  const floor = FLOORS[a.category]?.[region] ?? 0;
  let flooredTo: number | undefined;
  if (point < floor) {
    point = floor;
    flooredTo = floor;
  }

  const low = friendly(point * (1 - RANGE_SPREAD), region);
  const high = friendly(point * (1 + RANGE_SPREAD), region);

  // ── Recurring lines (informational, not in the range) ──
  if (a.maintenance) {
    items.push({
      label: 'Monthly maintenance',
      amount: null,
      note: `${CURRENCY[region] === 'INR' ? '₹' : '$'}${MAINTENANCE_MONTHLY[region].toLocaleString()} /mo`,
    });
  }
  if (a.hosting === 'uxory') {
    items.push({
      label: 'Uxory managed hosting',
      amount: null,
      note: `${CURRENCY[region] === 'INR' ? '₹' : '$'}${HOSTING_YEARLY[region].toLocaleString()} /yr`,
    });
  }
  if ((a.features ?? []).includes('auth_phone_otp') && region === 'IN') {
    items.push({
      label: 'SMS OTP note',
      amount: null,
      note: 'India requires DLT registration for SMS - we guide you through it',
    });
  }

  return {
    currency: CURRENCY[region],
    region,
    hours,
    low: Math.min(low, high),
    high: Math.max(low, high),
    point: friendly(point, region),
    lineItems: items.filter((i) => i.label),
    flooredTo,
  };
}

// ── Labels ──
function labelForWebsite(t?: string): string {
  switch (t) {
    case 'landing': return 'Landing page build';
    case 'portfolio': return 'Portfolio website build';
    case 'webapp': return 'Web application build';
    default: return 'Business website build';
  }
}
function labelForEcom(p: string, tech?: string): string {
  if (p === 'shopify') return 'Shopify store build';
  if (p === 'woocommerce') return 'WooCommerce store build';
  return `Custom e-commerce build${tech && tech !== 'other' ? ` (${tech === 'nextjs' ? 'Next.js' : 'Astro'})` : ''}`;
}
function labelForMobile(p: string): string {
  if (p === 'android') return 'Android app build';
  if (p === 'ios') return 'iOS app build';
  return 'Cross-platform app (iOS + Android)';
}
function featureLabel(f: string): string {
  const map: Record<string, string> = {
    blog_cms: 'Blog / CMS', booking: 'Booking & appointments', live_chat: 'Live chat',
    whatsapp: 'WhatsApp integration', multilingual: 'Multilingual support', dark_mode: 'Dark mode',
    seo_setup: 'SEO setup', analytics: 'Analytics setup', newsletter: 'Newsletter signup',
    inventory: 'Inventory management', coupons: 'Coupons & discounts', product_reviews: 'Product reviews',
    wishlist: 'Wishlists', shipping_integration: 'Shipping integration', cod: 'Cash on delivery',
    subscriptions: 'Subscription products', multi_gateway: 'Multiple payment gateways',
    push_notifications: 'Push notifications', in_app_payments: 'In-app payments',
    offline_mode: 'Offline mode', chat: 'In-app chat', maps: 'Maps & location',
    store_publishing: 'App store publishing', auth_email: 'Email login', auth_google: 'Google login',
    auth_apple: 'Apple login', auth_phone_otp: 'Phone OTP login', bot_crm: 'CRM integration',
    bot_sheets: 'Google Sheets integration', bot_calendar: 'Calendar integration',
  };
  return map[f] ?? f;
}
