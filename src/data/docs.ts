// Content model for the Uxory Docs section.
// One renderer (DocLayout.astro) drives every doc; only the data differs.
// House rules for this file: write like a human, be genuinely useful, and
// never use em dashes. Use hyphens, commas, or shorter sentences instead.

export type DocBlock =
  | { type: 'text'; text: string }
  | { type: 'steps'; items: { title?: string; text: string }[] }
  | { type: 'options'; items: { name: string; desc: string; tag?: string }[] }
  | { type: 'checklist'; items: string[] }
  | { type: 'accounts'; items: { name: string; desc: string }[] }
  | { type: 'note'; variant: 'info' | 'warn'; text: string }
  | { type: 'table'; headers: string[]; rows: string[][] };

export interface DocSection {
  id: string;
  title: string;
  intro?: string;
  blocks: DocBlock[];
}

export interface Doc {
  eyebrow: string;
  title: string;
  subtitle: string;
  region?: 'India' | 'USA';
  other?: { href: string; label: string };
  sections: DocSection[];
  cta?: { title: string; text: string; button: string };
}

// A shared legal disclaimer, reused on both regional legal docs.
const legalDisclaimer: DocBlock = {
  type: 'note',
  variant: 'warn',
  text: 'This guide is practical information, not legal advice. It helps you understand what your website usually needs and what each page should cover. For anything high risk (health data, children, finance, large customer databases), have a qualified lawyer review your final wording.',
};

// ─────────────────────────────────────────────────────────────
// Blocks shared by both legal guides (structure is region neutral)
// ─────────────────────────────────────────────────────────────
const legalWhichPages: DocBlock = {
  type: 'options',
  items: [
    {
      name: 'Privacy Policy',
      tag: 'Almost always required',
      desc: 'Explains what personal data you collect, why, how you store it, who you share it with, and how visitors can contact you about it. You need this the moment your site has a contact form, newsletter signup, analytics, or any login.',
    },
    {
      name: 'Terms and Conditions',
      tag: 'Strongly recommended',
      desc: 'The rules for using your site: acceptable use, your liability limits, intellectual property, and how disputes are handled. For a store, this is where your buying terms live.',
    },
    {
      name: 'Refund, Return and Cancellation Policy',
      tag: 'Required for stores',
      desc: 'Tells buyers what they can return, in what condition, within how many days, and how refunds are issued. Payment gateways often ask to see this before they approve your account.',
    },
    {
      name: 'Shipping and Delivery Policy',
      tag: 'Required for physical goods',
      desc: 'Covers where you ship, delivery timelines, charges, and what happens with delays or lost parcels.',
    },
    {
      name: 'Cookie Policy and consent',
      desc: 'Lists the cookies and trackers your site uses (analytics, ads, chat widgets) and lets visitors accept or decline non essential ones. Needed if you serve visitors in regions that require consent.',
    },
    {
      name: 'Disclaimer',
      desc: 'Useful for advice based sites (health, finance, legal, fitness). It makes clear that your content is general information and not professional advice for a specific person.',
    },
  ],
};

const legalPrivacyContents: DocBlock = {
  type: 'checklist',
  items: [
    'Who you are and how to contact you (business name, email, address if you have one).',
    'What data you collect: name, email, phone, address, payment details, and any analytics or device data.',
    'How you collect it: forms, cookies, account signup, checkout.',
    'Why you collect it: to fulfil orders, reply to enquiries, send updates you opted into, and improve the site.',
    'Who you share it with: payment processors, shipping partners, email tools, analytics providers. Name the categories.',
    'How long you keep it and how you protect it.',
    'The rights visitors have: to see, correct, or delete their data, and how to ask.',
    'How you handle cookies and third party tracking.',
    'A last updated date.',
  ],
};

const legalLawyerVsTemplate: DocBlock = {
  type: 'options',
  items: [
    {
      name: 'A solid template is fine when',
      tag: 'Most small sites',
      desc: 'You run a normal small business site or store, collect standard data (name, email, order details), and use common tools (a payment gateway, analytics, an email list). A good, current template tailored to your business covers you well.',
    },
    {
      name: 'Get a lawyer when',
      tag: 'Higher risk',
      desc: 'You handle sensitive data (health, biometrics, financial records), market to children, operate in a regulated industry, process large volumes of customer data, or take significant liability. Here the cost of getting it wrong is far higher than a review fee.',
    },
  ],
};

