<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Branding Services | Uxory - Build a Memorable Brand Identity</title>
  <meta name="description" content="Elevate your business with Uxory's professional branding services. Logos, visual identity, brand voice, and strategy — all in one place." />

  <meta charset="utf-8" />

  <!-- Responsive Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Indexing -->
  <meta name="robots" content="index, follow" />

<!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/branding.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Branding Services | Uxory - Build a Memorable Brand Identity" />
  <meta property="og:description" content="Professional branding services to shape how the world sees your business. Uxory crafts powerful, design-driven brand identities." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/branding.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Branding Services | Uxory" />
  <meta name="twitter:description" content="Professional branding services to shape how the world sees your business." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Uxory",
    "url": "https://uxory.com",
    "logo": "https://uxory.com/images/logo.png",
    "description": "Design-Driven Digital Solutions Agency building websites and brand experiences for forward-thinking businesses.",
    "sameAs": []
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
$currentPage = 'branding';
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
    Hero Section (Branding Agency Light)
======================================-->
<section
  class="pt-[130px] md:pt-[160px] xl:pt-[200px] pb-20 md:pb-24 lg:pb-32 xl:pb-[180px] relative overflow-hidden reveal-me"
>
  <!-- Gradient Background Wrapper -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-full top-0 left-0 -z-10 blur-[35px] md:blur-[60px] sm:scale-75 md:scale-100"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>
  <div class="container">
    <!-- Status Badge -->
    <div class="flex justify-center items-center">
      <div class="rv-badge mb-2">
        <!-- <span class="rv-badge-text">UXORY</span> -->
      </div>
    </div>

    <h2 class="font-semibold text-center">
      Branding that makes a <br />
      <i class="font-instrument"> Statement</i>
    </h2>
    <p class="max-w-3xl text-center mx-auto mt-3">
      Transform Your Brand Into an Unforgettable Experience That Inspires Loyalty and Drives Growth
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

  <!-- Decorative Images -->

  <figure
    class="absolute top-[12%] lg:top-[15%] left-[8%] lg:left-[24%] hidden md:block"
    id="random-1"
  >
    <img src="/images/home-4/random-1.png" alt="" class="decorative-image" />
  </figure>
  <figure
    class="absolute top-[7%] lg:top-[11%] right-[15%] lg:right-[29%] hidden md:block"
    id="random-2"
  >
    <img src="/images/home-4/random-2.png" alt="" class="decorative-image" />
  </figure>
  <figure class="absolute top-[42%] left-[2%] hidden lg:block" id="random-3">
    <img src="/images/home-4/random-3.png" alt="" class="decorative-image" />
  </figure>
  <figure class="absolute top-[32%] hidden lg:block right-[2%]" id="random-4">
    <img src="/images/home-4/random-4.png" alt="" class="decorative-image" />
  </figure>
  <figure
    class="absolute bottom-[4%] lg:bottom-[7%] left-[12%] lg:left-[23%] hidden md:block"
    id="random-5"
  >
    <img src="/images/home-4/random-5.png" alt="" class="decorative-image" />
  </figure>
  <figure
    class="absolute bottom-[1%] lg:bottom-[3%] right-[3%] lg:right-[5%] hidden md:block"
    id="random-6"
  >
    <img src="/images/home-4/random-6.png" alt="" class="decorative-image" />
  </figure>
</section>

<!-- ================================
Question
================================ -->

 <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <div class="container">
    <div class="rv-badge mb-3.5 md:mb-6 lg:mb-12 reveal-me">
      <!-- <span class="rv-badge-text">About</span> -->
    </div>
    <div
      class="flex flex-col lg:flex-row justify-between gap-y-5 items-center lg:items-start"
    >
      <h4 class="reveal-me">
        Is Your Brand Leaving a Lasting Impression—Or Getting
       Lost in the Crowd?
      </h4>
      <div class="lg:max-w-[500px] reveal-me">
        <p class="text-xl mb-5 md:mb-10">
          Today’s market is saturated with businesses all competing for attention. You know you offer something valuable, but if your brand isn’t clear, consistent, and memorable, prospects will pass you by without a second thought. 
          
        </p>
        <p>
          Maybe you’ve tried DIY logo tools, mixed up your messaging, or struggled to define what truly makes you unique. Without a cohesive brand identity, even the best products and services get overlooked.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ================================
