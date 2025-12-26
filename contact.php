<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- Title -->
  <title>Contact Us | Uxory Digital Solutions</title>
  <meta name="description" content="Get in touch with Uxory Digital Solutions for website development, SEO, branding, and digital marketing. Let’s bring your vision to life." />

  <meta charset="utf-8" />

  <!-- Responsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Indexing -->
  <meta name="robots" content="index, follow" />
  
<!-- Stylesheets -->
<link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="./images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./images/favicon.svg" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/contact.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Contact Us | Uxory Digital Solutions" />
  <meta property="og:description" content="Let’s connect! Reach out to Uxory Digital Solutions for digital services tailored to your business goals." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/contact.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Contact Uxory Digital Solutions" />
  <meta name="twitter:description" content="Have a project in mind? Message us today to get started." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contact Us | Uxory Digital Solutions",
  "url": "https://uxory.com/contact.php",
  "mainEntity": {
    "@type": "Organization",
    "name": "Uxory Digital Solutions LLC",
    "url": "https://uxory.com",
    "logo": "https://uxory.com/images/logo.png",
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+1-xxx-xxx-xxxx",
      "contactType": "Customer Service",
      "areaServed": "US, IN",
      "availableLanguage": ["English", "Hindi"]
    },
    "sameAs": [
      "https://www.linkedin.com/company/uxory"  // Or Twitter if you choose that
    ]
  }
}
</script>

</head>

<body >

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

<!-- Cursor Pointer -->
<div class="pointer"></div>

<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
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
        <form
          id="contactForm"
          method="POST"
          class="grid grid-cols-1 md:grid-cols-2 gap-[20px] max-w-[800px] mx-auto reveal-me"
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

          <div id="recaptcha-widget" class="g-recaptcha mt-4" data-sitekey="6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX"></div>
          
          <div id="statusMsg" class="mt-3 text-sm"></div>

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
    </div>

    <!-- Socials -->
    <div class="container pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px]">
    <div
      class="max-w-4xl mx-auto grid max-md:grid-cols-2 md:grid-cols-4 reveal-me border-t border-x [&>*]:border-r max-md:[&>*:nth-child(2)]:border-r-0 max-md:[&>*:nth-child(6)]:border-r-0 [&>*:nth-child(4)]:border-r-0 [&>*:nth-child(8)]:border-r-0 [&>*]:border-b dark:[&>*]:border-dark dark:border-dark"
    >
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://www.instagram.com/uxoryllc/" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/1.svg" alt="IG" />
        </a>
      </figure>

      <figure class="flex items-center justify-center px-4 py-4">
        <a href="#" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/3.svg" alt="X" />
        </a>
      </figure>

      <!-- Email Contact -->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="mailto:contact@uxory.com" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/4.svg" alt="MAIL" />
        </a>
      </figure>

      <!-- WhatsApp Chat -->
      <figure class="flex items-center justify-center px-4 py-4">
        <a href="https://wa.me/15134137427" target="_blank" rel="noopener noreferrer">
          <img class="h-10 w-10" src="/images/marquee-img/2.svg" alt="WHATSAPP" />
        </a>
      </figure>
     
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
