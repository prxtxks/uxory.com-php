/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: ['./src/**/*.{astro,html,js,jsx,ts,tsx,md,mdx}'],
  theme: {
    extend: {
      colors: {
        // Brand tokens — mirror the precompiled public/assets/css/main.css so
        // new components render identically to the existing site.
        primary: '#12D8CC', // turquoise / teal
        secondary: '#181818',
        backgroundBody: '#EDF0F5',
        dark: '#151515',
      },
      fontFamily: {
        sans: ['Satoshi', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        serif: ["'Instrument Serif'", 'ui-serif', 'Georgia', 'serif'],
      },
    },
  },
  plugins: [],
};