const legalHowUxoryHelps: DocBlock = {
  type: 'text',
  text: 'When we build your site we set up the pages, link them in your footer, wire up cookie consent if you need it, and connect your contact and grievance details. We can start from a tailored template based on your business, and we are happy to work alongside your lawyer if you have one. We do not act as your legal counsel, but we make sure the pages exist, are easy to find, and are wired in correctly.',
};

// ─────────────────────────────────────────────────────────────
// DOC: Legal pages (India)
// ─────────────────────────────────────────────────────────────
export const legalIndia: Doc = {
  eyebrow: '⚖️ Legal',
  title: 'Drafting Legal Pages for Your Website (India)',
  subtitle:
    'The legal pages most Indian websites need, what each one should contain, and when to bring in a lawyer. Written in plain language, not legalese.',
  region: 'India',
  other: { href: '/docs/legal-pages-usa', label: 'USA' },
  sections: [
    {
      id: 'why',
      title: 'Why legal pages matter',
      blocks: [
        {
          type: 'text',
          text: 'Legal pages are not just a formality. They tell your visitors how you handle their information, set the rules for using your site, and protect you if a customer disputes something later. Payment gateways in India (Razorpay, PayU, Cashfree and others) will usually check for a privacy policy, terms, and a refund policy before they activate your account, so getting these ready early keeps your launch on schedule.',
        },
        legalDisclaimer,
      ],
    },
    {
      id: 'pages',
      title: 'The pages most sites need',
      intro: 'Not every site needs all of these. A simple brochure site needs fewer than a full store. Here is the full list so you can pick what applies to you.',
      blocks: [legalWhichPages],
    },
    {
      id: 'privacy',
      title: 'Privacy Policy: what to include',
      intro: 'This is the one almost every site needs. Cover these points in plain language:',
      blocks: [
        legalPrivacyContents,
        {
          type: 'text',
          text: 'India now has the Digital Personal Data Protection Act, 2023 (the DPDP Act). It sets out how businesses should handle the personal data of people in India. The core ideas are simple: collect only what you need, tell people why, get clear consent, keep the data safe, and let people withdraw consent or ask for deletion. Your privacy policy should reflect these ideas and give people an easy way to reach you about their data.',
        },
      ],
    },
    {
      id: 'terms',
      title: 'Terms and Conditions',
      blocks: [
        {
          type: 'text',
          text: 'Your terms set the rules of the road. For a store, they also form the contract for each sale. Cover who can use the site, what people may and may not do, who owns the content and logos, your liability limits, pricing and payment terms, and how disputes are resolved (usually the courts of your city). Keep the language clear so a normal customer can actually read it.',
        },
      ],
    },
    {
      id: 'refunds',
      title: 'Refund, Return and Cancellation',
      blocks: [
        {
          type: 'text',
          text: 'If you sell anything, be specific here. Vague refund policies cause disputes and chargebacks. State what can be returned, the condition it must be in, the time window (for example 7 days from delivery), how the refund is issued, and how long it takes to reach the customer. If some items are non returnable (perishables, personalised goods, digital downloads), say so clearly.',
        },
        {
          type: 'note',
          variant: 'info',
          text: 'Indian payment gateways commonly ask to see a refund or cancellation policy during onboarding. Having a clear one ready can speed up your gateway approval.',
        },
      ],
    },
    {
      id: 'shipping',
      title: 'Shipping and Delivery',
      blocks: [
        {
          type: 'text',
          text: 'For physical products, tell buyers where you ship, the expected delivery timelines, the charges, and what happens if a parcel is delayed or lost. If you ship only within India or only to certain states, state that up front so nobody is disappointed at checkout.',
        },
      ],
    },
    {
      id: 'india-specific',
      title: 'India specific requirements',
      intro: 'A few things are particular to India and worth getting right:',
      blocks: [
        {
          type: 'checklist',
          items: [
            'DPDP Act, 2023: handle personal data with clear consent, collect only what you need, and give people a way to withdraw consent or request deletion.',
            'Consumer Protection (E-Commerce) Rules, 2020: online sellers should show clear seller details, total price, return and refund terms, and a way to raise complaints.',
            'Grievance contact: display a contact point (name or role, email) where customers can raise concerns, and respond within a reasonable time.',
            'GST and invoices: if you are GST registered, show the right tax details on invoices. Your accountant can confirm what your invoices must include.',
          ],
        },
        {
          type: 'note',
          variant: 'info',
          text: 'Cookie consent is not as strictly mandated in India as it is under EU law, but if any of your visitors are in the EU or UK, the stricter consent rules can apply to them. If in doubt, adding a simple consent banner is a safe default.',
        },
      ],
    },
    {
      id: 'lawyer',
      title: 'Template or lawyer?',
      blocks: [legalLawyerVsTemplate],
    },
    {
      id: 'uxory',
      title: 'How Uxory helps',
      blocks: [legalHowUxoryHelps],
    },
  ],
  cta: {
    title: 'Want us to set these up for you?',
    text: 'We can prepare and wire in your legal pages as part of your build, and work with your lawyer if you have one. Book a quick call and we will map out exactly what your site needs.',
    button: 'Talk to Uxory',
  },
};

