// Content model for the ecommerce onboarding guides (India + USA).
// Two guides share one renderer (OnboardingGuide.astro); only the data differs.

export type Block =
  | { type: 'text'; text: string }
  | { type: 'options'; items: { name: string; desc: string; tag?: string }[] }
  | { type: 'checklist'; items: string[] }
  | { type: 'accounts'; items: { name: string; desc: string }[] }
  | { type: 'note'; variant: 'info' | 'warn'; text: string }
  | { type: 'table'; headers: string[]; rows: string[][] };

export interface Phase {
  id: string;
  title: string;
  intro?: string;
  blocks: Block[];
}

export interface Guide {
  country: 'India' | 'USA';
  flag: string;
  title: string;
  subtitle: string;
  currency: string;
  phases: Phase[];
}

// ─────────────────────────────────────────────────────────────
// Shared building blocks reused across both guides
// ─────────────────────────────────────────────────────────────
const platformOptions: Block = {
  type: 'options',
  items: [
    {
      name: 'Shopify',
      tag: 'Fastest to launch',
      desc: 'Hosted, subscription-based store. Huge app ecosystem, reliable checkout, minimal maintenance. Best when you want to sell quickly and care less about deep custom logic. Monthly fee + transaction fees unless you use Shopify Payments.',
    },
    {
      name: 'WooCommerce',
      tag: 'Most flexible on WordPress',
      desc: 'A plugin on top of WordPress. Cheap hosting, thousands of plugins, full ownership of data. Great if you already use WordPress or want content + commerce together. You (or we) manage hosting, updates and security.',
    },
    {
      name: 'Custom build',
      tag: 'Maximum control',
      desc: 'A bespoke storefront - typically Next.js/React on Vercel with a headless commerce backend (Medusa, Saleor) or a custom API. Best for unique flows, large catalogues, or when the store is core to your business. Highest upfront cost, best long-term flexibility and performance.',
    },
  ],
};

const stackNote: Block = {
  type: 'note',
  variant: 'info',
  text: 'We build on all three. For custom stores our default stack is Next.js + Vercel with Supabase/PostgreSQL for data, and a headless CMS (Sanity or Strapi) when you need to edit content yourself. We\'ll recommend the right fit for your catalogue size, budget and roadmap - you don\'t need to decide this alone.',
};

const brandingBlocks: Block[] = [
  {
    type: 'text',
    text: 'Your store only looks as good as the assets behind it. Here\'s what we\'ll need from you (or can produce for you through our partner agencies):',
  },
  {
    type: 'checklist',
    items: [
      'Logo - send us your existing logo files (SVG/PNG preferred). No logo yet? Let us know and our design team will create one.',
      'Brand colours & fonts - share your palette and fonts, or ask us to define a brand system.',
      'Product photography - decide between: (a) you supply images, (b) licensed stock imagery, or (c) a professional photo/video shoot with our partner agencies. Good product photos are the single biggest driver of conversion.',
      'Product descriptions & copy - you provide raw details; we can polish or write the copy.',
    ],
  },
];

