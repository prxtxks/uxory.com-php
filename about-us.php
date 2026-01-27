<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Primary Meta Tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <title>About Us | Uxory - Software & Automation Solutions</title>
  <meta name="description" content="Learn about Uxory, a software solutions company specializing in custom software development, website development, automation, and AI solutions for modern businesses." />
  <meta name="author" content="Uxory" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <meta name="googlebot" content="index, follow" />
  
  <!-- Theme & Mobile Optimization -->
  <meta name="theme-color" content="#000000" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="format-detection" content="telephone=no" />
  
  <!-- Canonical URL -->
  <link rel="canonical" href="https://uxory.com/about-us.php" />
  
  <!-- Performance Hints -->
  <link rel="preconnect" href="https://www.google.com" crossorigin />
  <link rel="dns-prefetch" href="https://www.google.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
  <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
  
  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
  <link rel="icon" type="image/png" href="/images/favicon.png" sizes="96x96" />
  <link rel="shortcut icon" href="/images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />
  
  <!-- Stylesheets -->
  <link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://uxory.com/about-us.php" />
  <meta property="og:title" content="About Us | Uxory - Software & Automation Solutions" />
  <meta property="og:description" content="Learn about Uxory, a software solutions company specializing in custom software development, website development, automation, and AI solutions for modern businesses." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image:alt" content="About Uxory" />
  <meta property="og:site_name" content="Uxory" />
  <meta property="og:locale" content="en_US" />
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:url" content="https://uxory.com/about-us.php" />
  <meta name="twitter:title" content="About Us | Uxory - Software & Automation Solutions" />
  <meta name="twitter:description" content="Learn about Uxory, a software solutions company specializing in custom software development, website development, automation, and AI solutions for modern businesses." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />
  <meta name="twitter:image:alt" content="About Uxory" />
  
  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "https://uxory.com/#organization",
        "name": "Uxory",
        "url": "https://uxory.com",
        "logo": {
          "@type": "ImageObject",
          "@id": "https://uxory.com/#logo",
          "url": "https://uxory.com/images/logo.png",
          "contentUrl": "https://uxory.com/images/logo.png",
          "width": 512,
          "height": 512
        },
        "sameAs": [
          "https://www.linkedin.com/company/uxory/",
          "https://www.instagram.com/uxoryllc/"
        ],
        "description": "Uxory is a software solutions company offering custom software development, website development, automation, and AI solutions with a focus on innovation, transparency, and client growth."
      },
      {
        "@type": "AboutPage",
        "@id": "https://uxory.com/about-us.php#webpage",
        "url": "https://uxory.com/about-us.php",
        "name": "About Us | Uxory",
        "description": "Learn about Uxory, a software solutions company specializing in custom software development, website development, automation, and AI solutions for modern businesses.",
        "isPartOf": {
          "@id": "https://uxory.com/#website"
        },
        "about": {
          "@id": "https://uxory.com/#organization"
        },
        "primaryImageOfPage": {
          "@id": "https://uxory.com/#logo"
        }
      },
      {
        "@type": "WebSite",
        "@id": "https://uxory.com/#website",
        "url": "https://uxory.com",
        "name": "Uxory",
        "publisher": {
          "@id": "https://uxory.com/#organization"
        }
      }
    ]
  }
  </script>

</head>

<body>
  <!-- Skip to main content for accessibility -->
  <a href="#main-content" class="sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[99999] focus:px-4 focus:py-2 focus:bg-primary focus:text-black focus:font-bold focus:rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0;">
    Skip to main content
  </a>
  <style>
    .sr-only:focus {
      position: fixed !important;
      width: auto !important;
      height: auto !important;
      padding: 0.5rem 1rem !important;
      margin: 0 !important;
      overflow: visible !important;
      clip: auto !important;
      white-space: normal !important;
    }
  </style>

<!-- header  -->
<?php       
include 'components/header.php';
?>

<!-- nav  -->
<?php
$currentPage = 'about-us';
$currentParent = 'about';
include 'components/nav.php';
?>

<div
  class="menu-overflow fixed z-[9999] bg-[rgba(10,10,10,0.95)] bg-opacity-60 backdrop-blur-[25px] w-full h-full pointer-events-none"
></div>