// ─────────────────────────────────────────────────────────────
// DOC: Legal pages (USA)
// ─────────────────────────────────────────────────────────────
export const legalUsa: Doc = {
  eyebrow: '⚖️ Legal',
  title: 'Drafting Legal Pages for Your Website (USA)',
  subtitle:
    'The legal pages most US websites need, what each one should contain, and when to bring in a lawyer. Written in plain language, not legalese.',
  region: 'USA',
  other: { href: '/docs/legal-pages-india', label: 'India' },
  sections: [
    {
      id: 'why',
      title: 'Why legal pages matter',
      blocks: [
        {
          type: 'text',
          text: 'In the US there is no single federal privacy law that covers every website. Instead you have a mix of state laws and sector rules. That sounds complicated, but for most small businesses it comes down to a few clear pages done well. Payment processors like Stripe and PayPal also expect to see a privacy policy, terms, and a refund policy, so preparing these early keeps your launch on track.',
        },
        legalDisclaimer,
      ],
    },
    {
      id: 'pages',
      title: 'The pages most sites need',
      intro: 'A simple brochure site needs fewer of these than a full store. Here is the full list so you can pick what applies to you.',
      blocks: [legalWhichPages],
    },
    {
      id: 'privacy',
      title: 'Privacy Policy: what to include',
      intro: 'This is the page almost every site needs. Cover these points in plain language:',
      blocks: [
        legalPrivacyContents,
        {
          type: 'text',
          text: 'A privacy policy is effectively expected across the US. California has long required one for any site that collects personal information from California residents, and most businesses simply publish one for everyone rather than trying to treat states differently.',
        },
      ],
    },
    {
      id: 'terms',
      title: 'Terms and Conditions',
      blocks: [
        {
          type: 'text',
          text: 'Your terms (sometimes called Terms of Service) set the rules for using your site and, for a store, the terms of each sale. Cover acceptable use, your liability limits, intellectual property, pricing and payment terms, and how disputes are handled, including which state law applies. Keep it readable so a normal customer can follow it.',
        },
      ],
    },
    {
      id: 'refunds',
      title: 'Refund and Return Policy',
      blocks: [
        {
          type: 'text',
          text: 'Be specific. State what can be returned, the condition and time window, how refunds are issued, and how long they take. Clear policies reduce chargebacks and disputes. If some items are final sale (digital downloads, personalised goods, perishables), say so plainly.',
        },
      ],
    },
    {
      id: 'us-specific',
      title: 'US specific things to know',
      intro: 'A few laws come up often for US sites. You will not always be subject to all of them, but it helps to know they exist:',
      blocks: [
        {
          type: 'table',
          headers: ['Law', 'Who it applies to', 'What it means for you'],
          rows: [
            ['CCPA / CPRA (California)', 'Businesses that meet size or data thresholds and handle data of California residents', 'Give people the right to know what you collect, to delete it, and to opt out of the sale or sharing of their data.'],
            ['Other state privacy laws', 'Residents of states like Virginia, Colorado, Connecticut and more', 'Similar rights to California. A clear, current privacy policy usually covers the common ground.'],
            ['CAN-SPAM', 'Anyone sending marketing email', 'Use accurate subject lines, include your address, and give a working unsubscribe link.'],
            ['COPPA', 'Sites aimed at or knowingly collecting data from children under 13', 'Extra rules and parental consent. If this is you, involve a lawyer.'],
            ['ADA / accessibility', 'Public facing US businesses', 'Courts increasingly expect sites to be usable by people with disabilities. Building to accessibility standards reduces risk and is simply good practice.'],
          ],
        },
        {
          type: 'note',
          variant: 'info',
          text: 'If you have visitors or customers in the EU or UK, the GDPR can apply to their data even though you are based in the US. In that case a cookie consent banner and clear data rights become important for those visitors.',
        },
      ],
    },
    {
      id: 'lawyer',
      title: 'Template or lawyer?',
      blocks: [legalLawyerVsTemplate],
    },
    {
      id: 'uxory',
      title: 'How Uxory helps',
      blocks: [legalHowUxoryHelps],
    },
  ],
  cta: {
    title: 'Want us to set these up for you?',
    text: 'We can prepare and wire in your legal pages as part of your build, and work with your lawyer if you have one. Book a quick call and we will map out exactly what your site needs.',
    button: 'Talk to Uxory',
  },
};

