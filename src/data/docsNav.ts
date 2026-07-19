/**
 * Docs portal navigation registry - the single source of truth.
 *
 * Every doc page registers here once; the sidebar, docs home, breadcrumbs and
 * prev/next footer are all derived from this file. To add a doc:
 *
 *   1. Create the page under src/pages/docs/... (data-driven via
 *      src/data/docs.ts, or a bespoke .astro page).
 *   2. Add one item below in the right category (create a category if none
 *      fits - keep them broad; 5-15 docs per category scales best).
 *
 * Categories render in array order; items render in array order within their
 * category. `badge` is optional ("New", "India", "USA"...).
 */

export interface DocsNavItem {
  title: string;
  href: string;
  description: string;
  badge?: string;
}

export interface DocsNavCategory {
  /** Stable id used for anchors and collapse state. */
  id: string;
  title: string;
  /** One-liner shown on the docs home category card. */
  blurb: string;
  items: DocsNavItem[];
}

export const DOCS_NAV: DocsNavCategory[] = [
  {
    id: 'getting-started',
    title: 'Getting Started',
    blurb: 'What to prepare and how working with Uxory flows from kickoff to launch.',
    items: [
      {
        title: 'Content & Media Guide',
        href: '/docs/content-and-media',
        description: 'How to gather, name, and send your text, images and brand files so development never stalls.',
      },
    ],
  },
  {
    id: 'website-essentials',
    title: 'Website Essentials',
    blurb: 'The building blocks every website needs - legal pages, hosting, and the basics done right.',
    items: [
      {
        title: 'Legal Pages - India',
        href: '/docs/legal-pages-india',
        description: 'Privacy policy, terms, refunds and DPDP Act requirements for Indian websites.',
        badge: 'India',
      },
      {
        title: 'Legal Pages - USA',
        href: '/docs/legal-pages-usa',
        description: 'Privacy policy, terms, and state privacy laws like CCPA for US websites.',
        badge: 'USA',
      },
      {
        title: 'Website Hosting Explained',
        href: '/docs/website-hosting-explained',
        description: 'Shared, VPS, cloud and managed hosting - what they mean and which fits your site.',
      },
    ],
  },
  {
    id: 'ecommerce',
    title: 'E-commerce',
    blurb: 'Everything about launching and running an online store with Uxory.',
    items: [
      {
        title: 'Store Onboarding - India',
        href: '/docs/onboarding/ecommerce-india',
        description: 'Platform choice, Razorpay/UPI payments, SMS DLT, legal pages and launch for Indian stores.',
        badge: 'India',
      },
      {
        title: 'Store Onboarding - USA',
        href: '/docs/onboarding/ecommerce-usa',
        description: 'Platform choice, Stripe/PayPal payments, sales tax and launch for US stores.',
        badge: 'USA',
      },
    ],
  },
  {
    id: 'support-maintenance',
    title: 'Support & Maintenance',
    blurb: 'What happens after launch - support, maintenance plans, and requesting changes.',
    items: [
      {
        title: 'Support After Launch',
        href: '/docs/support-after-launch',
        description: 'How to reach us, what free support covers, and what needs a maintenance plan.',
      },
    ],
  },
];

/** Flat, ordered list of all docs - used for prev/next navigation. */
export const DOCS_FLAT: (DocsNavItem & { category: string })[] = DOCS_NAV.flatMap((c) =>
  c.items.map((i) => ({ ...i, category: c.title }))
);

/** Find the registry entry (with category) for the current page. */
export function findDoc(href: string) {
  const idx = DOCS_FLAT.findIndex((d) => d.href === href);
  return {
    doc: idx >= 0 ? DOCS_FLAT[idx] : null,
    prev: idx > 0 ? DOCS_FLAT[idx - 1] : null,
    next: idx >= 0 && idx < DOCS_FLAT.length - 1 ? DOCS_FLAT[idx + 1] : null,
  };
}