Our Solution
================================ -->
<section
  class="about pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div class="container">
    <!-- Content Wrapper -->
    <div
      class="flex flex-col items-center lg:items-stretch justify-center lg:justify-normal reveal-me"
    >
      <!-- Logo Circle -->
      <div
        class="relative w-[168px] h-[168px] bg-secondary dark:bg-backgroundBody rounded-[50%] flex items-center justify-center mx-auto"
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
          <p>Building Brands,and Creating Impact</p>
        </div>
      </div>

      <!-- About Description -->
      <h4 class="mt-8 md:mt-[60px]  mx-auto reveal-text">
        <i class="italic font-instrument">Our Solution & Approach</i>: Strategy-First Branding That Connects, Converts, and Compels
      </h4>

      <p class="mt-10 text-xl leading-[1.6] tracking-[0.36px]">
        <span class="font-medium">At Uxory, we don’t start with a logo—we start with your story.</span> Our branding and identity service is rooted in deep discovery, psychological positioning, and creative execution. We craft brand experiences that not only look beautiful but align with your core values, attract your ideal clients, and build lasting credibility.
      </p>

      <p class="mt-5 text-xl leading-[1.6] tracking-[0.36px]">
        We begin with a comprehensive brand strategy workshop to explore your vision, voice, audience, and market landscape. From these insights, we create a brand blueprint—your strategic foundation—defining your purpose, personality, tone, and core messaging. This clarity guides the creation of your visual identity, including logo, color palette, typography, iconography, and imagery—designed with both creativity and scalability in mind.
      </p>

      <p class="mt-5 text-xl leading-[1.6] tracking-[0.36px]">
      More than just visuals, we shape your brand voice and narrative to ensure consistency across every customer touchpoint. <span class="font-medium">This isn’t template branding—it’s a personalized transformation that makes your business distinct, impactful, and unforgettable. </span>
     </p>
      
    </div>
  </div>

  <div
      class="flex max-xl:flex-wrap items-center justify-center gap-[30px] pt-[75px] reveal-me"
    >
      <div
        class="border dark:border-dark py-7 lg:py-10 px-9 lg:px-16 space-y-3 flex justify-center flex-col items-center min-w-[280px] lg:min-w-[320px] min-h-[180px]"
        id="counter"
      >
        <h2 class="lg:text-7xl">
          <span class="counter" data-value="25"></span>+
        </h2>
        <p>Unique Brand Identities Created</p>
      </div>
      <div
        class="border dark:border-dark py-7 lg:py-10 px-9 lg:px-16 space-y-3 flex justify-center flex-col items-center min-w-[280px] lg:min-w-[320px] min-h-[180px]"
        id="counter"
      >
        <h2 class="lg:text-7xl">
          <span class="counter" data-value="20"></span> +
        </h2>
        <p>Clients Globally</p>
      </div>
      <div
        class="border dark:border-dark py-7 lg:py-10 px-9 lg:px-16 space-y-3 flex justify-center flex-col items-center min-w-[280px] lg:min-w-[320px] min-h-[180px]"
        id="counter"
      >
        <h2 class="lg:text-7xl">
          <span class="counter" data-value="100"></span> %
        </h2>
        <p>Return Clients</p>
      </div>
  </div>
  
</section>

<!-- ================================
Branding Services
================================ -->