// ─────────────────────────────────────────────────────────────
// DOC: Preparing and submitting content and media
// ─────────────────────────────────────────────────────────────
export const contentMedia: Doc = {
  eyebrow: '📦 Getting started',
  title: 'Preparing and Submitting Your Content and Media',
  subtitle:
    'The single biggest thing that speeds up (or delays) a project is your content. Here is exactly what to gather, in what format, and how to hand it over so our developers can use it right away.',
  sections: [
    {
      id: 'why',
      title: 'Why this matters',
      blocks: [
        {
          type: 'text',
          text: 'Design and build move fast once we have your material. When content arrives late, in the wrong format, or scattered across chat messages, the project slows down and quality suffers. Spending an hour organising your files up front saves days later. This guide walks you through it.',
        },
      ],
    },
    {
      id: 'gather',
      title: 'What to gather',
      intro: 'Aim to collect all of this before we start the build:',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Text for each page: headlines, paragraphs, product or service descriptions, team bios, FAQs.',
            'Your logo in the best quality you have, ideally the original design file.',
            'Brand colors and fonts if you have them, or examples of styles you like.',
            'Photos: products, team, workspace, or lifestyle shots you own the rights to use.',
            'Testimonials or reviews you want to feature, with the person or company name.',
            'Business details: address, phone, email, hours, social links, map location.',
            'Legal and policy details for your footer pages (see the legal pages guide).',
            'Any existing accounts we will need access to (domain, hosting, analytics, payment gateway).',
          ],
        },
      ],
    },
    {
      id: 'formats',
      title: 'File formats: use the right one',
      intro: 'The format matters more than most people expect. Here is a simple guide:',
      blocks: [
        {
          type: 'table',
          headers: ['You are sending', 'Best format', 'Why'],
          rows: [
            ['Logo', 'SVG, or PNG with transparent background, or the original AI/EPS file', 'Vector files (SVG, AI, EPS) stay sharp at any size. A flat JPG logo with a white box around it cannot be used cleanly.'],
            ['Photos', 'JPG or WebP, high resolution', 'Great quality at a reasonable file size. We optimise them for the web during the build.'],
            ['Icons or illustrations', 'SVG', 'Crisp at every size and tiny in file size.'],
            ['Documents and policies', 'Editable text (Google Doc or Word), not a scanned PDF', 'We can copy and paste real text. Text trapped inside an image or scan has to be retyped.'],
            ['Screenshots or diagrams', 'PNG', 'Keeps text and lines sharp.'],
          ],
        },
        {
          type: 'note',
          variant: 'warn',
          text: 'Please do not send text as a screenshot or as an image. We cannot copy it, it cannot be edited later, and it is invisible to search engines. Always send words as real, selectable text.',
        },
      ],
    },
    {
      id: 'quality',
      title: 'Image size and quality',
      blocks: [
        {
          type: 'text',
          text: 'Bigger source images are better than small ones. We can always shrink a large image, but we cannot add detail to a small or blurry one. As a rough guide, full width banner images look best at around 2000 pixels wide or more, and product or content photos at around 1200 to 1600 pixels wide. Do not worry about compressing them yourself, we handle that so the site stays fast.',
        },
        {
          type: 'note',
          variant: 'warn',
          text: 'Avoid pulling images from Google Images or other websites. They are usually low quality and, more importantly, you may not have the right to use them. Use your own photos, licensed stock, or ask us to source suitable stock for you.',
        },
      ],
    },
    {
      id: 'structure',
      title: 'How to name and organise files',
      intro: 'This is the part that makes a real difference for our developers. A tidy set of files means faster, more accurate work and fewer mix ups.',
      blocks: [
        {
          type: 'text',
          text: 'Create one main folder for the project, then group files into clear subfolders. Name files by what they are and where they go, using lowercase words separated by hyphens and no spaces.',
        },
        {
          type: 'steps',
          items: [
            { title: 'One folder per project', text: 'Make a single top level folder, for example "acme-website".' },
            { title: 'Group by type', text: 'Inside it, use subfolders like "logo", "photos", "product-images", "text-content", and "documents".' },
            { title: 'Name files clearly', text: 'Use names a stranger would understand: "logo-primary.svg", "home-hero.jpg", "product-blue-mug.jpg", "team-priya.jpg". Avoid names like "IMG_2043.jpg" or "final-final-v2.png".' },
            { title: 'Match text to pages', text: 'For copy, put each page in its own document or clearly headed section: Home, About, Services, Contact. Tell us which text belongs where.' },
          ],
        },
        {
          type: 'note',
          variant: 'info',
          text: 'A quick example of a clean layout: acme-website / logo / logo-primary.svg, acme-website / photos / home-hero.jpg, acme-website / product-images / blue-mug.jpg, acme-website / text-content / home.docx. If your files look like this, we can start immediately.',
        },
      ],
    },
    {
      id: 'send',
      title: 'How to send it to us',
      blocks: [
        {
          type: 'steps',
          items: [
            { title: 'Use a shared drive, not chat', text: 'Upload everything to a single Google Drive or Dropbox folder and share the link with us. Chat apps like WhatsApp compress your images and lose quality.' },
            { title: 'Keep the original quality', text: 'When uploading, choose the option to keep original files or full resolution if you are asked.' },
            { title: 'Send one link', text: 'Share the one top level folder link rather than many separate files. That way everything stays together and nothing gets lost.' },
            { title: 'Tell us when it is ready', text: 'Let us know the folder is complete so we know we have the final versions and can begin.' },
          ],
        },
      ],
    },
  ],
  cta: {
    title: 'Not sure how to organise something?',
    text: 'If any of this feels fiddly, do not worry. Send us what you have and we will help you sort it. Book a quick call and we will get your assets project ready together.',
    button: 'Talk to Uxory',
  },
};

