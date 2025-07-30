<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Social Media Management | Uxory – Build Your Brand Online</title>
  <meta name="description" content="Grow your brand with Uxory’s social media services. We create scroll-stopping content, manage your platforms, and help you build an engaged audience." />

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
  <link rel="canonical" href="https://uxory.com/social-media.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Social Media Management | Uxory – Build Your Brand Online" />
  <meta property="og:description" content="Grow your brand with Uxory’s social media services. We create scroll-stopping content, manage your platforms, and help you build an engaged audience." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/social-media.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Social Media Management | Uxory – Build Your Brand Online" />
  <meta name="twitter:description" content="Grow your brand with Uxory’s social media services. We create scroll-stopping content, manage your platforms, and help you build an engaged audience." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "provider": {
      "@type": "Organization",
      "name": "Uxory",
      "url": "https://uxory.com",
      "logo": "https://uxory.com/images/logo.png"
    },
    "serviceType": "Social Media Management",
    "description": "Grow your brand with Uxory’s social media services. We create scroll-stopping content, manage your platforms, and help you build an engaged audience.",
    "url": "https://uxory.com/social-media.php"
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
$currentPage = 'social_media';
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
  class="pt-[120px] sm:pt-[135px] md:pt-[150px] lg:pt-44 xl:pt-[200px] relative overflow-hidden"
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
    <!-- <div class="flex justify-center items-center reveal-me">
      <div class="rv-badge mb-2">
        <span class="rv-badge-text">Designed to inspire.</span>
      </div>
    </div> -->

    <h2 class="font-semibold text-center reveal-me">
      <i class="font-instrument">Your</i> Social
      Media <i class="font-instrument"> Growth </i>   
      <i class="font-instrument"> Partners </i> from the <i class="font-instrument"> Future. </i>

    </h2>
    <p class="max-w-3xl text-center mx-auto mt-3 text-appear">
      We help your brand connect, engage, and grow across every platform. With creative ideas and real strategies, Uxory turns followers into loyal customers.

    </p>

      <!-- Hero Buttons -->
    <div class="flex flex-col md:flex-row justify-center items-center mt-14 gap-6 px-4 reveal-me">

      <!-- Button 1 -->
      <div
        class="flex w-full md:w-auto p-3 group bg-primary bg-opacity-30 gap-3 justify-between items-center backdrop-blur-2xl max-w-[320px] md:max-w-[320px]"
      >
        <div>
          <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
            Get a Proposal
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
            Schedule a Free Meeting
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
About-v13 Section 
================================ -->

<section
  class="pt-16 md:pt-20 lg:pt-[100px] xl:pt-[120px]"
>
  <div class="container">
    <div class="text-center">

      <div class="rv-badge reveal-me mb-3">
        <span class="rv-badge-text">Why Uxory?</span>
      </div>

      <h3 class="text-appear mb-6">SMM, Reimagined for Real Impact</h3>
      <p
        class="reveal-text-2 text-2xl lg:text-3xl text-secondary/90 dark:text-backgroundBody/70 font-normal lg:leading-[1.2] lg:tracking-[0.72px]">
        Our team brings together top talent from the United States and beyond. From influencer-led campaigns to professional design and production, we do more than just post—we build community, spark conversations, and deliver results you can see.
      </p>

      <p class="mt-3 max-w-3xl mx-auto reveal-me">
      Every strategy is tailored by real people who know your audience, love your brand, and bring new energy to your story.
      </p>

      <ul class="justify-self-center max-md:w-full mt-7 md:mt-14 reveal-me">
        <li class="block md:inline-block w-full mx-auto md:w-auto text-center">
          <a
            href="/team.php"
            class="rv-button rv-button-white block md:inline-block"
          >
            <div class="rv-button-top">
              <span>About Us</span>
            </div>
            <div class="rv-button-bottom">
              <span>About Us</span>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- ================================
Solutions Section
================================ -->

<section
  class="pt-10 md:pt-12 lg:pt-16 xl:pt-20 mt-14 md:mt-16 lg:mt-[88px] xl:pt-[100px] pb-10 md:pb-12 lg:pb-16 xl:pb-20 overflow-hidden bg-[#CBE8DF] service-section"
  aria-labelledby="solutions-heading"
