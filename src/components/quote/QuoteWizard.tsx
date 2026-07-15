import * as React from 'react';
import { useEffect, useMemo, useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { estimate, type QuoteAnswers, type Category } from '../../lib/pricing/engine';
import type { Region } from '../../lib/pricing/rateCard';
import { StepShell, OptionCard, Chip, Counter, SliderControl, TextField, Toggle } from './controls';
import PriceReveal from './PriceReveal';

/* ── Types ── */
export interface ContactInfo {
  name: string;
  email: string;
  company: string;
  phone: string;
}

interface WizardState {
  region: Region;
  regionResolved: boolean;
  answers: QuoteAnswers;
  contact: ContactInfo;
  comment: string;
}

const DEFAULT_STATE: WizardState = {
  region: 'GLOBAL',
  regionResolved: false,
  answers: { category: '' as Category, features: [], botLanguages: 1, workflowCount: 2, productCount: 20, extraPages: 0 },
  contact: { name: '', email: '', company: '', phone: '' },
  comment: '',
};

const STORAGE_KEY = 'uxory-quote-v1';

/* ── Small icons (stroke style) ── */
const ic = (d: string) => (
  <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.7" strokeLinecap="round" strokeLinejoin="round">
    <path d={d} />
  </svg>
);
const ICONS: Record<string, React.ReactNode> = {
  website: ic('M3 5h18v14H3zM3 9h18M7 7h.01M10 7h.01'),
  ecommerce: ic('M6 6h15l-1.5 8.5H8L6 3H3M9 20a1 1 0 100-2 1 1 0 000 2zm9 0a1 1 0 100-2 1 1 0 000 2z'),
  mobile: ic('M8 2h8a2 2 0 012 2v16a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2zM12 18h.01'),
  ai_bot: ic('M12 8V4m0 0H8m4 0h4M5 12a7 7 0 0114 0v5a3 3 0 01-3 3H8a3 3 0 01-3-3v-5zM9 14h.01M15 14h.01'),
  automation: ic('M12 2v4m0 12v4M4.9 4.9l2.8 2.8m8.6 8.6l2.8 2.8M2 12h4m12 0h4M4.9 19.1l2.8-2.8m8.6-8.6l2.8-2.8'),
  custom: ic('M12 3l1.9 5.8H20l-4.9 3.6 1.9 5.8-5-3.6-5 3.6 1.9-5.8L4 8.8h6.1z'),
};

const PAGE_OPTIONS = ['Home', 'About', 'Services', 'Contact', 'Blog', 'FAQ', 'Careers', 'Portfolio', 'Privacy & Terms'];

/* ── Main wizard ── */
export default function QuoteWizard() {
  const [state, setState] = useState<WizardState>(DEFAULT_STATE);
  const [stepIdx, setStepIdx] = useState(0);
  const [dir, setDir] = useState(1);

  // restore + persist
  useEffect(() => {
    try {
      const raw = sessionStorage.getItem(STORAGE_KEY);
      if (raw) {
        const saved = JSON.parse(raw);
        setState((s) => ({ ...s, ...saved.state }));
        setStepIdx(saved.stepIdx ?? 0);
      }
    } catch {}
  }, []);
  useEffect(() => {
    try {
      sessionStorage.setItem(STORAGE_KEY, JSON.stringify({ state, stepIdx }));
    } catch {}
  }, [state, stepIdx]);

  // region autodetect (once, unless user already resolved)
  useEffect(() => {
    if (state.regionResolved) return;
    fetch('https://ipwho.is/')
      .then((r) => r.json())
      .then((d) => {
        setState((s) =>
          s.regionResolved ? s : { ...s, region: d?.country_code === 'IN' ? 'IN' : 'GLOBAL', regionResolved: true }
        );
      })
      .catch(() => setState((s) => ({ ...s, regionResolved: true })));
  }, [state.regionResolved]);

  const a = state.answers;
  const setA = (patch: Partial<QuoteAnswers>) => setState((s) => ({ ...s, answers: { ...s.answers, ...patch } }));
  const setContact = (patch: Partial<ContactInfo>) => setState((s) => ({ ...s, contact: { ...s.contact, ...patch } }));
  const toggleFeature = (f: string) =>
    setA({ features: a.features?.includes(f) ? a.features.filter((x) => x !== f) : [...(a.features ?? []), f] });
  const currency = state.region === 'IN' ? '₹' : '$';

  /* live estimate (only meaningful once category picked) */
  const live = useMemo(() => {
    if (!a.category) return null;
    try {
      return estimate(a, state.region);
    } catch {
      return null;
    }
  }, [a, state.region]);

  /* ── Steps assembly ── */
  type Step = { id: string; valid: boolean; node: React.ReactNode };
  const steps: Step[] = [];

  /* Step: category */
  steps.push({
    id: 'category',
    valid: !!a.category,
    node: (
      <StepShell
        title="What are we building for you?"
        subtitle="Answer a few questions - get an indicative quote in about 2 minutes."
      >
        <div className="grid grid-cols-2 gap-3 md:grid-cols-3">
          {(
            [
              ['website', 'Website', 'Business, portfolio or web app'],
              ['ecommerce', 'E-commerce', 'Shopify, WooCommerce or custom store'],
              ['mobile', 'Mobile app', 'iOS, Android or both'],
              ['ai_bot', 'AI bot / agent', 'Chat assistants that work 24/7'],
              ['automation', 'Automation', 'Connect your tools, kill busywork'],
              ['custom', 'Something else', 'Describe it - we’ll estimate'],
            ] as [Category, string, string][]
          ).map(([key, label, hint]) => (
            <OptionCard
              key={key}
              selected={a.category === key}
              onClick={() => setA({ category: key })}
              icon={ICONS[key]}
              label={label}
              hint={hint}
            />
          ))}
        </div>
      </StepShell>
    ),
  });

  /* Category-specific steps */
  if (a.category === 'website') {
    steps.push({
      id: 'w-type',
      valid: !!a.websiteType,
      node: (
        <StepShell title="What kind of website?" subtitle="Pick the closest match - you can refine on our call.">
          <div className="grid grid-cols-2 gap-3">
            {(
              [
                ['landing', 'Landing page', 'One sharp page that converts'],
                ['portfolio', 'Portfolio', 'Show your work beautifully'],
                ['business', 'Business website', 'Multi-page company presence'],
                ['webapp', 'Web application', 'Logins, dashboards, real product'],
              ] as [string, string, string][]
            ).map(([k, l, h]) => (
              <OptionCard key={k} selected={a.websiteType === k} onClick={() => setA({ websiteType: k as any })} label={l} hint={h} />
            ))}
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'w-pages',
      valid: (a.pages?.length ?? 0) > 0 || (a.extraPages ?? 0) > 0,
      node: (
        <StepShell title="Which pages do you need?" subtitle="First 5 pages are included in the base build.">
          <div className="flex flex-wrap gap-2">
            {PAGE_OPTIONS.map((p) => (
              <Chip
                key={p}
                selected={!!a.pages?.includes(p)}
                onClick={() => setA({ pages: a.pages?.includes(p) ? a.pages.filter((x) => x !== p) : [...(a.pages ?? []), p] })}
              >
                {p}
              </Chip>
            ))}
          </div>
          <div className="mt-6 flex items-center gap-4">
            <span className="text-sm text-secondary/60 dark:text-backgroundBody/60">Other custom pages:</span>
            <Counter value={a.extraPages ?? 0} onChange={(n) => setA({ extraPages: n })} max={40} />
          </div>
        </StepShell>
      ),
    });
    steps.push(designStep(a, setA));
    steps.push({
      id: 'w-features',
      valid: true,
      node: (
        <StepShell title="Any extras?" subtitle="Select everything that applies - skip if unsure.">
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['blog_cms', 'Blog / CMS'],
                ['booking', 'Booking & appointments'],
                ['live_chat', 'Live chat'],
                ['whatsapp', 'WhatsApp integration'],
                ['multilingual', 'Multiple languages'],
                ['dark_mode', 'Dark mode'],
                ['seo_setup', 'SEO setup'],
                ['analytics', 'Analytics'],
                ['newsletter', 'Newsletter'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={!!a.features?.includes(k)} onClick={() => toggleFeature(k)}>
                {l}
              </Chip>
            ))}
          </div>
        </StepShell>
      ),
    });
    steps.push(stackStep(a, setA, state.region));
  }

  if (a.category === 'ecommerce') {
    steps.push({
      id: 'e-platform',
      valid: !!a.platform && (a.platform !== 'custom' || !!a.techStack),
      node: (
        <StepShell title="Which platform?" subtitle="We build on all of them - each has trade-offs we’ll walk you through.">
          <div className="grid grid-cols-1 gap-3 md:grid-cols-3">
            {(
              [
                ['shopify', 'Shopify', 'Fastest launch, monthly fee', 'Popular'],
                ['woocommerce', 'WooCommerce', 'WordPress, flexible, cheap hosting', ''],
                ['custom', 'Custom build', 'Maximum control & performance', 'Premium'],
              ] as [string, string, string, string][]
            ).map(([k, l, h, badge]) => (
              <OptionCard key={k} selected={a.platform === k} onClick={() => setA({ platform: k as any })} label={l} hint={h} badge={badge || undefined} />
            ))}
          </div>
          <AnimatePresence>
            {a.platform === 'custom' && (
              <motion.div initial={{ opacity: 0, height: 0 }} animate={{ opacity: 1, height: 'auto' }} exit={{ opacity: 0, height: 0 }} className="overflow-hidden">
                <p className="mb-2 mt-6 text-sm text-secondary/60 dark:text-backgroundBody/60">Preferred technology:</p>
                <div className="flex flex-wrap gap-2">
                  {(
                    [
                      ['nextjs', 'Next.js (recommended)'],
                      ['astro', 'Astro'],
                      ['other', 'You advise me'],
                    ] as [string, string][]
                  ).map(([k, l]) => (
                    <Chip key={k} selected={a.techStack === k} onClick={() => setA({ techStack: k })}>
                      {l}
                    </Chip>
                  ))}
                </div>
              </motion.div>
            )}
          </AnimatePresence>
        </StepShell>
      ),
    });
    steps.push({
      id: 'e-products',
      valid: true,
      node: (
        <StepShell
          title="How many products?"
          subtitle={`First 10 are included. Beyond that ${currency}${state.region === 'IN' ? '1,500' : '25'}/product - with package discounts at 25+ and 50+.`}
        >
          <SliderControl
            value={a.productCount ?? 20}
            onChange={(n) => setA({ productCount: n })}
            min={1}
            max={150}
            format={(n) => (n >= 150 ? '150+' : String(n)) + ' products'}
          />
        </StepShell>
      ),
    });
    steps.push({
      id: 'e-features',
      valid: true,
      node: (
        <StepShell title="Store features" subtitle="Select everything that applies.">
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['inventory', 'Inventory management'],
                ['coupons', 'Coupons & discounts'],
                ['product_reviews', 'Product reviews'],
                ['wishlist', 'Wishlists'],
                ['shipping_integration', 'Shipping integration'],
                ...(state.region === 'IN' ? ([['cod', 'Cash on delivery']] as [string, string][]) : []),
                ['subscriptions', 'Subscriptions'],
                ['multi_gateway', 'Multiple payment gateways'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={!!a.features?.includes(k)} onClick={() => toggleFeature(k)}>
                {l}
              </Chip>
            ))}
          </div>
          <p className="mt-5 text-xs text-secondary/45 dark:text-backgroundBody/45">
            Payments: {state.region === 'IN' ? 'Razorpay · UPI · PhonePe · Stripe' : 'Stripe · PayPal · Shopify Payments'} - we set up whichever you choose.
          </p>
        </StepShell>
      ),
    });
    steps.push(stackStep(a, setA, state.region));
  }

  if (a.category === 'mobile') {
    steps.push({
      id: 'm-platform',
      valid: !!a.mobilePlatform,
      node: (
        <StepShell title="Which platforms?">
          <div className="grid grid-cols-1 gap-3 md:grid-cols-3">
            {(
              [
                ['android', 'Android only', 'Play Store'],
                ['ios', 'iOS only', 'App Store'],
                ['cross', 'Both (recommended)', 'One codebase - React Native / Flutter'],
              ] as [string, string, string][]
            ).map(([k, l, h]) => (
              <OptionCard key={k} selected={a.mobilePlatform === k} onClick={() => setA({ mobilePlatform: k as any })} label={l} hint={h} badge={k === 'cross' ? 'Best value' : undefined} />
            ))}
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'm-size',
      valid: !!a.screenBand,
      node: (
        <StepShell title="How big is the app?" subtitle="Rough screen count - think login, home, profile, settings…">
          <div className="grid grid-cols-2 gap-3 md:grid-cols-4">
            {(
              [
                ['s', 'Small', '≤ 8 screens'],
                ['m', 'Medium', '9–15 screens'],
                ['l', 'Large', '16–25 screens'],
                ['xl', 'Very large', '25+ screens'],
              ] as [string, string, string][]
            ).map(([k, l, h]) => (
              <OptionCard key={k} selected={a.screenBand === k} onClick={() => setA({ screenBand: k as any })} label={l} hint={h} />
            ))}
          </div>
          <p className="mb-2 mt-6 text-sm text-secondary/60 dark:text-backgroundBody/60">Login options:</p>
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['auth_email', 'Email'],
                ['auth_google', 'Google'],
                ['auth_apple', 'Apple'],
                ['auth_phone_otp', 'Phone OTP'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={!!a.features?.includes(k)} onClick={() => toggleFeature(k)}>
                {l}
              </Chip>
            ))}
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'm-features',
      valid: true,
      node: (
        <StepShell title="App features">
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['push_notifications', 'Push notifications'],
                ['in_app_payments', 'In-app payments'],
                ['offline_mode', 'Offline mode'],
                ['chat', 'In-app chat'],
                ['maps', 'Maps & location'],
                ['store_publishing', 'Store publishing help'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={!!a.features?.includes(k)} onClick={() => toggleFeature(k)}>
                {l}
              </Chip>
            ))}
          </div>
          <p className="mb-2 mt-6 text-sm text-secondary/60 dark:text-backgroundBody/60">Backend:</p>
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['supabase', 'Supabase (recommended - saves cost)'],
                ['custom', 'Custom backend'],
                ['existing_api', 'We already have an API'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={a.backend === k} onClick={() => setA({ backend: k as any })}>
                {l}
              </Chip>
            ))}
          </div>
        </StepShell>
      ),
    });
  }

  if (a.category === 'ai_bot') {
    steps.push({
      id: 'b-channel',
      valid: !!a.botChannel,
      node: (
        <StepShell title="Where should the AI live?">
          <div className="grid grid-cols-2 gap-3 md:grid-cols-4">
            {(
              [
                ['web_widget', 'Website widget', 'Chat bubble on your site'],
                ['whatsapp', 'WhatsApp', 'Meta Business API'],
                ['instagram', 'Instagram', 'DM automation'],
                ['internal', 'Internal tool', 'For your own team'],
              ] as [string, string, string][]
            ).map(([k, l, h]) => (
              <OptionCard key={k} selected={a.botChannel === k} onClick={() => setA({ botChannel: k as any })} label={l} hint={h} />
            ))}
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'b-knowledge',
      valid: !!a.botKnowledge && !!a.botVolume,
      node: (
        <StepShell title="What should it know?" subtitle="Where does the bot's knowledge come from?">
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['docs', 'Documents / FAQs'],
                ['website_crawl', 'My website content'],
                ['database', 'Live database / products'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={a.botKnowledge === k} onClick={() => setA({ botKnowledge: k as any })}>
                {l}
              </Chip>
            ))}
          </div>
          <div className="mt-6 flex items-center gap-4">
            <span className="text-sm text-secondary/60 dark:text-backgroundBody/60">Languages:</span>
            <Counter value={a.botLanguages ?? 1} onChange={(n) => setA({ botLanguages: n })} min={1} max={10} />
          </div>
          <p className="mb-2 mt-6 text-sm text-secondary/60 dark:text-backgroundBody/60">Expected chats per month:</p>
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['low', 'Under 500'],
                ['medium', '500 – 5,000'],
                ['high', '5,000+'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={a.botVolume === k} onClick={() => setA({ botVolume: k as any })}>
                {l}
              </Chip>
            ))}
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'b-integrations',
      valid: true,
      node: (
        <StepShell title="Connect it to your tools?">
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['bot_crm', 'CRM (HubSpot, Zoho…)'],
                ['bot_sheets', 'Google Sheets'],
                ['bot_calendar', 'Calendar booking'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={!!a.features?.includes(k)} onClick={() => toggleFeature(k)}>
                {l}
              </Chip>
            ))}
          </div>
        </StepShell>
      ),
    });
  }

  if (a.category === 'automation') {
    steps.push({
      id: 'auto-scope',
      valid: (a.workflowCount ?? 0) > 0 && !!a.automationTool,
      node: (
        <StepShell title="What should we automate?" subtitle="A workflow = one repeating process, e.g. “new order → invoice → WhatsApp update”.">
          <div className="flex items-center gap-4">
            <span className="text-sm text-secondary/60 dark:text-backgroundBody/60">Workflows:</span>
            <Counter value={a.workflowCount ?? 2} onChange={(n) => setA({ workflowCount: n })} min={1} max={25} />
          </div>
          <p className="mb-2 mt-6 text-sm text-secondary/60 dark:text-backgroundBody/60">Preferred tooling:</p>
          <div className="flex flex-wrap gap-2">
            {(
              [
                ['zapier', 'Zapier'],
                ['make', 'Make'],
                ['n8n', 'n8n'],
                ['custom', 'Custom code'],
                ['advise', 'You advise me'],
              ] as [string, string][]
            ).map(([k, l]) => (
              <Chip key={k} selected={a.automationTool === k} onClick={() => setA({ automationTool: k })}>
                {l}
              </Chip>
            ))}
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'auto-complexity',
      valid: !!a.automationComplexity,
      node: (
        <StepShell title="How tangled is it?" subtitle="Honest guess is fine - we’ll confirm on the call.">
          <div className="grid grid-cols-1 gap-3 md:grid-cols-3">
            {(
              [
                ['simple', 'Simple', 'A few apps, clear triggers'],
                ['medium', 'Moderate', 'Some conditions & data mapping'],
                ['complex', 'Complex', 'Many systems, approvals, edge cases'],
              ] as [string, string, string][]
            ).map(([k, l, h]) => (
              <OptionCard key={k} selected={a.automationComplexity === k} onClick={() => setA({ automationComplexity: k as any })} label={l} hint={h} />
            ))}
          </div>
        </StepShell>
      ),
    });
  }

  if (a.category === 'custom') {
    steps.push({
      id: 'c-describe',
      valid: (a.description?.trim().length ?? 0) >= 60,
      node: (
        <StepShell
          title="Tell us what you're dreaming of"
          subtitle="The more detail, the sharper the estimate. Minimum a few sentences (60+ characters)."
        >
          <TextField
            label="Project description"
            value={a.description ?? ''}
            onChange={(v) => setA({ description: v })}
            textarea
            required
            placeholder="e.g. A booking platform for my chain of salons with staff schedules, UPI payments and WhatsApp reminders…"
          />
          <p className="mt-2 text-right text-xs text-secondary/40 dark:text-backgroundBody/40">
            {a.description?.trim().length ?? 0} / 60+
          </p>
        </StepShell>
      ),
    });
  }

  /* Extras + contact */
  if (a.category) {
    steps.push({
      id: 'extras',
      valid: true,
      node: (
        <StepShell title="Timeline & notes">
          <div className="space-y-3">
            <Toggle
              on={!!a.rush}
              onChange={(v) => setA({ rush: v })}
              label="Priority delivery"
              hint="Jump the queue - we compress the timeline (+25%)"
            />
            <TextField
              label="Anything special we should know? (optional)"
              value={state.comment}
              onChange={(v) => setState((s) => ({ ...s, comment: v }))}
              textarea
              placeholder="Integrations, references you love, deadlines…"
            />
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'contact',
      valid:
        state.contact.name.trim().length > 1 && /^\S+@\S+\.\S+$/.test(state.contact.email),
      node: (
        <StepShell title="Where should we send your quote?" subtitle="You'll see it on screen too - the email is your copy.">
          <div className="grid grid-cols-1 gap-4 md:grid-cols-2">
            <TextField label="Your name" value={state.contact.name} onChange={(v) => setContact({ name: v })} required placeholder="Full name" />
            <TextField label="Email" type="email" value={state.contact.email} onChange={(v) => setContact({ email: v })} required placeholder="you@company.com" />
            <TextField label="Company (optional)" value={state.contact.company} onChange={(v) => setContact({ company: v })} placeholder="Company name" />
            <TextField label="Phone (optional)" type="tel" value={state.contact.phone} onChange={(v) => setContact({ phone: v })} placeholder={state.region === 'IN' ? '+91…' : '+1…'} />
          </div>
        </StepShell>
      ),
    });
    steps.push({
      id: 'reveal',
      valid: true,
      node: (
        <PriceReveal
          answers={a}
          region={state.region}
          contact={state.contact}
          comment={state.comment}
          onStartOver={() => {
            sessionStorage.removeItem(STORAGE_KEY);
            setState(DEFAULT_STATE);
            setStepIdx(0);
          }}
        />
      ),
    });
  }

  const current = steps[Math.min(stepIdx, steps.length - 1)];
  const isReveal = current.id === 'reveal';
  const progress = steps.length > 1 ? (stepIdx / (steps.length - 1)) * 100 : 0;

  const go = (delta: number) => {
    setDir(delta);
    setStepIdx((i) => Math.max(0, Math.min(steps.length - 1, i + delta)));
    document.getElementById('quote-wizard-top')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
  };

  const stepNum = Math.min(stepIdx + 1, steps.length);

  return (
    <div id="quote-wizard-top" className="mx-auto w-full max-w-3xl">
      {/* Region + progress header */}
      <div className="mb-7">
        <div className="mb-2.5 flex items-center justify-between gap-4">
          <span className="text-[11px] font-medium uppercase tracking-[2.5px] text-secondary/45 dark:text-backgroundBody/45">
            {isReveal ? 'Estimate ready' : `Step ${stepNum} of ${steps.length}`}
          </span>
          <button
            type="button"
            onClick={() => setState((s) => ({ ...s, region: s.region === 'IN' ? 'GLOBAL' : 'IN', regionResolved: true }))}
            className="currency-badge group shrink-0 inline-flex items-center gap-1.5 rounded-full border border-primary/40 bg-primary/[0.07] px-3.5 py-1.5 text-sm font-medium text-secondary transition-all hover:border-primary dark:text-backgroundBody"
            title="Switch pricing region"
          >
            <span className="text-[15px] leading-none">{state.region === 'IN' ? '🇮🇳' : '🌍'}</span>
            <span>{state.region === 'IN' ? 'India' : 'Global'}</span>
            <span className="text-secondary/25 dark:text-backgroundBody/25">·</span>
            <span className="text-[15px] font-bold text-primary">{state.region === 'IN' ? '₹' : '$'}</span>
          </button>
        </div>
        <div className="h-1.5 w-full overflow-hidden rounded-full bg-secondary/10 dark:bg-white/[0.08]">
          {/* Plain CSS transition (not framer) so the width is correct even
              when rAF is throttled - motion width animates via the frame loop
              and would leave the bar at its natural 100% width. */}
          <div
            className="h-full rounded-full bg-gradient-to-r from-primary to-[#5ee7d8] shadow-[0_0_12px_-2px_rgba(18,216,204,0.7)] transition-[width] duration-500 ease-out"
            style={{ width: `${Math.max(progress, 4)}%` }}
          />
        </div>
      </div>

      {/* Step body - popLayout mounts the next step immediately while the old
          one animates out, so navigation never blocks on the exit animation
          (mode="wait" can freeze mid-transition in throttled/background tabs). */}
      <div className="relative min-h-[380px]">
        <AnimatePresence mode="popLayout" custom={dir} initial={false}>
          <motion.div
            key={current.id}
            data-step={current.id}
            custom={dir}
            initial={{ opacity: 0, x: dir * 46 }}
            animate={{ opacity: 1, x: 0 }}
            exit={{ opacity: 0, x: dir * -46 }}
            transition={{ duration: 0.28, ease: [0.25, 0.1, 0.25, 1] }}
            className="w-full"
          >
            {current.node}
          </motion.div>
        </AnimatePresence>
      </div>

      {/* Nav */}
      {!isReveal && (
        <div className="mt-9 flex items-center justify-between">
          <button
            type="button"
            onClick={() => go(-1)}
            className={`text-base text-secondary/50 transition-colors hover:text-secondary dark:text-backgroundBody/50 dark:hover:text-backgroundBody ${stepIdx === 0 ? 'invisible' : ''}`}
          >
            ← Back
          </button>

          {/* live running estimate */}
          {live && stepIdx > 0 && (
            <span className="hidden text-sm text-secondary/45 dark:text-backgroundBody/45 sm:block">
              Running estimate:{' '}
              <span className="font-medium text-primary">
                {currency}
                {live.low.toLocaleString(state.region === 'IN' ? 'en-IN' : 'en-US')}–{currency}
                {live.high.toLocaleString(state.region === 'IN' ? 'en-IN' : 'en-US')}
              </span>
            </span>
          )}

          <button
            type="button"
            disabled={!current.valid}
            onClick={() => go(1)}
            className="rv-button rv-button-primary inline-block disabled:pointer-events-none disabled:opacity-40"
          >
            <div className="rv-button-top">
              <span className="text-nowrap">{stepIdx === steps.length - 2 ? 'See my estimate' : 'Continue'}</span>
            </div>
            <div className="rv-button-bottom">
              <span className="text-nowrap">{stepIdx === steps.length - 2 ? 'See my estimate' : 'Continue'}</span>
            </div>
          </button>
        </div>
      )}
    </div>
  );
}

/* ── Shared steps ── */
function designStep(a: QuoteAnswers, setA: (p: Partial<QuoteAnswers>) => void) {
  return {
    id: 'design',
    valid: !!a.designTier,
    node: (
      <StepShell title="Design level" subtitle="How custom should the look & feel be?">
        <div className="grid grid-cols-1 gap-3 md:grid-cols-3">
          {(
            [
              ['template', 'Clean & fast', 'Polished template, your brand colors', ''],
              ['custom', 'Fully custom', 'Designed from scratch for you', 'Popular'],
              ['premium', 'Premium', 'Custom + rich animations & motion', ''],
            ] as [string, string, string, string][]
          ).map(([k, l, h, badge]) => (
            <OptionCard key={k} selected={a.designTier === k} onClick={() => setA({ designTier: k as any })} label={l} hint={h} badge={badge || undefined} />
          ))}
        </div>
      </StepShell>
    ),
  };
}

function stackStep(a: QuoteAnswers, setA: (p: Partial<QuoteAnswers>) => void, region: Region) {
  const sym = region === 'IN' ? '₹' : '$';
  return {
    id: 'stack',
    valid: !!a.backend,
    node: (
      <StepShell title="Data & hosting" subtitle="Choosing Supabase keeps your cost down - we pass the saving on.">
        <p className="mb-2 text-sm text-secondary/60 dark:text-backgroundBody/60">Content & database:</p>
        <div className="flex flex-wrap gap-2">
          {(
            [
              ['none', 'No database needed'],
              ['supabase', 'Supabase (recommended - saves ~20%)'],
              ['custom', 'Custom backend'],
            ] as [string, string][]
          ).map(([k, l]) => (
            <Chip key={k} selected={a.backend === k} onClick={() => setA({ backend: k as any })}>
              {l}
            </Chip>
          ))}
        </div>
        <p className="mb-2 mt-6 text-sm text-secondary/60 dark:text-backgroundBody/60">Hosting:</p>
        <div className="flex flex-wrap gap-2">
          {(
            [
              ['uxory', `Uxory managed (${sym}${region === 'IN' ? '9,999' : '139'}/yr)`],
              ['own', "I'll use my own"],
            ] as [string, string][]
          ).map(([k, l]) => (
            <Chip key={k} selected={a.hosting === k} onClick={() => setA({ hosting: k as any })}>
              {l}
            </Chip>
          ))}
        </div>
        <div className="mt-6">
          <Toggle
            on={!!a.maintenance}
            onChange={(v) => setA({ maintenance: v })}
            label="Monthly maintenance plan"
            hint={`Updates, backups, small changes - ${sym}${region === 'IN' ? '1,999' : '29'}/mo`}
          />
        </div>
      </StepShell>
    ),
  };
}