// ─────────────────────────────────────────────────────────────
// DOC: Website hosting types explained
// ─────────────────────────────────────────────────────────────
export const hostingExplained: Doc = {
  eyebrow: '🌐 Technical, explained simply',
  title: 'Website Hosting Types Explained',
  subtitle:
    'Hosting is where your website actually lives. This guide explains the main types in plain language so you can understand what you are paying for and choose what fits your business.',
  sections: [
    {
      id: 'what',
      title: 'What hosting actually is',
      blocks: [
        {
          type: 'text',
          text: 'Think of your website as a shop and hosting as the physical space it sits in. The space needs to be open around the clock, handle everyone who walks in, and stay secure. Hosting is the computer (a server) that stores your site and serves it to visitors whenever they open your web address. Your domain name is the street address that points people to that space. They are two different things, which is worth remembering: you can move hosting without changing your domain, and vice versa.',
        },
      ],
    },
    {
      id: 'types',
      title: 'The main types of hosting',
      intro: 'Here are the options you are most likely to come across, from simplest to most powerful:',
      blocks: [
        {
          type: 'options',
          items: [
            {
              name: 'Shared hosting',
              tag: 'Cheapest',
              desc: 'Your site shares one server with many other sites. It is inexpensive and fine for small, low traffic sites. The trade off is that a busy neighbour can slow you down, and performance is modest.',
            },
            {
              name: 'VPS hosting',
              desc: 'A virtual private server gives you a reserved slice of a machine with guaranteed resources. More power and control than shared hosting, at a higher price, and it usually needs some technical management.',
            },
            {
              name: 'Managed hosting',
              tag: 'Low effort',
              desc: 'The provider handles the server, updates, backups, and security for you. You pay more than raw hosting, but you do not have to think about the technical upkeep. Managed WordPress hosting is a common example.',
            },
            {
              name: 'Cloud and platform hosting',
              tag: 'Modern default',
              desc: 'Platforms like Vercel and Netlify host modern sites on a global network so pages load fast everywhere, scale automatically with traffic, and need very little maintenance. This is our default for the custom sites we build.',
            },
            {
              name: 'Dedicated hosting',
              desc: 'An entire physical server just for you. Maximum power and control, highest cost, and really only needed for large or specialised applications.',
            },
            {
              name: 'Hosted store platforms',
              desc: 'Shopify and similar services include hosting as part of the package. You do not manage hosting separately, it is built into your monthly plan.',
            },
          ],
        },
      ],
    },
    {
      id: 'compare',
      title: 'Quick comparison',
      blocks: [
        {
          type: 'table',
          headers: ['Type', 'Best for', 'Effort', 'Rough cost'],
          rows: [
            ['Shared', 'Small brochure sites, tight budgets', 'Low', 'Lowest'],
            ['VPS', 'Growing sites needing more power', 'Higher', 'Medium'],
            ['Managed', 'Owners who want it handled for them', 'Very low', 'Medium'],
            ['Cloud / platform', 'Modern, fast, custom built sites', 'Very low', 'Low to medium'],
            ['Dedicated', 'Large or specialised applications', 'High', 'Highest'],
            ['Hosted store', 'Online stores that want simplicity', 'Very low', 'Monthly plan'],
          ],
        },
      ],
    },
    {
      id: 'terms',
      title: 'A few terms you will see',
      blocks: [
        {
          type: 'accounts',
          items: [
            { name: 'Uptime', desc: 'The percentage of time your site is online. Higher is better. Good hosts aim for 99.9 percent or more.' },
            { name: 'Bandwidth', desc: 'How much data your site can serve to visitors. Heavy traffic or large images use more.' },
            { name: 'SSL', desc: 'The certificate that turns on the padlock and https. It encrypts data and is now expected on every site. It should come included.' },
            { name: 'CDN', desc: 'A global network that serves your site from a location near each visitor so it loads faster worldwide.' },
          ],
        },
      ],
    },
    {
      id: 'choose',
      title: 'How to choose',
      blocks: [
        {
          type: 'text',
          text: 'For most small businesses, the honest answer is that you should not have to think about this much. Pick hosting that is fast, secure, backed up, and looked after, then spend your energy on your business. If you want speed and low maintenance without managing servers, modern platform hosting or a managed plan is usually the right call. If you sell online through Shopify, hosting is already handled for you.',
        },
        {
          type: 'note',
          variant: 'info',
          text: 'Uxory offers managed hosting plans so you do not have to deal with any of this. We keep your site fast, secure, backed up, and monitored, and you get one simple plan instead of a pile of technical decisions. Ask us about it or see our SMB hosting plans.',
        },
      ],
    },
  ],
  cta: {
    title: 'Want us to handle hosting for you?',
    text: 'We will recommend the right setup for your site and can manage it end to end so you never have to think about servers. Book a quick call to talk it through.',
    button: 'Talk to Uxory',
  },
};

