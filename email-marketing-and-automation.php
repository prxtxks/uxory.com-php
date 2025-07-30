<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Email Marketing & CRM Automation Services | Uxory</title>
  <meta name="description" content="Boost your business with automated email campaigns and smart CRM workflows. Uxory helps you convert leads and nurture customers effectively." />

  <meta charset="utf-8" />

  <!-- Mobile Responsive Meta -->
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
  <link rel="canonical" href="https://uxory.com/email-marketing-and-automation.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Email Marketing & CRM Automation Services | Uxory" />
  <meta property="og:description" content="Boost your business with automated email campaigns and smart CRM workflows. Uxory helps you convert leads and nurture customers effectively." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/email-marketing-and-automation.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Email Marketing & CRM Automation Services | Uxory" />
  <meta name="twitter:description" content="Boost your business with automated email campaigns and smart CRM workflows. Uxory helps you convert leads and nurture customers effectively." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Email Marketing & Automation",
    "provider": {
      "@type": "Organization",
      "name": "Uxory",
      "url": "https://uxory.com",
      "logo": {
        "@type": "ImageObject",
        "url": "https://uxory.com/images/logo.png"
      }
    },
    "description": "Automated email campaigns, CRM workflows, and lead nurturing strategies for scalable growth.",
    "url": "https://uxory.com/email-marketing-and-automation.php",
    "areaServed": {
      "@type": "Place",
      "name": "Worldwide"
    }
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
$currentPage = 'email-makreting-and-automation';
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
   Hero Section
======================================-->
<section
  class="pt-[120px] sm:pt-[135px] md:pt-[150px] lg:pt-44 xl:pt-[200px] relative overflow-hidden"
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
    <!-- <div class="flex justify-center items-center reveal-me">
      <div class="rv-badge mb-2">
        <span class="rv-badge-text">Designed to inspire.</span>
      </div>
    </div> -->
 
    <h2 class="font-semibold text-center reveal-me">
      Automated <i class="font-instrument">Emails</i> That Bring Revenue,
       Even as You <i class="font-instrument">Sleep.</i>

    </h2>
    <p class="max-w-3xl text-center mx-auto mt-3 text-appear">
      Email is still the most powerful marketing tool—when done right. We help you build automated, personalized email campaigns that convert subscribers into loyal customers.
    </p>

     <!-- Hero Buttons -->
    <div class="flex flex-col md:flex-row justify-center items-center mt-14 gap-6 px-4 reveal-me">

      <!-- Button 1 -->
      <div
        class="flex w-full md:w-auto p-3 group bg-primary bg-opacity-30 gap-3 justify-between items-center backdrop-blur-2xl max-w-[320px] md:max-w-[320px]"
      >
        <div>
          <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
            Get a Proposal
          </h6>
        </div>
          <a href="/contact.php">
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

  </div>

</section>

<!-- ================================
The Problem
================================ -->

<section
  class="pt-16 md:pt-20 lg:pt-[100px] xl:pt-[120px]"
>
  <div class="container">
    <div class="text-center">


      <h3 class="text-appear mb-6">The Problem Why Email Alone Isn’t Enough</h3>
      <p
        class="reveal-text-2 text-2xl lg:text-3xl text-secondary/90 dark:text-backgroundBody/70 font-normal lg:leading-[1.2] lg:tracking-[0.72px]">
        Most businesses send emails… but few drive results. Without a strategy, segmentation, or automation, your emails get lost in inboxes—or worse, ignored. You might be losing sales, missing re-engagement opportunities, or spending hours doing manual work.      </h5>

       <p class="mt-3 max-w-3xl mx-auto reveal-me">
          Every strategy is tailored by real people who know your audience, love your brand, and bring new energy to your story.
        </p>

      <ul class="justify-self-center max-md:w-full mt-7 md:mt-14 reveal-me">
        <li class="block md:inline-block w-full mx-auto md:w-auto text-center">
          <a
            href="/about.php"
            class="rv-button rv-button-white block md:inline-block"
          >
            <div class="rv-button-top">
              <span>About Us</span>
            </div>
            <div class="rv-button-bottom">
              <span>About Us</span>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- ================================
