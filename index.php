<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>

  <!--Tittle-->
<title>Uxory | Intelligent Software & Automation Solutions</title>
<meta name="description" content="We build AI-powered systems that automate operations, increase revenue, and eliminate inefficiencies." />

<meta charset="utf-8" />

<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

<!--========================>
Favicon
==========================-->
<!-- SVG: Modern browsers (scalable, sharp icons) -->
<link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />

<!-- PNG fallback: Older browsers that don't support SVG -->
<link rel="icon" type="image/png" href="/images/favicon.png" sizes="96x96" />

<!-- Shortcut icon: Legacy support (especially for Internet Explorer) -->
<link rel="shortcut icon" href="/images/favicon.ico" />

<!-- Apple Touch Icon: iPhones/iPads when users save your site to home screen -->
<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />

<!-- Canonical-->
<link rel="canonical" href="https://uxory.com/" />

<!-- Open Graph -->
<meta property="og:title" content="Uxory | Intelligent Software & Automation Solutions" />
<meta property="og:description" content="We build AI-powered systems that automate operations, increase revenue, and eliminate inefficiencies." />
<meta property="og:image" content="https://www.uxory.com/images/logo.png" />
<meta property="og:url" content="https://www.uxory.com" />
<meta property="og:type" content="website" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Uxory | Intelligent Software & Automation Solutions" />
<meta name="twitter:description" content="We build AI-powered systems that automate operations, increase revenue, and eliminate inefficiencies." />
<meta name="twitter:image" content="https://www.uxory.com/images/logo.png" />

<!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Uxory",
    "url": "https://uxory.com",
    "logo": "https://uxory.com/images/logo.png",
    "description": "We build AI-powered systems that automate operations, increase revenue, and eliminate inefficiencies."
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
$currentPage = 'index';     
$currentParent = 'home';         
include 'components/nav.php';
?>

<div
  class="menu-overflow fixed z-[9999] bg-[rgba(10,10,10,0.95)] bg-opacity-60 backdrop-blur-[25px] w-full h-full pointer-events-none"
></div>

<!-- Cursor Pointer -->
<!-- <div class="pointer"></div> -->

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
    class="absolute w-full h-fw-full top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 -z-10 blur-[60px] scale-90"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Hero Content -->
  <div class="container reveal-me">
    <!-- Top Label -->
    <p
      class="flex text-secondary dark:text-backgroundBody justify-center lg:justify-start items-center gap-5 text-sm font-normal leading-6 tracking-[3px] uppercase"
    >
      <span>YOUR TECHNOLOGY PARTNER</span>
      <!-- <span
        class="inline-block w-[150px] h-[1px] bg-secondary dark:bg-backgroundBody/70"
      ></span>
      <span>Uxory</span> -->
    </p>

    <!-- Hero Heading -->
<h2 class="font-semibold mt-5 sm:mt-10">
  Software, automation, and AI systems designed for 
  <i class="font-instrument">modern business growth.</i>
</h2>
    <!-- CTA Buttons -->
    <ul class="flex justify-start list-none mt-14">
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
                src="images/icons/hyper-arrow-new.svg"
                alt="Arrow Icon"              />
            </figure>
          </a>
      </div>
    </ul>
  </div>
</section>


<!--=====================================
  Para Text round
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] relative overflow-hidden"
>
  <div class="container"> 

    <div>
        <p
          class="reveal-text-2 text-2xl lg:text-3xl text-secondary/90 dark:text-backgroundBody/70 text-left font-normal lg:leading-[1.2] lg:tracking-[0.72px] pb-10 sm:pb-20"
        >
        At Uxory, We help growing businesses build intelligent digital platforms, automate operations, and scale using custom software and AI-driven systems. From internal tools to customer-facing platforms, we design systems that reduce manual work and make daily operations easier.
      </p>
    </div>

    <!-- Circular Logo Element -->
    <div
      class="relative w-[168px] h-[168px] bg-secondary dark:bg-backgroundBody rounded-[50%] flex items-center justify-center mx-auto reveal-me"
    >
      <figure>
        <img
          src="images\icons\text-circle-logo.png"
          alt="text-circle-logo"
          class="inline dark:hidden"
        />
        <img
          src="images\icons\text-circle-dark-logo.png"
          alt="text-circle-logo"
          class="hidden dark:inline"
        />
      </figure>
      <div class="text">
        <p>Helping Businesses Scale Smarter ★</p>
      </div>
    </div>


      <p class="reveal-text-2 text-2xl lg:text-3xl text-secondary/90 dark:text-backgroundBody/70 text-left font-normal lg:leading-[1.2] lg:tracking-[0.72px] pt-10 sm:pt-20">
        In today’s world, efficiency is a requirement, not an advantage. Businesses that use AI and automation can handle more work with the same team, respond faster to customers, and adapt quickly as markets change. Uxory helps you build those systems: custom software, automation, and AI solutions designed around how your business actually runs.
      </p>

  </div>