>
  <!--  Section Header -->
  <div class="container">
    <div class="grid grid-cols-12 gap-y-3 md:gap-x-10 items-start">
      <div class="col-span-12 lg:col-span-7">
        <h3
          id="solutions-heading"
          class="text-appear-2 text-secondary dark:text-secondary text-left"
        >
          Social media
          <span class="font-instrument italic">solutions for</span>
          <span class="font-instrument italic">every brand.</span>
        </h3>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:text-right">
        <p class="text-appear text-secondary/70 dark:text-secondary/70">
          We’ve helped countless brands boost their presence and connect with their audience.

        </p>
        <div class="mt-4 md:mt-10 reveal-me">
          <a
            href="/contact.php"
            class="rv-button rv-button-white block md:inline-block w-full mx-auto md:w-auto text-center"
            aria-label="View our detailed service offerings"
          >
            <div class="rv-button-top">
              <span>Talk to Sales</span>
            </div>
            <div class="rv-button-bottom">
              <span>Talk to Sales</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Solutions Content Cards -->
  <div
    class="mt-10 flex flex-col md:flex-row md:flex-nowrap md:w-fit gap-6 md:pl-[20%] max-md:px-5 md:pr-10 service-wrapper overflow-x-hidden reveal-me"
    aria-label="Our service offerings"
  >
    <!-- CARD 1 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[370px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          01
        </p>
      </div>
      <div class=" space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[200px] dark:text-white max-md:text-2xl"
        >
          Content creation
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          We craft scroll-stopping posts, reels, and stories that showcase your brand and spark real engagement.
        </p>
      </div>
    </div>

    <!-- CARD 2 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[370px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          02
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[200px] dark:text-white max-md:text-2xl"
        >
          Influencer marketing
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          We connect your brand with the right influencers—building trust, expanding your reach, and making your brand part of the conversation.
        </p>
      </div>
    </div>

    <!-- CARD 3 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[370px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          03
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[200px] dark:text-white max-md:text-2xl"
        >
          Paid social ads
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          We design targeted ads on every platform, driving more clicks, conversions, and growth for your business.
        </p>
      </div>
    </div>

    <!-- CARD 4 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[370px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          04
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[200px] dark:text-white max-md:text-2xl"
        >
          Community management
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          We engage with your followers, answer questions, and build an active community that loves your brand.
        </p>
      </div>
    </div>

    <!-- CARD 5 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[370px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          05
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[200px] dark:text-white max-md:text-2xl"
        >
          Analytics & Reporting
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          We track every result—delivering clear insights so you always know what’s working and where you’re winning.
        </p>
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

<!-- =======================
 Samples Social Media posts 
 ====================== -->
 <!-- <section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[100px] overflow-hidden"
>
  <div class="marquee-container reveal-me">
    <div class="flex gap-3 items-end first:mr-3">
      <figure class="relative group min-w-56 md:min-w-[362px]">
        <img src="/images/home-4/marquee-01.png" alt="user" class="w-full" />

        <a
          href="https://www.instagram.com/staticmania_/"
          target="_blank"
          class="absolute cursor-pointer opacity-0 group-hover:opacity-100 transition-all duration-[400ms] ease-in-out top-[55%] left-1/3 group-hover:top-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 group-hover:-translate-y-1/2"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="48"
              height="48"
              viewBox="0 0 48 48"
              fill="none"
            >
              <rect width="48" height="48" fill="#151515" />
              <path
                d="M24 31.5C28.1421 31.5 31.5 28.1421 31.5 24C31.5 19.8579 28.1421 16.5 24 16.5C19.8579 16.5 16.5 19.8579 16.5 24C16.5 28.1421 19.8579 31.5 24 31.5Z"
                stroke="#EDF0F5"
                stroke-miterlimit="10"
              />
              <path
                d="M32.25 6.75H15.75C10.7794 6.75 6.75 10.7794 6.75 15.75V32.25C6.75 37.2206 10.7794 41.25 15.75 41.25H32.25C37.2206 41.25 41.25 37.2206 41.25 32.25V15.75C41.25 10.7794 37.2206 6.75 32.25 6.75Z"
                stroke="#EDF0F5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M33.75 16.5C34.9926 16.5 36 15.4926 36 14.25C36 13.0074 34.9926 12 33.75 12C32.5074 12 31.5 13.0074 31.5 14.25C31.5 15.4926 32.5074 16.5 33.75 16.5Z"
                fill="#EDF0F5"
              />
            </svg>
          </span>
        </a>
      </figure>
      <figure class="relative group min-w-56 md:min-w-[362px]">
        <img src="/images/home-4/marquee-02.png" alt="user" class="w-full" />
        <a
          href="https://www.instagram.com/staticmania_/"
          target="_blank"
          class="absolute cursor-pointer opacity-0 group-hover:opacity-100 transition-all duration-[400ms] ease-in-out top-[55%] left-1/3 group-hover:top-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 group-hover:-translate-y-1/2"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="48"
              height="48"
              viewBox="0 0 48 48"
              fill="none"
            >
              <rect width="48" height="48" fill="#151515" />
              <path
                d="M24 31.5C28.1421 31.5 31.5 28.1421 31.5 24C31.5 19.8579 28.1421 16.5 24 16.5C19.8579 16.5 16.5 19.8579 16.5 24C16.5 28.1421 19.8579 31.5 24 31.5Z"
                stroke="#EDF0F5"
                stroke-miterlimit="10"
              />
              <path
                d="M32.25 6.75H15.75C10.7794 6.75 6.75 10.7794 6.75 15.75V32.25C6.75 37.2206 10.7794 41.25 15.75 41.25H32.25C37.2206 41.25 41.25 37.2206 41.25 32.25V15.75C41.25 10.7794 37.2206 6.75 32.25 6.75Z"
                stroke="#EDF0F5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M33.75 16.5C34.9926 16.5 36 15.4926 36 14.25C36 13.0074 34.9926 12 33.75 12C32.5074 12 31.5 13.0074 31.5 14.25C31.5 15.4926 32.5074 16.5 33.75 16.5Z"
                fill="#EDF0F5"
              />
            </svg>
          </span>
        </a>
      </figure>
      <figure class="relative group min-w-56 md:min-w-[362px]">
        <img src="/images/home-4/marquee-03.png" alt="user 3" class="w-full" />
        <a
          href="https://www.instagram.com/staticmania_/"
          target="_blank"
          class="absolute cursor-pointer opacity-0 group-hover:opacity-100 transition-all duration-[400ms] ease-in-out top-[55%] left-1/3 group-hover:top-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 group-hover:-translate-y-1/2"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="48"
              height="48"
              viewBox="0 0 48 48"
              fill="none"
            >
              <rect width="48" height="48" fill="#151515" />
              <path
                d="M24 31.5C28.1421 31.5 31.5 28.1421 31.5 24C31.5 19.8579 28.1421 16.5 24 16.5C19.8579 16.5 16.5 19.8579 16.5 24C16.5 28.1421 19.8579 31.5 24 31.5Z"
                stroke="#EDF0F5"
                stroke-miterlimit="10"
              />
              <path
                d="M32.25 6.75H15.75C10.7794 6.75 6.75 10.7794 6.75 15.75V32.25C6.75 37.2206 10.7794 41.25 15.75 41.25H32.25C37.2206 41.25 41.25 37.2206 41.25 32.25V15.75C41.25 10.7794 37.2206 6.75 32.25 6.75Z"
                stroke="#EDF0F5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M33.75 16.5C34.9926 16.5 36 15.4926 36 14.25C36 13.0074 34.9926 12 33.75 12C32.5074 12 31.5 13.0074 31.5 14.25C31.5 15.4926 32.5074 16.5 33.75 16.5Z"
                fill="#EDF0F5"
              />
            </svg>
          </span>
        </a>
      </figure>
      <figure class="relative group min-w-56 md:min-w-[362px]">
        <img src="/images/home-4/marquee-04.png" alt="user 4" class="w-full" />
        <a
          href="https://www.instagram.com/staticmania_/"
          target="_blank"
          class="absolute cursor-pointer opacity-0 group-hover:opacity-100 transition-all duration-[400ms] ease-in-out top-[55%] left-1/3 group-hover:top-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 group-hover:-translate-y-1/2"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="48"
              height="48"
              viewBox="0 0 48 48"
              fill="none"
            >
              <rect width="48" height="48" fill="#151515" />
              <path
                d="M24 31.5C28.1421 31.5 31.5 28.1421 31.5 24C31.5 19.8579 28.1421 16.5 24 16.5C19.8579 16.5 16.5 19.8579 16.5 24C16.5 28.1421 19.8579 31.5 24 31.5Z"
                stroke="#EDF0F5"
                stroke-miterlimit="10"
              />
              <path
                d="M32.25 6.75H15.75C10.7794 6.75 6.75 10.7794 6.75 15.75V32.25C6.75 37.2206 10.7794 41.25 15.75 41.25H32.25C37.2206 41.25 41.25 37.2206 41.25 32.25V15.75C41.25 10.7794 37.2206 6.75 32.25 6.75Z"
                stroke="#EDF0F5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M33.75 16.5C34.9926 16.5 36 15.4926 36 14.25C36 13.0074 34.9926 12 33.75 12C32.5074 12 31.5 13.0074 31.5 14.25C31.5 15.4926 32.5074 16.5 33.75 16.5Z"
                fill="#EDF0F5"
              />
            </svg>
          </span>
        </a>
      </figure>
    </div>
  </div>
</section> -->

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