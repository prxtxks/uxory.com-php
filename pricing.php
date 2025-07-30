<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Transparent Pricing for Digital Solutions | Uxory</title>
  <meta name="description" content="Discover Uxory's transparent pricing for digital solutions including web development, branding, marketing, content creation, and automation. Starting at just $99." />

  <meta charset="utf-8" />

  <!-- Mobile Responsive Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="robots" content="noindex, follow" />

  <!-- Stylesheets -->
  <link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/pricing.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Transparent Pricing for Digital Solutions | Uxory" />
  <meta property="og:description" content="Discover Uxory's transparent pricing for digital solutions including web development, branding, marketing, content creation, and automation. Starting at just $99." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/pricing.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Transparent Pricing for Digital Solutions | Uxory" />
  <meta name="twitter:description" content="Discover Uxory's transparent pricing for digital solutions including web development, branding, marketing, content creation, and automation. Starting at just $99." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Pricing",
    "description": "Discover Uxory's transparent pricing for digital solutions including web development, branding, marketing, content creation, and automation. Starting at just $99.",
    "url": "https://uxory.com/pricing.php"
  }
  </script>
</head>

<body >

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

<!-- Cursor Pointer -->
<div class="pointer"></div>

<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
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
      <div class="rv-badge">
        <span class="rv-badge-text">Pricing</span>
      </div>

      <!-- Title and Description -->
      <h1 class="mt-3.5 sm:mt-5 lg:mt-9 mb-3 sm:mb-4 lg:mb-7"><i class="font-instrument">Pricing</i> Plan</h1>
      <p>We don’t offer a fixed pricing structure, as each service is uniquely tailored to your brand’s goals. Reach out to us for a custom package or schedule a meeting with our experts to explore what your business truly needs and get a personalized quote.</p>
    </div>
  </div>
</section>



<!--=====================================
   CTA Section
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-[70px] lg:pb-[140px] relative"
>
  <div class="container">
    <!-- CTA Heading -->
    <h2
      class="text-center xl:text-[96px] font-normal xl:leading-[1.1] xl:tracking-[-2.88px]"
    >
      Get in Touch
      <div
        class="cta-slider-container max-sm:block sm:inline-block max-sm:mb-5 translate-y-2 sm:translate-y-[20px] max-sm:mt-2.5"
      >
        <div class="cta-inline-slider">
          <div class="slide">
            <img src="images/agent/01.webp" alt="Slide 1" />
          </div>
          <div class="slide">
            <img src="images/agent/02.webp" alt="Slide 2" />
          </div>
          <div class="slide">
            <img src="images/agent/03.webp" alt="Slide 3" />
          </div>
        </div>
      </div>
      with us.

      <span class="font-instrument sm:mt-10 italic block max-md:inline-block"
        >A virtual coffee?</span
      >
    </h2>
  </div>
</section>

<!--=====================================
    ./contact Form Section
======================================-->
<section class="pb-14 md:pb-16">
  <div class="container">

    <!-- ./contact Form -->
    <form
      id="contactForm" action="php/send_email.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-[30px] max-w-[800px] mx-auto reveal-me"
    >
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

      <!-- Country Selection -->
      <!-- <div class="relative">
        <label
          for="select country"
          class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
        >
          Country
        </label>
        <select
          name="country"
          class="py-4 px-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3 appearance-none indent-px text-ellipsis"
        >
          <option selected value="UI/UX">Select</option>
          <option value="United States">🇺🇸 United States</option>
          <option value="India">🇮🇳 India</option>
        </select>
        <span class="absolute right-5 top-1/2 translate-y-1/3">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            class="inline dark:hidden"
          >
            <path
              d="M6 9L12 15L18 9"
              stroke="black"
              stroke-opacity="0.7"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            class="hidden dark:inline"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
          >
            <path
              d="M6 9L12 15L18 9"
              stroke="white"
              stroke-opacity="0.7"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>
      </div> -->

      <!-- Service Selection -->
      <!-- <div class="relative">
        <label
          for="select Service"
          class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
        >
          Service Type
        </label>
        <select
          name="service"
          class="py-4 px-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3 appearance-none indent-px text-ellipsis"
        >
          <option selected value="Unspecified">Select</option>
          <option value="UI/UX Design">UI/UX Design</option>
          <option value="Website Development">Website Development</option>
          <option value="Website Reconstruct">Website Reconstruct</option>
          <option value="E-commerce Development">E-commerce Development</option>
          <option value="Web App Development">Web App Development</option>
          <option value="Mobile App Development">Mobile App Development</option>
          <option value="Enterprise App Development">Enterprise App Development</option>
          <option value="Product Design">Product Design</option>
          <option value="Brand Identity">Brand Identity</option>
          <option value="SEO">SEO</option>
          <option value="Photography Services">Photography Services</option>
        </select>
        <span class="absolute right-5 top-1/2 translate-y-1/3">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            class="inline dark:hidden"
          >
            <path
              d="M6 9L12 15L18 9"
              stroke="black"
              stroke-opacity="0.7"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            class="hidden dark:inline"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
          >
            <path
              d="M6 9L12 15L18 9"
              stroke="white"
              stroke-opacity="0.7"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>
      </div> -->


      <!-- Budget Range -->
      <!-- <div class="relative">
          <label for="budget" class="text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody">
              Project Budget
          </label>
          <select name="budget" id="budget" class="py-4 px-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-xl leading-[1.4] tracking-[0.4px] mt-3 appearance-none indent-px text-ellipsis">
              <option selected value="Unspecified">Select</option>
          </select>
          <span class="absolute right-5 top-1/2 translate-y-1/3 inline dark:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M6 9L12 15L18 9" stroke="black" stroke-opacity="0.7" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
          </span>
      </div> -->

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

      <!-- Submit Button -->
      <div class="col-span-full mx-auto sm:mt-14">
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