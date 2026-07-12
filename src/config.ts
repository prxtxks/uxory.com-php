/**
 * Central site configuration.
 *
 * When Uxory acquires uxory.com and switches the primary domain, change
 * SITE_URL here and update the Vercel domain settings — nothing else in the
 * codebase should hardcode the origin. New code MUST import SITE_URL from here
 * rather than hardcoding the domain.
 */
export const SITE_URL = 'https://uxory.in';

/** Primary contact email shown across the site. */
export const CONTACT_EMAIL = 'contact@uxory.in';

/**
 * Client portal URL. Currently the Vercel deployment; switch to
 * https://portal.uxory.in once the DNS A record (76.76.21.21) is live.
 */
export const PORTAL_URL = 'https://uxory-portal.vercel.app';

/** Brand tokens (mirror tailwind.config.mjs). */
export const BRAND = {
  primary: '#12D8CC', // turquoise / teal
  dark: '#181818',
  light: '#EDF0F5',
} as const;
