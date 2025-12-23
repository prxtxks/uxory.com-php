<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>
  <!-- Title -->
  <title>Careers at Uxory | Remote Internship & Career Opportunities</title>
  <meta name="description" content="Explore remote internship and career opportunities at Uxory. Join a fast-growing digital solutions company and gain real-world experience in tech, design, and business." />

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
  <link rel="canonical" href="https://uxory.com/career.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Careers at Uxory | Join Our Team Remotely" />
  <meta property="og:description" content="Browse exciting internship and career opportunities at Uxory. Work remotely, learn new skills, and grow your career in tech and marketing." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/career.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Careers at Uxory | Remote Internship Openings" />
  <meta name="twitter:description" content="Apply for remote roles at Uxory. We're hiring interns and professionals in design, development, and business." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Uxory",
    "url": "https://uxory.com",
    "logo": "https://uxory.com/images/logo.png",
    "sameAs": [],
    "description": "A remote-first digital solutions company offering modern website design, SEO, and marketing services.",
    "department": {
      "@type": "Organization",
      "name": "Careers",
      "url": "https://uxory.com/career.php"
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
$currentPage = 'career';
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
    Career Page Hero Section
======================================-->
<section
  class="pt-32 sm:pt-36 md:pt-40 lg:pt-44 xl:pt-[210px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <!-- Gradient Background -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-full top-0 left-0 -z-10 blur-[60px]"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Hero Content -->
  <div class="container reveal-me">
    <div class="text-center">
      <div class="rv-badge">
        <span class="rv-badge-text">Career</span>
      </div>
      <h2 class="mt-3.5 sm:mt-6 md:mt-7 mb-5 md:mb-8 font-medium">Start building your <i class="font-instrument italic font-normal">future</i> here</h2>
      <p class="">We provide a wide range of growth opportunities, a <br> collaborative work culture, and a supportive team focused on your success</p>
    </div>

    <!-- CTA Button -->
    <div class="flex justify-center mt-11 md:mt-[76px]">
      <a href="#get-started" class="rv-button rv-button-secondary">
        <div class="rv-button-top !text-center">
          <span>Get Started</span>
        </div>
        <div class="rv-button-bottom !text-center">
          <span>Get Started</span>
        </div>
      </a>
    </div>
  </div>
</section>




<!--=====================================
   Employee Benefits Section Area
======================================-->
<!-- <section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <div class="container">
   
    <h2 class="text-center mb-4 lg:mb-8 text-appear">Why Join Our Team</h2>
    <p class="text-center max-w-[750px] mx-auto text-appear max-lg:px-5">
      Join a dynamic workspace where innovation meets well-being. We provide
      comprehensive benefits and a supportive environment designed to help you
      thrive both professionally and personally.
    </p>


    <div
      class="mt-10 md:mt-[60px] grid xs:grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 justify-center items-center gap-[30px]"
    >
      <div class="p-[30px] border dark:border-dark reveal-me">
        Hybrid Work Environment
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Competitive Health Benefits
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Learning & Development Fund
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Performance Bonuses
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Mental Health Support
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Team Building Events
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Professional Certifications
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Modern Tech Stack
      </div>
      <div class="p-[30px] border dark:border-dark reveal-me">
        Unlimited PTO Policy
      </div>
    </div>
  </div>
</section> -->


<!--=====================================
   Career Positions Section
======================================-->
<section
  id="get-started" class="mt-14 md:mt-16 lg:mt-[88px] xl:mt-[100px] mb-14 md:mb-16 lg:mb-[88px] xl:mb-[100px] relative overflow-hidden"
>
  <div
    class="absolute scale-y-[4] md:scale-y-[4] lg:scale-y-[2.2] xl:scale-y-[2.5] 2xl:scale-y-[1.4] scale-x-[2.7] left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 -z-30"
  >
    <img src="images/gradient-bg.png" alt="gradient-bg" />
  </div>
  <!-- Section Header -->
  <div class="container">
    <h3 class="text-center text-appear">
      Start your professional journey today
    </h3>
  </div>

  <!-- Job Listings Container -->
  <div class="mt-10 md:mt-[60px] [&>*:not(last-child)]:mb-6 max-lg:px-5">
    <!-- Software Developer Position -->
    <article
      class="max-w-[1170px] mx-auto border dark:border-dark bg-backgroundBody dark:bg-dark p-6 lg:p-10 flex flex-col md:flex-row gap-y-7 justify-center md:justify-between items-center reveal-me"
    >
      <div
        class="flex flex-col flex-wrap justify-center md:justify-normal max-md:items-center"
      >
        <!-- Job Tags -->
        <div class="space-y-3">
          <div class="rv-badge">
            <span class="rv-badge-text">Software</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Remote</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Full-Time</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Unpaid</span>
          </div>
        </div>
        <h3 class="mt-8 mb-6 text-3xl leading-[25.2px] tracking-wide">
          Software Developer Intern
        </h3>
        <p class="max-w-[830px]">
          Build and maintain software tools alongside experienced developers in real-world projects.
        </p>
      </div>
      <!-- Apply Button -->
      <div class="max-md:w-full">
        <a
          href="software-dev-intern.php"
          class="rv-button rv-button-secondary block md:inline-block"
        >
          <div class="rv-button-top text-center">
            <span>Apply Now</span>
          </div>
          <div class="rv-button-bottom text-center">
            <span>Apply Now </span>
          </div>
        </a>
      </div>
    </article>

    <!-- Accountant Position -->
    <article
      class="max-w-[1170px] mx-auto border dark:border-dark bg-backgroundBody dark:bg-dark p-6 lg:p-10 flex flex-col md:flex-row gap-y-7 justify-center md:justify-between items-center reveal-me"
    >
      <div
        class="flex flex-col flex-wrap justify-center md:justify-normal max-md:items-center"
      >
        <!-- Job Tags -->
        <div class="space-y-3">
          <div class="rv-badge">
            <span class="rv-badge-text">Web Development</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Remote</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Full-Time</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Unpaid</span>
          </div>
        </div>
        <h3 class="mt-8 mb-6 text-3xl leading-[25.2px] tracking-wide">
          Website Developer Intern
        </h3>
        <p class="max-w-[830px]">
          Help create responsive, dynamic websites with mentorship from senior developers.
        </p>
      </div>
      <!-- Apply Button -->
      <div class="max-md:w-full">
        <a
          href="web-dev-intern.php"
          class="rv-button rv-button-secondary block md:inline-block"
        >
          <div class="rv-button-top text-center">
            <span>Apply Now</span>
          </div>
          <div class="rv-button-bottom text-center">
            <span>Apply Now </span>
          </div>
        </a>
      </div>
    </article>

    <!-- Web Designer Position -->
    <article
      class="max-w-[1170px] mx-auto border dark:border-dark bg-backgroundBody dark:bg-dark p-6 lg:p-10 flex flex-col md:flex-row gap-y-7 justify-center md:justify-between items-center reveal-me"
    >
      <div
        class="flex flex-col flex-wrap justify-center md:justify-normal max-md:items-center"
      >
        <!-- Job Tags -->
        <div class="space-y-3">
          <div class="rv-badge">
            <span class="rv-badge-text">Web Design</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Remote</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Full-Time</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Unpaid</span>
          </div>
        </div>
        <h3 class="mt-8 mb-6 text-3xl leading-[25.2px] tracking-wide">
          Web Designer Intern
        </h3>
        <p class="max-w-[830px]">
          Design beautiful, user-centric web layouts and UI/UX components.
        </p>
      </div>
      <!-- Apply Button -->
      <div class="max-md:w-full">
        <a
          href="web-des-intern.php"
          class="rv-button rv-button-secondary block md:inline-block"
        >
          <div class="rv-button-top text-center">
            <span>Apply Now</span>
          </div>
          <div class="rv-button-bottom text-center">
            <span>Apply Now </span>
          </div>
        </a>
      </div>
    </article>

    <!-- Product Designer Position -->
    <article
      class="max-w-[1170px] mx-auto border dark:border-dark bg-backgroundBody dark:bg-dark p-6 lg:p-10 flex flex-col md:flex-row gap-y-7 justify-center md:justify-between items-center reveal-me"
    >
      <div
        class="flex flex-col flex-wrap justify-center md:justify-normal max-md:items-center"
      >
        <!-- Job Tags -->
        <div class="space-y-3">
          <div class="rv-badge">
            <span class="rv-badge-text">UI/UX</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Remote</span>
          </div>
          <div class="rv-badge">
            <span class="rv-badge-text">Full-Time</span>
          </div>
        </div>
        <h3 class="mt-8 mb-6 text-3xl leading-[25.2px] tracking-wide">
          Product Designer Intern
        </h3>
        <p class="max-w-[830px]">
          Design thoughtful user experiences and features that solve real user problems.
        </p>
      </div>
      <!-- Apply Button -->
      <div class="max-md:w-full">
        <a
          href="product-dev-intern.php"
          class="rv-button rv-button-secondary block md:inline-block"
        >
          <div class="rv-button-top text-center">
            <span>Apply Now</span>
          </div>
          <div class="rv-button-bottom text-center">
            <span>Apply Now </span>
          </div>
        </a>
      </div>
    </article>

    <article
    class="max-w-[1170px] mx-auto border dark:border-dark bg-backgroundBody dark:bg-dark p-6 lg:p-10 flex flex-col md:flex-row gap-y-7 justify-center md:justify-between items-center reveal-me"
  >
    <div
      class="flex flex-col flex-wrap justify-center md:justify-normal max-md:items-center"
    >
      <!-- Job Tags -->
      <div class="space-y-3">
        <div class="rv-badge">
          <span class="rv-badge-text">Business</span>
        </div>
        <div class="rv-badge">
          <span class="rv-badge-text">Remote</span>
        </div>
        <div class="rv-badge">
          <span class="rv-badge-text">Full-Time</span>
        </div>
        <div class="rv-badge">
          <span class="rv-badge-text">Incentive</span>
        </div>
      </div>
      <h3 class="mt-8 mb-6 text-3xl leading-[25.2px] tracking-wide">
        Business Development Intern
      </h3>
      <p class="max-w-[830px]">
        Help expand Uxory’s reach through partnerships, research, and strategic initiatives.
      </p>
    </div>
    <!-- Apply Button -->
    <div class="max-md:w-full">
      <a
        href="business-dev-intern.php"
        class="rv-button rv-button-secondary block md:inline-block"
      >
        <div class="rv-button-top text-center">
          <span>Apply Now</span>
        </div>
        <div class="rv-button-bottom text-center">
          <span>Apply Now </span>
        </div>
      </a>
    </div>
  </article>

  <article
  class="max-w-[1170px] mx-auto border dark:border-dark bg-backgroundBody dark:bg-dark p-6 lg:p-10 flex flex-col md:flex-row gap-y-7 justify-center md:justify-between items-center reveal-me"
>
  <div
    class="flex flex-col flex-wrap justify-center md:justify-normal max-md:items-center"
  >
    <!-- Job Tags -->
    <div class="space-y-3">
      <div class="rv-badge">
        <span class="rv-badge-text">Sales</span>
      </div>
      <div class="rv-badge">
        <span class="rv-badge-text">Remote</span>
      </div>
      <div class="rv-badge">
        <span class="rv-badge-text">Full-Time</span>
      </div>
      <div class="rv-badge">
        <span class="rv-badge-text">Incentive</span>
      </div>
    </div>
    <h3 class="mt-8 mb-6 text-3xl leading-[25.2px] tracking-wide">
      Sales Intern
    </h3>
    <p class="max-w-[830px]">
      Learn to sell digital services and convert leads into long-term clients.
    </p>
  </div>
  <!-- Apply Button -->
  <div class="max-md:w-full">
    <a
      href="sales-intern.php"
      class="rv-button rv-button-secondary block md:inline-block"
    >
      <div class="rv-button-top text-center">
        <span>Apply Now</span>
      </div>
      <div class="rv-button-bottom text-center">
        <span>Apply Now </span>
      </div>
    </a>
  </div>
</article>

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