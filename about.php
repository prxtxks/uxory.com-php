<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>About Uxory | Our Story</title>
  <meta name="description" content="Learn more about Uxory — a design-driven digital solutions agency helping businesses grow through websites, branding, SEO, and marketing. Meet our team and discover our vision." />

  <meta charset="utf-8" />

  <!-- Mobile Responsive Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex, Nofollow, Noimageindex">

<!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/about/" />

  <!-- Open Graph -->
  <meta property="og:title" content="About Uxory | Our Story" />
  <meta property="og:description" content="Discover the story behind Uxory and how we help brands scale through exceptional design and technology." />
  <meta property="og:image" content="https://www.uxory.com/images/social-preview.png" />
  <meta property="og:url" content="https://uxory.com/about/" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="About Uxory | Our Story" />
  <meta name="twitter:description" content="Learn how Uxory blends creativity and strategy to deliver digital success stories." />
  <meta name="twitter:image" content="https://www.uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Uxory",
      "url": "https://uxory.com",
      "logo": "https://uxory.com/images/logo.png",
      "description": "Uxory is a design-first digital agency helping businesses succeed through web design, SEO, branding, and automation.",
      "sameAs": [
        "https://www.instagram.com/uxory",
        "https://www.linkedin.com/company/uxory",
      ],
      "foundingDate": "2025",
      "founders": [
        {
          "@type": "Person",
          "name": "Pratik Chaudhari"
        }
      ]
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
$currentPage = 'about';
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

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
<!--=====================================
   Page Header V2
======================================-->
<section class="pt-28 md:pt-48 lg:pt-[200px] pb-14 md:pb-20 lg:pb-[100px]">
  <div class="container reveal-me">
    <!-- Top Content Row -->
    <div
      class="flex flex-col sm:flex-row gap-x-20 gap-y-5 md:gap-y-10 items-center justify-end"
    >
      <!-- "About" Title -->
      <h1
        class="text-5xl md:text-6xl lg:text-9xl xl:text-[156px] font-instrument italic font-normal xl:leading-[1.1]"
      >
        About
      </h1>

      <!-- Description Text -->
      <p class="max-w-[470px]">
        We are dedicated to transforming ideas impactful solutions. With a focus
        on innovation excellence we partner with businesses around the globe to
        help them navigate complex challenges and growth.
      </p>
    </div>

    <!-- Large "Company" Text -->
    <h2
      class="text-6xl sm:text-7xl md:text-8xl lg:text-[156px] xl:text-[236px] xl:leading-[1.1] mb-5"
    >
      Uxory
    </h2>
  </div>
</section>


<!--=====================================
  Promo Video Section
======================================-->
<!-- <section class="video-section reveal-me relative overflow-hidden">

  <div class="w-full h-fit video-wrapper scale-50 origin-top">
    
    <video class="w-full h-full" autoplay muted loop>
      <source src="images/promo.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
  </div>
</section> -->


<!--=========================
   About Section Area
==========================-->
<section class="pt-10 sm:pt-16 md:pt-[100px] relative overflow-hidden">
  <div class="container">
    <!-- Section Header -->
    <div>
      <h3
        class="reveal-text-2 text-3xl lg:text-5xl lg:leading-[1.5] text-secondary dark:text-backgroundBody mb-20"
      >
        Uxory Agency: Shaping the Future of Digital Innovation. We are dedicated
        to empowering blockchain pioneers and transforming the realm of digital
        ownership for today and beyond.
      </h3>
    </div>
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
    <div class="pb-20 lg:pb-40 pt-20">
      <!-- Marquee Wrapper -->
      <div class="relative">
        <!-- Infinite Scroll Container -->
        <div
          class="z-50 flex gap-5 w-fit flex-nowrap whitespace-nowrap will-change-transform marquee-inner reveal-me"
        >
          <figure
            class="marquee-part flex items-center justify-center size-[370px] z-50 flex-shrink-0"
          >
            <img src="images/marquee-img/1.png" alt="images" />
          </figure>
          <figure
            class="marquee-part flex items-center justify-center z-50 size-[370px] flex-shrink-0"
          >
            <img src="images/marquee-img/2.png" alt="images" />
          </figure>
          <figure
            class="marquee-part flex items-center justify-center z-50 size-[370px] flex-shrink-0"
          >
            <img src="images/marquee-img/3.png" alt="images" />
          </figure>
          <figure
            class="marquee-part flex items-center justify-center z-50 size-[370px] flex-shrink-0"
          >
            <img src="images/marquee-img/4.png" alt="images" />
          </figure>
          <figure
            class="marquee-part flex items-center justify-center z-50 size-[370px] flex-shrink-0"
          >
            <img src="images/marquee-img/5.png" alt="images" />
          </figure>
          <figure
            class="marquee-part flex items-center justify-center z-50 size-[370px] flex-shrink-0"
          >
            <img src="images/marquee-img/6.png" alt="images" />
          </figure>
          <figure
            class="marquee-part flex items-center justify-center z-50 size-[370px] flex-shrink-0"
          >
            <img src="images/marquee-img/7.png" alt="images" />
          </figure>
        </div>
      </div>
    </div>
  </div>
