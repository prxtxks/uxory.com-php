<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Page Not Found | Uxory</title>
  <meta name="description" content="Oops! The page you’re looking for doesn’t exist. Let Uxory guide you back to inspiring digital experiences." />

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex, follow" />

<!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />
  <link rel="canonical" href="https://uxory.com/ai_driven_marketing/" />


  <!-- Open Graph -->
  <meta property="og:title" content="404 Error | Page Not Found - Uxory" />
  <meta property="og:description" content="Looks like you hit a dead end. Let’s get you back to Uxory’s digital universe." />
  <meta property="og:image" content="https://www.uxory.com/images/social-preview.png" />
  <meta property="og:url" content="https://www.uxory.com/404.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="404 | Page Not Found - Uxory" />
  <meta name="twitter:description" content="The page you’re looking for isn’t here. Let’s redirect you back to beautiful things." />
  <meta name="twitter:image" content="https://www.uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "404 Page",
    "url": "https://www.uxory.com/404.php",
    "description": "Uxory 404 Page - The content you’re searching for might have moved or doesn’t exist. Explore our homepage instead.",
    "mainEntity": {
      "@type": "Organization",
      "name": "Uxory",
      "url": "https://uxory.com",
      "logo": "https://uxory.com/images/logo.png"
    }
  }
  </script>
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
    404 Error Page Section
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
    <div class="flex flex-col justify-center items-center reveal-me mt-16">
      <!-- 404 Title -->
      <h1
        class="text-[180px] md:text-[400px] md:leading-[1.05] font-instrument"
      >
        404
      </h1>

      <!-- Error Message -->
      <h2
        class="mt-8 mb-8 md:mb-[50px] text-[36px] max-lg:leading-[1.33] lg:text-[87px] font-normal leading-[1.1] lg:tracking-[-2.83px]"
      >
        Page not Found
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