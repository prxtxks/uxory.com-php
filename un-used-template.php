<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>
  <meta charset="utf-8" />
  <title>Uxory | Creative Agency Template</title>

  <!--Meta For No Index-->
  <meta name="robots" content="noindex, Nofollow, Noimageindex">
  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5" />
  <meta name="description" content="Uxory is a Creative Agency Template" />


  <!-- Stylesheets -->
  <link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />
  
  <!--Favicon-->
  <link rel="icon" type="image/png" href="images/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />
  <link rel="manifest" href="images/site.webmanifest" />
</head>
<body>

<!-- header  -->
<?php       
include 'components/header.php';
?>

<!-- nav  -->
<?php
$currentPage = '';     
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
        <span class="rv-badge-text">Studio</span>
      </div>
    </div>

    <h1 class="text-center">
      Welcome <br />
      <i class="font-instrument"> Details</i>
    </h1>
    <p class="max-w-3xl text-center mx-auto mt-3">
      We transform your special moments into unforgettable visual stories with
      expert craftsmanship and a creative touch
    </p>

    <!-- Hero Buttons -->
    <ul class="flex justify-center list-none mt-14">
      <li class="text-center inline cursor-pointer" id="hero-button">
        <a
          href="/contact.php"
          id="hero-button"
          class="rv-button rv-button-primary block md:inline-block"
        >
          <div class="rv-button-top">
            <span>Let’s Get Started</span>
          </div>
          <div class="rv-button-bottom">
            <span class="text-nowrap">Let’s Get Started</span>
          </div>
        </a>
      </li>
    </ul>
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


 <section
  class="pt-20 md:pt-32 lg:pt-40 xl:pt-[200px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] overflow-hidden"
>
  <div class="container">
    <div
      class="flex flex-col md:flex-row gap-x-16 gap-y-6 justify-center md:justify-between max-md:items-center border-y dark:border-dark py-6 md:py-10 mb-16 md:mb-20 lg:mb-[120px]"
    >
      <h3 class="max-md:text-3xl md:flex-1 text-center">
        Join  in the journey
      </h3>
      <div
        class="flex max-md:flex-wrap max-md:justify-center gap-9 md:gap-[60px]"
      >
        <div>
          <h4
            class="md:text-[47px] lg:text-[54px] xl:text-[64px] font-normal leading-[1.1] lg:leading-[1.2] mb-2 lg:mb-5 text-center"
          >
            $2B
          </h4>
          <p>Total Revenue</p>
        </div>
        <div id="counter">
          <h4
            class="md:text-[47px] lg:text-[54px] xl:text-[64px] font-normal leading-[1.1] lg:leading-[1.2] mb-2 lg:mb-5 text-center"
          >
            <span class="counter" data-value="15"> </span>
            +
          </h4>
          <p>Projects Successfully</p>
        </div>
        <div id="counter">
          <h4
            class="md:text-[47px] lg:text-[54px] xl:text-[64px] font-normal leading-[1.1] lg:leading-[1.2] mb-2 lg:mb-5 text-center"
          >
            <span class="counter" data-value="15"> </span>
          </h4>
          <p>Awwwwards</p>
        </div>
      </div>
    </div>

    <!-- about section -->
    <div>
      <!-- Status Badge -->
      <div class="rv-badge mb-2 reveal-me">
        <span class="rv-badge-text">About</span>
      </div>
      <h3
        class="text-3xl sm:text-[34px] md:text-[44px] lg:text-[54px] xl:text-[64px] leading-tight xl:leading-[1.1] mb-8 lg:mb-[52px] text-appear"
      >
        A few words about me
      </h3>
      <div
        class="flex flex-col lg:flex-row lg:items-center gap-y-16 gap-x-16 reveal-me"
      >
        <img src="images/portfolio/about-banner.png" alt="About me" />
        <div>
          <p class="text-lg leading-[1.6] tracking-[0.36px]">
            At Uxory Travels, we believe that travel is more than just visiting
            new places—it's about creating unforgettable memories. With years of
            experience, global connections, and a passion for exploration, we
            specialize in designing customized itineraries that match your
            style, budget, and dreams.
          </p>
          <p class="mt-5 mb-14 text-lg leading-[1.6] tracking-[0.36px]">
            Whether capturing the unspoken love between two souls, the vibrant
            energy of bustling city streets, or the tender innocence of a
            child's gaze, each frame becomes a testament to my relentless
            pursuit of visual excellence.
          </p>

          <ul>
            <li>
              <a
                href="about.php"
                class="rv-button rv-button-white block md:inline-block text-center"
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
    </div>
  </div>