<!-- Cursor Pointer -->
<div class="pointer"></div>

<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

<main id="main-content" class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
<!--=====================================
   Page Header Details Section
======================================-->
<section
  class="pt-32 max-md:pb-20 md:py-44 lg:pt-[200px] relative overflow-hidden"
>
  <!-- Gradient Background Wrapper -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-full top-0 left-0 -z-10 blur-[35px] md:blur-[60px] sm:scale-[0.1] bg-blend-multiply md:scale-75"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-[45%]"
    />
  </div>

  <!-- Hero Content Container -->
  <div class="container reveal-me">
    <div class="text-center">


      <!-- Hero Title -->
      <h2 class="mb-5 lg:mb-8 font-medium">About Uxory</h2>

      <!-- Hero Description -->
      <p class="max-md:max-w-[650px]">We build intelligent software systems that automate operations, increase revenue, and eliminate inefficiencies. <br> Custom software, automation, and AI solutions designed for modern business growth.</p>
    </div>
  </div>
</section>

<!--=====================================
   Services Details Section
======================================-->
<section class="pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]">
  <div class="max-w-[1440px] mx-auto px-8 md:px-20">
    <div class="flex flex-col gap-8 lg:flex-row justify-start">
      <!-- Sticky Table of Contents -->
      <aside class="min-w-[275px] flex-1">
        <div class="sticky top-28">
          <div class="reveal-me">
            <h3 class="max-md:text-[40px] md:text-[32px]">Table of contents</h3>
            <ul
              class="mt-4 sm:mt-7 md:mt-10 [&>*:not(:last-child)]:mb-2 md:[&>*:not(:last-child)]:mb-5"
            >
              <li>
                <a
                  href="#service-overview"
                  class="text-xl normal-case font-normal leading-7 tracking-normal dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                Overview
                </a>
              </li>
              <li>
                <a
                  href="#our-service-includes"
                  class="text-xl normal-case font-normal leading-7 tracking-normal dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Our service includes
                </a>
              </li>
              <li>
                <a
                  href="#why-choose"
                  class="text-xl normal-case font-normal leading-7 tracking-normal dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Why Choose Us
                </a>
              </li>
            </ul>
          </div>
        </div>
      </aside>

      <!-- Main Content -->
      <article class="project-details-body">
        <!-- <figure class="reveal-me">
          <img````
            src="./images/blog-img-8.png"
            alt="Services Big Img"
          />
        </figure> -->
        <div class="reveal-me">
          <h3 id="service-overview">Overview</h3>
          <p>
            At Uxory, we specialize in building intelligent software systems that automate operations, 
            increase revenue, and eliminate inefficiencies. We develop custom software, high-performance 
            websites, process automation solutions, and AI-powered systems tailored to your business needs. 
            With our expert team of developers and engineers, we ensure robust, scalable solutions that 
            grow with your business, allowing you to focus on your core objectives while we handle the 
            technical complexity.
          </p>
        </div>
        <div class="reveal-me">
          <h3 id="our-service-includes">What We Offer</h3>
          <p>
            Custom Software Development: We build secure, scalable, and AI-enabled software systems 
            that automate work, power products, and grow with your business. From internal tools to 
            customer-facing platforms, we create software that improves efficiency and reduces manual work. <br />
            <br />
            Website Development: High-performance websites built with modern technologies, optimized 
            for speed, security, and user experience. We create responsive, dynamic websites that 
            deliver results and scale with your business. <br />
            <br />
            Process Automation: We design reliable workflows and automation systems for lead management, 
            finance, customer support, and internal operations. Our solutions eliminate repetitive tasks 
            and streamline business processes. <br />
            <br />
            AI Solutions: Intelligent systems that leverage artificial intelligence to enhance operations, 
            improve decision-making, and create competitive advantages. We integrate AI capabilities into 
            your existing systems or build new AI-powered solutions from the ground up. <br />
            <br />
            Technology Consulting: Our team evaluates the best technologies and platforms to ensure 
            your solutions are built with the latest tools for optimal performance, security, and scalability.
          </p>
        </div>
        <div class="reveal-me">
          <h3 id="why-choose">Why Choose Us</h3>
          <p>
            Expertise and Innovation: Our team combines years of experience with cutting-edge technology 
            to deliver modern, functional, and secure software solutions. We stay current with the latest 
            frameworks, tools, and best practices in software development, automation, and AI. <br />
            <br />
            Tailored Solutions: We understand that every business is unique, so we offer customized solutions 
            that perfectly align with your specific needs and business objectives. No one-size-fits-all 
            approaches—every project is designed for your success. <br />
            <br />
            Seamless Collaboration: We work closely with you throughout the entire development process, 
            ensuring your vision is realized while maintaining transparency and open communication at every step. <br />
            <br />
            End-to-End Service: From concept to deployment, we handle every aspect of your software project, 
            allowing you to focus on what matters most—your business. We manage architecture, development, 
            testing, deployment, and ongoing support. <br />
            <br />
            Speed and Efficiency: With our streamlined development process, we ensure timely delivery without 
            compromising quality, so your solutions can launch quickly and effectively. <br />
            <br />
            Results-Driven Approach: We focus on delivering measurable outcomes, whether it's increased 
            operational efficiency, reduced manual work, improved system performance, or enhanced business 
            capabilities. <br />
            <br />
            Post-Launch Support: Our commitment doesn't end at launch. We provide ongoing maintenance, 
            updates, and support to keep your systems running smoothly and up to date with evolving 
            requirements and technologies.
          </p>
        </div>
      </article>
    </div>
  </div>
