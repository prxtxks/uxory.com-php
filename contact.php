<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Contact Us | Uxory</title>
  <meta name="description" content="Get in touch with Uxory for custom software, website development, automation, and AI solutions. Let's bring your vision to life." />

  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <meta name="googlebot" content="index, follow" />
  
  <!-- Theme & Mobile Optimization -->
  <meta name="theme-color" content="#000000" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="format-detection" content="telephone=yes" />
  
  <!-- Canonical URL -->
  <link rel="canonical" href="https://uxory.com/contact.php" />
  
  <!-- Performance Hints -->
  <link rel="preconnect" href="https://www.google.com" crossorigin />
  <link rel="dns-prefetch" href="https://www.google.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
  <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
  
  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
  <link rel="icon" type="image/png" href="/images/favicon.png" sizes="96x96" />
  <link rel="shortcut icon" href="/images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />
  
  <!-- Stylesheets -->
  <link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />


  <!-- Open Graph -->
  <meta property="og:title" content="Contact Us | Uxory" />
  <meta property="og:description" content="Let's connect! Reach out to Uxory for custom software, automation, and AI solutions tailored to your business goals." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/contact.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:url" content="https://uxory.com/contact.php" />
  <meta name="twitter:title" content="Contact Us | Uxory" />
  <meta name="twitter:description" content="Have a project in mind? Message us today to get started with custom software and automation solutions." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />
  <meta name="twitter:image:alt" content="Uxory Contact Page" />

  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "https://uxory.com/#organization",
        "name": "Uxory",
        "url": "https://uxory.com",
        "logo": {
          "@type": "ImageObject",
          "@id": "https://uxory.com/#logo",
          "url": "https://uxory.com/images/logo.png",
          "contentUrl": "https://uxory.com/images/logo.png",
          "width": 512,
          "height": 512
        },
        "email": "contact@uxory.com",
        "address": [
          {
            "@type": "PostalAddress",
            "streetAddress": "30 N Gould St Ste N",
            "addressLocality": "Sheridan",
            "addressRegion": "WY",
            "postalCode": "82801",
            "addressCountry": "US"
          },
          {
            "@type": "PostalAddress",
            "streetAddress": "Belair Street",
            "addressLocality": "Pune",
            "addressRegion": "MH",
            "postalCode": "411045",
            "addressCountry": "IN"
          }
        ],
        "contactPoint": [
          {
            "@type": "ContactPoint",
            "email": "contact@uxory.com",
            "contactType": "Customer Service",
            "areaServed": [
              {
                "@type": "Country",
                "name": "United States"
              },
              {
                "@type": "Country",
                "name": "India"
              }
            ],
            "availableLanguage": ["English", "Hindi"]
          }
        ],
        "sameAs": [
          "https://www.linkedin.com/company/uxory/",
          "https://www.instagram.com/uxoryllc/"
        ]
      },
      {
        "@type": "ContactPage",
        "@id": "https://uxory.com/contact.php#webpage",
        "url": "https://uxory.com/contact.php",
        "name": "Contact Us | Uxory",
        "description": "Get in touch with Uxory for custom software, website development, automation, and AI solutions.",
        "mainEntity": {
          "@id": "https://uxory.com/#organization"
        },
        "isPartOf": {
          "@id": "https://uxory.com/#website"
        },
        "primaryImageOfPage": {
          "@id": "https://uxory.com/#logo"
        }
      },
      {
        "@type": "WebSite",
        "@id": "https://uxory.com/#website",
        "url": "https://uxory.com",
        "name": "Uxory",
        "publisher": {
          "@id": "https://uxory.com/#organization"
        }
      }
    ]
  }
  </script>
  
  <!-- reCAPTCHA (explicit render – widget shown only when needed) -->
  <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer crossorigin="anonymous"></script>

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
$currentPage = 'contact';
$currentParent = 'contact';
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
   ./contact Page Header Section
======================================-->
<section
  class="pt-[120px] md:pt-[180px] pb-20 sm:pb-32 md:pb-36 lg:pb-36 xl:pb-[100px] relative overflow-hidden"
