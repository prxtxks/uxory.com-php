<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>
  <!-- Title -->
  <title>FAQs – Answers to Your Questions | Uxory</title>
  <meta name="description" content="Got questions about Uxory’s services? Find quick answers to the most frequently asked questions about web development, SEO, marketing, and more." />

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
  <link rel="canonical" href="https://uxory.com/faq.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="FAQs – Answers to Your Questions | Uxory" />
  <meta property="og:description" content="Got questions about Uxory’s services? Find quick answers to the most frequently asked questions about web development, SEO, marketing, and more." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/faq.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="FAQs – Answers to Your Questions | Uxory" />
  <meta name="twitter:description" content="Got questions about Uxory’s services? Find quick answers to the most frequently asked questions about web development, SEO, marketing, and more." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What services does Uxory offer?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Uxory offers web development, SEO, digital marketing, branding, email automation, and e-commerce solutions tailored to your business."
        }
      },
      {
        "@type": "Question",
        "name": "Do you provide custom packages?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes, we offer custom service packages based on your unique business needs and goals. Visit our custom packages page for more details."
        }
      }
    ]
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
$currentPage = 'faqs';
$currentParent = 'about';
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
   FAQ Section
======================================-->
<section
  class="pt-16 md:pt-20 lg:pt-[98px] xl:pt-[120px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative pt-[120px] md:pt-36 lg:pt-48 xl:pt-48"
