<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>eCommerce Website Development Solutions | Sell Online with Uxory</title>
  <meta name="description" content="Launch your online store with powerful eCommerce solutions from Uxory. We build secure, scalable, and high-converting stores tailored to your brand." />

  <meta charset="utf-8" />
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
  <link rel="canonical" href="https://uxory.com/ecommerce-solutions.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="eCommerce Solutions to Power Your Online Store | Uxory" />
  <meta property="og:description" content="Get fully customized eCommerce websites with smooth checkout, responsive design, and advanced features built for conversions." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/ecommerce-solutions.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="eCommerce Website Development Services | Uxory" />
  <meta name="twitter:description" content="Start selling online with a robust and scalable eCommerce platform from Uxory Digital Solutions." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "serviceType": "eCommerce Website Development",
      "provider": {
        "@type": "Organization",
        "name": "Uxory",
        "url": "https://uxory.com",
        "logo": "https://uxory.com/images/logo.png"
      },
      "areaServed": {
        "@type": "Place",
        "name": "Worldwide"
      },
      "description": "Uxory offers expert eCommerce development solutions including product catalogs, secure payment integrations, SEO-friendly design, and responsive storefronts for online businesses."
    }
  </script>
</head>

<body>

<!-- header  -->
<?php       
include 'components/header.php';
?>

<!-- nav  -->
<?php
$currentPage = 'website_dev';
$currentParent = 'services';
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

<!--=====================================
   Hero Section
======================================-->
<section
  class="pt-[120px] sm:pt-[135px] md:pt-[150px] lg:pt-44 xl:pt-[200px]  relative overflow-hidden"
>
  <!-- Gradient Background Effect -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-fw-full top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 -z-10 blur-[60px] scale-90"
  >
    <img
      src="images/hero-gradient-background-02.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Hero Content -->
  <div class="container">
    <!-- Status Badge -->
    <div class="flex justify-center items-center reveal-me">
      
    </div>

    <h2 class="font-semibold text-center reveal-me"> Launch, Grow, and Scale Your Online Store – 
       <i class="font-instrument"> All in One Place. </i>

    </h2>
    <p class="max-w-3xl text-center mx-auto mt-3 text-appear">
      We help you build your eCommerce store and handle everything technical – from design to sales growth.
    </p>

    <!-- Hero Buttons -->
    <div class="flex flex-col md:flex-row justify-center items-center mt-14 gap-6 px-4 reveal-me">

      <!-- Button 1 -->
      <div
        class="flex w-full md:w-auto p-3 group bg-primary bg-opacity-30 gap-3 justify-between items-center backdrop-blur-2xl max-w-[320px] md:max-w-[320px]"
      >
        <div>
          <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
            Get a Quote
          </h6>
        </div>
          <a href="/contact.php">
            <figure
              class="bg-primary w-[44px] h-[44px] cursor-pointer relative overflow-hidden"
            >
              <img
                src="images/icons/arrow-Icon.svg"
                alt="Arrow Icon"
                class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 group-hover:-translate-y-12 group-hover:translate-x-8 transition-all duration-500 opacity-100 group-hover:opacity-0"
              />
              <img
                src="images/icons/arrow-Icon.svg"
                alt="Arrow Icon"
                class="absolute translate-y-12 -translate-x-4 transition-all duration-500 opacity-0 group-hover:opacity-100 group-hover:translate-x-[19px] group-hover:translate-y-5"
              />
            </figure>
          </a>
      </div>

      <!-- Button 2 -->
      <div
        class="flex w-full md:w-auto p-3 group bg-primary bg-opacity-30 gap-3 justify-between items-center backdrop-blur-2xl max-w-[320px] md:max-w-[320px]"
      >
        <div>
          <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
            Book Free Demo
          </h6>
          <p class="text-sm text-black dark:text-white">Few spots left this month</p>
        </div>
          <a href="calendly.php">
            <figure
              class="bg-primary w-[44px] h-[44px] cursor-pointer relative overflow-hidden"
            >
              <img
                src="images/icons/arrow-Icon.svg"
                alt="Arrow Icon"
                class="absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 group-hover:-translate-y-12 group-hover:translate-x-8 transition-all duration-500 opacity-100 group-hover:opacity-0"
              />
              <img
                src="images/icons/arrow-Icon.svg"
                alt="Arrow Icon"
                class="absolute translate-y-12 -translate-x-4 transition-all duration-500 opacity-0 group-hover:opacity-100 group-hover:translate-x-[19px] group-hover:translate-y-5"
              />
            </figure>
          </a>
      </div>

    </div>
    
  </div>