// ─────────────────────────────────────────────────────────────
// INDIA
// ─────────────────────────────────────────────────────────────
export const indiaGuide: Guide = {
  country: 'India',
  flag: '🇮🇳',
  title: 'Ecommerce Onboarding - India',
  subtitle: 'What to expect when we build your online store, step by step. Everything you\'ll need to prepare, in the order you\'ll need it.',
  currency: '₹',
  phases: [
    {
      id: 'discovery',
      title: '1. Discovery & scope',
      intro: 'We start by understanding your business so we recommend the right approach - not the most expensive one.',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Your business goals and what success looks like (sales, leads, brand)',
            'Roughly how many products you\'ll sell (10, 100, 10,000?)',
            'Target customers and regions (India-only, or India + export)',
            'Rough timeline and budget band so we can scope realistically',
            'Any existing store, domain, or brand assets you already have',
          ],
        },
      ],
    },
    {
      id: 'platform',
      title: '2. Choose your platform',
      intro: 'The foundation. Each option is a valid choice - the right one depends on your catalogue, budget and how custom your store needs to be.',
      blocks: [platformOptions, stackNote],
    },
    {
      id: 'accounts',
      title: '3. Accounts & credentials to prepare',
      intro: 'A few accounts must be in your name (the business owner\'s), so you always retain ownership. We\'ll guide you through each.',
      blocks: [
        {
          type: 'accounts',
          items: [
            { name: 'Domain registrar', desc: 'Where your domain (yourbrand.in / .com) is registered - e.g. GoDaddy, BigRock, Namecheap. We\'ll need access to point DNS.' },
            { name: 'Business email', desc: 'Google Workspace or Zoho Mail on your domain (e.g. hello@yourbrand.in). Zoho has a free tier popular in India.' },
            { name: 'Hosting (if not us/Shopify)', desc: 'For WooCommerce/custom we usually host on Vercel or a managed host. If you have existing hosting, share access.' },
            { name: 'GitHub (custom builds)', desc: 'For custom stores, code lives in a GitHub repo that deploys to Vercel. We can host it under Uxory or your own org.' },
          ],
        },
      ],
    },
    {
      id: 'branding',
      title: '4. Branding, content & imagery',
      blocks: brandingBlocks,
    },
    {
      id: 'auth',
      title: '5. Login, accounts & OTP verification',
      intro: 'How customers sign in and how you verify phone numbers. India has specific regulatory steps for SMS.',
      blocks: [
        {
          type: 'options',
          items: [
            { name: 'Email / password', desc: 'Simplest. Works everywhere, no extra accounts needed.' },
            { name: 'Google / Apple sign-in', desc: 'One-tap social login. Apple is required if you also ship an iOS app.' },
            { name: 'Phone SMS OTP', desc: 'Very common in India. Requires DLT registration + an SMS provider (see below).' },
            { name: 'WhatsApp verification', desc: 'Popular and high-trust in India. Uses the WhatsApp Business API via Meta (needs business verification).' },
          ],
        },
        {
          type: 'note',
          variant: 'warn',
          text: 'India-specific - SMS OTP requires DLT registration. By TRAI rules, every business sending SMS must register as a Principal Entity on a DLT platform (Jio, Airtel, Vodafone-Idea, etc.), register your Sender ID (Header), and pre-register message templates. This involves KYC and can take several days to a couple of weeks - start early. WhatsApp Business API also requires Meta business verification.',
        },
        {
          type: 'accounts',
          items: [
            { name: 'MSG91', desc: 'India-focused SMS/OTP provider, generally cheaper for Indian traffic and helps with DLT template registration.' },
            { name: 'Twilio', desc: 'Global provider with excellent docs; slightly pricier for Indian SMS but great if you also target other countries.' },
          ],
        },
      ],
    },
    {
      id: 'payments',
      title: '6. Payments',
      intro: 'You\'ll create the payment account (it holds your money and KYC); we integrate it. Everything here supports UPI, cards and netbanking.',
      blocks: [
        {
          type: 'accounts',
          items: [
            { name: 'Razorpay', desc: 'The most common choice in India. Supports UPI, cards, netbanking, wallets, EMI. Needs business KYC: PAN, bank account, and GST if registered.' },
            { name: 'Cashfree / PhonePe / Paytm', desc: 'Strong alternatives, competitive pricing, also UPI-first.' },
            { name: 'Stripe (India)', desc: 'Powerful but availability is limited/invite-based in India - best if you also sell internationally.' },
          ],
        },
        {
          type: 'note',
          variant: 'info',
          text: 'UPI comes built-in with Razorpay/PhonePe/Paytm - no separate integration needed. Note settlement cycles (T+2 is typical) and that accepting international cards may need extra approval. You create the gateway account and complete KYC; then share API keys with us.',
        },
      ],
    },
    {
      id: 'shipping',
      title: '7. Shipping & operations',
      blocks: [
        {
          type: 'text',
          text: 'How orders reach customers. We integrate your chosen logistics provider so labels, tracking and (optionally) COD are automated.',
        },
        {
          type: 'accounts',
          items: [
            { name: 'Shiprocket', desc: 'Popular India aggregator - multiple couriers, one dashboard, COD support, easy returns.' },
            { name: 'Delhivery / Blue Dart / DTDC', desc: 'Direct courier integrations if you prefer a single carrier or have volume rates.' },
          ],
        },
        { type: 'note', variant: 'info', text: 'Decide upfront whether you\'ll offer Cash on Delivery (COD) - it\'s expected by many Indian shoppers but adds RTO (return-to-origin) risk. We\'ll set COD rules accordingly.' },
      ],
    },
    {
      id: 'legal',
      title: '8. Legal & compliance pages',
      intro: 'Required before launch. We build the pages; you (with your CA/lawyer) confirm the specifics for your business.',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Privacy Policy',
            'Terms & Conditions',
            'Return / Refund / Cancellation policy',
            'Shipping policy',
          ],
        },
        {
          type: 'note',
          variant: 'warn',
          text: 'India specifics: the Consumer Protection (E-Commerce) Rules, 2020 require a named Grievance Officer and country-of-origin on products. GST-compliant tax invoices are needed if you\'re GST-registered. The DPDP Act (data protection) sets expectations for handling customer data. We\'ll wire these in - please provide your GSTIN and grievance contact.',
        },
      ],
    },
    {
      id: 'marketing',
      title: '9. Marketing & analytics setup',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Google Analytics 4 (GA4) - traffic and conversion tracking',
            'Google Search Console - SEO health and indexing',
            'Meta Pixel - Facebook/Instagram ad tracking & retargeting',
            'Google Merchant Center - free & paid product listings on Google',
            'Email marketing (Mailchimp / Klaviyo) - newsletters, abandoned-cart flows',
            'WhatsApp Business - order updates and support (widely expected in India)',
          ],
        },
      ],
    },
    {
      id: 'launch',
      title: '10. Testing, launch & handover',
      blocks: [
        {
          type: 'text',
          text: 'Before go-live we run a structured round of testing and feedback. This is where the Uxory client portal makes life easy - you point at any page, mark the exact section, and request changes with screenshots. No messy email threads.',
        },
        {
          type: 'checklist',
          items: [
            'User acceptance testing (you try real orders end-to-end)',
            'Structured feedback rounds via the Uxory client portal',
            'Go-live checklist: payments live, SSL, redirects, analytics firing',
            'Credentials handover - every account stays in your name',
            'Training session + a support/maintenance plan',
          ],
        },
      ],
    },
    {
      id: 'timeline',
      title: '11. What we need from you, when',
      intro: 'A quick map so nothing blocks the build. Typical durations - yours may vary with scope.',
      blocks: [
        {
          type: 'table',
          headers: ['Phase', 'You provide', 'Typical time'],
          rows: [
            ['Discovery', 'Goals, catalogue size, references', '2–4 days'],
            ['Platform & design', 'Logo, brand, product photos/copy', '1–2 weeks'],
            ['Accounts', 'Domain, email, payment KYC, DLT (start early!)', 'Parallel - start day 1'],
            ['Build', 'Timely feedback via the portal', '3–8 weeks (scope-based)'],
            ['Launch', 'Final approval, go-live sign-off', '2–5 days'],
          ],
        },
        {
          type: 'note',
          variant: 'info',
          text: 'The two things that most often delay Indian ecommerce launches are DLT registration (for SMS OTP) and payment-gateway KYC - both are on your side and both take time. Start them on day one and the rest of the build won\'t wait on them.',
        },
      ],
    },
  ],
};