>
  <div
    class="absolute scale-y-[3.5] sm:scale-y-[2.2] md:scale-y-[1.6] xl:scale-y-[1.4] scale-x-[1.7] left-1/2 top-1/2 max-md:-translate-y-[45%] md:-translate-y-1/2 -translate-x-1/2 -z-30"
  >
    <img src="images/gradient-bg.png" alt="gradient-bg" />
  </div>
  <div class="container">
    <!-- FAQ Section Title -->
    <div class="text-center @@hideBadge">
      <div class="rv-badge mb-3 lg:mb-7 reveal-me">
        <span class="rv-badge-text">Faq</span>
      </div>
    </div>
    <h2 class="mb-10 md:mb-20 text-center text-appear-2 font-semibold">
      Frequently Asked <i class="font-instrument">Questions</i>
    </h2>

    <!-- FAQ Items Container -->
    <div
      class="max-w-[900px] w-full mx-auto [&>*:not(:last-child)]:mb-6 reveal-me"
    >
      <!-- FAQ Item 1 -->
      <div
        class="accordion-item overflow-hidden bg-backgroundBody dark:bg-dark border border-backgroundBody dark:border-[#151515] duration-300"
      >
        <div
          class="accordion-header relative cursor-pointer py-5 md:py-[35px] max-md:px-5 md:px-10"
        >
          <h3
            class="text-xl md:text-[25px] font-normal sm:font-bold md:leading-[25.2px] md:tracking-normal max-md:inline-block max-lg:pr-10"
          >
            What services does Uxory offer?
          </h3>
          <div class="accordion-header-icon dark:border-dark"></div>
        </div>
        <p
          class="accordion-body max-md:text-sm max-md:px-5 md:px-10 duration-300 h-0"
        >
        We specialize in web design, web development, mobile app development, WordPress solutions, UX research, SEO, and branding photography.
        </p>
      </div>

      <!-- FAQ Item 2 -->
      <div
        class="accordion-item overflow-hidden bg-backgroundBody dark:bg-dark border border-backgroundBody dark:border-[#151515] duration-300"
      >
        <div
          class="accordion-header relative cursor-pointer py-5 md:py-[35px] max-md:px-5 md:px-10"
        >
          <h3
            class="text-xl md:text-[25px] font-normal sm:font-bold md:leading-[25.2px] md:tracking-normal max-md:inline-block max-lg:pr-10"
          >
            How long does a project typically take to complete?
          </h3>
          <div class="accordion-header-icon dark:border-dark"></div>
        </div>
        <p
          class="accordion-body max-md:text-sm max-md:px-5 md:px-10 duration-300 h-0"
        >
          Project timelines vary depending on the scope and complexity. We work
          with you to set clear deadlines and ensure timely delivery.
        </p>
      </div>

      <!-- FAQ Item 3 -->
      <div
        class="accordion-item overflow-hidden bg-backgroundBody dark:bg-dark border border-backgroundBody dark:border-[#151515] duration-300"
      >
        <div
          class="accordion-header relative cursor-pointer py-5 md:py-[35px] max-md:px-5 md:px-10"
        >
          <h3
            class="text-xl md:text-[25px] font-normal sm:font-bold md:leading-[25.2px] md:tracking-normal max-md:inline-block max-lg:pr-8"
          >
            Can Uxory handle both small and large-scale projects?
          </h3>
          <div class="accordion-header-icon dark:border-dark"></div>
        </div>
        <p
          class="accordion-body max-md:text-sm max-md:px-5 md:px-10 duration-300 h-0"
        >
          Yes, we are equipped to handle projects of any size, from small
          startups to large enterprises, tailoring our approach to meet your
          specific needs.
        </p>
      </div>

      <!-- FAQ Item 4 -->
      <div
        class="accordion-item overflow-hidden bg-backgroundBody dark:bg-dark border border-backgroundBody dark:border-[#151515] duration-300"
      >
        <div
          class="accordion-header relative cursor-pointer py-5 md:py-[35px] max-md:px-5 md:px-10"
        >
          <h3
            class="text-xl md:text-[25px] font-normal sm:font-bold md:leading-[25.2px] md:tracking-normal max-md:inline-block max-lg:pr-8"
          >
            How involved will I be in the project?
          </h3>
          <div class="accordion-header-icon dark:border-dark"></div>
        </div>
        <p
          class="accordion-body max-md:text-sm max-md:px-5 md:px-10 duration-300 h-0"
        >
          We value collaboration and will keep you updated at every stage. Your
          input is crucial to ensure we align with your vision and goals.
        </p>
      </div>

      <!-- FAQ Item 5 -->
      <div
        class="accordion-item overflow-hidden bg-backgroundBody dark:bg-dark border border-backgroundBody dark:border-[#151515] duration-300"
      >
        <div
          class="accordion-header relative cursor-pointer py-5 md:py-[35px] max-md:px-5 md:px-10"
        >
          <h3
            class="text-xl md:text-[25px] font-normal sm:font-bold md:leading-[25.2px] md:tracking-normal max-md:inline-block max-lg:pr-8"
          >
            Do you provide post-launch support?
          </h3>
          <div class="accordion-header-icon dark:border-dark"></div>
        </div>
        <p
          class="accordion-body max-md:text-sm max-md:px-5 md:px-10 duration-300 h-0"
        >
          Absolutely! We offer ongoing support and maintenance to ensure your
          project runs smoothly after launch.
        </p>
      </div>

      <!-- FAQ Item 6 -->
      <div
        class="accordion-item overflow-hidden bg-backgroundBody dark:bg-dark border border-backgroundBody dark:border-[#151515] duration-300"
      >
        <div
          class="accordion-header relative cursor-pointer py-5 md:py-[35px] max-md:px-5 md:px-10"
        >
          <h3
            class="text-xl md:text-[25px] font-normal sm:font-bold md:leading-[25.2px] md:tracking-normal max-md:inline-block max-lg:pr-8"
          >
          How do I get started with Uxory?
          </h3>
          <div class="accordion-header-icon dark:border-dark"></div>
        </div>
        <p
          class="accordion-body max-md:text-sm max-md:px-5 md:px-10 duration-300 h-0"
        >
        To begin, fill out our Contact Us or Get a Quote form. Our sales team will reach out to understand your initial requirements and assign a dedicated counselor who will connect with you for a deeper discussion about your project goals.
        </p>
      </div>

      <!-- FAQ Item 7 -->
      <div
        class="accordion-item overflow-hidden bg-backgroundBody dark:bg-dark border border-backgroundBody dark:border-[#151515] duration-300"
      >
        <div
          class="accordion-header relative cursor-pointer py-5 md:py-[35px] max-md:px-5 md:px-10"
        >
          <h3
            class="text-xl md:text-[25px] font-normal sm:font-bold md:leading-[25.2px] md:tracking-normal max-md:inline-block max-lg:pr-8"
          >
          What happens after I receive a quote?
          </h3>
          <div class="accordion-header-icon dark:border-dark"></div>
        </div>
        <p
          class="accordion-body max-md:text-sm max-md:px-5 md:px-10 duration-300 h-0"
        >
        You’ll get a custom quote within 48 hours after your consultation. Once you decide to move forward, we’ll assign an analyst who will work closely with you throughout the entire project—ensuring smooth communication with developers, project clarity, and full support even after launch.
        </p>
      </div>

    </div>
  </div>
</section>

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