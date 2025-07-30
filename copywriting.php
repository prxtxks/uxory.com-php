<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>UX Copywriting Services | Strategic Content that Converts | Uxory</title>
  <meta name="description" content="Engage your audience with conversion-driven copywriting. Uxory offers tailored content strategies that boost your brand voice and business goals." />

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="robots" content="noindex, Nofollow, Noimageindex">

<!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/copywriting.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="UX Copywriting Services | Uxory" />
  <meta property="og:description" content="Engage your audience with strategic copywriting and brand voice that drives action." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/copywriting.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="UX Copywriting Services | Uxory" />
  <meta name="twitter:description" content="Conversion-focused copy for websites, landing pages, and digital campaigns." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "serviceType": "UX Copywriting",
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
      "description": "Professional UX copywriting services tailored for websites, landing pages, and digital platforms to drive engagement and conversion."
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
$currentPage = 'copywriting';
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
  class="pt-[137px] md:pt-[180px] lg:pt-[150px] pb-14 md:pb-[90px] lg:pb-[110px] relative overflow-hidden"
>
  <!-- Gradient Background Effect -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-fw-full top-1/2 -translate-y-1/2 -z-10 blur-[90px] scale-75"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute top-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Hero Content -->
  <div class="container reveal-me">
    <!-- Hero Heading -->
    <h1
      class="mt-5 sm:mt-10 xl:leading-[1.1] border-y border-secondary/40 dark:border-backgroundBody/40 py-6 lg:py-10 mb-6 md:mb-10"
    >
      The right words. <i class="font-instrument">The right strategy.</i> The
      right results.
    </h1>

    <p class="md:max-w-[670px]">
      At Uxory, we write with purpose: to inform, engage, convert, and build lasting brand trust.
      Whether it’s a landing page, blog, social post, or email — your brand’s voice deserves clarity, consistency, and power.
    </p>
    <!-- CTA Buttons -->
    <ul class="flex justify-start list-none mt-8 md:mt-14">
      <!-- Primary CTA Button -->
      <div
          class="flex w-full md:w-auto p-4 group bg-primary bg-opacity-30 gap-4 justify-between items-center backdrop-blur-2xl max-w-[360px] md:max-w-[360px]"
        >
          <div>
            <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
              Schedule a Free Meeting
            </h6>
            <p class="text-sm text-black dark:text-white">Few spots left this month</p>
          </div>
          <a href="calendly.php">
            <figure
              class="bg-primary w-[55px] h-[55px] cursor-pointer relative overflow-hidden"
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
    </ul>
  </div>
</section>

<!-- ================================
About-v13 Section 
================================ -->

<section
  class="pt-28 md:pt-32 lg:pt-44 xl:pt-[200px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <!-- Content -->

  <div class="container">
    <div class="text-center">
      
      <h2 class="text-appear mb-6">Impactful Content. Tailored to Your Brand.</h2>
      <h5 class="reveal-text reveal-me">At Uxory, we specialize in strategic content writing that brings clarity, connection, and conversion. Our team crafts compelling copy that reflects your brand’s voice and drives action — whether it’s for websites, blogs, social media, or email campaigns.</h5>

      <p class="mt-3 max-w-3xl mx-auto reveal-me">With a deep understanding of storytelling, SEO, and digital behavior, we create content that not only informs but engages. Every word is written with purpose — to help you stand out, rank higher, and speak directly to the people who matter.</p>

      <ul class="justify-self-center max-md:w-full mt-7 md:mt-14 reveal-me">
        <li class="block md:inline-block w-full mx-auto md:w-auto text-center">
          <a
            href="./team.php"
            class="rv-button rv-button-white block md:inline-block"
          >
            <div class="rv-button-top">
              <span>Meet Our Experts</span>
            </div>
            <div class="rv-button-bottom">
              <span>Meet Our Experts</span>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- SERVICES -->