</section>


 <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <div class="container">
    <div class="mb-10 md:mb-20 text-center">
      <h2 class="text-appear">Selected work</h2>
    </div>

    <div
      class="grid grid-cols-1 md:grid-cols-2 justify-items-center items-center md:items-start gap-[30px] gap-y-10"
    >
      <div
        class="reveal-me border dark:border-dark px-5 pt-5 pb-7 underline-hover-effect group"
      >
        <a href="project-details.php">
          <figure class="overflow-hidden">
            <img
              src="images/blog-img/blog-img-17.png"
              class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3"
              alt="Blog Images"
            />
          </figure>
        </a>
        <div class="mt-[26px] mb-2 lg:mb-3 flex items-center justify-between">
          <div class="rv-badge">
            <span class="rv-badge-text">Wedding</span>
          </div>
          <p
            class="text-base md:text-[22px] leading-8 tracking-[0.48px] text-secondary dark:text-white"
          >
            2022
          </p>
        </div>
        <a href="project-details.php">
          <div class="blog-title">
            <h3
              class="text-3xl lg:text-[42px] xl:text-[50px] font-normal lg:leading-[1.2] lg:tracking-[-1.68px]"
            >
              Wedding Harmony
            </h3>
          </div>
        </a>
      </div>

      <div
        class="reveal-me border dark:border-dark px-5 pt-5 pb-7 underline-hover-effect group"
      >
        <a href="project-details.php">
          <figure class="overflow-hidden">
            <img
              src="images/blog-img/blog-img-18.png"
              class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3"
              alt="Blog Images"
            />
          </figure>
        </a>
        <div class="mt-[26px] mb-2 lg:mb-3 flex items-center justify-between">
          <div class="rv-badge">
            <span class="rv-badge-text">Urban</span>
          </div>
          <p
            class="text-base md:text-[22px] leading-8 tracking-[0.48px] text-secondary dark:text-white"
          >
            2023
          </p>
        </div>
        <a href="project-details.php">
          <div class="blog-title">
            <h3
              class="text-3xl lg:text-[42px] xl:text-[50px] font-normal lg:leading-[1.2] lg:tracking-[-1.68px]"
            >
              Urban Landscape
            </h3>
          </div>
        </a>
      </div>

      <div
        class="reveal-me border dark:border-dark px-5 pt-5 pb-7 underline-hover-effect group"
      >
        <a href="project-details.php">
          <figure class="overflow-hidden">
            <img
              src="images/blog-img/blog-img-19.png"
              class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3"
              alt="Blog Images"
            />
          </figure>
        </a>
        <div class="mt-[26px] mb-2 lg:mb-3 flex items-center justify-between">
          <div class="rv-badge">
            <span class="rv-badge-text">Portraits</span>
          </div>
          <p
            class="text-base md:text-[22px] leading-8 tracking-[0.48px] text-secondary dark:text-white"
          >
            2021
          </p>
        </div>
        <a href="project-details.php">
          <div class="blog-title">
            <h3
              class="text-3xl lg:text-[42px] xl:text-[50px] font-normal lg:leading-[1.2] lg:tracking-[-1.68px]"
            >
              Inner Beauty
            </h3>
          </div>
        </a>
      </div>

      <div
        class="reveal-me border dark:border-dark px-5 pt-5 pb-7 underline-hover-effect group"
      >
        <a href="project-details.php">
          <figure class="overflow-hidden">
            <img
              src="images/blog-img/blog-img-20.png"
              class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3"
              alt="Blog Images"
            />
          </figure>
        </a>
        <div class="mt-[26px] mb-2 lg:mb-3 flex items-center justify-between">
          <div class="rv-badge">
            <span class="rv-badge-text">Urban</span>
          </div>
          <p
            class="text-base md:text-[22px] leading-8 tracking-[0.48px] text-secondary dark:text-white"
          >
            2024
          </p>
        </div>
        <a href="project-details.php">
          <div class="blog-title">
            <h3
              class="text-3xl lg:text-[42px] xl:text-[50px] font-normal lg:leading-[1.2] lg:tracking-[-1.68px]"
            >
              Urban Artistry
            </h3>
          </div>
        </a>
      </div>
    </div>

    <ul class="mt-14 flex justify-center reveal-me">
      <li class="max-md:w-full">
        <a
          href="/project.php"
          class="rv-button rv-button-white block md:inline-block text-center"
        >
          <div class="rv-button-top">
            <span>View All works</span>
          </div>
          <div class="rv-button-bottom">
            <span>View All works</span>
          </div>
        </a>
      </li>
    </ul>
  </div>