</section>


<!-- ================================
The Problem
================================ -->

<section
  class="pt-16 md:pt-20 lg:pt-[100px] xl:pt-[120px]"
>
  <div class="container">
    <div class="text-center">


      <h3 class="text-appear mb-6">Who This Is For?</h3>
      <p
        class="reveal-text-2 text-2xl lg:text-3xl text-secondary/90 dark:text-backgroundBody/70 font-normal lg:leading-[1.2] lg:tracking-[0.72px]">
        From entrepreneurs launching their first product, to brands looking to establish an online presence, to product creators and dropshippers building scalable stores, to local businesses wanting to expand online — this service is built for anyone who needs a complete, hassle-free eCommerce solution.     </h5>

    </div>
  </div>

   <div class="container pt-16 md:pt-20 lg:pt-[100px] xl:pt-[120px]">
    <h4 class="reveal-text-2 reveal-me text-center">
      Uxory is your end-to-end partner for launching, managing, and scaling powerful eCommerce stores;
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
              <h4 class="">Store Design & Development</h4>

              <ul class="max-w-[483px] mt-1 sm:mt-3 md:mt-5 list-disc space-y-0.5 list-inside">
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Fully responsive, high-converting storefront tailored to your brand
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Fully custom, CMS-based, or built on Shopify, WooCommerce etc.
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Lightning-fast load speeds & smooth user experience
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Optimized product pages for maximum sales
                </li>
              </ul>

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
              <h4 class="">Technical Setup & Security</h4>

              <ul class="max-w-[483px] mt-1 sm:mt-3 md:mt-5 list-disc space-y-0.5 list-inside">
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Seamless payment gateway integration (Stripe, Razorpay, PayPal, etc.)
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Secure checkout flow with SSL, fraud prevention, and privacy tools
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Tax, shipping zones, and currency configuration
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Essential third-party integrations and app setup
                </li>
              </ul>

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
              <h4 class="">Automation & Smart Systems</h4>

              <ul class="max-w-[483px] mt-1 sm:mt-3 md:mt-5 list-disc space-y-0.5 list-inside">
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Abandoned cart recovery with email & SMS flows
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                   Email & Marketing Automation (welcome, upsell, post-purchase, winback)
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Customer Support Automation (Live chatbots, whatsapp automation, ticket creation, AI chatbot product recommendations)
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Store & Inventory Automation (Real-time inventory sync across platform, low stock alerts, automatic out-of-stock badge display or hiding products, back-in-stock notifications)
                </li>
              </ul>

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
              <h4 class="">Complete SEO & Analytics</h4>
              
              <ul class="max-w-[483px] mt-1 sm:mt-3 md:mt-5 list-disc space-y-0.5 list-inside">
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  SEO package tailored to your business and industry
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                   Technical SEO optimization (site speed, mobile responsiveness, crawlability)
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  On-page SEO (keyword-rich titles, meta descriptions, image alt texts, product content)
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Schema markup for products, reviews, and site structure
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Blog integration and content strategy for organic traffic
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Google Analytics, Search Console, and performance tracking
                </li>
              </ul>


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
              <h4 class="">Maintenance & Ongoing Growth</h4>
              
              <ul class="max-w-[483px] mt-1 sm:mt-3 md:mt-5 list-disc space-y-0.5 list-inside">
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Regular product additions, content updates, and store monitoring
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                   Paid ads management (Meta, Google, TikTok, etc.) for traffic and conversions
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Social media marketing strategies tailored to your brand
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  	Influencer marketing outreach and campaign support
                </li>
                <li
                  class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
                >
                  Ongoing performance optimization & A/B testing
                </li>
              </ul>

            </div>
          </li>

        </ul>
      </div>
    </div>
  </div>
</section>