// ─────────────────────────────────────────────────────────────
// USA
// ─────────────────────────────────────────────────────────────
export const usaGuide: Guide = {
  country: 'USA',
  flag: '🇺🇸',
  title: 'Ecommerce Onboarding - USA',
  subtitle: 'What to expect when we build your online store, step by step. Everything you\'ll need to prepare, in the order you\'ll need it.',
  currency: '$',
  phases: [
    {
      id: 'discovery',
      title: '1. Discovery & scope',
      intro: 'We start by understanding your business so we recommend the right approach - not the most expensive one.',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Your business goals and what success looks like (sales, leads, brand)',
            'Roughly how many products you\'ll sell (10, 100, 10,000?)',
            'Target customers and regions (US-only, or international)',
            'Rough timeline and budget band so we can scope realistically',
            'Any existing store, domain, or brand assets you already have',
          ],
        },
      ],
    },
    {
      id: 'platform',
      title: '2. Choose your platform',
      intro: 'The foundation. Each option is a valid choice - the right one depends on your catalogue, budget and how custom your store needs to be.',
      blocks: [platformOptions, stackNote],
    },
    {
      id: 'accounts',
      title: '3. Accounts & credentials to prepare',
      intro: 'A few accounts must be in your name (the business owner\'s), so you always retain ownership. We\'ll guide you through each.',
      blocks: [
        {
          type: 'accounts',
          items: [
            { name: 'Domain registrar', desc: 'Where your domain (yourbrand.com) is registered - e.g. GoDaddy, Namecheap, Cloudflare. We\'ll need access to point DNS.' },
            { name: 'Business email', desc: 'Google Workspace or Microsoft 365 on your domain (e.g. hello@yourbrand.com).' },
            { name: 'Hosting (if not us/Shopify)', desc: 'For WooCommerce/custom we usually host on Vercel or a managed host. If you have existing hosting, share access.' },
            { name: 'GitHub (custom builds)', desc: 'For custom stores, code lives in a GitHub repo that deploys to Vercel. We can host it under Uxory or your own org.' },
          ],
        },
      ],
    },
    {
      id: 'branding',
      title: '4. Branding, content & imagery',
      blocks: brandingBlocks,
    },
    {
      id: 'auth',
      title: '5. Login, accounts & OTP verification',
      intro: 'How customers sign in and how you verify phone numbers.',
      blocks: [
        {
          type: 'options',
          items: [
            { name: 'Email / password', desc: 'Simplest. Works everywhere, no extra accounts needed.' },
            { name: 'Google / Apple sign-in', desc: 'One-tap social login. Apple is required if you also ship an iOS app.' },
            { name: 'Phone SMS OTP', desc: 'Common for accounts and 2FA. Requires an SMS provider + US registration (see below).' },
            { name: 'WhatsApp verification', desc: 'Less common in the US than email, but available via the WhatsApp Business API if your audience uses it.' },
          ],
        },
        {
          type: 'note',
          variant: 'warn',
          text: 'US-specific - SMS requires A2P 10DLC registration. To send application-to-person SMS on US networks you must register your Brand and Campaign (via Twilio or your provider). It\'s faster and lighter than India\'s DLT but still needs doing before OTP works. Tip: email-based OTP avoids this entirely if SMS isn\'t essential.',
        },
        {
          type: 'accounts',
          items: [
            { name: 'Twilio', desc: 'The default US choice for SMS/OTP - reliable, great docs, handles 10DLC registration.' },
            { name: 'MessageBird / AWS SNS', desc: 'Alternatives depending on volume and existing cloud stack.' },
          ],
        },
      ],
    },
    {
      id: 'payments',
      title: '6. Payments',
      intro: 'You\'ll create the payment account (it holds your money and verification); we integrate it.',
      blocks: [
        {
          type: 'accounts',
          items: [
            { name: 'Stripe', desc: 'The US default. Cards, Apple Pay, Google Pay, ACH, subscriptions. Needs business verification (EIN, bank account).' },
            { name: 'PayPal / Braintree', desc: 'Widely trusted at checkout; easy to add alongside Stripe for customers who prefer PayPal.' },
            { name: 'Shopify Payments', desc: 'If you go with Shopify, this is the built-in option (waives Shopify\'s extra transaction fee).' },
          ],
        },
        {
          type: 'note',
          variant: 'info',
          text: 'Sales tax is the US wrinkle: you may have tax obligations ("nexus") in states where you have customers or presence. We integrate automated tax via Stripe Tax, TaxJar or Avalara so it\'s calculated correctly at checkout. You create the gateway account and complete verification; then share API keys with us.',
        },
      ],
    },
    {
      id: 'shipping',
      title: '7. Shipping & operations',
      blocks: [
        {
          type: 'text',
          text: 'How orders reach customers. We integrate your chosen provider so rates, labels and tracking are automated.',
        },
        {
          type: 'accounts',
          items: [
            { name: 'Shippo / EasyPost', desc: 'Multi-carrier (USPS, UPS, FedEx) with discounted rates and one API/dashboard.' },
            { name: 'ShipStation', desc: 'Great for higher order volumes - batch labels, automation rules, returns.' },
          ],
        },
        { type: 'note', variant: 'info', text: 'Plan your returns policy early (free returns? restocking fee? prepaid labels?) - it affects checkout copy and logistics setup.' },
      ],
    },
    {
      id: 'legal',
      title: '8. Legal & compliance pages',
      intro: 'Required before launch. We build the pages; you (with your attorney) confirm the specifics for your business.',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Privacy Policy',
            'Terms of Service',
            'Return / Refund policy',
            'Shipping policy',
          ],
        },
        {
          type: 'note',
          variant: 'warn',
          text: 'US specifics: sales-tax nexus (above); CCPA/CPRA if you have California customers (privacy rights + a "Do Not Sell" link); ADA accessibility is an expectation and a litigation risk - we build to WCAG standards; and CAN-SPAM rules for marketing email (clear unsubscribe, valid physical address).',
        },
      ],
    },
    {
      id: 'marketing',
      title: '9. Marketing & analytics setup',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Google Analytics 4 (GA4) - traffic and conversion tracking',
            'Google Search Console - SEO health and indexing',
            'Meta Pixel - Facebook/Instagram ad tracking & retargeting',
            'Google Merchant Center - free & paid product listings on Google',
            'Email marketing (Klaviyo / Mailchimp) - newsletters, abandoned-cart flows',
            'TikTok / Pinterest pixels - if those channels fit your audience',
          ],
        },
      ],
    },
    {
      id: 'launch',
      title: '10. Testing, launch & handover',
      blocks: [
        {
          type: 'text',
          text: 'Before go-live we run a structured round of testing and feedback. This is where the Uxory client portal makes life easy - you point at any page, mark the exact section, and request changes with screenshots. No messy email threads.',
        },
        {
          type: 'checklist',
          items: [
            'User acceptance testing (you try real orders end-to-end)',
            'Structured feedback rounds via the Uxory client portal',
            'Go-live checklist: payments live, SSL, redirects, analytics firing',
            'Credentials handover - every account stays in your name',
            'Training session + a support/maintenance plan',
          ],
        },
      ],
    },
    {
      id: 'timeline',
      title: '11. What we need from you, when',
      intro: 'A quick map so nothing blocks the build. Typical durations - yours may vary with scope.',
      blocks: [
        {
          type: 'table',
          headers: ['Phase', 'You provide', 'Typical time'],
          rows: [
            ['Discovery', 'Goals, catalogue size, references', '2–4 days'],
            ['Platform & design', 'Logo, brand, product photos/copy', '1–2 weeks'],
            ['Accounts', 'Domain, email, payment verification, 10DLC (if SMS)', 'Parallel - start day 1'],
            ['Build', 'Timely feedback via the portal', '3–8 weeks (scope-based)'],
            ['Launch', 'Final approval, go-live sign-off', '2–5 days'],
          ],
        },
        {
          type: 'note',
          variant: 'info',
          text: 'The two things worth starting on day one are payment-gateway verification and (if you\'re using SMS) A2P 10DLC registration - both are on your side and take a little lead time. Everything else we can build in parallel.',
        },
      ],
    },
  ],
};
