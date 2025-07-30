<!DOCTYPE html>
<html lang="zxx">


<head>
  <title>Custom Digital Solutions Package | Tailored Services for Your Brand | Uxory</title>
  <meta name="description" content="Get a personalized digital package that fits your unique business needs. Combine services like web design, SEO, branding, and more with Uxory." />

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="robots" content="index, follow" />

<!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/custom-package.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Custom Digital Services Package | Uxory" />
  <meta property="og:description" content="Create a fully personalized package that fits your goals. Choose from web design, SEO, content, branding & more." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/custom-package.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Custom Digital Services Package | Uxory" />
  <meta name="twitter:description" content="Personalized service bundles made for startups, creators, and businesses." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Service",
      "serviceType": "Custom Digital Package",
      "provider": {
        "@type": "Organization",
        "name": "Uxory",
        "url": "https://uxory.com",
        "logo": "https://uxory.com/images/logo.png"
      },
      "areaServed": {
        "@type": "Place",
        "name": "Worldwide"
      },
      "description": "Custom digital solutions from Uxory that bundle web development, branding, SEO, content creation, and more—tailored to your unique business needs."
    }
  </script>
</head>

<body>

<!-- header  -->
<?php       
include 'components/header.php';
?>

<!-- nav  -->
<?php
$currentPage = 'custom';
$currentParent = 'services';
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
  class="pt-[120px] md:pt-[180px] pb-20 sm:pb-32 md:pb-36 lg:pb-36 xl:pb-[100px] relative overflow-hidden"
>
  <!-- Gradient Background -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-[44%] lg:w-[40%] h-[44%] lg:h-[40%] top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 -z-10 blur-[60px] max-sm:scale-125 md:scale-[0.72]"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Header Content -->
  <div class="container">
    <div class="text-center reveal-me">
      <div class="rv-badge">
        <span class="rv-badge-text">GET IN TOUCH</span>
      </div>
      <h2 class="font-semibold mt-3 lg:mt-8 mb-4 md:mb-7">Get your Custom 
        <span class="font-instrument italic">Digital Marketing</span> Package.
      </h2>
      <p class="">Discover our innovative, cutting-edge no-code websites, crafted to effortlessly <br> captivate and engage your visitors.</p>
    </div>
  </div>
</section>


<!--=====================================
    ./contact Form Section
======================================-->
<section class="pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]">
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
About-v13 Section 
================================ -->

<section
  class="pt-28 md:pt-32 lg:pt-44 xl:pt-[200px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <!-- Content -->

  <div class="container">
    <div class="text-center">
      
      <h2 class="text-appear mb-6">Expert advice. Personalized Digital solutions.</h2>
      <h5 class="reveal-text reveal-me">At Uxory, we craft end-to-end digital experiences that captivate your audience and amplify your brand. From SEO-driven content to high-impact ad campaigns, our experts design a bespoke strategy tailored to your goals and budget.</h5>

      <p class="mt-3 max-w-3xl mx-auto reveal-me"> Whether you’re a budding startup or an established enterprise, we blend creativity with data-driven insights to drive measurable growth. Let us elevate your online presence and turn clicks into customers.</p>

      <ul class="justify-self-center max-md:w-full mt-7 md:mt-14 reveal-me">
        <li class="block md:inline-block w-full mx-auto md:w-auto text-center">
          <a
            href="./team.php"
            class="rv-button rv-button-white block md:inline-block"
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
</section>

<!-- ================================
why-choose-us-v5 Section 
================================ -->