Solution
================================ -->

<section
  class="pb-14 pt-14 md:pb-16 md:pt-16 lg:pb-[88px] lg:pt-[88px] xl:pb-[100px] xl:pt-[100px]"
>
  <div class="container">
    <div class="grid grid-cols-12 items-center lg:gap-x-16 gap-y-16">
      <figure class="col-span-12 lg:col-span-6 reveal-me">
        <img src="images/services/email-our-solution.png" alt="expertise" class="w-full" />
      </figure>
      <div class="col-span-12 lg:col-span-6 space-y-7 reveal-me">
        <div class="space-y-2">
          <h3 class="text-appear lg:leading-[1.1]">
            Our Solution & <br>
            <span class="font-instrument italic">How We Work</span>
          </h3>
          <p
            class="text-black/70 dark:text-backgroundBody/70 font-normal md:text-lg text-base md:leading-[28.8px] md:tracking-[0.36px] text-appear"
          >
            At Uxory, we design email marketing systems that scale, not just email blasts. We build targeted campaigns and automated flows that speak directly to your audience’s behavior, needs, and stage in the buying journey.
          </p>
        </div>
        <div>
          <p
            class="md:text-4xl text-appear text-3xl mb-3 font-normal text-black dark:text-white md:leading-10 md:tracking-[-1.08px]"
          >
           We Create:
          </p>
          <ul class="list-disc space-y-0.5 list-inside reveal-me">
            <li
              class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
            >
              A custom email marketing strategy
            </li>
            <li
              class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
            >
              On-brand email designs & templated
            </li>
            <li
              class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
            >
              Automated flows like welcome sequences, abandoned cart emails, and re-engagement campaigns
            </li>
            <li
              class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
            >
              Smart segmentation so the right people get the right message
            </li>
            <li
              class="text-base font-normal leading-[25.6px] tracking-[0.32px] text-black/70 dark:text-backgroundBody/70"
            >
              Platform integration (Mailchimp, Klaviyo, HubSpot, ActiveCampaign, and more)
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================================
Solutions Section
================================ -->

<section
  class="pt-10 md:pt-12 lg:pt-16 xl:pt-20 mt-14 md:mt-16 lg:mt-[88px] xl:pt-[100px] pb-10 md:pb-12 lg:pb-16 xl:pb-20 overflow-hidden bg-[#CBE8DF] service-section"
  aria-labelledby="solutions-heading"