<!--=====================================
 why choose uxory
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div class="container">
    <!-- Section Header -->
    <div class="text-center mb-8 md:mb-14">
      <p
      class="font-satoshi text-center text-sm font-normal leading-6 tracking-[3px] uppercase reveal-me @@badge"
    >
      WHY CHOOSE UXORY
    </p>
      <h3 class="my-3 text-appear max-sm:text-[28px]">
        Excellence that

        <i class="font-instrument">sets us apart</i>
      </h3>
      <p class="text-appear">
        Built with transparency and long-term support in mind.
      </p>
    </div>

    <!-- content Area -->

    <article>
      <div
        class="flex flex-col md:flex-row max-lg:flex-wrap mb-[30px] gap-[30px] reveal-me"
      >
        <!--  -->
        <div class="border dark:border-dark flex-1 px-[30px] py-4">
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="60"
              height="60"
              viewBox="0 0 60 60"
              fill="none"
            >
              <rect
                width="60"
                height="60"
                class="dark:fill-secondary fill-backgroundBody"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M30.6422 28.5873L26.8523 21.4072L23.0599 28.5873C22.7916 29.1124 22.4037 29.5671 21.9274 29.9148C21.4483 30.2643 20.8946 30.498 20.31 30.5973L12.5001 32.1224L17.9525 38.6224C18.3203 39.0237 18.5974 39.4995 18.765 40.0174C18.9312 40.5343 18.9833 41.081 18.9175 41.62L17.88 50.0001L25.0724 46.535C25.6282 46.2696 26.2364 46.132 26.8523 46.1325C27.4307 46.132 28.0007 46.2701 28.5148 46.535L35.8696 49.7851L34.8297 41.5C34.7639 40.961 34.8159 40.4143 34.9822 39.8974C35.1497 39.3795 35.4268 38.9037 35.7946 38.5024L41.202 32.1124L33.3922 30.5873C32.8075 30.488 32.2539 30.2543 31.7747 29.9048C31.2997 29.5599 30.9119 29.1088 30.6422 28.5873Z"
                class="stroke-secondary dark:stroke-backgroundBody"
                stroke-width="1.2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M46.4725 11.8704C46.7073 11.6365 46.708 11.2566 46.4741 11.0218C46.2402 10.7871 45.8603 10.7864 45.6256 11.0203L46.4725 11.8704ZM36.9283 19.6854C36.6935 19.9192 36.6928 20.2991 36.9267 20.5339C37.1606 20.7686 37.5405 20.7693 37.7752 20.5355L36.9283 19.6854ZM47.9234 19.09C48.1582 18.8562 48.159 18.4763 47.9252 18.2415C47.6914 18.0067 47.3115 18.0059 47.0767 18.2397L47.9234 19.09ZM41.2768 24.0147C41.042 24.2486 41.0412 24.6284 41.275 24.8633C41.5088 25.0981 41.8887 25.0989 42.1235 24.8651L41.2768 24.0147ZM39.2259 10.4252C39.4607 10.1914 39.4615 9.81146 39.2277 9.57665C38.9939 9.34183 38.614 9.34102 38.3791 9.57483L39.2259 10.4252ZM32.5768 15.3524C32.342 15.5862 32.3411 15.9661 32.5749 16.2009C32.8088 16.4357 33.1887 16.4366 33.4235 16.2027L32.5768 15.3524ZM45.6256 11.0203L36.9283 19.6854L37.7752 20.5355L46.4725 11.8704L45.6256 11.0203ZM47.0767 18.2397L41.2768 24.0147L42.1235 24.8651L47.9234 19.09L47.0767 18.2397ZM38.3791 9.57483L32.5768 15.3524L33.4235 16.2027L39.2259 10.4252L38.3791 9.57483Z"
                class="fill-secondary dark:fill-backgroundBody"
              />
            </svg>
          </span>
          <h5 class="mb-2.5 mt-5">Transparent Pricing</h5>
          <p>No hidden fees — know exactly what you’re paying for.</p>
        </div>
        <!--  -->
        <div class="border dark:border-dark flex-1 px-[30px] py-4">
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="61"
              height="60"
              viewBox="0 0 61 60"
              fill="none"
            >
              <rect
                width="60"
                height="60"
                transform="translate(0.333252)"
                class="dark:fill-secondary fill-backgroundBody"
              />
              <path
                d="M31.0833 12.5C31.0833 12.0858 30.7475 11.75 30.3333 11.75C29.919 11.75 29.5833 12.0858 29.5833 12.5H31.0833ZM29.5833 47.5C29.5833 47.9142 29.919 48.25 30.3333 48.25C30.7475 48.25 31.0833 47.9142 31.0833 47.5H29.5833ZM37.7532 16.875C37.7532 16.4608 37.4174 16.125 37.0032 16.125C36.589 16.125 36.2532 16.4608 36.2532 16.875H37.7532ZM36.2532 43.125C36.2532 43.5392 36.589 43.875 37.0032 43.875C37.4174 43.875 37.7532 43.5392 37.7532 43.125H36.2532ZM44.4133 21.25C44.4133 20.8358 44.0775 20.5 43.6633 20.5C43.2491 20.5 42.9133 20.8358 42.9133 21.25H44.4133ZM42.9133 38.75C42.9133 39.1642 43.2491 39.5 43.6633 39.5C44.0775 39.5 44.4133 39.1642 44.4133 38.75H42.9133ZM51.0833 25.625C51.0833 25.2108 50.7475 24.875 50.3333 24.875C49.919 24.875 49.5833 25.2108 49.5833 25.625H51.0833ZM49.5833 34.375C49.5833 34.7892 49.919 35.125 50.3333 35.125C50.7475 35.125 51.0833 34.7892 51.0833 34.375H49.5833ZM22.9133 43.125C22.9133 43.5392 23.2491 43.875 23.6633 43.875C24.0775 43.875 24.4133 43.5392 24.4133 43.125H22.9133ZM24.4133 16.875C24.4133 16.4608 24.0775 16.125 23.6633 16.125C23.2491 16.125 22.9133 16.4608 22.9133 16.875H24.4133ZM16.2532 38.75C16.2532 39.1642 16.589 39.5 17.0032 39.5C17.4174 39.5 17.7532 39.1642 17.7532 38.75H16.2532ZM17.7532 21.25C17.7532 20.8358 17.4174 20.5 17.0032 20.5C16.589 20.5 16.2532 20.8358 16.2532 21.25H17.7532ZM9.58325 34.375C9.58325 34.7892 9.91904 35.125 10.3333 35.125C10.7475 35.125 11.0833 34.7892 11.0833 34.375H9.58325ZM11.0833 25.625C11.0833 25.2108 10.7475 24.875 10.3333 24.875C9.91904 24.875 9.58325 25.2108 9.58325 25.625H11.0833ZM29.5833 12.5V47.5H31.0833V12.5H29.5833ZM36.2532 16.875V43.125H37.7532V16.875H36.2532ZM42.9133 21.25V38.75H44.4133V21.25H42.9133ZM49.5833 25.625V34.375H51.0833V25.625H49.5833ZM24.4133 43.125V16.875H22.9133V43.125H24.4133ZM17.7532 38.75V21.25H16.2532V38.75H17.7532ZM11.0833 34.375V25.625H9.58325V34.375H11.0833Z"
                class="fill-secondary dark:fill-backgroundBody"
              />
            </svg>
          </span>
          <h5 class="mb-2.5 mt-5">Fast Launch</h5>
          <p>
            Go live in as little as 7 days (where applicable).
          </p>
        </div>
        <!--  -->
        <div class="border dark:border-dark flex-1 px-[30px] py-4">
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="61"
              height="60"
              viewBox="0 0 61 60"
              fill="none"
            >
              <rect
                width="60"
                height="60"
                transform="translate(0.666504)"
                class="dark:fill-secondary fill-backgroundBody"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M24.2636 10L14.9521 27.7771H24.2636L17.2807 50L46.3807 27.7771H33.5779L40.5607 10H24.2636Z"
                class="stroke-secondary dark:stroke-backgroundBody"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
          <h5 class="mb-2.5 mt-5">Ongoing Support</h5>
          <p>Post-launch support and store maintenance when you need it.</p>
        </div>
      </div>
      <div class="flex flex-col md:flex-row gap-[30px] reveal-me">
        <!--  -->
        <div
          class="border dark:border-dark px-[30px] py-4 flex-1 reveal-me"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="60"
              height="60"
              viewBox="0 0 60 60"
              fill="none"
            >
              <rect
                width="60"
                height="60"
                class="dark:fill-secondary fill-backgroundBody"
              />
              <path
                d="M9.61413 20.7855C9.25894 20.9986 9.14377 21.4593 9.35688 21.8144C9.56999 22.1696 10.0307 22.2848 10.3859 22.0717L9.61413 20.7855ZM24.2857 12.8571L24.7357 12.2571C24.4918 12.0742 24.1613 12.0571 23.8998 12.214L24.2857 12.8571ZM35.7143 21.4286L35.2643 22.0286C35.5379 22.2338 35.9157 22.2279 36.1828 22.0142L35.7143 21.4286ZM50.4685 10.5857C50.792 10.3269 50.8444 9.85493 50.5857 9.53148C50.3269 9.20803 49.8549 9.15559 49.5315 9.41435L50.4685 10.5857ZM46.3929 50C46.3929 50.4142 46.7286 50.75 47.1429 50.75C47.5571 50.75 47.8929 50.4142 47.8929 50H46.3929ZM47.8929 27.1429C47.8929 26.7286 47.5571 26.3929 47.1429 26.3929C46.7286 26.3929 46.3929 26.7286 46.3929 27.1429H47.8929ZM23.5357 50C23.5357 50.4142 23.8715 50.75 24.2857 50.75C24.6999 50.75 25.0357 50.4142 25.0357 50H23.5357ZM25.0357 27.1429C25.0357 26.7286 24.6999 26.3929 24.2857 26.3929C23.8715 26.3929 23.5357 26.7286 23.5357 27.1429H25.0357ZM34.9643 50C34.9643 50.4142 35.3001 50.75 35.7143 50.75C36.1285 50.75 36.4643 50.4142 36.4643 50H34.9643ZM36.4643 35.7143C36.4643 35.3001 36.1285 34.9643 35.7143 34.9643C35.3001 34.9643 34.9643 35.3001 34.9643 35.7143H36.4643ZM12.1071 50C12.1071 50.4142 12.4429 50.75 12.8571 50.75C13.2714 50.75 13.6071 50.4142 13.6071 50H12.1071ZM13.6071 35.7143C13.6071 35.3001 13.2714 34.9643 12.8571 34.9643C12.4429 34.9643 12.1071 35.3001 12.1071 35.7143H13.6071ZM10.3859 22.0717L24.6716 13.5003L23.8998 12.214L9.61413 20.7855L10.3859 22.0717ZM23.8357 13.4571L35.2643 22.0286L36.1643 20.8286L24.7357 12.2571L23.8357 13.4571ZM36.1828 22.0142L50.4685 10.5857L49.5315 9.41435L35.2458 20.8429L36.1828 22.0142ZM47.8929 50V27.1429H46.3929V50H47.8929ZM25.0357 50V27.1429H23.5357V50H25.0357ZM36.4643 50V35.7143H34.9643V50H36.4643ZM13.6071 50V35.7143H12.1071V50H13.6071Z"
                class="fill-secondary dark:fill-backgroundBody"
              />
            </svg>
          </span>
          <h5 class="mb-2.5 mt-5">Privacy & NDA Protection</h5>
          <p>Your business and data stay secure with strict confidentiality.</p>
        </div>
        <!--  -->
        <div
          class="border dark:border-dark px-[30px] py-4 flex-1 reveal-me"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="60"
              height="60"
              viewBox="0 0 60 60"
              fill="none"
            >
              <rect
                width="60"
                height="60"
                class="dark:fill-secondary fill-backgroundBody"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M30.0011 16.6657C30.0011 20.3471 27.0166 23.3314 23.335 23.3314C19.6535 23.3314 16.6689 20.3471 16.6689 16.6657C16.6689 12.9843 19.6535 10 23.335 10C27.0166 10 30.0011 12.9843 30.0011 16.6657Z"
                class="stroke-secondary dark:stroke-backgroundBody"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M36.6673 40.6654C36.6673 45.8083 30.6983 49.9997 23.3322 49.9997C15.9661 49.9997 10 45.8197 10 40.6654C10 35.5111 15.9689 31.334 23.3351 31.334C30.7012 31.334 36.6673 35.5111 36.6673 40.6654Z"
                class="stroke-secondary dark:stroke-backgroundBody"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M44.1125 22.8897C44.1125 25.0988 42.3216 26.8897 40.1123 26.8897C37.903 26.8897 36.1121 25.0988 36.1121 22.8897C36.1121 20.6805 37.903 18.8896 40.1123 18.8896C41.1732 18.8896 42.1907 19.3111 42.9409 20.0612C43.6911 20.8114 44.1125 21.8288 44.1125 22.8897Z"
                class="stroke-secondary dark:stroke-backgroundBody"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M41.9995 47.3333C46.0391 47.6649 49.5989 44.6977 50 40.6647C49.5975 36.6328 46.038 33.6672 41.9995 33.999"
                class="stroke-secondary dark:stroke-backgroundBody"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
          <h5 class="mb-2.5 mt-5">Performance-Driven Builds</h5>
          <p>Scalable, fast, and optimized using industry-best practices.</p>
        </div>
      </div>
    </article>

    <ul class="flex justify-center reveal-me mt-8 md:mt-16">
      <li
        class="block md:inline-block max-md:w-full mx-auto md:ml-auto md:w-auto"
      >
        <a
          href="/contact.html"
          class="rv-button rv-button-white block md:inline-block text-center"
        >
          <div class="rv-button-top">
            <span>Let’s start</span>
          </div>
          <div class="rv-button-bottom">
            <span>Let’s start</span>
          </div>
        </a>
      </li>
    </ul>
  </div>