<section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[200px]"
>
  <div class="container">
    <!-- Section Header -->
    <div class="text-center max-w-3xl mx-auto md:mb-16 mb-10">
      
      <h2 class="text-appear lg:leading-[1.1]">
        Excellence in every

        <span class="font-instrument italic"> detail </span>
      </h2>
      <p
        class="mt-4 text-appear text-black/70 dark:text-backgroundBody/70 font-normal"
      >
          At Uxory, we don’t just drive traffic; we ignite entire digital experiences. Here’s why forward-thinking businesses trust us:

      </p>
    </div>

    <!-- Card Container -->
    <div class="grid grid-cols-12 gap-[30px] reveal-me">
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
        <span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="61"
            height="60"
            viewBox="0 0 61 60"
            fill="none"
          >
            <rect
              width="60"
              height="60"
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              d="M31.25 12.5C31.25 12.0858 30.9142 11.75 30.5 11.75C30.0858 11.75 29.75 12.0858 29.75 12.5H31.25ZM29.75 47.5C29.75 47.9142 30.0858 48.25 30.5 48.25C30.9142 48.25 31.25 47.9142 31.25 47.5H29.75ZM37.9219 16.875C37.9219 16.4608 37.5861 16.125 37.1719 16.125C36.7577 16.125 36.4219 16.4608 36.4219 16.875H37.9219ZM36.4219 43.125C36.4219 43.5392 36.7577 43.875 37.1719 43.875C37.5861 43.875 37.9219 43.5392 37.9219 43.125H36.4219ZM44.5781 21.25C44.5781 20.8358 44.2423 20.5 43.8281 20.5C43.4139 20.5 43.0781 20.8358 43.0781 21.25H44.5781ZM43.0781 38.75C43.0781 39.1642 43.4139 39.5 43.8281 39.5C44.2423 39.5 44.5781 39.1642 44.5781 38.75H43.0781ZM51.25 25.625C51.25 25.2108 50.9142 24.875 50.5 24.875C50.0858 24.875 49.75 25.2108 49.75 25.625H51.25ZM49.75 34.375C49.75 34.7892 50.0858 35.125 50.5 35.125C50.9142 35.125 51.25 34.7892 51.25 34.375H49.75ZM23.0781 43.125C23.0781 43.5392 23.4139 43.875 23.8281 43.875C24.2423 43.875 24.5781 43.5392 24.5781 43.125H23.0781ZM24.5781 16.875C24.5781 16.4608 24.2423 16.125 23.8281 16.125C23.4139 16.125 23.0781 16.4608 23.0781 16.875H24.5781ZM16.4219 38.75C16.4219 39.1642 16.7577 39.5 17.1719 39.5C17.5861 39.5 17.9219 39.1642 17.9219 38.75H16.4219ZM17.9219 21.25C17.9219 20.8358 17.5861 20.5 17.1719 20.5C16.7577 20.5 16.4219 20.8358 16.4219 21.25H17.9219ZM9.75 34.375C9.75 34.7892 10.0858 35.125 10.5 35.125C10.9142 35.125 11.25 34.7892 11.25 34.375H9.75ZM11.25 25.625C11.25 25.2108 10.9142 24.875 10.5 24.875C10.0858 24.875 9.75 25.2108 9.75 25.625H11.25ZM29.75 12.5V47.5H31.25V12.5H29.75ZM36.4219 16.875V43.125H37.9219V16.875H36.4219ZM43.0781 21.25V38.75H44.5781V21.25H43.0781ZM49.75 25.625V34.375H51.25V25.625H49.75ZM24.5781 43.125V16.875H23.0781V43.125H24.5781ZM17.9219 38.75V21.25H16.4219V38.75H17.9219ZM11.25 34.375V25.625H9.75V34.375H11.25Z"
              class="stroke-secondary dark:stroke-backgroundBody"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5">Creative impact</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          Stunning designs and storytelling that captivate and convert.
        </p>
      </div>
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
        <span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="61"
            height="60"
            viewBox="0 0 61 60"
            fill="none"
          >
            <rect
              width="60"
              height="60"
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M24.0966 10L14.7852 27.7771H24.0966L17.1137 50L46.2137 27.7771H33.4109L40.3937 10H24.0966Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5">Strategy that works</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          Every campaign is rooted in your business goals for measurable growth.
        </p>
      </div>
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
        <span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="61"
            height="60"
            viewBox="0 0 61 60"
            fill="none"
          >
            <rect
              width="60"
              height="60"
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              d="M10.1141 20.7855C9.75894 20.9986 9.64377 21.4593 9.85688 21.8144C10.07 22.1696 10.5307 22.2848 10.8859 22.0717L10.1141 20.7855ZM24.7857 12.8571L25.2357 12.2571C24.9918 12.0742 24.6613 12.0571 24.3998 12.214L24.7857 12.8571ZM36.2143 21.4286L35.7643 22.0286C36.0379 22.2338 36.4157 22.2279 36.6828 22.0142L36.2143 21.4286ZM50.9685 10.5857C51.292 10.3269 51.3444 9.85493 51.0857 9.53148C50.8269 9.20803 50.3549 9.15559 50.0315 9.41435L50.9685 10.5857ZM46.8934 50.0002C46.8934 50.4144 47.2292 50.7502 47.6434 50.7502C48.0576 50.7502 48.3934 50.4144 48.3934 50.0002H46.8934ZM48.3934 27.1431C48.3934 26.7289 48.0576 26.3931 47.6434 26.3931C47.2292 26.3931 46.8934 26.7289 46.8934 27.1431H48.3934ZM24.034 50.0002C24.034 50.4144 24.3698 50.7502 24.784 50.7502C25.1983 50.7502 25.534 50.4144 25.534 50.0002H24.034ZM25.534 27.1431C25.534 26.7289 25.1983 26.3931 24.784 26.3931C24.3698 26.3931 24.034 26.7289 24.034 27.1431H25.534ZM35.4637 50.0001C35.4637 50.4143 35.7995 50.7501 36.2137 50.7501C36.6279 50.7501 36.9637 50.4143 36.9637 50.0001H35.4637ZM36.9637 35.7144C36.9637 35.3001 36.6279 34.9644 36.2137 34.9644C35.7995 34.9644 35.4637 35.3001 35.4637 35.7144H36.9637ZM12.6083 50.0001C12.6083 50.4143 12.944 50.7501 13.3583 50.7501C13.7725 50.7501 14.1083 50.4143 14.1083 50.0001H12.6083ZM14.1083 35.7144C14.1083 35.3001 13.7725 34.9644 13.3583 34.9644C12.944 34.9644 12.6083 35.3001 12.6083 35.7144H14.1083ZM10.8859 22.0717L25.1716 13.5003L24.3998 12.214L10.1141 20.7855L10.8859 22.0717ZM24.3357 13.4571L35.7643 22.0286L36.6643 20.8286L25.2357 12.2571L24.3357 13.4571ZM36.6828 22.0142L50.9685 10.5857L50.0315 9.41435L35.7458 20.8429L36.6828 22.0142ZM48.3934 50.0002V27.1431H46.8934V50.0002H48.3934ZM25.534 50.0002V27.1431H24.034V50.0002H25.534ZM36.9637 50.0001V35.7144H35.4637V50.0001H36.9637ZM14.1083 50.0001V35.7144H12.6083V50.0001H14.1083Z"
              class="stroke-secondary dark:stroke-backgroundBody"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5">Data-driven decisions</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          Real-time analytics guide constant optimization for maximum ROI.
        </p>
      </div>
      <div
        class="border dark:border-dark flex-1 px-[30px] py-10 col-span-12 lg:col-span-6"
      >
        <span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="61"
            height="60"
            viewBox="0 0 61 60"
            fill="none"
          >
            <rect
              width="60"
              height="60"
              transform="translate(0.5)"
              class="dark:fill-secondary fill-backgroundBody"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M30.5002 16.6662C30.5002 20.3476 27.5157 23.3319 23.8341 23.3319C20.1525 23.3319 17.168 20.3476 17.168 16.6662C17.168 12.9848 20.1525 10.0005 23.8341 10.0005C27.5157 10.0005 30.5002 12.9848 30.5002 16.6662Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M37.1673 40.6654C37.1673 45.8083 31.1983 49.9997 23.8322 49.9997C16.4661 49.9997 10.5 45.8197 10.5 40.6654C10.5 35.5111 16.4689 31.334 23.8351 31.334C31.2012 31.334 37.1673 35.5111 37.1673 40.6654Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M44.6137 22.8901C44.6137 25.0993 42.8228 26.8901 40.6135 26.8901C38.4042 26.8901 36.6133 25.0993 36.6133 22.8901C36.6133 20.681 38.4042 18.8901 40.6135 18.8901C41.6744 18.8901 42.6919 19.3116 43.4421 20.0617C44.1923 20.8119 44.6137 21.8293 44.6137 22.8901Z"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M42.5 47.3333C46.5395 47.6649 50.0994 44.6977 50.5005 40.6647C50.0979 36.6328 46.5385 33.6672 42.5 33.999"
              class="stroke-secondary dark:stroke-backgroundBody"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>
        <h5 class="mb-2.5 mt-5">White-glove support</h5>
        <p
          class="text-base font-normal text-black/70 dark:text-backgroundBody/70 leading-[25.6px]"
        >
          A dedicated team in your corner, every step of the way.
        </p>
      </div>
    </div>

    <ul class="justify-self-center max-md:w-full mt-7 md:mt-14 reveal-me">
      <li class="block md:inline-block w-full mx-auto md:w-auto text-center">
        <a
          href="./contact.php"
          class="rv-button rv-button-primary block md:inline-block"
        >
          <div class="rv-button-top">
            <span>Contact Uxory</span>
          </div>
          <div class="rv-button-bottom text-nowrap">
            <span>Contact Uxory</span>
          </div>
        </a>
      </li>
    </ul>
  </div>
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