</section>


<!--=====================================
   Services Section
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div
    class="absolute scale-y-[3.8] sm:scale-y-[3.3] md:scale-y-[3.2] lg:scale-y-[2.4] xl:scale-y-[1.2] scale-x-[2.7] xl:scale-x-[2.4] left-1/2 top-[47%] lg:top-[45%] -translate-y-[45%] -translate-x-1/2"
  >
    <!-- <img src="images/services-gradient-bg-2.png" alt="gradient-bg" /> -->
  </div>
  <div class="container">
    <!-- Section Header -->
    <div
      class="flex flex-col md:flex-row gap-y-2 gap-x-10 justify-center lg:justify-between items-start mb-10 md:mb-20"
    >
      <div class="flex-1">
        <h2 class="text-appear max-lg:leading-[1.33]">
          <span class="font-instrument lg:text-[65px] italic">Our</span>

          services
        </h2>
      </div>
      <div class="md:self-end max-md:w-full flex-1">
        <p class="text-appear md:justify-self-end max-w-lg md:text-right">
          We offer everything you need to build, manage, and grow your digital presence—effortlessly.
        </p>

        <ul class="justify-self-end max-md:w-full mt-5 md:mt-10 reveal-me">
          <li
            class="block md:inline-block w-full mx-auto md:w-auto text-center"
          >
            <a
              href="/services.php"
              class="rv-button rv-button-white block md:inline-block"
            >
              <div class="rv-button-top">
                <span>Explore Our Services</span>
              </div>
              <div class="rv-button-bottom">
                <span>Explore Our Services</span>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>

<!-- Accordion Container -->
<div
    class="max-w-[1170px] w-full mx-auto [&>*:not(:last-child)]:mb-6 reveal-me"
  >

    <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]"> 
        <a href="./website-dev.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
            <figure class="flex-none w-[130px] h-[130px]">
              <img
                src="images/services-icons/web-dev-services-icon.webp"
                alt="Website Development"
                class="w-full h-full object-contain"
              />
            </figure>
            <div class="flex-1">
              <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
                Website Development
              </h3>
            </div>
            <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

      <a href="./coming-soon.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="images/services-icons/new.webp"
            alt="Web-Application-Development"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            Web & Mobile App Development
          </h3>
        </div>
        
          <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

      <a href="./coming-soon.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="images/services-icons/new.png"
            alt="SEO"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            E-commerce Solutions
          </h3>
        </div>
        <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

    </div>

    <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">

      <a href="./seo.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="images/services-icons/seo.webp"
            alt="SEO"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            Search Engine Optimization
          </h3>
        </div>
        <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

      <a href="/email-marketing-and-automation.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="/images/services-icons/Email-services-icon.webp"
            alt="Email"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            Email & CRM Automation
          </h3>
        </div>
        <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

      <a href="./coming-soon.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="images/services-icons/adwords-services-icon.webp"
            alt="Paid Ads"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            Paid Advertising (PPC & Social)
          </h3>
        </div>
        <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

      
    
    </div>

    <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">

      <a href="./social-media.php" class="fab-member relative max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 overflow-visible transitionTimingFunction">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="images/services-icons/verified.webp"
            alt="Social Media Marketing"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            Social Media Marketing
          </h3>
        </div>
        <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>
      
      <a href="./branding.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="images/services-icons/branding-services-icon.webp"
            alt="Branding"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            Branding & Identity Design
          </h3>
        </div>
        <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

      <a href="./custom-package.php" class="fab-member max-w-[370px] w-full h-full border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
        <figure class="flex-none w-[130px] h-[130px]">
          <img
            src="images/services-icons/custom-packages-services-icon.webp"
            alt="Custom Packages"
            class="w-full h-full object-contain"
          />
        </figure>
        <div class="flex-1">
          <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
            Custom Packages
          </h3>
        </div>
        <span class="absolute top-3 right-3">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 text-gray-500 dark:text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7 17L17 7m0 0H7m10 0v10"
                />
            </svg>
        </span>
      </a>

    </div>

  </div>