</section>


 <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <!-- Clients Logo Marquee -->
  <div class="marquee-container reveal-me">
    <div class="flex items-center justify-between py-2.5 pb-5">
      <div class="flex items-center gap-6 mr-5">
        <span
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Creative Development
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Visual Design
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Creative Development
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Visual Design
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Creative Development
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Visual Design
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Since 1993
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Based in New York
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Award-Winning Agency
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Since 1993
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
          class="text-5xl sm:text-[55px] md:text-[67px] lg:text-[84px] xl:text-8xl font-medium leading-tight xl:leading-[1.1] tracking-[-2px] xl:tracking-[-2.88px] text-nowrap"
        >
          Based in New York
        </span>
        <span class="mt-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="40"
            height="40"
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
   Services Accordion Section
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <div class="container">
    <div class="text-center mb-10 md:mb-20">
      <h2 class="text-appear">My Services</h2>
    </div>

    <!-- Services Container -->
    <div class="max-w-[1170px] w-full mx-auto reveal-me">
      <!--  -->
      <a href="services-details.php" class="block">
        <div
          class="bg-backgroundBody dark:bg-dark border-t border-x dark:border-dark group relative overflow-hidden"
        >
          <div
            class="relative group z-10 cursor-pointer py-10 md:py-[60px] px-5 md:px-10 flex justify-between items-center"
          >
            <h3
              class="relative z-10 flex flex-col md:flex-row md:items-center gap-x-32 gap-y-3 text-[25px] md:text-4xl lg:text-[42px] xl:text-5xl font-normal leading-[25.2px] md:leading-[1.2]"
            >
              <span class="font-medium">Portrait Shoots</span>
              <p
                class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] mt-2 pr-[2px] max-w-lg"
              >
                Delivering a stellar experience for every user.
              </p>
            </h3>

            <div
              class="transform transition-transform duration-500 ease-in-out group-hover:rotate-90"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
              >
                <path
                  d="M5 16H27"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>
          </div>

          <div class="overflow-hidden">
            <figure
              class="transform transition-all duration-700 ease-in-out opacity-0 h-0 -translate-y-4 group-hover:opacity-100 group-hover:h-[110px] md:group-hover:h-[160px] lg:group-hover:h-[230px] group-hover:translate-y-0"
            >
              <img
                src="images/services/photography-services.png"
                alt="Hover on Photography Services"
                class="px-5 md:px-10 pb-5 md:pb-10 pt-4 transition-all duration-700 ease-in-out object-cover"
              />
            </figure>
          </div>
        </div>
      </a>
      <!--  -->
      <a href="services-details.php" class="block">
        <div
          class="bg-backgroundBody dark:bg-dark border-t border-x dark:border-dark group relative overflow-hidden"
        >
          <div
            class="relative group z-10 cursor-pointer py-10 md:py-[60px] px-5 md:px-10 flex justify-between items-center"
          >
            <h3
              class="relative z-10 flex flex-col md:flex-row md:items-center gap-x-32 gap-y-3 text-[25px] md:text-4xl lg:text-[42px] xl:text-5xl font-normal leading-[25.2px] md:leading-[1.2]"
            >
              <span class="font-medium">Location shoots</span>
              <p
                class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] mt-2 pr-[2px] max-w-lg"
              >
                Delivering a stellar experience for every user.
              </p>
            </h3>

            <div
              class="transform transition-transform duration-500 ease-in-out group-hover:rotate-90"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
              >
                <path
                  d="M5 16H27"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>
          </div>

          <div class="overflow-hidden">
            <figure
              class="transform transition-all duration-700 ease-in-out opacity-0 h-0 -translate-y-4 group-hover:opacity-100 group-hover:h-[110px] md:group-hover:h-[160px] lg:group-hover:h-[230px] group-hover:translate-y-0"
            >
              <img
                src="images/services/photography-services-02.png"
                alt="Hover on Photography Services"
                class="px-5 md:px-10 pb-5 md:pb-10 pt-4 transition-all duration-700 ease-in-out object-cover"
              />
            </figure>
          </div>
        </div>
      </a>
      <!--  -->
      <a href="services-details.php" class="block">
        <div
          class="bg-backgroundBody dark:bg-dark border-t border-x dark:border-dark group relative overflow-hidden"
        >
          <div
            class="relative group z-10 cursor-pointer py-10 md:py-[60px] px-5 md:px-10 flex justify-between items-center"
          >
            <h3
              class="relative z-10 flex flex-col md:flex-row md:items-center gap-x-32 gap-y-3 text-[25px] md:text-4xl lg:text-[42px] xl:text-5xl font-normal leading-[25.2px] md:leading-[1.2]"
            >
              <span class="font-medium">Product Shoots</span>
              <p
                class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] mt-2 pr-[2px] max-w-lg"
              >
                Delivering a stellar experience for every user.
              </p>
            </h3>

            <div
              class="transform transition-transform duration-500 ease-in-out group-hover:rotate-90"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
              >
                <path
                  d="M5 16H27"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>
          </div>

          <div class="overflow-hidden">
            <figure
              class="transform transition-all duration-700 ease-in-out opacity-0 h-0 -translate-y-4 group-hover:opacity-100 group-hover:h-[110px] md:group-hover:h-[160px] lg:group-hover:h-[230px] group-hover:translate-y-0"
            >
              <img
                src="images/services/photography-services-03.png"
                alt="Hover on Photography Services"
                class="px-5 md:px-10 pb-5 md:pb-10 pt-4 transition-all duration-700 ease-in-out object-cover"
              />
            </figure>
          </div>
        </div>
      </a>
      <!--  -->
      <a href="services-details.php" class="block">
        <div
          class="bg-backgroundBody dark:bg-dark border-y border-x dark:border-dark group relative overflow-hidden"
        >
          <div
            class="relative group z-10 cursor-pointer py-10 md:py-[60px] px-5 md:px-10 flex justify-between items-center"
          >
            <h3
              class="relative z-10 flex flex-col md:flex-row md:items-center gap-x-32 gap-y-3 text-[25px] md:text-4xl lg:text-[42px] xl:text-5xl font-normal leading-[25.2px] md:leading-[1.2]"
            >
              <span class="font-medium">VideoGraphy</span>
              <p
                class="text-base md:text-xl md:leading-[1.4] md:tracking-[0.4px] mt-2 pr-[2px] max-w-lg"
              >
                Delivering a stellar experience for every user.
              </p>
            </h3>

            <div
              class="transform transition-transform duration-500 ease-in-out group-hover:rotate-90"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                height="32"
                viewBox="0 0 32 32"
                fill="none"
              >
                <path
                  d="M5 16H27"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M18 7L27 16L18 25"
                  class="stroke-black dark:stroke-white"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </div>
          </div>

          <div class="overflow-hidden">
            <figure
              class="transform transition-all duration-700 ease-in-out opacity-0 h-0 -translate-y-4 group-hover:opacity-100 group-hover:h-[110px] md:group-hover:h-[160px] lg:group-hover:h-[230px] group-hover:translate-y-0"
            >
              <img
                src="images/services/photography-services-04.png"
                alt="Hover on Photography Services"
                class="px-5 md:px-10 pb-5 md:pb-10 pt-4 transition-all duration-700 ease-in-out object-cover"
              />
            </figure>
          </div>
        </div>
      </a>
    </div>

    <ul class="mt-14 flex justify-center reveal-me">
      <li class="max-md:w-full">
        <a
          href="/services.php"
          class="rv-button rv-button-white block md:inline-block text-center"
        >
          <div class="rv-button-top">
            <span>Explore Services</span>
          </div>
          <div class="rv-button-bottom">
            <span>Explore Services</span>
          </div>
        </a>
      </li>
    </ul>
  </div>