>

  <div class="container">
    <!-- CTA Heading -->
    <div class="reveal-me mb-8">
      <h2
        class="text-center font-normal"
      >
        Let's
        <div
          class="cta-slider-container max-sm:block sm:inline-block max-sm:mb-7 translate-y-2 sm:translate-y-[20px]"
        >
          <div class="cta-inline-slider">
            <div class="slide">
              <img src="images/agent/1.webp" alt="Slide 1" />
            </div>
            <div class="slide">
              <img src="images/agent/2.webp" alt="Slide 2" />
            </div>
            <div class="slide">
              <img src="images/agent/3.webp" alt="Slide 3" />
            </div>
          </div>
        </div>

        Create
        <span class="font-instrument sm:mt-10 italic block max-md:inline-block"
          >Something Iconic</span
        >
      </h2>
    </div>

      <!--=====================================
          ./contact Form Section
      ======================================-->
    
    <div class="container">

        <!-- ./contact Form -->
        <div class="review-form-card p-4 sm:p-6 md:p-12 max-w-[860px] mx-auto reveal-me">
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
              class="text-lg sm:text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Full Name
            </label>
            <input
              required
              type="text"
              name="name"
              placeholder="Enter your full name"
              class="py-3 pl-3 sm:py-4 sm:pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base sm:text-xl leading-[1.4] tracking-[0.4px] mt-2 sm:mt-3"
            />
          </div>

          <!-- Phone Field -->
          <div>
            <label
              for="phone"
              class="text-lg sm:text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Phone Number
            </label>
            <input
              type="tel"
              inputmode="tel"
              name="phone"
              id="phone"
              placeholder="+00 PHONE-NUMBER"
              class="py-3 pl-3 sm:py-4 sm:pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base sm:text-xl leading-[1.4] tracking-[0.4px] mt-2 sm:mt-3"
              required
            />
          </div>

          <!-- Email Field -->
          <div>
            <label
              for="email"
              class="text-lg sm:text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Email
            </label>
            <input
              required
              type="email"
              name="email"
              placeholder="name@company.com"
              class="py-3 pl-3 sm:py-4 sm:pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base sm:text-xl leading-[1.4] tracking-[0.4px] mt-2 sm:mt-3"
            />
          </div>

          <!-- Company Field -->
          <div class="md:col-span-full">
            <label
              for="company"
              class="text-lg sm:text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Company Name
            </label>
            <input
              type="text"
              name="company"
              placeholder="Your company name"
              class="py-3 pl-3 sm:py-4 sm:pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base sm:text-xl leading-[1.4] tracking-[0.4px] mt-2 sm:mt-3"
            />
          </div>

          <!-- Project Details -->
          <div class="md:col-span-full">
            <label
              for="Message"
              class="text-lg sm:text-2xl leading-[1.2] tracking-[-0.48px] text-secondary dark:text-backgroundBody"
            >
              Project Brief
            </label>
            <textarea
              name="Message"
              placeholder="Tell us about your project goals and timeline"
              class="py-3 pl-3 sm:py-4 sm:pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base sm:text-xl leading-[1.4] tracking-[0.4px] mt-2 sm:mt-3"
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

    <!-- Socials -->
    <div class="container pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px]">
      <div class="social-cards-wrap mx-auto flex flex-wrap justify-center gap-4 md:gap-6 reveal-me">

        <a href="https://www.instagram.com/uxoryllc/" target="_blank" rel="noopener noreferrer"
          class="social-card group flex items-center justify-center">
          <img src="/images/marquee-img/1.svg" alt="Instagram" />
        </a>

        <a href="https://www.linkedin.com/company/uxory/" target="_blank" rel="noopener noreferrer"
          class="social-card group flex items-center justify-center">
          <img src="/images/marquee-img/5.svg" alt="LinkedIn" />
        </a>

        <a href="mailto:contact@uxory.com"
          class="social-card group flex items-center justify-center">
          <img src="/images/marquee-img/4.svg" alt="Email" />
        </a>

        <a href="https://wa.me/917350677916" target="_blank" rel="noopener noreferrer"
          class="social-card group flex items-center justify-center">
          <img src="/images/marquee-img/2.svg" alt="WhatsApp" />
        </a>

      </div>
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