// ─────────────────────────────────────────────────────────────
// DOC: Requesting changes and support after launch
// ─────────────────────────────────────────────────────────────
export const supportAfterLaunch: Doc = {
  eyebrow: '🛟 Working with us',
  title: 'Requesting Changes and Support After Launch',
  subtitle:
    'What happens after your site goes live: how to reach us, what free support covers, and how ongoing changes work. Clear expectations so there are no surprises.',
  sections: [
    {
      id: 'handover',
      title: 'After launch: the handover',
      blocks: [
        {
          type: 'text',
          text: 'When your site goes live we hand it over to you properly. You get full access to your site and accounts, and we can give you a short walkthrough or admin training on request so you feel comfortable managing the basics. From there, the site is yours. This guide explains how support and future changes work so you know exactly what to expect.',
        },
      ],
    },
    {
      id: 'included',
      title: 'What free support includes',
      intro: 'On packages that include free support, that support keeps your site healthy and keeps us reachable. It covers:',
      blocks: [
        {
          type: 'checklist',
          items: [
            'Uptime and security monitoring so we can catch problems early.',
            'Regular backups so your site can be restored if something goes wrong.',
            'Fixing anything that breaks on our side, meaning a genuine defect in what we originally built.',
            'Answering your questions and pointing you in the right direction.',
          ],
        },
      ],
    },
    {
      id: 'not-included',
      title: 'What free support does not include',
      blocks: [
        {
          type: 'note',
          variant: 'warn',
          text: 'Free support does not include changes to your site. Content edits, design tweaks, new pages or features, and product or price updates all change what the site does or looks like, so they are not part of free support. In short, free support means monitoring and being available to help, not doing new work. Ongoing changes are handled by a paid maintenance plan, or quoted as new work.',
        },
        {
          type: 'text',
          text: 'This is not us being strict for the sake of it. Monitoring and keeping a site healthy is very different from actively building and changing it. Separating the two keeps things fair and predictable: you are never charged for us watching over your site, and work that takes real time is priced honestly.',
        },
      ],
    },
    {
      id: 'maintenance-vs-new',
      title: 'Maintenance vs new work',
      intro: 'A simple way to tell the difference:',
      blocks: [
        {
          type: 'table',
          headers: ['Request', 'This is'],
          rows: [
            ['The contact form stopped sending emails (and it worked at launch)', 'Covered support: a defect we fix'],
            ['The site is down or showing an error', 'Covered support: we investigate right away'],
            ['Change the text on your About page', 'A change: maintenance plan or quoted work'],
            ['Swap out product photos or update prices', 'A change: maintenance plan or quoted work'],
            ['Add a new page, section, or feature', 'New work: we scope and quote it'],
            ['A plugin or third party tool you added later broke something', 'Usually quoted work, not covered support'],
          ],
        },
      ],
    },
    {
      id: 'how-to-request',
      title: 'How to request a change',
      blocks: [
        {
          type: 'steps',
          items: [
            { title: 'Email us the details', text: 'Send your request to contact@uxory.in. One email per request keeps things easy to track.' },
            { title: 'Be specific', text: 'Tell us the page, what you want changed, and the exact new text or image. Screenshots with notes are very helpful.' },
            { title: 'Group small changes', text: 'If you have several small edits, send them together. It is faster and more cost effective than one at a time.' },
            { title: 'We confirm scope and cost', text: 'We reply with what is involved. If it falls under your maintenance plan we simply schedule it. If it is new work, we share a quick quote before starting.' },
          ],
        },
      ],
    },
    {
      id: 'plans',
      title: 'Maintenance plans',
      blocks: [
        {
          type: 'text',
          text: 'If you expect to make changes regularly, a monthly maintenance plan is the simplest option. It bundles a set amount of change work along with updates and upkeep, so you have a predictable cost and a standing arrangement rather than quoting every small edit. If you only need occasional changes, one off quoted work may suit you better. We are happy to recommend which makes more sense for how often you update your site.',
        },
        {
          type: 'note',
          variant: 'info',
          text: 'You are never locked in. You can start on free support, add a maintenance plan later if your needs grow, and adjust as you go.',
        },
      ],
    },
    {
      id: 'urgent',
      title: 'If something is urgent',
      blocks: [
        {
          type: 'text',
          text: 'If your site is down or something is clearly broken, tell us it is urgent in your email subject line so we can prioritise it. Genuine outages and defects in what we built are treated as priority support. For normal changes and new requests, we work through them in order and let you know the expected timeline.',
        },
      ],
    },
  ],
  cta: {
    title: 'Need a change or have a question?',
    text: 'Email contact@uxory.in with the details, or book a quick call. We will tell you straight away whether it is covered support, a maintenance item, or new work.',
    button: 'Talk to Uxory',
  },
};
