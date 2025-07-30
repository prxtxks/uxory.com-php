<!DOCTYPE html>
<html lang="zxx">

<head>

  <!--Tittle-->
<title>Uxory | Design-Driven Digital Solutions Agency</title>
<meta name="description" content="Uxory is a design-driven digital solutions agency crafting websites, interfaces, and creative solutions for future-forward brands." />

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
<meta property="og:title" content="Uxory | Design-Driven Digital Solutions Agency" />
<meta property="og:description" content="We craft digital experiences that elevate brands." />
<meta property="og:image" content="https://www.uxory.com/images/logo.png" />
<meta property="og:url" content="https://www.uxory.com" />
<meta property="og:type" content="website" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Uxory | Design-Driven Digital Agency" />
<meta name="twitter:description" content="We craft digital experiences that elevate brands." />
<meta name="twitter:image" content="https://www.uxory.com/images/logo.png" />

<!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Uxory",
    "url": "https://uxory.com",
    "logo": "https://uxory.com/images/logo.png",
    "description": "Design-Driven Digital Solutions Agency building websites and experiences for forward-thinking brands."
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
      <span>YOUR TECH PARTNER</span>
      <span
        class="inline-block w-[150px] h-[1px] bg-secondary dark:bg-backgroundBody/70"
      ></span>
      <span>Uxory</span>
    </p>

    <!-- Hero Heading -->
    <h2 class="font-semibold mt-5 sm:mt-10">
     Scaling your brand with a 
      <i class="font-instrument">Digital Presence</i> like no one 
      <i class="font-instrument">else.</i>
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
        At Uxory, we specialize in crafting stunning websites, revenue-driven SEO, and impactful digital marketing that helps your business stand out, and unlock the exponential growth you've been missing.   
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
        <p>Building Brands,that Create Impact</p>
      </div>
    </div>


      <p class="reveal-text-2 text-2xl lg:text-3xl text-secondary/90 dark:text-backgroundBody/70 text-left font-normal lg:leading-[1.2] lg:tracking-[0.72px] pt-10 sm:pt-20">
        Uxory combines proven strategies, expert execution, and data-driven insights to help your business reach—and exceed—its revenue goals. We see your business goals as our own, building a partnership for shared success.
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
          Website Development
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
        SEO
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
          Digital Marketing
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
          Rank #1 on Google
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
          Digital Marketing
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
          Rank #1 on Google
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
          SEO
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
          Website Development
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
          We offer everything you need to build, manage, and grow your digital presence—effortlessly.
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

        <a href="./seo.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/seo.webp"
              alt="SEO"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
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

        <a href="/email-marketing-and-automation.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="/images/services-icons/Email-services-icon.webp"
              alt="Email"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
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

        <a href="./coming-soon.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/adwords-services-icon.webp"
              alt="Paid Ads"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
              Paid Advertising (PPC)
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
        
        <a href="./social-media.php" class="fab-member relative max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 overflow-visible transitionTimingFunction">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/verified.webp"
              alt="Social Media Marketing"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
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
        
        <a href="./branding.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/branding-services-icon.webp"
              alt="Branding"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
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

        <a href="./custom-package.php" class="fab-member max-w-[370px] border dark:border-dark p-5 flex items-center gap-5 transitionTimingFunction relative overflow-visible">
          <figure class="flex-none w-[100px] h-[100px]">
            <img
              src="images/services-icons/custom-packages-services-icon.webp"
              alt="Custom Packages"
              class="w-full h-full object-contain"
            />
          </figure>
          <div class="flex-1">
            <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3 mr-2">
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

</section>

<!-- ================================
How We Drive Revenue Section
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
          How We
          <span class="font-instrument italic">Drive Revenue</span>
        </h3>
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

  <div class="swiper cardSwiper pl-[19%]">
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

<!-- =======================
 Feedback Section
 ====================== -->
 <!-- <section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[100px]"