>
  <!--  Section Header -->
  <div class="container">
    <div class="grid grid-cols-12 gap-y-3 md:gap-x-10 items-start">
      <div class="col-span-12 lg:col-span-7">
        <h3
          id="solutions-heading"
          class="text-appear-2 text-secondary dark:text-secondary text-left"
        >
         What’s Inside
          <span class="font-instrument italic">Signature CRM Package:</span>
        </h3>
      </div>
      <div class="col-span-12 lg:col-span-5 lg:text-right">
        <p class="text-appear text-secondary/70 dark:text-secondary/70">
          Each package is uniquely tailored to reflect yourbrand, and meet your goals.

        </p>
        <div class="mt-4 md:mt-10 reveal-me">
          <a
            href="/contact.php"
            class="rv-button rv-button-white block md:inline-block w-full mx-auto md:w-auto text-center"
            aria-label="View our detailed service offerings"
          >
            <div class="rv-button-top">
              <span>Talk to Sales</span>
            </div>
            <div class="rv-button-bottom">
              <span>Talk to Sales</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Solutions Content Cards -->
  <div
    class="mt-10 flex flex-col md:flex-row md:flex-nowrap md:w-fit gap-6 md:pl-[20%] max-md:px-5 md:pr-10 service-wrapper overflow-x-hidden reveal-me"
    aria-label="Our service offerings"
  >
    <!-- CARD 1 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[525px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          01
        </p>
      </div>
      <div class=" space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[300px] dark:text-white max-md:text-2xl"
        >
          
          Strategy & Setup
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
         We begin with a strategic foundation—planning email funnels including welcome sequences, nurture campaigns, promotions, and cart recovery flows. Our team handles audience segmentation, tagging, and the creation of a detailed campaign calendar aligned with your goals.
        </p>
      </div>
    </div>

    <!-- CARD 2 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[525px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          02
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[300px] dark:text-white max-md:text-2xl"
        >
          Design & Copy
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          Your emails will not only look great but also perform. We design custom, mobile-optimized templates that reflect your brand identity. Our copywriting team crafts compelling subject lines, clear body text, and persuasive calls-to-action, with A/B testing to optimize open and click-through rates.
        </p>
      </div>
    </div>

    <!-- CARD 3 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[525px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          03
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[300px] dark:text-white max-md:text-2xl"
        >
          Automated Worlflows
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          We set up intelligent, behavior-based workflows that automatically send emails, assign tasks, update contact properties, and move leads through your pipeline. 
        </p>
      </div>
    </div>

    <!-- CARD 4 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[525px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          04
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[300px] dark:text-white max-md:text-2xl"
        >
          Lead Capture & Growth Tools
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
         Grow your email list with smart tools like exit-intent pop-ups, embedded opt-in forms, and high-converting landing pages—all designed to capture attention and drive consistent sign-ups.
        </p>
      </div>
    </div>

    <!-- CARD 5 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[525px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          05
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[300px] dark:text-white max-md:text-2xl"
        >
          CRM & Platform Integration
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          From Shopify and HubSpot to WordPress, we integrate your email system with your core platforms. We also handle custom automation through Zapier and ensure full-funnel data syncing for a connected experience across tools.
        </p>
      </div>
    </div>

        <!-- CARD 6 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[525px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          06
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[300px] dark:text-white max-md:text-2xl"
        >
          eCommerce Email Optimization
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          Maximize customer lifetime value with abandoned cart flows, product recommendation emails, and loyalty-building sequences that drive repeat purchases and increase order frequency.
        </p>
      </div>
    </div>

        <!-- CARD 7 -->
    <div
      class="md:px-[25px] px-5 py-10 border-t border-t-secondary dark:border-t-primary rounded-none flex-1 bg-backgroundBody md:w-[525px] w-full flex md:flex-row flex-col md:gap-[22px] gap-4 dark:bg-black"
    >
      <div aria-hidden="true">
        <p
          class="text-5xl font-normal font-instrument text-black leading-[64px] dark:text-white max-md:text-3xl"
        >
          07
        </p>
      </div>
      <div class="space-y-4">
        <h3
          class="md:text-4xl font-normal tracking-[-1.08px] leading-[110%] text-black md:max-w-[300px] dark:text-white max-md:text-2xl"
        >
          Tracking & Reporting
        </h3>
        <p
          class="text-base leading-6 tracking-[0.32px] text-colorText font-normal dark:text-backgroundBody/70"
        >
          We track every result—delivering clear insights so you always know what’s working and where you’re winning.
        </p>
      </div>
    </div>   

  </div>

</section>

<!--=====================================
   Numbers
======================================-->

<section> 
  <div
      class="flex max-xl:flex-wrap items-center justify-center gap-[30px] pt-[75px] reveal-me"
    >
      <div
        class="border dark:border-dark py-7 lg:py-10 px-9 lg:px-16 space-y-3 flex justify-center flex-col items-center min-w-[280px] lg:min-w-[320px] min-h-[180px]"
        id="counter"
      >
        <h3 class="">
          <span class="counter" data-value="2"></span>k +
        </h3>
        <p>Projects Delivered</p>
      </div>
      <div
        class="border dark:border-dark py-7 lg:py-10 px-9 lg:px-16 space-y-3 flex justify-center flex-col items-center min-w-[280px] lg:min-w-[320px] min-h-[180px]"
        id="counter"
      >
        <h3 class="">
          <span class="counter" data-value="150"></span> +
        </h3>
        <p>Clients Globally</p>
      </div>
      <div
        class="border dark:border-dark py-7 lg:py-10 px-9 lg:px-16 space-y-3 flex justify-center flex-col items-center min-w-[280px] lg:min-w-[320px] min-h-[180px]"
        id="counter"
      >
        <h3 class="">
          <span class="counter" data-value="90"></span> %
        </h3>
        <p>Business Growth Rate</p>
      </div>
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