</section>


<!-- ================================
Our Work Heading Section
================================ -->
  <section
    class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px]"
  >
    <div class="container">
      <!-- Section Header -->
      <div
        class="flex flex-col md:flex-row gap-x-10 gap-y-4 justify-center lg:justify-between items-start"
      >
        <!-- Title Area -->
        <div class="flex-1 md:self-start">
          <h3 class="text-appear lg:leading-[1.1]">
            Explore Our Work,
            <i class="font-instrument"> websites we've built. </i>
          </h3>
        </div>

        <!-- Description -->
        <div class="w-full md:max-w-72 lg:max-w-[470px] md:self-end">
          <p class="text-appear max-w-lg md:text-right md:place-self-end">
           Discover the websites, stores, and campaigns we’ve brought to life.
          </p>
          <ul class="justify-self-end max-md:w-full mt-5 md:mt-10 reveal-me">
            <li
              class="block md:inline-block w-full mx-auto md:w-auto text-center"
            >
              <a
                href="./coming-soon.php"
                class="rv-button rv-button-white block md:inline-block"
              >
                <div class="rv-button-top">
                  <span>Explore All Projects</span>
                </div>
                <div class="rv-button-bottom">
                  <span>Explore All Projects</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>



<!-- ================================
Our Projects-Slider Section 
================================ -->
 <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px]"
