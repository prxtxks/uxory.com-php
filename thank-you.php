<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Thank You for Contacting Us | Uxory Digital Solutions LLC</title>
  <meta name="description" content="We’ve received your message. The Uxory team will get back to you shortly. Thank you for reaching out!" />

  <meta charset="utf-8" />

  <!-- Mobile Responsive Meta -->
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
  <link rel="canonical" href="https://uxory.com/thank-you.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Thank You | Uxory Digital Solutions LLC" />
  <meta property="og:description" content="We appreciate your interest. We’ll be in touch soon!" />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/thank-you.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Thank You | Uxory Digital Solutions LLC" />
  <meta name="twitter:description" content="We appreciate your interest. We’ll be in touch soon!" />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />
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

<!-- Cursor Pointer -->
<div class="pointer"></div>

<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

<body >

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
<!--=========================
    Thank You Page Section
==========================-->
<section
  class="min-h-screen pt-28 md:pt-48 lg:pt-[200px] pb-14 md:pb-20 lg:pb-[100px]"
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
    <div class="flex flex-col justify-center items-center reveal-me text-center px-4">
      <!-- Thank You Title -->
      <h1 class="text-[64px] md:text-[96px] lg:text-[120px] font-instrument leading-tight">
        Thank You!
      </h1>
    
      <!-- Confirmation Message -->
      <h2 class="mt-6 mb-10 text-[20px] md:text-[28px] lg:text-[36px] font-normal leading-snug max-w-3xl">
        Our associate will reach out to you shortly.
      </h2>
    
      <!-- Back to Homepage Button -->
      <a href="/" class="rv-button rv-button-primary">
        <div class="rv-button-top !text-center">
          <span>Back to Homepage</span>
        </div>
        <div class="rv-button-bottom !text-center">
          <span>Back to Homepage</span>
        </div>
      </a>
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