</section>


<!--=====================================
   Marquee (Rank# on Goole)
======================================-->

<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] relative overflow-hidden"
>
  <!-- Clients Logo Marquee -->
  <div class="marquee-container reveal-me">
    <div class="flex items-center justify-between py-2.5 pb-5">
      
      <div class="flex items-center gap-6 mr-5">
        <span
          class="text-4xl sm:text-[36px] md:text-[55px] font-semibold leading-tight xl:leading-[1.1] tracking-[-1.5px] xl:tracking-[-2px] text-nowrap"
        >
        AI Systems & Agents
        </span>
        <span class="mt-5">
         <svg
            xmlns="https://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 40 40"
            fill="none"
          >
            <path
              d="M20.002 0C20.002 0 19.789 11.2169 24.2871 15.7149C28.785 20.2129 40.002 20 40.002 20C40.002 20 28.785 19.7871 24.2871 24.2851C19.789 28.7831 20.002 40 20.002 40C20.002 40 20.2149 28.7831 15.7168 24.2851C11.2189 19.7871 0.00195312 20 0.00195312 20C0.00195312 20 11.2189 20.2129 15.7168 15.7149C20.2149 11.2169 20.002 0 20.002 0Z"
              class="fill-black dark:fill-backgroundBody"
            />
          </svg>
        </span>
      </div>
      <div class="flex items-center gap-6 mr-5">
        <span
          class="text-4xl sm:text-[36px] md:text-[55px] font-semibold leading-tight xl:leading-[1.1] tracking-[-1.5px] xl:tracking-[-2px] text-nowrap"
        >
          Workflow Automation
        </span>
        <span class="mt-5">
          <svg
            xmlns="https://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 40 40"
            fill="none"
          >
            <path
              d="M20.002 0C20.002 0 19.789 11.2169 24.2871 15.7149C28.785 20.2129 40.002 20 40.002 20C40.002 20 28.785 19.7871 24.2871 24.2851C19.789 28.7831 20.002 40 20.002 40C20.002 40 20.2149 28.7831 15.7168 24.2851C11.2189 19.7871 0.00195312 20 0.00195312 20C0.00195312 20 11.2189 20.2129 15.7168 15.7149C20.2149 11.2169 20.002 0 20.002 0Z"
              class="fill-black dark:fill-backgroundBody"
            />
          </svg>
        </span>
      </div>
      <div class="flex items-center gap-6 mr-5">
        <span
          class="text-4xl sm:text-[36px] md:text-[55px] font-semibold leading-tight xl:leading-[1.1] tracking-[-1.5px] xl:tracking-[-2px] text-nowrap"
        >
          AI Powered Apps
        </span>
        <span class="mt-5">
          <svg
            xmlns="https://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 40 40"
            fill="none"
          >
            <path
              d="M20.002 0C20.002 0 19.789 11.2169 24.2871 15.7149C28.785 20.2129 40.002 20 40.002 20C40.002 20 28.785 19.7871 24.2871 24.2851C19.789 28.7831 20.002 40 20.002 40C20.002 40 20.2149 28.7831 15.7168 24.2851C11.2189 19.7871 0.00195312 20 0.00195312 20C0.00195312 20 11.2189 20.2129 15.7168 15.7149C20.2149 11.2169 20.002 0 20.002 0Z"
              class="fill-black dark:fill-backgroundBody"
            />
          </svg>
        </span>
      </div>
      
    </div>
  </div>

  <!-- Reverse -->
  <div class="marquee-reverse-container reveal-me border-t dark:border-dark">
    <div class="flex items-center justify-between py-2.5">
      <div class="flex items-center gap-6 mr-5">
        <span
          class="text-4xl sm:text-[36px] md:text-[55px] font-semibold leading-tight xl:leading-[1.1] tracking-[-1.5px] xl:tracking-[-2px] text-nowrap"
        >
          AI Powered Apps
        </span>
        <span class="mt-5">
          <svg
            xmlns="https://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 40 40"
            fill="none"
          >
            <path
              d="M20.002 0C20.002 0 19.789 11.2169 24.2871 15.7149C28.785 20.2129 40.002 20 40.002 20C40.002 20 28.785 19.7871 24.2871 24.2851C19.789 28.7831 20.002 40 20.002 40C20.002 40 20.2149 28.7831 15.7168 24.2851C11.2189 19.7871 0.00195312 20 0.00195312 20C0.00195312 20 11.2189 20.2129 15.7168 15.7149C20.2149 11.2169 20.002 0 20.002 0Z"
              class="fill-black dark:fill-backgroundBody"
            />
          </svg>
        </span>
      </div>
      <div class="flex items-center gap-6 mr-5">
        <span
          class="text-4xl sm:text-[36px] md:text-[55px] font-semibold leading-tight xl:leading-[1.1] tracking-[-1.5px] xl:tracking-[-2px] text-nowrap"
        >
          Process Automation
        </span>
        <span class="mt-5">
          <svg
            xmlns="https://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 40 40"
            fill="none"
          >
            <path
              d="M20.002 0C20.002 0 19.789 11.2169 24.2871 15.7149C28.785 20.2129 40.002 20 40.002 20C40.002 20 28.785 19.7871 24.2871 24.2851C19.789 28.7831 20.002 40 20.002 40C20.002 40 20.2149 28.7831 15.7168 24.2851C11.2189 19.7871 0.00195312 20 0.00195312 20C0.00195312 20 11.2189 20.2129 15.7168 15.7149C20.2149 11.2169 20.002 0 20.002 0Z"
              class="fill-black dark:fill-backgroundBody"
            />
          </svg>
        </span>
      </div>
      <div class="flex items-center gap-6 mr-5">
        <span
          class="text-4xl sm:text-[36px] md:text-[55px] font-semibold leading-tight xl:leading-[1.1] tracking-[-1.5px] xl:tracking-[-2px] text-nowrap"
        >
          AI-Powered SAAS
        </span>
        <span class="mt-5">
          <svg
            xmlns="https://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 40 40"
            fill="none"
          >
            <path
              d="M20.002 0C20.002 0 19.789 11.2169 24.2871 15.7149C28.785 20.2129 40.002 20 40.002 20C40.002 20 28.785 19.7871 24.2871 24.2851C19.789 28.7831 20.002 40 20.002 40C20.002 40 20.2149 28.7831 15.7168 24.2851C11.2189 19.7871 0.00195312 20 0.00195312 20C0.00195312 20 11.2189 20.2129 15.7168 15.7149C20.2149 11.2169 20.002 0 20.002 0Z"
              class="fill-black dark:fill-backgroundBody"
            />
          </svg>
        </span>

      </div>

    </div>
  </div>