<section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[100px]"
>
  <div class="container">
    <!-- section header -->
    <div
      class="flex flex-col md:flex-row gap-y-3 gap-x-10 justify-center lg:justify-start items-start md:items-center mb-16 md:mb-20"
    >
      <div class="flex-1">
        <h2 class="text-appear-2">
         Key Features 
          <i class="font-instrument"> & Deliverables </i>
          
        </h2>
      </div>
      <div class="w-full md:w-80 lg:w-96">
        <!-- <p
          class="text-appear max-md:text-justify max-w-lg md:place-self-end md:text-right text-appear-2"
        >
          We shape brands that stand the test of time
        </p> -->

        <ul class="justify-self-end max-md:w-full mt-5 md:mt-10 reveal-me">
          <li
            class="block md:inline-block w-full mx-auto md:w-auto text-center"
          >
            <a
              href="./services.php"
              class="rv-button rv-button-white block md:inline-block"
            >
              <div class="rv-button-top">
                <span>Get a Proposal</span>
              </div>
              <div class="rv-button-bottom">
                <span>Get a Proposal</span>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Services container -->

    <div class="[&>*:not(:last-child)]:border-b">
      <!-- 1 -->

      <div
        class="group flex items-start justify-between gap-5 pb-5 md:pb-10 transition-all duration-300 ease-[cubic-bezier(0.4, 0, 0.2, 1)] transform hover:scale-[1.010] hover:-translate-y-1 hover:backdrop-blur-sm"
      >
        <span
          class="text-xl italic font-instrument leading-[32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out w-8"
          >01</span
        >
        <h3
          class="text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out text-2xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-[88px] font-normal leading-tight xl:leading-[1.15] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap md:w-[730px] mt-2"
        >
          Brand strategy
        </h3>
        <p
          class="text-xs md:text-base md:leading-[1.6] md:tracking-[0.32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody self-center transition-colors duration-300 ease-in-out ml-2.5 md:w-[370px]"
        >
        Brand discovery, strategy document, messaging guide, brand voice, positioning
      </div>

      <!-- 2 -->

      <div
        class="group flex items-start justify-between gap-5 pt-5 md:pt-10 pb-5 md:pb-10 transition-all duration-300 ease-[cubic-bezier(0.4, 0, 0.2, 1)] transform hover:scale-[1.010] hover:-translate-y-1 hover:backdrop-blur-sm"
      >
        <span
          class="text-xl italic font-instrument leading-[32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out w-8"
          >02</span
        >
        <h3
          class="text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out text-2xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-[88px] font-normal leading-tight xl:leading-[1.15] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap md:w-[730px] mt-2"
        >
          Visual Identity
        </h3>
        <p
          class="text-xs md:text-base md:leading-[1.6] md:tracking-[0.32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody self-center transition-colors duration-300 ease-in-out ml-2.5 md:w-[370px]"
        >
        Logo design, color palette, typography, icon set, brand guidelines
      </div>


      <!-- 3 -->

      <div
        class="group flex items-start justify-between gap-5 pt-5 md:pt-10 pb-5 md:pb-10 transition-all duration-300 ease-[cubic-bezier(0.4, 0, 0.2, 1)] transform hover:scale-[1.010] hover:-translate-y-1 hover:backdrop-blur-sm"
      >
        <span
          class="text-xl italic font-instrument leading-[32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out w-8"
          >03</span
        >
        <h3
          class="text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out text-2xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-[88px] font-normal leading-tight xl:leading-[1.15] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap md:w-[730px] mt-2"
        >
          Digital Assets
        </h3>
        <p
          class="text-xs md:text-base md:leading-[1.6] md:tracking-[0.32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody self-center transition-colors duration-300 ease-in-out ml-2.5 md:w-[370px]"
        >
          Social media templates, web graphics, branded digital assets
        </p>
      </div>

      <!-- 4 -->

      <div
        class="group flex items-start justify-between gap-5 pt-5 md:pt-10 pb-5 md:pb-10 transition-all duration-300 ease-[cubic-bezier(0.4, 0, 0.2, 1)] transform hover:scale-[1.010] hover:-translate-y-1 hover:backdrop-blur-sm"
      >
        <span
          class="text-xl italic font-instrument leading-[32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out w-8"
          >04</span
        >
        <h3
          class="text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody transition-colors duration-300 ease-in-out text-2xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-[88px] font-normal leading-tight xl:leading-[1.15] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap md:w-[730px] mt-2"
        >
          Print Design
        </h3>
        <p
          class="text-xs md:text-base md:leading-[1.6] md:tracking-[0.32px] text-secondary/70 dark:text-backgroundBody/70 group-hover:text-secondary dark:group-hover:text-backgroundBody self-center transition-colors duration-300 ease-in-out ml-2.5 md:w-[370px]"
        >
          Business cards, packaging, letterheads, presentation decks
        </p>
      </div>


    </div>
  </div>