</section>


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
  <!-- Clients Logo Marquee -->
  <div class="marquee-container reveal-me">
    <div class="flex items-center gap-10 md:gap-32 justify-between py-8">
      <div class="min-w-[190px] flex justify-center ml-10 md:ml-32">
        <img src="images/icons/company/client-1.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-2.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-3.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-4.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-5.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-1.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-2.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-3.svg" alt="client Logo" />
      </div>
    </div>
  </div>

  <!-- Reverse -->
  <div class="marquee-reverse-container reveal-me">
    <div class="flex items-center gap-10 md:gap-32 justify-between py-8">
      <div class="min-w-[190px] flex justify-center ml-10 md:ml-32">
        <img src="images/icons/company/client-1.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-2.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-3.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-4.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-5.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-1.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-2.svg" alt="client Logo" />
      </div>
      <div class="min-w-[190px] flex justify-center">
        <img src="images/icons/company/client-3.svg" alt="client Logo" />
      </div>
    </div>
  </div>

  <div class="container pt-16 lg:pt-20 reveal-me">
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
                The skeleton plan of a website can be broken down into three
                components
              </p>
              <h3
                class="text-xl md:text-[30px] md:leading-9 mb-10 text-backgroundBody"
              >
                Exceptional materials. The most durable glass ever in a <br />
                smartphone. A beautiful new gold finish, achieved with an
                atomic-level.
              </h3>
              <div class="flex justify-between items-center">
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
              </div>
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
                The skeleton plan of a website can be broken down into three
                components
              </p>
              <h3
                class="text-xl md:text-[30px] md:leading-9 mb-10 text-backgroundBody"
              >
                Exceptional materials. The most durable glass ever in a <br />
                smartphone. A beautiful new gold finish, achieved with an
                atomic-level.
              </h3>
              <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                  <img src="images/avatar/review-2.png" alt="Avatar Img" />
                  <div>
                    <h4
                      class="text-lg md:text-2xl md:leading-[1.2] text-backgroundBody"
                    >
                      John Deo
                    </h4>
                    <p
                      class="text-sm font-poppins leading-5 font-light text-backgroundBody/70"
                    >
                      CEO at W3School
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
              </div>
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
                The skeleton plan of a website can be broken down into three
                components
              </p>
              <h3
                class="text-xl md:text-[30px] md:leading-9 mb-10 text-backgroundBody"
              >
                Exceptional materials. The most durable glass ever in a <br />
                smartphone. A beautiful new gold finish, achieved with an
                atomic-level.
              </h3>
              <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                  <img src="images/avatar/review-8.png" alt="Avatar Img" />
                  <div>
                    <h4
                      class="text-lg md:text-2xl md:leading-[1.2] text-backgroundBody"
                    >
                      Zaks Addison
                    </h4>
                    <p
                      class="text-sm font-poppins leading-5 font-light text-backgroundBody/70"
                    >
                      Manager, Operations at Wacomm
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
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

 
 <section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[100px]"
>
  <div class="container relative">
    <h2 class="font-semibold mb-9 text-center md:mb-14 text-appear">
      Feedback
    </h2>

    <div class="swiper overflow-hidden reveal-me" id="reviewer">
      <div class="swiper-wrapper">
        <!-- swiper-slide 01 -->
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
        <!-- swiper-slide 02 -->
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
        <!-- swiper-slide 03 -->
        <div class="swiper-slide">
          <div
            class="flex flex-col md:flex-row items-start gap-y-5 md:space-x-10 content-between"
          >
            <img
              src="/images/team/team-4.png"
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
                <p class="text-2xl leading-[1.1]">Svetlana Shkurdze</p>
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
</section>


 <section
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