</section>

<!--=====================================
   Our Services Section
======================================-->
<section
  class="pt-16 md:pt-20 lg:pt-[100px] xl:pt-[120px] mb-10 md:mb-14 relative overflow-hidden"
>

  <div class="container">
    <!-- Section Header -->
    <div
      class="flex flex-col md:flex-row gap-y-2 gap-x-10 justify-center lg:justify-between items-start mb-10 "
    >
      <div class="flex-1">
        <h3 class="text-appear max-lg:leading-[1.33]">
          <span class="font-instrument lg:text-[65px] italic">Our</span>

          services
        </h3>
      </div>

      <div class="md:self-end max-md:w-full flex-1">
        <p class="text-appear md:justify-self-end max-w-lg md:text-right">
          Everything your business needs to thrive in the competition.
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
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-[1170px] w-full mx-auto pt-2 reveal-me">

        <a href="./available-soon.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/agent.png"
              alt="SEO"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
              AI Systems & Agents
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

        <a href="/available-soon.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="/images/services-icons/auto.png"
              alt="Email"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
              Business Process Automation
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

        <a href="./coming-soon.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/saas.png"
              alt="Paid Ads"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
              AI-Powered SaaS Development
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

         <a href="./website-dev.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
              <figure class="flex-none w-[100px] h-[100px]">
                <img
                  src="images/services-icons/web-dev-services-icon.webp"
                  alt="Website Development"
                  class="w-full h-full object-contain"
                />
              </figure>
              <div class="flex-1">
                <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
                  High-Performance Websites
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

        <a href="./available-soon.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/new.webp"
              alt="Web-Application-Development"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
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

        <a href="./ecommerce-solutions.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/new.png"
              alt="SEO"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
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


  </div>