>
  <div class="container relative">
  
  <div class="swiper overflow-hidden reveal-me" id="reviewer">
      <div class="swiper-wrapper">

        <!-- Slide 03 Project Apparel -->
        <div class="swiper-slide">
          <div
            class="flex flex-col md:flex-row items-start gap-y-5 md:space-x-10 content-between"
          >
            <img
              src="/images/home-ai/clothing.jpg"
              alt="User Image"
              class="max-md:w-full object-cover md:max-w-[300px] md:max-h-[260px]"
            />
            <div class="flex flex-col md:max-w-[650px]">
              
              <div class="flex items-center gap-x-6 mt-5 mb-[34px]">
                <p class="text-2xl leading-[1.1]">Project Apparel</p>
              </div>

              <p class="text-lg leading-[1.6] tracking-[0.36px]">
               A responsive clothing store website to display collections and connect with fashion-conscious shoppers. 
               Designed with a clean layout and easy navigation for a smooth browsing experience.
              </p>

              <div class="flex items-center justify-between mt-12">
                
                  <a
                    href="https://projects.uxory.com/clothing_store/"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <img
                      src="/images/icons/top-arrow.svg"
                      alt="icon"
                      class="block dark:hidden mt-[2px]"
                    />
                    <img
                      src="/images/icons/top-arrow-dark.svg"
                      alt="icon"
                      class="hidden dark:block mt-[2px]"
                    />
                  </a>
                
              </div>

            </div>
          </div>
        </div>

        <!-- Slide 04 Project Harvest -->
        <div class="swiper-slide">
          <div
            class="flex flex-col md:flex-row items-start gap-y-5 md:space-x-10 content-between"
          >
            <img
              src="/images/home-ai/organic.jpg"
              alt="User Image"
              class="max-md:w-full object-cover md:max-w-[300px] md:max-h-[260px]"
            />
            <div class="flex flex-col md:max-w-[650px]">
              
              <div class="flex items-center gap-x-6 mt-5 mb-[34px]">
                <p class="text-2xl leading-[1.1]">Project Harvest</p>
              </div>

              <p class="text-lg leading-[1.6] tracking-[0.36px]">
                A responsive organic store website to promote natural products and engage health-focused customers. 
                Designed with a clean layout and easy navigation for a smooth browsing experience.
              </p>

              <div class="flex items-center justify-between mt-12">
                
                  <a
                    href="https://projects.uxory.com/organic_store/"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                    target="_blank"
                    rel="noopener noreferrer"
                  >
                    <img
                      src="/images/icons/top-arrow.svg"
                      alt="icon"
                      class="block dark:hidden mt-[2px]"
                    />
                    <img
                      src="/images/icons/top-arrow-dark.svg"
                      alt="icon"
                      class="hidden dark:block mt-[2px]"
                    />
                  </a>
                
              </div>

            </div>
          </div>
        </div>
        
      </div>
      
      <!-- buttons:  -->

      <div class="absolute right-[15%] bottom-[0px] z-50">
        <div class="flex items-center space-x-2">
          <button
            class="swiper-button-prev p-1.5 md:p-2.5 bg-backgroundBody dark:bg-secondary border dark:border-dark active:bg-primary hover:bg-primary duration-300"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
            >
              <path
                d="M12.9417 16.5621C12.9998 16.6201 13.0458 16.6891 13.0773 16.7649C13.1087 16.8408 13.1249 16.9221 13.1249 17.0043C13.1249 17.0864 13.1087 17.1677 13.0773 17.2436C13.0458 17.3194 12.9998 17.3884 12.9417 17.4464C12.8836 17.5045 12.8147 17.5506 12.7388 17.582C12.663 17.6134 12.5816 17.6296 12.4995 17.6296C12.4174 17.6296 12.3361 17.6134 12.2602 17.582C12.1843 17.5506 12.1154 17.5045 12.0573 17.4464L5.80733 11.1964C5.74922 11.1384 5.70312 11.0695 5.67167 10.9936C5.64021 10.9177 5.62402 10.8364 5.62402 10.7543C5.62402 10.6721 5.64021 10.5908 5.67167 10.5149C5.70312 10.439 5.74922 10.3701 5.80733 10.3121L12.0573 4.06207C12.1746 3.94479 12.3337 3.87891 12.4995 3.87891C12.6654 3.87891 12.8244 3.94479 12.9417 4.06207C13.059 4.17934 13.1249 4.3384 13.1249 4.50425C13.1249 4.67011 13.059 4.82917 12.9417 4.94644L7.13311 10.7543L12.9417 16.5621Z"
                class="fill-secondary dark:fill-backgroundBody"
              />
            </svg>
          </button>
          <button
            class="swiper-button-next p-1.5 md:p-2.5 bg-backgroundBody dark:bg-secondary border dark:border-dark active:bg-primary hover:bg-primary duration-300"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
            >
              <path
                d="M14.1925 11.1964L7.94254 17.4464C7.88447 17.5045 7.81553 17.5506 7.73966 17.582C7.66379 17.6134 7.58247 17.6296 7.50035 17.6296C7.41823 17.6296 7.33691 17.6134 7.26104 17.582C7.18517 17.5506 7.11623 17.5045 7.05816 17.4464C7.00009 17.3884 6.95403 17.3194 6.9226 17.2436C6.89117 17.1677 6.875 17.0864 6.875 17.0043C6.875 16.9221 6.89117 16.8408 6.9226 16.7649C6.95403 16.6891 7.00009 16.6201 7.05816 16.5621L12.8668 10.7543L7.05816 4.94644C6.94088 4.82917 6.875 4.67011 6.875 4.50425C6.875 4.3384 6.94088 4.17934 7.05816 4.06207C7.17544 3.94479 7.3345 3.87891 7.50035 3.87891C7.6662 3.87891 7.82526 3.94479 7.94254 4.06207L14.1925 10.3121C14.2506 10.3701 14.2967 10.439 14.3282 10.5149C14.3597 10.5908 14.3758 10.6721 14.3758 10.7543C14.3758 10.8364 14.3597 10.9177 14.3282 10.9936C14.2967 11.0695 14.2506 11.1384 14.1925 11.1964Z"
                class="fill-secondary dark:fill-backgroundBody"
              />
            </svg>
          </button>
        </div>
      </div>

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