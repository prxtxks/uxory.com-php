<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>
  <!-- Title -->
  <title>Our Services | Uxory – Websites, SEO, Branding & More</title>
  <meta name="description" content="Explore all the services Uxory offers – from web design and SEO to branding, automation, and digital marketing. Tailored solutions for your business growth." />

  <meta charset="utf-8" />

  <!-- Mobile Responsive Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="robots" content="index, follow" />

  <!-- Stylesheets -->
  <link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/services.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Our Services | Uxory – Websites, SEO, Branding & More" />
  <meta property="og:description" content="Explore all the services Uxory offers – from web design and SEO to branding, automation, and digital marketing. Tailored solutions for your business growth." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/services.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Our Services | Uxory – Websites, SEO, Branding & More" />
  <meta name="twitter:description" content="Explore all the services Uxory offers – from web design and SEO to branding, automation, and digital marketing. Tailored solutions for your business growth." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LocalBusiness",
    "name": "Uxory",
    "description": "Explore all the services Uxory offers – from web design and SEO to branding, automation, and digital marketing.",
    "url": "https://uxory.com/services.php",
    "logo": "https://uxory.com/images/logo.png",
    "sameAs": [
      "https://www.linkedin.com/company/uxory",
      "https://instagram.com/uxory.agency"
    ],
    "serviceType": "Digital Solutions"
  }
  </script>
</head>

<body >

<!-- header  -->
<?php       
include 'components/header.php';
?>

<!-- nav  -->
<?php
$currentPage = 'all_services';
$currentParent = 'home';
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

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">

<section
  class="pt-32 md:pt-44 max-sm:px-3 pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <!-- Gradient Background Wrapper -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-2/6 h-2/6 top-40 left-[12%] -z-10 blur-[35px] md:blur-[60px]"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <div class="max-w-screen-xl px-5 mx-auto">
    <div class="reveal-me">
      <h2
        class=" font-semibold xl:leading-[1.1] xl:tracking-[-2.88px] max-lg:text-center"
      >
        Digital
        <div
          class="servimg-slider-container max-sm:block sm:inline-block max-sm:mb-7 translate-y-5"
          id="cta-img"
        >
          <div class="">
            <div class="">
              <img src="images/agent/01.webp" alt="Slide 1" />
            </div>
            
          </div>
        </div>
        Solutions designed for maximum impact
      </h2>
    </div>

    <p class="mt-6 md:mt-10 max-w-[770px] max-lg:mx-auto reveal-me">
      As a agency we are working on client projects, official Webflow Templates
      and cloneables for the Webflow community.
    </p>
  </div>

  <!-- skew Marquee Start -->
  <div
    style="
      transform: translate3d(-200px, 0px, 0px) scale3d(1, 1, 1) rotateX(30deg)
        rotateY(17deg) rotateZ(342deg) skew(7deg, 359deg);
      transform-style: preserve-3d;
    "
    id="skew-Marquee"
  >
    <div class="pb-16 lg:pb-48 pt-24">
      <!-- Marquee Wrapper -->
      <div class="relative">
        <!-- Infinite Scroll Container -->
        <div
          class="z-50 flex gap-5 w-fit flex-nowrap whitespace-nowrap will-change-transform marquee-inner"
        >
          <figure
            class="marquee-part flex items-center justify-center size-[260px] z-50 flex-shrink-0"
          >
              <img src="images/marquee-img/1-dark.jpg" alt="Image for Light Mode" class="dark:hidden" />
              <img src="images/marquee-img/1.jpg" alt="Image for Dark Mode" class="hidden dark:block" />
          </figure>

         <figure
            class="marquee-part flex items-center justify-center size-[260px] z-50 flex-shrink-0"
          >
              <img src="images/marquee-img/2-dark.jpg" alt="Image for Light Mode" class="dark:hidden" />
              <img src="images/marquee-img/2.jpg" alt="Image for Dark Mode" class="hidden dark:block" />
          </figure>
          
          <figure
            class="marquee-part flex items-center justify-center size-[260px] z-50 flex-shrink-0"
          >
              <img src="images/marquee-img/3-dark.jpg" alt="Image for Light Mode" class="dark:hidden" />
              <img src="images/marquee-img/3.jpg" alt="Image for Dark Mode" class="hidden dark:block" />
          </figure>

          <figure
            class="marquee-part flex items-center justify-center size-[260px] z-50 flex-shrink-0"
          >
              <img src="images/marquee-img/4-dark.jpg" alt="Image for Light Mode" class="dark:hidden" />
              <img src="images/marquee-img/4.jpg" alt="Image for Dark Mode" class="hidden dark:block" />
          </figure>

          <figure
            class="marquee-part flex items-center justify-center size-[260px] z-50 flex-shrink-0"
          >
              <img src="images/marquee-img/5-dark.jpg" alt="Image for Light Mode" class="dark:hidden" />
              <img src="images/marquee-img/5.jpg" alt="Image for Dark Mode" class="hidden dark:block" />
          </figure>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <h4 class="reveal-text-2 reveal-me">
      Uxory is your full-service partner for websites, marketing, strategy, and digital growth;
      <span class="font-semibold italic"> We Offer:</span>
    </h4>
  </div>