</section>

<!--=====================================
   Buttons Below Services Section
======================================-->
<section class="flex flex-col md:flex-row justify-center items-center gap-6 px-4">
  <!-- Button 1 -->
  <div
        class="flex w-full md:w-auto p-3 group bg-primary bg-opacity-30 gap-3 justify-between items-center backdrop-blur-2xl max-w-[320px] md:max-w-[320px]"
      >
        <div>
          <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
            Explore Services
          </h6>
        </div>
          <a href="/services.php">
            <figure
              class="bg-primary w-[44px] h-[44px] cursor-pointer relative overflow-hidden"
            >
              <img
                src="images/icons/hyper-arrow-new.svg"
                alt="Arrow Icon"              />
            </figure>
          </a>
      </div>

  <!-- Button 2 -->
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
                src="images/icons/hyper-arrow-new.svg"
                alt="Arrow Icon"              />
            </figure>
          </a>
      </div>

  <!-- Button 3 -->
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
                src="images/icons/hyper-arrow-new.svg"
                alt="Arrow Icon"              />
            </figure>
          </a>
      </div>

</section>

<!-- ================================
What we build and why it works Section
================================ -->

<section
  class="pt-16 md:pt-20 lg:pt-[100px] xl:pt-[120px] overflow-hidden"
>
  <!--  section header -->
  <div class="container">
    <div
      class="flex flex-col md:flex-row gap-y-3 gap-x-10 justify-center lg:justify-start items-start md:items-center mb-16 md:mb-20"
    >
      <div class="flex-1">
        <h3 class="text-appear-2">
          What We Build &
          <span class="font-instrument italic">Why It Works</span>
        </h3>
      </div>
      <div class="max-md:w-full md:max-w-[470px]">
        <p
          class="text-appear max-md:text-justify max-w-lg md:place-self-end md:text-right text-appear-2"
        >
          Our approach is practical, not theoretical, which is why the solutions we deliver work in real business environments.
        </p>
      </div>
    </div>
  </div>

  <!-- howe we drive revenue content -->

  <div class="swiper cardSwiper pl-[19%]">
    <div class="swiper-wrapper">

      <!-- Card 1 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">AI Agents for Customer Operations</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20 ">
           AI agents that handle customer questions, bookings, and basic support whereas reducing response time and operational load.
          </p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">AI-Enabled Software Platforms</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            We build custom software platforms with AI built in, helping reduce manual work and improve accuracy as your business grows.
          </p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">AI Systems Trained on Your Data</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
           We build AI systems trained on your data and workflows, so outputs are relevant, accurate, and useful to your team.
          </p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Intelligent Systems for Internal Teams</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            We create systems that help teams find information faster, manage tasks efficiently, and reduce dependency on manual processes.
          </p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Automation Where It Actually Helps</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
          We help identify where automation makes sense and design systems that remove friction instead of adding complexity.
          </p>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Systems Designed to Scale</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
           We build systems with growth in mind, ensuring your software continues to perform as complexity and usage increase.
          </p>
        </div>
      </div>

      <!-- Card 7 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Automation Built Around Your Processes</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            We automate the way your business already works, replacing repetitive tasks with reliable systems that scale with you.
          </p>
        </div>
      </div>

      <!-- Card 8 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Automated Appointment & Scheduling Systems</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Systems that manage bookings, rescheduling, reminders, and cancellations automatically.
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
            We set up systems that can consistently attract and qualify potential customers for you.
          </p>
        </div>
      </div>

      <!-- Card 12 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Decision-Support AI Systems</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            AI systems that assist with analysis and recommendations, helping teams make faster, more informed decisions.
          </p>
        </div>
      </div>

      <!-- Card 13 -->
      <div class="swiper-slide">
        <div
          class="max-w-full 2xl:max-w-[360px] min-h-[320px] border dark:border-dark p-8 relative"
        >
          
          <figcaption class="absolute top-8">
            <h6 class="text-[22px] leading-[1.2] mb-[2px] pr-2">Automation-First Product Design</h6>
          </figcaption>

          <p class="text-lg leading-[1.6] mt-20">
            Products designed with automation and efficiency in mind, reducing operational overhead from day one.
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
   FAQ Section