</section>

<!-- ================================
Our Work Heading Section
================================ -->
  <!-- section header -->
  <div class="text-center mb-8 md:mb-16">
    <div class="rv-badge reveal-me mb-3">
      <span class="rv-badge-text">Coming Soon</span>
    </div>
    <h2 class="text-appear mb-3">
      Brand identities that <br />
      speak

      <i class="font-instrument"> for themselves</i>
    </h2>
    <p class="text-appear">A Legacy of Award-Winning productions</p>
  </div>

<!--=====================================
   Case Studies Section
======================================-->

 <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <div class="container">
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-9">

      <div class="reveal-me underline-hover-effect group">
        <a href="coming-soon.php">
          <figure class="overflow-hidden">
            <img
              src="images/home-3/branding-project-1.webp"
              class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3"
              alt="Services Img"
            />
          </figure>
          <div class="blog-title mt-[30px] text-center">
            <h3 class="capitalize text-center">SkiNity</h3>
          </div>
        </a>
      </div>

      <div class="md:mt-20 reveal-me underline-hover-effect group">
        <a href="coming-soon.php">
          <figure class="overflow-hidden">
            <img
              src="images/home-3/branding-project-2.webp"
              class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3"
              alt="Services Img"
            />
          </figure>
          <div class="blog-title mt-[30px] text-center">
            <h3 class="capitalize text-center">FinDoi</h3>
          </div>
          <h3 class="mt-[30px] capitalize text-center"></h3>
        </a>
      </div>
    </div>

    <!-- <ul class="flex justify-center mt-[60px] reveal-me">
      <li class="block md:inline-block w-full mx-auto md:w-auto">
        <a
          href="./coming-soon.php"
          class="rv-button rv-button-white block md:inline-block"
        >
          <div class="rv-button-top !text-center">
            <span>See all projects</span>
          </div>
          <div class="rv-button-bottom !text-center">
            <span>See all projects</span>
          </div>
        </a>
      </li>
    </ul> -->
  </div>
</section> 

<!--=====================================
   Our-Expertise Section
======================================-->
<section
  class=" pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div class="container">
    <!-- Section Header -->
    <div class="text-center mb-8 md:mb-14">
      <div class="rv-badge reveal-me">
        <span class="rv-badge-text">Why Choose Uxory</span>
      </div>
      <h2 class="my-3 text-appear">
        What makes Uxory a
        <i class="font-instrument">  top </i>
        <br class="hidden md:block" />
        <i class="font-instrument">choice</i>
      </h2>
      <p class="text-appear">
        Your brand’s growth is our mission.
      </p>
    </div>

    <!-- content Area -->

    <article>

      <div class="flex flex-col md:flex-row gap-[30px] reveal-me mb-[30px]">
        
        <div
          class="border dark:border-dark px-[30px] py-20 min-h-[322px] flex-1 reveal-me"
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
          <h5 class="mb-2.5 mt-5">Strategic Foundations</h5>
          <p>We build brands on deep research, positioning, and audience clarity—not just visuals.</p>
        </div>
       
        <div
          class="border dark:border-dark px-[30px] py-20 min-h-[322px] flex-1 reveal-me"
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
          <h5 class="mb-2.5 mt-5">Expert Team</h5>
          <p>Work with senior strategists, award-winning designers, and brand-focused copywriters.</p>
        </div>
      </div>

      <!-- bigger boxes (2) style -->
      <div class="flex flex-col md:flex-row gap-[30px] reveal-me">
        
        <div
          class="border dark:border-dark px-[30px] py-20 min-h-[322px] flex-1 reveal-me"
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
          <h5 class="mb-2.5 mt-5">Proven Results</h5>
          <p>Our work has led to 3× engagement, 40% more conversions, and stronger brand trust.</p>
        </div>
       
        <div
          class="border dark:border-dark px-[30px] py-20 min-h-[322px] flex-1 reveal-me"
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
          <h5 class="mb-2.5 mt-5">Scalable for Growth</h5>
          <p>From startups to enterprises, our branding scales with your business goals.</p>
        </div>
      </div>

    </article>
  </div>