</section>



<!-- ================================
Pratik's Section- left Sticky image with right scroll
================================ -->

<section class="py-20">
  <div class="container mx-auto">

    <!-- <div class="text-center mb-8 md:mb-20">
      
      <h3 class="reveal-me">Our Creative Journey</h3>
    </div> -->

    <div class="flex flex-col md:flex-row gap-20">
      
      <div class="md:w-1/2">
        <div class="sticky top-20">
          <div class="w-full h-[600px]">
            <img src="images/IMG_1373.jpg" alt="Process Images" class="w-full h-full object-cover" /> 
          </div>
        </div>
      </div>

      <div class="md:w-1/2 relative">
        <ul
          class="relative space-y-10 lg:space-y-28 xl:space-y-[170px] md:border-l border-secondary dark:border-backgroundBody"
        >

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[52px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                01
              </span>
            </div>
            <div class="ml-[30px]">
              <h4 class="">Website Development</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
                We design and develop fast, responsive, and visually striking websites tailored to your brand. From wireframes to launch, every step is focused on performance, clarity, and user experience — whether it’s a static website, a landing page, or a full business platform.
              </p>
            </div>
          </li>

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[54px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                02
              </span>
            </div>

            <div class="ml-[30px]">
              <h4 class="">Web & Mobile Apps</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
                Custom-built web and mobile applications designed to solve real problems and enhance user engagement. From product strategy to frontend/backend development, we build scalable, intuitive apps with a focus on design, speed, and functionality.
              </p>
            </div>

          </li>

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[54px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                03
              </span>
            </div>
            <div class="ml-[30px]">
              <h4 class="">SEO</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
              We offer SEO services for all types of businesses — from local stores to enterprises to one-time optimization projects. Services include technical audits, keyword research, on-page SEO, tehhnical SEO, content strategy, and more to help you rank higher and get discovered.
              </p>
            </div>
          </li>

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[54px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                04
              </span>
            </div>
            <div class="ml-[30px]">
              <h4 class="">E-commerce Solutions</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
               We build e-commerce platforms that convert — from Shopify and WooCommerce to custom storefronts. Our services cover product setup, payment integration, performance optimization, automation, and even social media support to maximize sales and customer retention.
              </p>
            </div>
          </li>

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[54px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                05
              </span>
            </div>
            <div class="ml-[30px]">
              <h4 class="">Email & CRM Automation</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
                Streamline your marketing and customer communication with smart automation. We set up email funnels, CRM integrations, and personalized campaigns to boost engagement, reduce manual work, and nurture leads effectively.
              </p>
            </div>
          </li>

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[54px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                06
              </span>
            </div>
            <div class="ml-[30px]">
              <h4 class="">Paid Advertising</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
                Get in front of your target audience with data-driven paid campaigns. We manage Google Ads, Meta Ads, and other platforms — including campaign strategy, ad creative, A/B testing, and performance tracking to ensure maximum ROI.
              </p>
            </div>
          </li>

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[54px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                07
              </span>
            </div>
            <div class="ml-[30px]">
              <h4 class="">Social Media Marketing</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
               Grow your presence across social platforms with strategic content, daily management, and audience engagement. We handle content calendars, reels, ad boosts, influencer collaboration, and analytics — all aligned to your brand voice.
              </p>
            </div>
          </li>

          <li class="max-w-max px-10">
            <div
              class="absolute left-0 md:-left-11 lg:-left-[54px] bg-black text-backgroundBody text-lg font-bold rounded-full px-3.5 lg:px-6 py-5 lg:py-8 flex items-center justify-center md:border-[18px] border-backgroundBody dark:border-[#151515]"
            >
              <span
                class="text-black dark:text-backgroundBody text-xl bg-gradient-to-r from-white to-gray-400 dark:bg-gradient-to-r dark:from-white dark:to-[#BDBDBD] text-transparent dark:text-transparent bg-clip-text dark:bg-clip-text font-semibold inline-block"
              >
                08
              </span>
            </div>
            <div class="ml-[30px]">
              <h4 class="">Branding & Identity Design</h4>
              <p class="max-w-[483px] mt-1 sm:mt-3 md:mt-5">
                Craft a powerful first impression with branding that speaks. We create logo systems, brand guidelines, typography, and visual elements that reflect your vision — ensuring consistency across all customer touchpoints.
              </p>
            </div>
          </li>

        </ul>
      </div>
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
      </h2>
      <h2 class="text-appear text-backgroundBody hidden md:block flex-1">
        <span class="font-instrument lg:text-[70px] italic">Powered</span>
        <br />
        by the Best
      </h3>

      <div class="md:self-end md:justify-self-end flex-1">
        <p
          class="text-appear max-w-lg text-backgroundBody/70  md:text-right"
        >
          Industry-leading tools and platforms we rely on for development, SEO, and marketing, and other services.
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


<!-- ================================
How We Drive Revenue Section
================================ -->

<section
  class=" pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] overflow-hidden"
>
  <!--  section header -->
  <div class="container">
    <div
      class="flex flex-col md:flex-row gap-y-3 gap-x-10 justify-center lg:justify-start items-start md:items-center mb-16 md:mb-20"
    >
      <div class="flex-1">
        <h2 class="text-appear-2">
          How We
          <span class="font-instrument italic">Drive Revenue</span>
        </h2>
      </div>
      <div class="max-md:w-full md:max-w-[470px]">
        <p
          class="text-appear max-md:text-justify max-w-lg md:place-self-end md:text-right text-appear-2"
        >
          Discover how Uxory drives real results. We use smart digital marketing tactics to increase your leads, sales, and overall business profitability.
        </p>
      </div>
    </div>
  </div>

  <!-- howe we drive revenue content -->

  <div class="swiper cardSwiper reveal-me pl-[19%]">
    <div class="swiper-wrapper">

      <!-- Card 1 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">High-Converting Landing Pages</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20 ">
            We design dedicated pages optimized for a single goal: converting interested prospects.
          </p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Unforgettable Brand Identity</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            We build strong, resonant brand identities that connect deeply with your target audience.
          </p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Profit-Driven PPC Campaigns</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
           We design, manage, and optimize pay-per-click ads that deliver immediate, measurable ROI.
          </p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Hyper-Targeted Local SEO</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Reach customers right in your neighborhood. We optimize your online presence so local searchers find you first.
          </p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Engaging Social Media Funnels</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
           We craft compelling social strategies that build community and drive conversions across platforms.
          </p>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Conversion-Optimized Web Design</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Your website, engineered for action. We create visually stunning and highly functional sites designed to convert visitors into leads.
          </p>
        </div>
      </div>

      <!-- Card 7 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Data-Powered Marketing Insights</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Make smarter decisions, faster. We analyze market data to uncover growth opportunities and refine your marketing strategy.
          </p>
        </div>
      </div>

      <!-- Card 8 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Compelling Video Marketing</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Capture attention and tell your story. Our video production connects with your audience, boosting engagement and brand recall.
          </p>
        </div>
      </div>

      <!-- Card 9 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Precision Messaging & Copywriting</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            We design dedicated pages optimized for a single goal: converting interested prospects.
          </p>
        </div>
      </div>

      <!-- Card 10 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Automated Lead Generationg</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Fill your sales pipeline effortlessly. We set up systems that consistently attract and qualify potential customers for you.
          </p>
        </div>
      </div>

      <!-- Card 11 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Seamless UI/UX Experience</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Delight your users at every click. We design intuitive and engaging user interfaces that keep visitors on your site longer.
          </p>
        </div>
      </div>

      <!-- Card 12 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">End-to-End Funnels</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            We build complete marketing funnels that guide prospects seamlessly through their buying journey.
          </p>
        </div>
      </div>

      <!-- Card 13 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Powerful Influencer Marketing</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            We connect you with relevant influencers to authentically promote your brand to engaged audiences.
          </p>
        </div>
      </div>

      <!-- Card 14 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">UX Heatmap Analysis</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            See exactly how users interact with your site. Our heatmap analysis identifies pain points and opportunities for conversion optimization.
          </p>
        </div>
      </div>

      <!-- Card 15 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Google Business Optimization</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
             Dominate local search results. We optimize your Google Business Profile to attract more local customers directly to your doorstep.
          </p>
        </div>
      </div>

     
    </div>

    <!-- buttons -->
    <div class="flex items-center space-x-2 mt-8">
      <button
        class="swiper-button-prev size-[72px] p-5 bg-backgroundBody dark:bg-secondary border dark:border-dark active:bg-primary hover:bg-primary dark:hover:bg-primary duration-300"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="33"
          viewBox="0 0 32 33"
          fill="none"
        >
          <path
            d="M27 16.25H5"
            class="stroke-secondary dark:stroke-backgroundBody"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M14 7.25L5 16.25L14 25.25"
            class="stroke-secondary dark:stroke-backgroundBody"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>
      <button
        class="swiper-button-next size-[72px] p-5 bg-backgroundBody dark:bg-secondary border dark:border-dark active:bg-primary hover:bg-primary dark:hover:bg-primary duration-300 group"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="33"
          viewBox="0 0 32 33"
          fill="none"
        >
          <path
            d="M5 16.25H27"
            class="stroke-secondary dark:stroke-backgroundBody"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
          <path
            d="M18 7.25L27 16.25L18 25.25"
            class="stroke-secondary dark:stroke-backgroundBody"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </button>
    </div>
  </div>

</section>

<!--=====================================
   Testimonials Section
======================================-->
<?php       
include 'components/testimonials.php';
?>

<!--=====================================
   CTA Section (Full contact form)
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px]"
>
  <div class="container">
    <!-- CTA Heading -->
    <div class="reveal-me mb-8">
      <h2
        class="text-center font-normal"
      >
        Let's
        <div
          class="cta-slider-container max-sm:block sm:inline-block max-sm:mb-7 translate-y-2 sm:translate-y-[20px]"
        >
          <div class="cta-inline-slider">
            <div class="slide">
              <img src="images/agent/01.webp" alt="Slide 1" />
            </div>
            <div class="slide">
              <img src="images/agent/02.webp" alt="Slide 2" />
            </div>
            <div class="slide">
              <img src="images/agent/03.webp" alt="Slide 3" />
            </div>
          </div>
        </div>

        Create
        <span class="font-instrument sm:mt-10 italic block max-md:inline-block"
          >Something Iconic</span
        >
      </h2>
    </div>

      <!--=====================================
          ./contact Form Section
      ======================================-->
    
    <div class="container">

        <!-- ./contact Form -->
        <form
          id="contactForm" action="/php/send_email.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-[20px] max-w-[800px] mx-auto reveal-me"
        >
          <!-- Full Name Field -->
          <div class="md:col-span-full">
            <label
              for="name"
              class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Full Name
            </label>
            <input
              required
              type="text"
              name="name"
              placeholder="Enter your full name"
              class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
            />
          </div>

          <!-- Phone Field -->
          <div>
            <label
              for="phone"
              class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Phone Number
            </label>
            <input
              type="tel"
              inputmode="tel"
              name="phone"
              id="phone"
              placeholder="+00 PHONE-NUMBER"
              class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
              required
            />
          </div>

          <!-- Email Field -->
          <div>
            <label
              for="email"
              class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Email
            </label>
            <input
              required
              type="email"
              name="email"
              placeholder="name@company.com"
              class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
            />
          </div>

          <!-- Company Field -->
          <div class="md:col-span-full">
            <label
              for="company"
              class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Company Name
            </label>
            <input
              type="text"
              name="company"
              placeholder="Your company name"
              class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
            />
          </div>

          <!-- Project Details -->
          <div class="md:col-span-full">
            <label
              for="Message"
              class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Project Brief
            </label>
            <textarea
              name="Message"
              placeholder="Tell us about your project goals and timeline"
              class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
            ></textarea>
          </div>

          <!-- Submit Button -->
          <div class="col-span-full mx-auto mt-4">
            <button type="submit" class="rv-button rv-button-primary">
              <div class="rv-button-top">
                <span>Send Message</span>
              </div>
              <div class="rv-button-bottom">
                <span>Send Message</span>
              </div>
            </button>
          </div>
        </form>
    </div>

    <!-- Socials -->
  <div class="container pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px]">
    <div
      class="max-w-4xl mx-auto grid max-md:grid-cols-2 md:grid-cols-4 reveal-me border-t border-x [&>*]:border-r max-md:[&>*:nth-child(2)]:border-r-0 max-md:[&>*:nth-child(6)]:border-r-0 [&>*:nth-child(4)]:border-r-0 [&>*:nth-child(8)]:border-r-0 [&>*]:border-b dark:[&>*]:border-dark dark:border-dark"
    >
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://www.instagram.com/uxoryllc/" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/1.svg" alt="IG" />
        </a>
      </figure>

      <figure class="flex items-center justify-center px-4 py-4">
        <a href="#" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/3.svg" alt="X" />
        </a>
      </figure>

      <!-- Email Contact -->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="mailto:contact@uxory.com" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/4.svg" alt="MAIL" />
        </a>
      </figure>

      <!-- WhatsApp Chat -->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://wa.me/15134137427" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/2.svg" alt="WHATSAPP" />
        </a>
      </figure>
     
    </div>
  </div>
    
  </div>
</section>

<!--=====================================
   Blog Section
======================================-->
<?php       
include 'components/blog.php';
?>

<!--===============================
    Inspiring CTA Section
===============================-->
<section
  class="bg-[#fffbfb] dark:bg-[#161616] mt-14 pb-20 md:pb-36"
>
  <!-- Container for the CTA section -->
  <div
    class="container flex flex-col md:flex-row justify-center max-md:items-center gap-y-10 sm:justify-between"
  >
    <!-- CTA Heading -->
    <h2
      class="text-[46px] max-lg:leading-[1.33] lg:text-[75px] font-normal leading-[1.1] lg:tracking-[-2.88px] reveal-me"
    >
      <span class="font-instrument italic">New</span>
      <br class="hidden md:block" />
      Project?
    </h2>

    <!-- CTA Button -->
    <a href="./calendly.php">
      <div
        class="bg-secondary dark:bg-primary p-5 w-44 h-44 group reveal-me"
      >
        <figure class="bg-primary dark:bg-secondary w-full h-full relative">
          <!-- Arrow Icon (Light Mode) -->
          <img
            src="images/icons/big-arrow-Icon.svg"
            alt="Big Arrow Icon"
            class="dark:hidden inline absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:-translate-y-28 group-hover:translate-x-9 transition-all duration-500 opacity-100 group-hover:opacity-0"
          />
          <!-- Arrow Icon (Dark Mode) -->
          <img
            src="images/icons/big-arrow-Icon-dark.svg"
            alt="Big Arrow Icon"
            class="dark:inline hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 group-hover:-translate-y-28 group-hover:translate-x-9 transition-all duration-500 opacity-100 group-hover:opacity-0"
          />
          <!-- Arrow Icon (Light Mode - Hover) -->
          <img
            src="images/icons/big-arrow-Icon.svg"
            alt="Big Arrow Icon"
            class="inline dark:hidden absolute top-full -left-2 -translate-x-1/2 -translate-y-1/2 group-hover:-translate-y-32 group-hover:translate-x-[80%] transition-all duration-500 opacity-0 group-hover:opacity-100"
          />
          <!-- Arrow Icon (Dark Mode - Hover) -->
          <img
            src="images/icons/big-arrow-Icon-dark.svg"
            alt="Big Arrow Icon"
            class="dark:inline hidden absolute top-full -left-2 -translate-x-1/2 -translate-y-1/2 group-hover:-translate-y-32 group-hover:translate-x-[80%] transition-all duration-500 opacity-0 group-hover:opacity-100"
          />
        </figure>
      </div>
    </a>
  </div>
</section>

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