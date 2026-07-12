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

/** Brand tokens (mirror tailwind.config.mjs). */
export const BRAND = {
  primary: '#12D8CC', // turquoise / teal
  dark: '#181818',
  light: '#EDF0F5',
} as const;
