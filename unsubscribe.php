<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>
  <!-- Title -->
  <title>Unsubscribe from Our Emails | Uxory Digital Solutions LLC</title>
  <meta name="description" content="Enter your email to unsubscribe from Uxory's marketing and newsletter communications. We respect your inbox." />

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
  <link rel="canonical" href="https://uxory.com/unsubscribe.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Unsubscribe from Emails | Uxory" />
  <meta property="og:description" content="Submit your email to stop receiving Uxory’s marketing updates." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/unsubscribe.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Unsubscribe from Emails | Uxory" />
  <meta name="twitter:description" content="Submit your email to stop receiving Uxory’s marketing updates." />
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
      <h1
        class="mt-20 md:leading-[1.05] "
      >
        Unsubscribe
      </h1>

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