</section>


<!--=====================================
   Team Members Grid Section
======================================-->


 
<!--=====================================
   Clients Section
======================================-->
<section
  class="bg-dark py-20 lg:py-[120px] dark:py-0 dark:lg:py-0 mt-14 md:mt-16 lg:mt-[88px] xl:mt-[100px] mb-14 md:mb-16 lg:mb-[88px] xl:mb-[100px] relative overflow-hidden"
>
  <div class="container">
    <div
      class="flex flex-col md:flex-row gap-x-10 gap-y-3 justify-center md:justify-between items-start md:items-end mb-10 md:mb-20"
    >
      <h2 class="text-appear text-backgroundBody block md:hidden flex-1">
        <span class="font-instrument italic">Have</span>

        Trust in us
      </h2>
      <h2 class="text-appear text-backgroundBody hidden md:block flex-1">
        <span class="font-instrument lg:text-[70px] italic">Have</span>
        <br />
        Trust in us
      </h2>

      <div class="md:self-end md:justify-self-end flex-1">
        <p
          class="text-appear max-w-lg text-backgroundBody/70 md:place-self-end md:text-right"
        >
          Our agency is your gateway to discovering extraordinary artworks that
          resonate with your aesthetic sensibilities.
        </p>
      </div>
    </div>
  </div>

  <div class="container pt-16 lg:pt-20 pb-6 lg:pb-10 reveal-me">
    <div class="user-swiper swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="bg-dark border border-dark p-10 flex gap-3">
            <div class="hidden md:block flex-grow-0">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="60"
                  height="60"
                  viewBox="0 0 60 60"
                  fill="none"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M23.8286 6V16.9714C21.3264 16.9714 16.9186 17.1793 16.9184 27.1958V32.4H27.6V54H6V32.4V27.1958C6 19.3208 8.03795 13.4729 12.4905 9.81413C15.5705 7.28323 19.2195 6 23.8286 6ZM50.229 6V16.9714C47.7268 16.9714 43.319 17.1793 43.3187 27.1958V32.4H54.0004V54H32.4004V32.4V27.1958C32.4004 19.3208 34.4383 13.4729 38.8909 9.81413C41.9709 7.28323 45.6199 6 50.229 6Z"
                    fill="white"
                    fill-opacity="0.1"
                  />
                </svg>
              </span>
            </div>
            <div class="flex-1">
              <p
                class="text-base md:text-xl italic md:leading-[1.5] mb-[30px] text-backgroundBody/70"
              >
              The skeleton plan of a website can be broken down into three components: design, usability, and performance. We balance all three to build a site that converts.
              </p>
              <h3
                class="text-xl md:text-[30px] md:leading-9 mb-10 text-backgroundBody"
              >
              Uxory turned our outdated website into a modern <br />
              responsive platform. The speed and design improvements instantly boosted our user engagement.
              </h3>
              <!-- <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                  <img src="images/avatar/review-5.png" alt="Avatar Img" />
                  <div>
                    <h4
                      class="text-lg md:text-2xl md:leading-[1.2] text-backgroundBody"
                    >
                      Kathryn Murphy
                    </h4>
                    <p
                      class="text-sm leading-5 font-light text-backgroundBody/70"
                    >
                      CEO at Vercel
                    </p>
                  </div>
                </div>
                <div class="self-end max-xs:hidden">
                  <span>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="60"
                      height="60"
                      viewBox="0 0 60 60"
                      fill="none"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M36.1714 54L36.1714 43.0286C38.6736 43.0286 43.0814 42.8207 43.0816 32.8042L43.0816 27.6L32.4 27.6L32.4 6L54 6L54 27.6L54 32.8042C54 40.6792 51.9621 46.5271 47.5095 50.1859C44.4295 52.7168 40.7805 54 36.1714 54ZM9.77104 54L9.77104 43.0286C12.2732 43.0286 16.681 42.8207 16.6812 32.8042L16.6812 27.6L5.99961 27.6L5.99961 6L27.5996 6L27.5996 27.6L27.5996 32.8042C27.5996 40.6792 25.5617 46.5271 21.1091 50.1859C18.0291 52.7168 14.3801 54 9.77104 54Z"
                        fill="white"
                        fill-opacity="0.1"
                      />
                    </svg>
                  </span>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="bg-dark border border-dark p-10 flex gap-3">
            <div class="hidden md:block flex-grow-0">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="60"
                  height="60"
                  viewBox="0 0 60 60"
                  fill="none"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M23.8286 6V16.9714C21.3264 16.9714 16.9186 17.1793 16.9184 27.1958V32.4H27.6V54H6V32.4V27.1958C6 19.3208 8.03795 13.4729 12.4905 9.81413C15.5705 7.28323 19.2195 6 23.8286 6ZM50.229 6V16.9714C47.7268 16.9714 43.319 17.1793 43.3187 27.1958V32.4H54.0004V54H32.4004V32.4V27.1958C32.4004 19.3208 34.4383 13.4729 38.8909 9.81413C41.9709 7.28323 45.6199 6 50.229 6Z"
                    fill="white"
                    fill-opacity="0.1"
                  />
                </svg>
              </span>
            </div>
            <div class="flex-1">
              <p
                class="text-base md:text-xl italic md:leading-[1.5] mb-[30px] text-backgroundBody/70"
              >
              We don’t just build apps—we craft experiences. From concept to launch, your mobile presence is in expert hands.
              </p>
              <h3
                class="text-xl md:text-[30px] md:leading-9 mb-10 text-backgroundBody"
              >
              The mobile app they built for us is sleek, fast, <br />
              and totally user-friendly. We’ve had great feedback from our customers already!
              </h3>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="bg-dark border border-dark p-10 flex gap-3">
            <div class="hidden md:block flex-grow-0">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="60"
                  height="60"
                  viewBox="0 0 60 60"
                  fill="none"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M23.8286 6V16.9714C21.3264 16.9714 16.9186 17.1793 16.9184 27.1958V32.4H27.6V54H6V32.4V27.1958C6 19.3208 8.03795 13.4729 12.4905 9.81413C15.5705 7.28323 19.2195 6 23.8286 6ZM50.229 6V16.9714C47.7268 16.9714 43.319 17.1793 43.3187 27.1958V32.4H54.0004V54H32.4004V32.4V27.1958C32.4004 19.3208 34.4383 13.4729 38.8909 9.81413C41.9709 7.28323 45.6199 6 50.229 6Z"
                    fill="white"
                    fill-opacity="0.1"
                  />
                </svg>
              </span>
            </div>
            <div class="flex-1">
              <p
                class="text-base md:text-xl italic md:leading-[1.5] mb-[30px] text-backgroundBody/70"
              >
              Scalable architecture, intuitive UI, and seamless integrations—that’s our recipe for a high-performing web app.
              </p>
              <h3
                class="text-xl md:text-[30px] md:leading-9 mb-10 text-backgroundBody"
              >
                Our internal tool went from clunky to smooth, <br />
                all thanks to Uxory. The team understood our goals and delivered beyond expectations.
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

 
<!--=====================================
   FAQ Section
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div class="container">
    <!-- Section Heading and Description -->
    <div
      class="flex flex-col md:flex-row gap-x-10 gap-y-5 justify-center lg:justify-between max-md:items-start md:items-end mb-10 lg:mb-20"
    >
      <!-- Section Heading -->
      <div class="flex-1">
        <h2 class="text-appear block md:hidden">
          <span class="font-instrument italic">People</span>
          Asked Us
        </h2>
        <h2 class="text-appear md:block hidden">
          <span class="font-instrument lg:text-[70px] italic">People</span>
          <br />
          Asked Us
        </h2>
      </div>
      <!-- Section Description -->
      <div class="md:self-end md:justify-self-end flex-1">
        <p class="text-appear max-w-lg md:text-right">
          When detailing testimonials, include key elements that provide context
          and authenticity.
        </p>
      </div>
    </div>

    <!-- FAQ Accordion Items -->
    <div
      class="w-full mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] items-start"
    >
      <div class="space-y-[30px]">
        <!-- FAQ Item 1 -->
        <div class="reveal-me">
          <div
            class="accordion-itemV4 overflow-hidden relative w-full lg:max-w-[370px] bg-backgroundBody dark:bg-dark border data-[active=true]:border-black data-[active=false]:border-black/10 dark:data-[active=false]:border-white/10 dark:data-[active=true]:border-white/10 duration-300 px-4 md:px-[30px] pt-4 md:pt-[30px] pb-8 md:pb-[60px] space-y-6"
          >
            <div class="accordion-headerV4 cursor-pointer">
              <h3
                class="text-[23px] md:text-[25px] tracking-normal font-normal md:leading-[25.2px]"
              >
              How do I get started with Uxory?
              </h3>
              <div class="accordion-header-iconV4 dark:border-dark"></div>
            </div>
            <p class="accordion-bodyV4 duration-300 h-0 overflow-hidden">
              To begin, fill out our Contact Us or Get a Quote form. Our sales team will reach out to understand your initial requirements and assign a dedicated counselor who will connect with you for a deeper discussion about your project goals.
            </p>
          </div>
        </div>
        <!-- FAQ Item 2 -->
        <div class="reveal-me">
          <div
            class="accordion-itemV4 overflow-hidden relative w-full lg:max-w-[370px] bg-backgroundBody dark:bg-dark border data-[active=true]:border-black data-[active=false]:border-black/10 dark:data-[active=false]:border-white/10 dark:data-[active=true]:border-white/10 duration-300 px-4 md:px-[30px] pt-4 md:pt-[30px] pb-8 md:pb-[60px] space-y-6"
          >
            <div class="accordion-headerV4 cursor-pointer">
              <h3
                class="text-[23px] md:text-[25px] tracking-normal font-normal md:leading-[25.2px]"
              >
              What happens after I receive a quote?
              </h3>
              <div class="accordion-header-iconV4 dark:border-dark"></div>
            </div>
            <p class="accordion-bodyV4 duration-300 h-0 overflow-hidden">
              You’ll get a custom quote within 48 hours after your consultation. Once you decide to move forward, we’ll assign an analyst who will work closely with you throughout the entire project—ensuring smooth communication with developers, project clarity, and full support even after launch.
            </p>
          </div>
        </div>
      </div>

      <div class="space-y-[30px]">
        <!-- FAQ Item 3 -->
        <div class="reveal-me">
          <div
            class="accordion-itemV4 overflow-hidden relative w-full lg:max-w-[370px] bg-backgroundBody dark:bg-dark border data-[active=true]:border-black data-[active=false]:border-black/10 dark:data-[active=false]:border-white/10 dark:data-[active=true]:border-white/10 duration-300 px-4 md:px-[30px] pt-4 md:pt-[30px] pb-8 md:pb-[60px] space-y-6"
          >
            <div class="accordion-headerV4 cursor-pointer">
              <h3
                class="text-[23px] md:text-[25px] tracking-normal font-normal md:leading-[25.2px]"
              >
              Do you work with clients outside the United States?
              </h3>
              <div class="accordion-header-iconV4 dark:border-dark"></div>
            </div>
            <p class="accordion-bodyV4 duration-300 h-0 overflow-hidden">
              Yes! We proudly work with clients from around the world and have streamlined processes in place for smooth remote collaboration, no matter the time zone.
            </p>
          </div>
        </div>
        <!-- FAQ Item 4 -->
        <div class="reveal-me">
          <div
            class="accordion-itemV4 overflow-hidden relative w-full lg:max-w-[370px] bg-backgroundBody dark:bg-dark border data-[active=true]:border-black data-[active=false]:border-black/10 dark:data-[active=false]:border-white/10 dark:data-[active=true]:border-white/10 duration-300 px-4 md:px-[30px] pt-4 md:pt-[30px] pb-8 md:pb-[60px] space-y-6"
          >
            <div class="accordion-headerV4 cursor-pointer">
              <h3
                class="text-[23px] md:text-[25px] tracking-normal font-normal md:leading-[25.2px]"
              >
              Do you work with clients from India?
              </h3>
              <div class="accordion-header-iconV4 dark:border-dark"></div>
            </div>
            <p class="accordion-bodyV4 duration-300 h-0 overflow-hidden">
              Yes, we do! In fact, we offer special pricing tailored to match Indian market standards—ensuring high-quality work at competitive local rates.
            </p>
          </div>
        </div>
      </div>

      <div class="space-y-[30px]">
        <!-- FAQ Item 5 -->
        <div class="reveal-me">
          <div
            class="accordion-itemV4 overflow-hidden relative w-full lg:max-w-[370px] bg-backgroundBody dark:bg-dark border data-[active=true]:border-black data-[active=false]:border-black/10 dark:data-[active=false]:border-white/10 dark:data-[active=true]:border-white/10 duration-300 px-4 md:px-[30px] pt-4 md:pt-[30px] pb-8 md:pb-[60px] space-y-6"
          >
            <div class="accordion-headerV4 cursor-pointer">
              <h3
                class="text-[23px] md:text-[25px] tracking-normal font-normal md:leading-[25.2px]"
              >
              How much do your services cost?
              </h3>
              <div class="accordion-header-iconV4 dark:border-dark"></div>
            </div>
            <p class="accordion-bodyV4 duration-300 h-0 overflow-hidden">
              Our pricing varies depending on project scope. After a discovery call and requirement assessment, we’ll send you a custom quote with no hidden charges.
            </p>
          </div>
        </div>
        <!-- FAQ Item 6 -->
        <div class="reveal-me">
          <div
            class="accordion-itemV4 overflow-hidden relative w-full lg:max-w-[370px] bg-backgroundBody dark:bg-dark border data-[active=true]:border-black data-[active=false]:border-black/10 dark:data-[active=false]:border-white/10 dark:data-[active=true]:border-white/10 duration-300 px-4 md:px-[30px] pt-4 md:pt-[30px] pb-8 md:pb-[60px] space-y-6"
          >
            <div class="accordion-headerV4 cursor-pointer">
              <h3
                class="text-[23px] md:text-[25px] tracking-normal font-normal md:leading-[25.2px]"
              >
              Do you provide post-launch support?
              </h3>
              <div class="accordion-header-iconV4 dark:border-dark"></div>
            </div>
            <p class="accordion-bodyV4 duration-300 h-0 overflow-hidden">
              Yes, we offer ongoing maintenance, updates, and technical support packages to keep your product running smoothly after launch.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!--===============================
    Inspiring CTA Section
===============================-->
<section
  class="bg-[#fffbfb] dark:bg-[#161616] mt-14 md:mt-16 lg:mt-[88px] xl:mt-[100px] pt-16 lg:pt-[100px] pb-20 md:pb-36"
>
  <!-- Container for the CTA section -->
  <div
    class="container flex flex-col md:flex-row justify-center max-md:items-center gap-y-10 sm:justify-between"
  >
    <!-- CTA Heading -->
    <h2
      class="text-[46px] max-lg:leading-[1.33] lg:text-[96px] font-normal leading-[1.1] lg:tracking-[-2.88px] reveal-me"
    >
      <span class="font-instrument lg:text-[100px] italic">New</span>
      <br class="hidden md:block" />
      Project?
    </h2>

    <!-- CTA Button -->
    <a href="./calendly.php">
      <div
        class="bg-secondary dark:bg-primary p-5 w-44 h-44 lg:w-[230px] lg:h-[230px] group reveal-me"
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