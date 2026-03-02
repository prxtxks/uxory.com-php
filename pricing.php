<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Primary Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <title>Pricing | Uxory</title>
  <meta name="description" content="Contact Uxory for custom pricing on software development, website development, automation, and AI solutions." />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
  
  <!-- Robots: No indexing for pricing pages -->
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

<!-- nav -->
<?php
$currentPage = 'pricing';
$currentParent = 'pricing';
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
   Page Header Section
======================================-->
<section
  class="pt-28 sm:pb-28 max-md:pb-16 md:py-[155px] lg:py-[177px] relative z-50 overflow-hidden"
>
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-full top-0 left-0 -z-10 blur-[35px] md:blur-[60px] scale-75"
  >
    <!-- Gradient Background Image: Positioned centrally with responsive sizing -->
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Content Container -->
  <div class="container">
    <!-- Centered Content with Animation -->
    <div class="text-center reveal-me">
      <!-- Badge Component -->

      <!-- Title and Description -->
      <h2 class="mt-3.5 sm:mt-5 lg:mt-9 mb-3 sm:mb-4 lg:mb-7 font-medium">Built Around Your Budget</h2>
      <p class="font-medium">We don't offer a fixed pricing structure, as each service is uniquely tailored to your brand's goals. Reach out to us for a custom package or schedule a meeting with our experts to explore what your business truly needs and get a personalized quote.</p>
    </div>
  </div>
</section>



<!--=====================================
   CTA & Contact Form Section
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 relative"
>
  <div class="container">
    <!-- CTA Heading -->
    <h3
      class="text-center font-normal mb-10 md:mb-14"
    >
      Get in Touch
      <div
        class="cta-slider-container max-sm:block sm:inline-block max-sm:mb-5 translate-y-2 sm:translate-y-[20px] max-sm:mt-2.5"
      >
        <div class="cta-inline-slider">
          <div class="slide">
            <img src="/images/agent/1.webp" alt="Slide 1" />
          </div>
          <div class="slide">
            <img src="/images/agent/2.webp" alt="Slide 2" />
          </div>
          <div class="slide">
            <img src="/images/agent/3.webp" alt="Slide 3" />
          </div>
        </div>
      </div>
      with us.

      <span class="font-instrument sm:mt-10 italic block max-md:inline-block"
        >A virtual coffee?</span
      >
    </h3>

    <div class="container">

      <!-- ./contact Form -->
      <div class="review-form-card p-8 md:p-12 max-w-[860px] mx-auto reveal-me">
      <form
        id="contactForm"
        method="POST"
        class="grid grid-cols-1 md:grid-cols-2 gap-[20px]"
      >
        <input type="text" name="website" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true" />

        <!-- Full Name Field -->
        <div class="md:col-span-full">
          <label
            for="name"
            class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
          >
            Full Name
          </label>
          <input
            required
            type="text"
            name="name"
            placeholder="Enter your full name"
            class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
          />
        </div>

        <!-- Phone Field -->
        <div>
          <label
            for="phone"
            class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
          >
            Phone Number
          </label>
          <input
            type="tel"
            inputmode="tel"
            name="phone"
            id="phone"
            placeholder="+00 PHONE-NUMBER"
            class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
            required
          />
        </div>

        <!-- Email Field -->
        <div>
          <label
            for="email"
            class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
          >
            Email
          </label>
          <input
            required
            type="email"
            name="email"
            placeholder="name@company.com"
            class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
          />
        </div>

        <!-- Company Field -->
        <div class="md:col-span-full">
          <label
            for="company"
            class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
          >
            Company Name
          </label>
          <input
            type="text"
            name="company"
            placeholder="Your company name"
            class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
          />
        </div>

        <!-- Project Details -->
        <div class="md:col-span-full">
          <label
            for="Message"
            class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
          >
            Project Brief
          </label>
          <textarea
            name="Message"
            placeholder="Tell us about your project goals and timeline"
            class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3"
          ></textarea>
        </div>

        <div id="contact-recaptcha-wrapper" class="hidden mt-4">
          <div id="contact-recaptcha"></div>
        </div>

        <div id="statusMsg" class="mt-3 text-base lg:text-lg font-medium"></div>

        <!-- Submit Button -->
        <div class="col-span-full mx-auto mt-4">
          <button type="submit" class="rv-button rv-button-primary">
            <div class="rv-button-top">
              <span>Send Message</span>
            </div>
            <div class="rv-button-bottom">
              <span>Send Message</span>
            </div>
          </button>
        </div>
      </form>

      <!-- Success Screen -->
      <div id="formSuccess" class="hidden text-center py-8 md:py-12 px-4">
        <div class="form-success-icon mx-auto mb-6">
          <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 mx-auto">
            <circle class="success-circle" cx="40" cy="40" r="36" stroke="rgb(18 216 204)" stroke-width="3" fill="none"/>
            <polyline class="success-check" points="24,41 35,52 56,30" stroke="rgb(18 216 204)" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
          </svg>
        </div>
        <h3 class="text-2xl md:text-3xl font-medium mb-3">Message received!</h3>
        <p class="text-colorText dark:text-backgroundBody/70 text-lg leading-relaxed mb-8 max-w-sm mx-auto">
          Thank you for reaching out. We'll review your message and get back to you shortly.
        </p>
        <button id="formResetBtn" class="rv-button rv-button-primary mx-auto">
          <div class="rv-button-top"><span>Send Another</span></div>
          <div class="rv-button-bottom"><span>Send Another</span></div>
        </button>
      </div>

      </div>
    </div>

  </div>

</section>

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