</section>

<!--=====================================
   Clients Section
======================================-->
<section
  class="bg-dark py-20 lg:py-[120px] dark:py-0 dark:lg:py-0 mt-14 md:mt-16 lg:mt-[88px] xl:mt-[100px] relative overflow-hidden"
>

<div class="container">
    <div
      class="flex flex-col md:flex-row gap-x-10 gap-y-3 justify-center md:justify-between items-start md:items-end mb-10 md:mb-20"
    >
      <h3 class="text-appear text-backgroundBody block md:hidden flex-1">
        <span class="font-instrument italic">Powered</span>

        by the Best
      </h3>
      <h3 class="text-appear text-backgroundBody hidden md:block flex-1">
        <span class="font-instrument lg:text-[70px] italic">Powered</span>
        <br />
        by the Best
      </h3>

      <div class="md:self-end md:justify-self-end flex-1">
        <p
          class="text-appear max-w-lg text-backgroundBody/70  md:text-right"
        >
          Industry-leading tools and platforms we rely on for software development, automation, and AI solutions.
        </p>
      </div>
    </div>
  </div>
  
  <!-- Clients Logo Marquee -->
  <div class="marquee-container reveal-me">
    <div class="flex items-center gap-10 md:gap-32 justify-between py-8">
      <div class="w-[150px] h-[80px] flex items-center justify-center ml-10 md:ml-32">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-1.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-2.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-3.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-4.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-5.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-6.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-7.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-8.svg" alt="client Logo" />
      </div>
      
    </div>
  </div>

  <!-- Reverse -->
  <div class="marquee-reverse-container reveal-me">
    <div class="flex items-center gap-10 md:gap-32 justify-between py-8">
      <div class="w-[150px] h-[80px] flex items-center justify-center  ml-10 md:ml-32">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-9.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-10.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-11.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-12.svg" alt="client Logo" />
      </div>
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-13.svg" alt="client Logo" />
      </div>
      
      <div class="w-[150px] h-[80px] flex items-center justify-center">
        <img class="max-h-full max-w-full object-contain" src="images/icons/company/client-15.svg" alt="client Logo" />
      </div>
      
    </div>
  </div>

</section>

<!--=====================================
   CTA Section
======================================-->
<?php       
include 'components/cta.php';
?>

<!-- ================================
 Socials Section
================================ -->
<?php       
include 'components/socials.php';
?>

<!--=====================================
   Blog Section
======================================-->
<?php       
include 'components/blog.php';
?>

</main>

<!--=====================================
   Footer Section
======================================-->
<?php       
include 'components/footer.php';
?>

<!--=====================================
   Chatsimple Section (Chatbot)
======================================-->
<?php       
include 'components/chatsimple.php';
?>

<!--=====================================
   Scripts
======================================-->
<?php       
include 'components/scripts.php';
?>

</body>

</html>