</section>


<!-- ================================
pricing_V4 Section 
================================ -->

<!-- <section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[100px] overflow-hidden"
>
  <div class="container">
    
    <div class="mb-7 lg:mb-14 text-center">
      
      <h2 class="mb-3 text-center text-appear">
        Branding package for
        <i class="font-instrument"> every  </i>
        <br class="hidden md:block" />
        <i class="font-instrument"> business </i>
      </h2>
      <p class="max-w-3xl text-appear mx-auto">Transparent pricing for every stage of growth.
Choose a package that fits your business needs and budget.</p>
    </div>
  </div>

  <div
    class="flex max-2xl:flex-wrap items-center justify-center gap-[30px] max-w-[1600px] max-sm:px-5 mx-auto"
  >
  
    <div
      class="bg-backgroundBody dark:bg-dark border dark:border-dark px-[30px] pt-[30px] min-w-full sm:min-w-[416px] min-h-[510px] relative reveal-me"
    >
      <div class="flex justify-end mb-3">
        <div class="rv-badge">
          <span class="rv-badge-text">Starter Package</span>
        </div>
      </div>

      <h3 class="text-6xl leading-[60px] mb-[30px] max-sm:text-4xl">$999</h3>
      <ul
        class="mt-10 [&>*:not(:last-child)]:mb-2 md:[&>*:not(:last-child)]:mb-3"
      >
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Basic Components & variants
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Basic Components & variants
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Lifetime updates
        </li>
      </ul>

      <div class="absolute bottom-8 w-[calc(100%-60px)]">
        <a href="#" class="rv-button rv-button-white !w-full">
          <div class="rv-button-top !w-full !text-center">
            <span class="!font-normal"> Get Started</span>
          </div>
          <div class="rv-button-bottom !w-full !text-center">
            <span class="!font-normal"> Get Started</span>
          </div>
        </a>
      </div>
    </div>
    
    <div
      class="bg-backgroundBody dark:bg-dark border dark:border-dark px-[30px] pt-[30px] min-w-full sm:min-w-[416px] min-h-[510px] reveal-me relative"
    >
      <div
        class="absolute inset-0 bg-[url('../images/pricing-gradient.png')] bg-no-repeat bg-cover w-full h-full"
      ></div>

      <div class="flex justify-end mb-3 relative">
        <div class="rv-badge">
          <span class="rv-badge-text">Growth Package</span>
        </div>
      </div>

      <h3 class="text-6xl leading-[60px] mb-[30px] max-sm:text-4xl relative">
        $2,499
      </h3>
      <ul
        class="mt-10 [&>*:not(:last-child)]:mb-2 md:[&>*:not(:last-child)]:mb-3 relative"
      >
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Logo & Brand Identity (5 Concepts)
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Full Brand Strategy & Messaging Guide
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Stationery & Social Media Branding
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Two Rounds of Revisions
        </li>
      </ul>

      <div class="absolute bottom-8 w-[calc(100%-60px)]">
        <a href="#" class="rv-button rv-button-primary !w-full">
          <div class="rv-button-top !w-full !text-center">
            <span class="!font-normal"> Get Started</span>
          </div>
          <div class="rv-button-bottom !w-full !text-center">
            <span class="!font-normal"> Get Started</span>
          </div>
        </a>
      </div>
    </div>

   
    <div
      class="bg-backgroundBody dark:bg-dark border dark:border-dark px-[30px] pt-[30px] min-w-full sm:min-w-[416px] min-h-[510px] relative reveal-me"
    >
      <div class="flex justify-end mb-3">
        <div class="rv-badge">
          <span class="rv-badge-text">Premium Package</span>
        </div>
      </div>

      <h3 class="text-6xl leading-[60px] mb-[30px] max-sm:text-4xl">$4,999</h3>
      <ul
        class="mt-10 [&>*:not(:last-child)]:mb-2 md:[&>*:not(:last-child)]:mb-3"
      >
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Complete Brand Identity & Guidelines
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Website & Social Media Branding
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Lifetime updates
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Advanced Market Research
        </li>
        <li
          class="list-none flex gap-[10px] text-[17px] leading-[1.5] text-secondary/70 dark:text-backgroundBody/70"
        >
          <span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="inline dark:hidden"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="black"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hidden dark:block"
              viewBox="0 0 24 24"
              fill="none"
            >
              <path
                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM16.2806 10.2806L11.0306 15.5306C10.961 15.6004 10.8783 15.6557 10.7872 15.6934C10.6962 15.7312 10.5986 15.7506 10.5 15.7506C10.4014 15.7506 10.3038 15.7312 10.2128 15.6934C10.1218 15.6557 10.039 15.6004 9.96938 15.5306L7.71938 13.2806C7.57865 13.1399 7.49959 12.949 7.49959 12.75C7.49959 12.551 7.57865 12.3601 7.71938 12.2194C7.86011 12.0786 8.05098 11.9996 8.25 11.9996C8.44903 11.9996 8.6399 12.0786 8.78063 12.2194L10.5 13.9397L15.2194 9.21937C15.2891 9.14969 15.3718 9.09442 15.4628 9.0567C15.5539 9.01899 15.6515 8.99958 15.75 8.99958C15.8486 8.99958 15.9461 9.01899 16.0372 9.0567C16.1282 9.09442 16.2109 9.14969 16.2806 9.21937C16.3503 9.28906 16.4056 9.37178 16.4433 9.46283C16.481 9.55387 16.5004 9.65145 16.5004 9.75C16.5004 9.84855 16.481 9.94613 16.4433 10.0372C16.4056 10.1282 16.3503 10.2109 16.2806 10.2806Z"
                fill="#fff"
              />
            </svg>
          </span>
          Dedicated Branding Consultant
        </li>
      </ul>

      <div class="absolute bottom-8 w-[calc(100%-60px)]">
        <a href="#" class="rv-button rv-button-white !w-full">
          <div class="rv-button-top !w-full !text-center">
            <span class="!font-normal"> Get Started</span>
          </div>
          <div class="rv-button-bottom !w-full !text-center">
            <span class="!font-normal"> Get Started</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</section> -->


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

