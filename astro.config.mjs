// @ts-check
import { defineConfig } from 'astro/config';
import vercel from '@astrojs/vercel/serverless';
import react from '@astrojs/react';
import tailwind from '@astrojs/tailwind';
import sitemap from '@astrojs/sitemap';
import { SITE_URL } from './src/config';

// https://astro.build/config
export default defineConfig({
  site: SITE_URL,
  output: 'hybrid',
  adapter: vercel(),
  integrations: [
    react(),
    // The existing site ships a precompiled Tailwind build (public/assets/css/main.css)
    // that already includes preflight. Disable base styles here to avoid a double
    // reset; this instance only emits utilities used by new components.
    tailwind({ applyBaseStyles: false }),
    sitemap(),
  ],
});