>
  <div class="container relative">
    <h2 class="mt-3 mb-10 lg:mb-20 text-center text-appear">
      Feedback
    </h2>

    <div class="swiper overflow-hidden reveal-me" id="reviewer">
      <div class="swiper-wrapper">
        
        <div class="swiper-slide">
          <div
            class="flex flex-col md:flex-row items-start gap-y-5 md:space-x-10 content-between"
          >
            <img
              src="/images/home-4/user-1.png"
              alt="User Image"
              class="max-md:w-full object-cover md:max-w-[300px] md:max-h-[260px]"
            />
            <div class="flex flex-col md:max-w-[650px]">
              <p class="text-lg leading-[1.6] tracking-[0.36px]">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium totam rem aperiam eaque ipsa
                quae ab illo inventore veritatis et quasi architecto beatae
                vitae dicta sunt explicabo.
              </p>
              <div class="flex items-center gap-x-6 mt-5 mb-[34px]">
                <p class="text-2xl leading-[1.1]">Jaks Shkurdze</p>
                <p>|</p>
                <p class="leading-[1.6] text-sm">Co-Founder</p>
              </div>
              <div class="flex items-center justify-between mt-12">
                <div class="flex space-x-3">
                  <a
                    href="https://www.linkedin.com/company/staticmania"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                  >
                    <img
                      src="/images/home-4/linkedin.png"
                      alt="icon"
                      class="block dark:hidden mt-[2px]"
                    />
                    <img
                      src="/images/home-4/linkedin-dark.png"
                      alt="icon"
                      class="hidden dark:block mt-[2px]"
                    />
                  </a>
                  <a
                    href="https://x.com/heystaticmania"
                    target="_blank"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                  >
                    <img
                      src="/images/home-4/old-twitter.png"
                      alt="icon"
                      class="block dark:hidden"
                    />
                    <img
                      src="/images/home-4/old-twitter-dark.png"
                      target="_blank"
                      alt="icon"
                      class="hidden dark:block"
                    />
                  </a>
                  <a
                    href="https://www.instagram.com/staticmania_/"
                    target="_blank"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                  >
                    <img
                      src="/images/home-4/instragram.png"
                      alt="icon"
                      class="block dark:hidden"
                    />
                    <img
                      src="/images/home-4/instragram-dark.png"
                      alt="icon"
                      class="hidden dark:block"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="swiper-slide">
          <div
            class="flex flex-col md:flex-row items-start gap-y-5 md:space-x-10 content-between"
          >
            <img
              src="/images/team/team-1.png"
              alt="User Image"
              class="max-md:w-full object-cover md:max-w-[300px] md:max-h-[260px]"
            />
            <div class="flex flex-col md:max-w-[650px]">
              <p class="text-lg leading-[1.6] tracking-[0.36px]">
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                accusantium doloremque laudantium totam rem aperiam eaque ipsa
                quae ab illo inventore veritatis et quasi architecto beatae
                vitae dicta sunt explicabo.
              </p>
              <div class="flex items-center gap-x-6 mt-5 mb-[34px]">
                <p class="text-2xl leading-[1.1]">Roy</p>
                <p>|</p>
                <p class="leading-[1.6] text-sm">Co-Founder</p>
              </div>
              <div class="flex items-center justify-between mt-12">
                <div class="flex space-x-3">
                  <a
                    href="https://www.linkedin.com/company/staticmania"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                  >
                    <img
                      src="/images/home-4/linkedin.png"
                      alt="icon"
                      class="block dark:hidden mt-[2px]"
                    />
                    <img
                      src="/images/home-4/linkedin-dark.png"
                      alt="icon"
                      class="hidden dark:block mt-[2px]"
                    />
                  </a>
                  <a
                    href="https://x.com/heystaticmania"
                    target="_blank"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                  >
                    <img
                      src="/images/home-4/old-twitter.png"
                      alt="icon"
                      class="block dark:hidden"
                    />
                    <img
                      src="/images/home-4/old-twitter-dark.png"
                      target="_blank"
                      alt="icon"
                      class="hidden dark:block"
                    />
                  </a>
                  <a
                    href="https://www.instagram.com/staticmania_/"
                    target="_blank"
                    class="border dark:border-dark p-1.5 md:p-3 hover:bg-primary duration-300"
                  >
                    <img
                      src="/images/home-4/instragram.png"
                      alt="icon"
                      class="block dark:hidden"
                    />
                    <img
                      src="/images/home-4/instragram-dark.png"
                      alt="icon"
                      class="hidden dark:block"
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
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
</section> -->

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