<!---Modal -->
<div
  aria-hidden="false"
  class="fixed z-[99999999990] hidden inset-0 top-6 items-start justify-center bg-metal-900 bg-dark-200/25"
  onclick="javascript.void(0)"
  id="modal"
  role="dialog"
>
  <div class="relative w-full p-4 h-auto animate-keep-bounce max-w-xl">
    <div class="relative bg-white dark:bg-dark p-2.5">
      <div class="p-10 max-lg:p-5">
        <div class="flex items-center justify-between pb-5">
          <h5 class="text-secondary dark:text-backgroundBody">Search</h5>
          <button class="text-secondary dark:text-backgroundBody" id="ok-btn">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              x="0px"
              y="0px"
              width="30"
              height="30"
              viewBox="0 0 50 50"
            >
              <path
                d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"
                class="fill-secondary dark:fill-backgroundBody"
              ></path>
            </svg>
          </button>
        </div>
        <form class="mt-5">
          <div>
            <div class="flex">
              <div class="relative w-full">
                <input
                  class="block w-full focus:outline-none focus:ring-0 text-secondary dark:text-backgroundBody border py-3.5 px-5 dark:border-dark bg-transparent placeholder:text-secondary/50 dark:placeholder:text-backgroundBody/50 outline-none focus:border-primary dark:focus:border-primary duration-300 transition-all"
                  id="#id-10"
                  placeholder="Search Uxory Component"
                  type="text"
                  value=""
                />
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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