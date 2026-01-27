<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Primary Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <title>Unsubscribe | Uxory</title>
  <meta name="description" content="Unsubscribe from Uxory email communications." />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
  
  <!-- Robots: No indexing for unsubscribe pages -->
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


  <meta  content="Submit your email to stop receiving Uxory's marketing updates." />

  <meta  content="Submit your email to stop receiving Uxory's marketing updates." />
</head>

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


<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

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

<main id="main-content" class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
<!--=========================
    Coming Soon Page Section
==========================-->
<section
  class="pt-36 md:pt-12 lg:pt-0 2xl:pt-12 min-h-screen relative overflow-hidden" 
>
  <div class="container">
    <!-- Gradient Background Wrapper -->
    <div
      id="hero-gradient-wrapper"
      class="absolute w-[80%] lg:w-full h-[80%] lg:h-full top-[35%] left-1/2 -translate-y-[35%] -translate-x-1/2 -z-10 blur-[60px]"
    >
      <img
        src="images/hero-gradient-background.png"
        alt="hero-gradient-background"
        id="hero-gradient"
        class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-0"
      />
    </div>

    <!-- Main Content -->
    <div class="flex flex-col justify-center items-center reveal-me">
      <!-- Coming Soon Title -->
      <h2
        class="mt-20 md:leading-[1.05] "
      >
        Unsubscribe
      </h2>

      <!--  Message -->
      <h5
        class="mt-8 mb-8 md:mb-[50px] text-center  max-lg:leading-[1.33] font-normal leading-[1.1] "
      >
        We are sorry to see you go
      </h5>

      <!-- Back to Homepage Button -->
      <div class="container mt-4 ">
        
        <div class="flex justify-center items-center">
          <!-- Email Unsubscribe Form -->
          <form
            class="max-md:max-w-sm max-w-[588px] mt-8 md:mt-10 flex bg-secondary border dark:border-dark text-white w-full relative"
            id="unsubscribeForm"
            action="php/unsubscribe-script.php"
            method="POST"
          >
            <input
              type="email"
              name="email"
              placeholder="Your email here"
              
              class="border-none focus:outline-none bg-transparent text-backgroundBody text-base block w-full p-5 md:p-[30px]"
              required
            />
            <button
              type="submit"
              class="inline-block max-md:text-xs bg-primary p-3 md:p-[26px] uppercase text-secondary font-poppins leading-[15.4px] tracking-[1.12px] absolute top-3 md:top-2 cursor-pointer right-2"
            >
              Unubscribe
            </button>
          </form>   
        </div>

      </div>
      
      <!-- this will hold the PHP response -->
      <div id="unsubscribeStatus" class="mt-4  text-black dark:text-white"></div>

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

</body>

</html>