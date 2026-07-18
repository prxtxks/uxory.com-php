/**
 * Single source of truth for site-wide JSON-LD structured data.
 *
 * BaseLayout injects `siteGraph()` (the Organization + WebSite entities) and a
 * per-page BreadcrumbList on every page. Individual pages may still emit their
 * own page-specific nodes (Service, FAQPage, Article, WebPage): those share the
 * same @id for the Organization/WebSite, so search engines merge them into one
 * enriched entity rather than treating them as conflicts.
 */
import { SITE_URL, CONTACT_EMAIL } from '../config';

/** The canonical Organization + WebSite graph, enriched for India + global reach. */
export function siteGraph() {
  return {
    '@context': 'https://schema.org',
    '@graph': [
      {
        '@type': 'Organization',
        '@id': `${SITE_URL}/#organization`,
        name: 'Uxory',
        url: `${SITE_URL}/`,
        email: CONTACT_EMAIL,
        description:
          'Uxory builds AI-powered software, websites, and automation for businesses in India and worldwide.',
        logo: {
          '@type': 'ImageObject',
          '@id': `${SITE_URL}/#logo`,
          url: `${SITE_URL}/images/logo.png`,
          contentUrl: `${SITE_URL}/images/logo.png`,
          width: 512,
          height: 512,
        },
        image: { '@id': `${SITE_URL}/#logo` },
        // We serve clients in India and internationally; declare both so each
        // market understands the business is relevant to them.
        areaServed: [
          { '@type': 'Country', name: 'India' },
          { '@type': 'Place', name: 'Worldwide' },
        ],
        contactPoint: [
          {
            '@type': 'ContactPoint',
            email: CONTACT_EMAIL,
            contactType: 'customer support',
            areaServed: ['IN', 'Worldwide'],
            availableLanguage: ['English', 'Hindi'],
          },
        ],
        sameAs: [
          'https://www.linkedin.com/company/uxory/',
          'https://www.instagram.com/uxoryllc/',
        ],
      },
      {
        '@type': 'WebSite',
        '@id': `${SITE_URL}/#website`,
        url: `${SITE_URL}/`,
        name: 'Uxory',
        publisher: { '@id': `${SITE_URL}/#organization` },
        inLanguage: 'en',
      },
    ],
  };
}

/** Turn a URL path into a Title Case label ("website-dev" -> "Website Dev"). */
function labelFor(segment: string): string {
  return segment
    .replace(/[-_]+/g, ' ')
    .replace(/\b\w/g, (c) => c.toUpperCase());
}

/**
 * BreadcrumbList for the current path. Returns null on the homepage (a breadcrumb
 * with a single "Home" node adds nothing).
 */
export function breadcrumbGraph(pathname: string) {
  const clean = pathname.replace(/\/+$/, '');
  const segments = clean.split('/').filter(Boolean);
  if (segments.length === 0) return null;

  const itemListElement: Record<string, unknown>[] = [
    { '@type': 'ListItem', position: 1, name: 'Home', item: `${SITE_URL}/` },
  ];

  let acc = '';
  segments.forEach((seg, i) => {
    acc += `/${seg}`;
    itemListElement.push({
      '@type': 'ListItem',
      position: i + 2,
      name: labelFor(seg),
      item: `${SITE_URL}${acc}`,
    });
  });

  return {
    '@context': 'https://schema.org',
    '@type': 'BreadcrumbList',
    itemListElement,
  };
}