<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div
    class="absolute scale-y-[3.8] sm:scale-y-[3.3] md:scale-y-[3.2] lg:scale-y-[2.4] xl:scale-y-[1.2] scale-x-[2.7] xl:scale-x-[2.4] left-1/2 top-[47%] lg:top-[45%] -translate-y-[45%] -translate-x-1/2"
  >
    <img src="images/services-gradient-bg-2.png" alt="gradient-bg" />
  </div>
  <div class="container">
    <!-- Section Header -->
    <div
      class="flex flex-col md:flex-row gap-y-2 gap-x-10 justify-center lg:justify-between items-start mb-10 md:mb-20"
    >
      <div class="flex-1">
        <h2 class="text-appear max-lg:leading-[1.33]">
          <span class="font-instrument lg:text-[65px] italic">Content Writing</span>

          Services
        </h2>
      </div>
      <div class="md:self-end max-md:w-full flex-1">
        <p class="text-appear md:justify-self-end max-w-lg md:text-right">
          For a comprehensive services section, outline your offerings in a
          clear and organized manner. Here’s a general template you can use.
        </p>

        <ul class="justify-self-end max-md:w-full mt-5 md:mt-10 reveal-me">
          <li
            class="block md:inline-block w-full mx-auto md:w-auto text-center"
          >
            <a
              href="./services.php"
              class="rv-button rv-button-white block md:inline-block"
            >
              <div class="rv-button-top">
                <span>Explore All Services</span>
              </div>
              <div class="rv-button-bottom">
                <span>Explore All Services</span>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Content Writing Services Container -->
    <div
      class="max-w-[1170px] w-full mx-auto [&>*:not(:last-child)]:mb-6 reveal-me"
    >
      <div class="accordion-item overflow-hidden bg-secondary duration-300">
        <div
          class="accordion-header relative cursor-pointer py-[35px] flex justify-between px-5 md:px-10 group"
        >
          <h3
            class="flex flex-col md:flex-row md:items-center gap-x-10 gap-y-3 text-[25px] lg:text-5xl md:font-medium font-normal leading-[25.2px] md:leading-[1.2] text-white"
          >
            <span class="text-inherit"> Website Copywriting </span>
            <span
              class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] text-[#ffffff99] mt-2 pr-[2px]"
            >
              Turn visitors into customers with every scroll.
            </span>
          </h3>
          <div class="accordion-header-iconV3">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 active-arrow group-hover:rotate-90 ease-faq-body-transition duration-300"
              >
                <path
                  d="M5 16H27"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </div>
        </div>
        <div
          class="accordion-body px-10 duration-300 h-0 flex flex-col md:flex-row justify-start gap-7 md:gap-14 md:ml-5"
        >
          <p class="text-backgroundBody/70 text-[17px] leading-[1.5] tracking-[0.36px]">
            Clear, persuasive content for landing pages, about pages, and service sections that turn visitors into clients.
          </p>
        </div>
      </div>

      <div class="accordion-item overflow-hidden bg-secondary duration-300">
        <div
          class="accordion-header relative cursor-pointer py-[35px] flex justify-between px-5 md:px-10 group"
        >
          <h3
            class="flex flex-col md:flex-row md:items-center gap-x-10 gap-y-3 text-[25px] lg:text-5xl md:font-medium font-normal leading-[25.2px] md:leading-[1.2] text-white"
          >
            <span class="text-inherit"> Blog & SEO Articles </span>
            <span
              class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] text-[#ffffff99] mt-2 pr-[2px]"
            >
              Boost visibility, build authority, and provide real value.
            </span>
          </h3>
          <div class="accordion-header-iconV3">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 active-arrow group-hover:rotate-90 ease-faq-body-transition duration-300"
              >
                <path
                  d="M5 16H27"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </div>
        </div>
        <div
          class="accordion-body px-10 duration-300 h-0 flex flex-col md:flex-row justify-start gap-7 md:gap-14 md:ml-5"
        >
          <p class="text-backgroundBody/70 text-[17px] leading-[1.5] tracking-[0.36px]">
            High-quality, keyword-optimized blogs designed to boost traffic and authority while adding real value to your readers.
          </p>
        </div>
      </div>

      <div class="accordion-item overflow-hidden bg-secondary duration-300">
        <div
          class="accordion-header relative cursor-pointer py-[35px] flex justify-between px-5 md:px-10 group"
        >
          <h3
            class="flex flex-col md:flex-row md:items-center gap-x-10 gap-y-3 text-[25px] lg:text-5xl md:font-medium font-normal leading-[25.2px] md:leading-[1.2] text-white"
          >
            <span class="text-inherit"> Social Media Copy </span>
            <span
              class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] text-[#ffffff99] mt-2 pr-[2px]"
            >
              Create scroll-stopping, shareable content that connects.
            </span>
          </h3>
          <div class="accordion-header-iconV3">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 active-arrow group-hover:rotate-90 ease-faq-body-transition duration-300"
              >
                <path
                  d="M5 16H27"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </div>
        </div>
        <div
          class="accordion-body px-10 duration-300 h-0 flex flex-col md:flex-row justify-start gap-7 md:gap-14 md:ml-5"
        >
          <p class="text-backgroundBody/70 text-[17px] leading-[1.5] tracking-[0.36px]">
            On-brand captions, hooks, and short-form content that connect with your audience and drive engagement.
          </p>
        </div>
      </div>

      <div class="accordion-item overflow-hidden bg-secondary duration-300">
        <div
          class="accordion-header relative cursor-pointer py-[35px] flex justify-between px-5 md:px-10 group"
        >
          <h3
            class="flex flex-col md:flex-row md:items-center gap-x-10 gap-y-3 text-[25px] lg:text-5xl md:font-medium font-normal leading-[25.2px] md:leading-[1.2] text-white"
          >
            <span class="text-inherit"> Product Descriptions </span>
            <span
              class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] text-[#ffffff99] mt-2 pr-[2px]"
            >
              Showcase what you offer — and why it matters.
            </span>
          </h3>
          <div class="accordion-header-iconV3">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 active-arrow group-hover:rotate-90 ease-faq-body-transition duration-300"
              >
                <path
                  d="M5 16H27"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </div>
        </div>
        <div
          class="accordion-body px-10 duration-300 h-0 flex flex-col md:flex-row justify-start gap-7 md:gap-14 md:ml-5"
        >
          <p class="text-backgroundBody/70 text-[17px] leading-[1.5] tracking-[0.36px]">
            Sales-focused product and service descriptions written to inform, convince, and convert.
          </p>
        </div>
      </div>

      <div class="accordion-item overflow-hidden bg-secondary duration-300">
        <div
          class="accordion-header relative cursor-pointer py-[35px] flex justify-between px-5 md:px-10 group"
        >
          <h3
            class="flex flex-col md:flex-row md:items-center gap-x-10 gap-y-3 text-[25px] lg:text-5xl md:font-medium font-normal leading-[25.2px] md:leading-[1.2] text-white"
          >
            <span class="text-inherit"> Email Campaigns & Newsletters </span>
            <span
              class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] text-[#ffffff99] mt-2 pr-[2px]"
            >
              Reach inboxes with purpose and personality.
            </span>
          </h3>
          <div class="accordion-header-iconV3">
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 active-arrow group-hover:rotate-90 ease-faq-body-transition duration-300"
              >
                <path
                  d="M5 16H27"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  stroke="black"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </div>
        </div>
        <div
          class="accordion-body px-10 duration-300 h-0 flex flex-col md:flex-row justify-start gap-7 md:gap-14 md:ml-5"
        >
          <p class="text-backgroundBody/70 text-[17px] leading-[1.5] tracking-[0.36px]">
            Concise, compelling email copy crafted to nurture leads and grow relationships over time.
          </p>
        </div>
      </div>

    </div>
    
  </div>
</section>

<!--=====================================
INDUSTRIES WE SERVE
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14  relative overflow-hidden"
>
  <div class="container">
    <!-- Content Area -->
    <div
      class="flex flex-col-reverse md:flex-row-reverse gap-y-8 md:gap-5 lg:gap-10 xl:gap-x-20"
    >
      <div class="md:w-[45%]">
        <div class="[&>*:not(:first-child)]:mt-3.5">
          <div class="reveal-me py-2.5">
            <h6>E-Commerce & Retail</h6>
            <p class="mt-1.5 tracking-[0.32px] leading-[1.6] text-base">
              Product descriptions, email marketing, and ad copy.
            </p>
          </div>

          <div class="reveal-me py-2.5">
            <h6>SaaS & Technology</h6>
            <p class="mt-1.5 tracking-[0.32px] leading-[1.6] text-base">
              Clear, engaging messaging that simplifies complex solutions.
            </p>
          </div>

          <div class="reveal-me py-2.5">
            <h6>Finance & Legal</h6>
            <p class="mt-1.5 tracking-[0.32px] leading-[1.6] text-base">
              Trust-building content for regulated industries.
            </p>
          </div>

          <div class="reveal-me py-2.5">
            <h6>Healthcare & Wellness</h6>
            <p class="mt-1.5 tracking-[0.32px] leading-[1.6] text-base">
              Empathetic, informative content that connects with audiences.
            </p>
          </div>

          <div class="reveal-me py-2.5">
            <h6>Luxury & Lifestyle</h6>
            <p class="mt-1.5 tracking-[0.32px] leading-[1.6] text-base">
              Sophisticated storytelling that enhances brand value.
            </p>
          </div>
        </div>

        <ul class="max-md:w-full mt-7 md:mt-14 reveal-me">
          <li
            class="block md:inline-block w-full mx-auto md:w-auto text-center"
          >
            <a
              href="./contact.php"
              class="rv-button rv-button-sm rv-button-primary block md:inline-block"
            >
              <div class="rv-button-top">
                <span>Get in Touch</span>
              </div>
              <div class="rv-button-bottom">
                <span class="text-nowrap">Get in Touch</span>
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="md:w-[55%] reveal-me">
        <h2 class="text-appear">
          Industries
          <br class="hidden md:block" />
          <i class="font-instrument"> We serve</i>
        </h2>
        <p class="text-appear mt-4">
          We create tailored content for businesses across a wide range of
          <br />
          industries:
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ================================
why-choose-us-v5 Section 
================================ -->

<section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[200px]"
>
  <div class="container">
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto md:mb-16 mb-10">
      
      <h2 class="text-appear lg:leading-[1.1]">
        Excellence in every

        <span class="font-instrument italic"> detail </span>
      </h2>
      <p
        class="mt-4 text-appear text-black/70 dark:text-backgroundBody/70 font-normal"
      >
        At Uxory, we don’t just write content; we create experiences. Here’s why
        our clients trust us
      </p>
    </div>

    <!-- Card Container -->
    <div class="grid grid-cols-12 gap-[30px] reveal-me">
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
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
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M24.0966 10L14.7852 27.7771H24.0966L17.1137 50L46.2137 27.7771H33.4109L40.3937 10H24.0966Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5"> SEO-Optimized & Performance-Driven</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          Every piece is built to rank on search engines and convert real users — not just fill space.
        </p>
      </div>
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
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
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              d="M31.25 12.5C31.25 12.0858 30.9142 11.75 30.5 11.75C30.0858 11.75 29.75 12.0858 29.75 12.5H31.25ZM29.75 47.5C29.75 47.9142 30.0858 48.25 30.5 48.25C30.9142 48.25 31.25 47.9142 31.25 47.5H29.75ZM37.9219 16.875C37.9219 16.4608 37.5861 16.125 37.1719 16.125C36.7577 16.125 36.4219 16.4608 36.4219 16.875H37.9219ZM36.4219 43.125C36.4219 43.5392 36.7577 43.875 37.1719 43.875C37.5861 43.875 37.9219 43.5392 37.9219 43.125H36.4219ZM44.5781 21.25C44.5781 20.8358 44.2423 20.5 43.8281 20.5C43.4139 20.5 43.0781 20.8358 43.0781 21.25H44.5781ZM43.0781 38.75C43.0781 39.1642 43.4139 39.5 43.8281 39.5C44.2423 39.5 44.5781 39.1642 44.5781 38.75H43.0781ZM51.25 25.625C51.25 25.2108 50.9142 24.875 50.5 24.875C50.0858 24.875 49.75 25.2108 49.75 25.625H51.25ZM49.75 34.375C49.75 34.7892 50.0858 35.125 50.5 35.125C50.9142 35.125 51.25 34.7892 51.25 34.375H49.75ZM23.0781 43.125C23.0781 43.5392 23.4139 43.875 23.8281 43.875C24.2423 43.875 24.5781 43.5392 24.5781 43.125H23.0781ZM24.5781 16.875C24.5781 16.4608 24.2423 16.125 23.8281 16.125C23.4139 16.125 23.0781 16.4608 23.0781 16.875H24.5781ZM16.4219 38.75C16.4219 39.1642 16.7577 39.5 17.1719 39.5C17.5861 39.5 17.9219 39.1642 17.9219 38.75H16.4219ZM17.9219 21.25C17.9219 20.8358 17.5861 20.5 17.1719 20.5C16.7577 20.5 16.4219 20.8358 16.4219 21.25H17.9219ZM9.75 34.375C9.75 34.7892 10.0858 35.125 10.5 35.125C10.9142 35.125 11.25 34.7892 11.25 34.375H9.75ZM11.25 25.625C11.25 25.2108 10.9142 24.875 10.5 24.875C10.0858 24.875 9.75 25.2108 9.75 25.625H11.25ZM29.75 12.5V47.5H31.25V12.5H29.75ZM36.4219 16.875V43.125H37.9219V16.875H36.4219ZM43.0781 21.25V38.75H44.5781V21.25H43.0781ZM49.75 25.625V34.375H51.25V25.625H49.75ZM24.5781 43.125V16.875H23.0781V43.125H24.5781ZM17.9219 38.75V21.25H16.4219V38.75H17.9219ZM11.25 34.375V25.625H9.75V34.375H11.25Z"
              class="stroke-secondary dark:stroke-backgroundBody"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5">Consistent Brand Voice</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          We maintain a cohesive tone that reflects your brand across all platforms and content types.
        </p>
      </div>
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
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
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              d="M10.1141 20.7855C9.75894 20.9986 9.64377 21.4593 9.85688 21.8144C10.07 22.1696 10.5307 22.2848 10.8859 22.0717L10.1141 20.7855ZM24.7857 12.8571L25.2357 12.2571C24.9918 12.0742 24.6613 12.0571 24.3998 12.214L24.7857 12.8571ZM36.2143 21.4286L35.7643 22.0286C36.0379 22.2338 36.4157 22.2279 36.6828 22.0142L36.2143 21.4286ZM50.9685 10.5857C51.292 10.3269 51.3444 9.85493 51.0857 9.53148C50.8269 9.20803 50.3549 9.15559 50.0315 9.41435L50.9685 10.5857ZM46.8934 50.0002C46.8934 50.4144 47.2292 50.7502 47.6434 50.7502C48.0576 50.7502 48.3934 50.4144 48.3934 50.0002H46.8934ZM48.3934 27.1431C48.3934 26.7289 48.0576 26.3931 47.6434 26.3931C47.2292 26.3931 46.8934 26.7289 46.8934 27.1431H48.3934ZM24.034 50.0002C24.034 50.4144 24.3698 50.7502 24.784 50.7502C25.1983 50.7502 25.534 50.4144 25.534 50.0002H24.034ZM25.534 27.1431C25.534 26.7289 25.1983 26.3931 24.784 26.3931C24.3698 26.3931 24.034 26.7289 24.034 27.1431H25.534ZM35.4637 50.0001C35.4637 50.4143 35.7995 50.7501 36.2137 50.7501C36.6279 50.7501 36.9637 50.4143 36.9637 50.0001H35.4637ZM36.9637 35.7144C36.9637 35.3001 36.6279 34.9644 36.2137 34.9644C35.7995 34.9644 35.4637 35.3001 35.4637 35.7144H36.9637ZM12.6083 50.0001C12.6083 50.4143 12.944 50.7501 13.3583 50.7501C13.7725 50.7501 14.1083 50.4143 14.1083 50.0001H12.6083ZM14.1083 35.7144C14.1083 35.3001 13.7725 34.9644 13.3583 34.9644C12.944 34.9644 12.6083 35.3001 12.6083 35.7144H14.1083ZM10.8859 22.0717L25.1716 13.5003L24.3998 12.214L10.1141 20.7855L10.8859 22.0717ZM24.3357 13.4571L35.7643 22.0286L36.6643 20.8286L25.2357 12.2571L24.3357 13.4571ZM36.6828 22.0142L50.9685 10.5857L50.0315 9.41435L35.7458 20.8429L36.6828 22.0142ZM48.3934 50.0002V27.1431H46.8934V50.0002H48.3934ZM25.534 50.0002V27.1431H24.034V50.0002H25.534ZM36.9637 50.0001V35.7144H35.4637V50.0001H36.9637ZM14.1083 50.0001V35.7144H12.6083V50.0001H14.1083Z"
              class="stroke-secondary dark:stroke-backgroundBody"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5">Fluent, Clear, Native-Level Writing</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          Our team writes with natural flow, precision, and clarity that resonates with global audiences.
        </p>
      </div>
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
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
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M30.5002 16.6662C30.5002 20.3476 27.5157 23.3319 23.8341 23.3319C20.1525 23.3319 17.168 20.3476 17.168 16.6662C17.168 12.9848 20.1525 10.0005 23.8341 10.0005C27.5157 10.0005 30.5002 12.9848 30.5002 16.6662Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M37.1673 40.6654C37.1673 45.8083 31.1983 49.9997 23.8322 49.9997C16.4661 49.9997 10.5 45.8197 10.5 40.6654C10.5 35.5111 16.4689 31.334 23.8351 31.334C31.2012 31.334 37.1673 35.5111 37.1673 40.6654Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M44.6137 22.8901C44.6137 25.0993 42.8228 26.8901 40.6135 26.8901C38.4042 26.8901 36.6133 25.0993 36.6133 22.8901C36.6133 20.681 38.4042 18.8901 40.6135 18.8901C41.6744 18.8901 42.6919 19.3116 43.4421 20.0617C44.1923 20.8119 44.6137 21.8293 44.6137 22.8901Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M42.5 47.3333C46.5395 47.6649 50.0994 44.6977 50.5005 40.6647C50.0979 36.6328 46.5385 33.6672 42.5 33.999"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5">Fast, Collaborative Process</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          We work closely with you — delivering quality content efficiently, with full transparency.
        </p>
      </div>
    </div>

    <ul class="flex justify-center list-none mt-14 reveal-me">
      <div
          class="flex w-full md:w-auto p-4 group bg-primary bg-opacity-30 gap-4 justify-between items-center backdrop-blur-2xl max-w-[360px] md:max-w-[360px]"
        >
          <div>
            <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
              Schedule a Free Meeting
            </h6>
            <p class="text-sm text-black dark:text-white">Few spots left this month</p>
          </div>
          <a href="calendly.php">
            <figure
              class="bg-primary w-[55px] h-[55px] cursor-pointer relative overflow-hidden"
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
    </ul>
  </div>
</section>


 <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <div class="container">
    <div class="rv-badge mb-3.5 md:mb-6 lg:mb-12 reveal-me">
      <span class="rv-badge-text">Thoughts</span>
    </div>
    <div
      class="flex flex-col lg:flex-row justify-between gap-y-5 items-center lg:items-start"
    >
      <h4 class="reveal-me">
        It’s about clarity, connection, and creating content with purpose.
      </h4>
      <div class="lg:max-w-[500px] reveal-me">
        <p class="mb-5 md:mb-10">
          At Uxory, we believe great content doesn’t just fill space — it sparks movement. We’re not here to write just for the sake of it. We’re here to help brands sound like people, not platforms. Our work is rooted in strategy, empathy, and a deep understanding of what makes audiences stop, care, and act.
        </p>
        <p>
          Our writers come from diverse backgrounds — journalism, branding, creative writing, marketing — but what brings us together is a shared love for words that work. Words that tell your story, build your voice, and leave a lasting impression.
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