<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Primary Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <title>Coming Soon | Uxory</title>
  <meta name="description" content="This page is currently under development. Please check back soon." />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
  
  <!-- Robots: No indexing for coming soon pages -->
  <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noimageindex" />
  <meta name="googlebot" content="noindex, nofollow, noarchive, nosnippet, noimageindex" />
  
  <!-- Theme & Mobile Optimization -->
  <meta name="theme-color" content="#000000" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="format-detection" content="telephone=no" />

 <!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
  <link rel="icon" type="image/png" href="/images/favicon.png" sizes="96x96" />
  <link rel="shortcut icon" href="/images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />



  <meta name="" content="This page is under construction. We'll be back with something exciting soon." />
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
include 'components/nav.php';
?>

<div
  class="menu-overflow fixed z-[9999] bg-[rgba(10,10,10,0.95)] bg-opacity-60 backdrop-blur-[25px] w-full h-full pointer-events-none"
></div>


<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

<main id="main-content" class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">

<!--=====================================
   Hero Section
======================================-->
<section
  class="pt-[120px] sm:pt-[135px] md:pt-[150px] lg:pt-44 xl:pt-[200px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
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

    <h1 class="text-center reveal-me">
      <i class="font-instrument"></i> Coming
     <i class="font-instrument"> soon &nbsp; &#59;&#41;</i>  

    </h1>
    <p class="max-w-3xl text-center mx-auto mt-3 text-appear">
      This page is under re-construction, but our support isn't. Feel free to contact us anytime - we're here for you!
    </p>

    <!-- Hero Buttons -->
    <div class="flex flex-col md:flex-row justify-center items-center mt-14 pb-10 gap-6 px-4 reveal-me">

       <!-- Button 1 -->
      <div
        class="flex w-full md:w-auto p-3 group bg-primary bg-opacity-30 gap-3 justify-between items-center backdrop-blur-2xl max-w-[320px] md:max-w-[320px]"
      >
        <div>
          <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
           Go Back
          </h6>
        </div>
          <a href="javascript:history.back()">
            <figure
              class="bg-primary w-[44px] h-[44px] cursor-pointer relative overflow-hidden"
            >
              <img
                src="images/icons/arrow-back-icon.svg"
                alt="Arrow Icon"              />
             
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
                src="images/icons/hyper-arrow-new.svg"
                alt="Arrow Icon"              />
            </figure>
          </a>
      </div>

    </div>

    

    <div class="container">
    <div
      class="max-w-4xl mx-auto grid max-md:grid-cols-2 md:grid-cols-4 reveal-me border-t border-x [&>*]:border-r max-md:[&>*:nth-child(2)]:border-r-0 max-md:[&>*:nth-child(6)]:border-r-0 [&>*:nth-child(4)]:border-r-0 [&>*:nth-child(8)]:border-r-0 [&>*]:border-b dark:[&>*]:border-dark dark:border-dark"
    >
      <!-- Instagram-->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://www.instagram.com/uxoryllc/" target="_blank" rel="noopener noreferrer">
          <img class="h-12 w-12" src="/images/marquee-img/1.svg" alt="IG" />
        </a>
      </figure>

      <!-- Linkedin Contact -->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://www.linkedin.com/company/uxory/" target="_blank" rel="noopener noreferrer">
          <img class="h-12 w-12" src="/images/marquee-img/5.svg" alt="Linkedin" />
        </a>
      </figure>

      <!-- Email Contact -->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="mailto:contact@uxory.com" target="_blank" rel="noopener noreferrer">
          <img class="h-12 w-12" src="/images/marquee-img/4.svg" alt="MAIL" />
        </a>
      </figure>

      <!-- WhatsApp Chat -->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://wa.me/917350677916" target="_blank" rel="noopener noreferrer">
          <img class="h-12 w-12" src="/images/marquee-img/2.svg" alt="WHATSAPP" />
        </a>
      </figure>
     
    </div>
  </div>
  </div>

  <!-- Decorative Images -->
      <!-- <figure
        class="absolute top-[42%] -left-[4.5%] hidden md:block reveal-me"
        id="hero-image-1"
      >
        <img src="/images/hero-img/hero-img-05.png" alt="" class="reveal-me" />
      </figure>
      <figure
        class="absolute top-[12%] -right-[5%] hidden md:block reveal-me"
        id="hero-image-2"
      >
        <img src="/images/hero-img/hero-img-06.png" alt="" />
      </figure>
      <figure
        class="absolute bottom-[0%] right-[18.5%] hidden lg:block reveal-me"
        id="hero-image-3"
      >
        <img src="/images/hero-img/hero-img-07.png" alt="" class="reveal-me" />
      </figure> -->

</section>


<!--=====================================
   CTA Section
======================================-->
<?php       
include 'components/cta.php';
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