======================================-->
<!-- <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div class="container">
    
    <div
      class="flex flex-col md:flex-row gap-x-10 gap-y-5 justify-center lg:justify-between max-md:items-start md:items-end mb-10 lg:mb-20"
    >
     
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
      
      <div class="md:self-end md:justify-self-end flex-1">
        <p class="text-appear max-w-lg md:text-right">
          When detailing testimonials, include key elements that provide context
          and authenticity.
        </p>
      </div>
    </div>

    
    <div
      class="w-full mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] items-start"
    >
      <div class="space-y-[30px]">
       
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

<!--=====================================
   Let's Work Together Section
======================================-->
<section
class="relative overflow-hidden w-full pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] max-lg:pb-10"
>
  <div
    class="flex items-center gap-8 flex-nowrap reveal-me"
    aria-hidden="true"
    ref="inner"
  >
    <div
      class="marquee-inner flex items-center gap-[30px] text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-normal leading-tight xl:leading-[2.40] tracking-[-1px] xl:tracking-[-2.88px] uppercase text-nowrap"
    >
      <span> LET’S WORK TOGETHER </span>
      <span>
        <svg
          xmlns="https://www.w3.org/2000/svg"
          width="30"
          height="31"
          viewBox="0 0 30 31"
          fill="none"
        >
          <circle
            cx="15"
            cy="15.5"
            r="15"
            class="fill-black dark:fill-backgroundBody"
          />
        </svg>
      </span>
      <span> LET’S WORK TOGETHER </span>
      
        <svg
          xmlns="https://www.w3.org/2000/svg"
          width="30"
          height="31"
          viewBox="0 0 30 31"
          fill="none"
        >
          <circle
            cx="15"
            cy="15.5"
            r="15"
            class="fill-black dark:fill-backgroundBody"
          />
        </svg>
     

    </div>
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

<!-- Chatsimple - The chatbot is hidden on preview links. -->
<!-- <script>
  const urlParams = new URLSearchParams(window.location.search);
  const isPreview = urlParams.get("preview");

  if (!isPreview) {
    const chatBotTag = document.createElement("chat-bot");
    chatBotTag.setAttribute("platform_id", "7c083620-8f10-43c1-9688-70eb5077f9cd");
    chatBotTag.setAttribute("user_id", "99005bf7-6975-4f10-ad1f-096d7df76a1a");
    chatBotTag.setAttribute("chatbot_id", "966ad0de-9046-4ae5-8cbc-91bc2629ab91");

    const fallbackLink = document.createElement("a");
    fallbackLink.href = "https://www.chatsimple.ai/?utm_source=widget&utm_medium=referral";
    fallbackLink.innerText = "chatsimple";

    chatBotTag.appendChild(fallbackLink);
    document.body.appendChild(chatBotTag);

    const script = document.createElement("script");
    script.src = "https://cdn.chatsimple.ai/chat-bot-loader.js";
    script.defer = true;
    document.body.appendChild(script);
  }
</script> -->

</body>
</html>