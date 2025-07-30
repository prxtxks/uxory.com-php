<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Coming Soon | Uxory Digital Solutions</title>
  <meta name="description" content="This Uxory service page is currently under development. Stay tuned for updates as we expand our offerings." />

  <meta charset="utf-8" />

  <!-- Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Indexing -->
  <meta name="robots" content="noindex, follow" />

 <!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/coming-soon.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Coming Soon | Uxory Digital Solutions" />
  <meta property="og:description" content="The service or feature you're looking for is on its way. Uxory is constantly growing to serve you better." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/coming-soon.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Coming Soon | Uxory" />
  <meta name="twitter:description" content="This page is under construction. We’ll be back with something exciting soon." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />
</head>

<body>

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
      This page is under construction, but our support isn’t. Feel free to contact us anytime—we’re here for you!
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

    

    <div class="container">
    <div
      class="max-w-4xl mx-auto grid max-md:grid-cols-2 md:grid-cols-4 reveal-me border-t border-x [&>*]:border-r max-md:[&>*:nth-child(2)]:border-r-0 max-md:[&>*:nth-child(6)]:border-r-0 [&>*:nth-child(4)]:border-r-0 [&>*:nth-child(8)]:border-r-0 [&>*]:border-b dark:[&>*]:border-dark dark:border-dark"
    >
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://www.instagram.com/uxoryllc/" target="_blank" rel="noopener noreferrer">
          <img class="h-12 w-12" src="/images/marquee-img/1.svg" alt="IG" />
        </a>
      </figure>

      <figure class="flex items-center justify-center px-4 py-4">
        <a href="#" target="_blank" rel="noopener noreferrer">
          <img class="h-12 w-12" src="/images/marquee-img/3.svg" alt="X" />
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
        <a href="https://wa.me/15134137427" target="_blank" rel="noopener noreferrer">
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