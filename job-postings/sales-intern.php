<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Sales Intern | Uxory Careers</title>
  <meta name="description" content="Apply for the Sales Intern position at Uxory. Gain real-world experience in sales strategy, lead generation, and client communication with a fast-growing digital agency." />

  <meta charset="utf-8" />

  <!-- Mobile Responsive Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="robots" content="index, follow" />

  <!-- Stylesheets -->
  <link href="../assets/css/main.css?v=<?= filemtime('../assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="../images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="../images/favicon.svg" />
  <link rel="shortcut icon" href="../images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/sales-intern.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Sales Intern | Uxory Careers" />
  <meta property="og:description" content="Apply for the Sales Intern position at Uxory. Gain real-world experience in sales strategy, lead generation, and client communication with a fast-growing digital agency." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/sales-intern.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Sales Intern | Uxory Careers" />
  <meta name="twitter:description" content="Apply for the Sales Intern position at Uxory. Gain real-world experience in sales strategy, lead generation, and client communication with a fast-growing digital agency." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "JobPosting",
    "title": "Sales Intern",
    "description": "Apply for the Sales Intern position at Uxory. Gain real-world experience in sales strategy, lead generation, and client communication with a fast-growing digital agency.",
    "hiringOrganization": {
      "@type": "Organization",
      "name": "Uxory",
      "sameAs": "https://uxory.com"
    },
    "employmentType": "Internship",
    "workHours": "Part-time",
    "jobLocationType": "Remote",
    "url": "https://uxory.com/sales-intern.php"
  }
  </script>
</head>

<body >

<!-- header  -->
<?php       
include '../components/header.php';
?>

<!-- nav  -->
<?php
$currentPage = '';     
$currentParent = 'home';         
include '../components/nav.php';
?>

<div
  class="menu-overflow fixed z-[9999] bg-[rgba(10,10,10,0.95)] bg-opacity-60 backdrop-blur-[25px] w-full h-full pointer-events-none"
></div>

<!-- Cursor Pointer -->
<div class="pointer"></div>

<!-- Dark Mode toggle -->
<?php       
include '../components/dark_mode.php';
?>

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
<!--=====================================
   Career Details Header Section
======================================-->
<section class="pt-[220px] pb-20 lg:pb-[100px] relative">
  <!-- Gradient Background -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-[77%] lg:w-[55%] h-[77%] lg:h-[55%] top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 -z-10 blur-[60px]"
  >
    <img
      src="../images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Header Content -->
  <div class="container text-center reveal-me">
    <div class="rv-badge mb-4">
      <span class="rv-badge-text">Sales</span>
    </div>
    <div class="rv-badge mb-4">
      <span class="rv-badge-text">Remote</span>
    </div>
    <div class="rv-badge mb-4">
      <span class="rv-badge-text">Full Time</span>
    </div>

    <h2 class="mb-5 md:mb-8 font-medium">Sales Intern</h2>
  </div>
</section>


<!--=====================================
   Career Details Section
======================================-->
<section class="lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]">
  <div class="max-w-[1440px] mx-auto px-10 md:px-20">
    <div>
      <!-- Tab Navigation -->
      <div class="tab-nav-wrap mb-12 lg:mb-14 reveal-me">
        <button
          onclick="switchTab('Overview')"
          class="tab-button active text-base uppercase leading-[1.1] tracking-[1.12px] max-md:py-5 md:py-8 max-md:px-10 md:px-16 font-medium"
        >
          Overview
        </button>
        <button
          onclick="switchTab('Apply')"
          class="tab-button text-base uppercase leading-[1.1] tracking-[1.12px] max-md:py-5 max-md:px-14 md:py-8 md:px-20 font-medium"
        >
          Apply
        </button>
      </div>

      <!-- Content Container -->
      <div id="tab-content-container">
        <!-- Overview tab will load first -->
        <div class="tab-content" id="Overview">
          <div class="flex flex-col gap-8 lg:flex-row lg:items-start">
            <aside class="min-w-[275px] lg:mx-auto flex-1">
              <div class="!sticky top-40">
                <div class="reveal-me">
                  <h3 class="max-md:text-4xl md:text-[32px] mt-2 mb-6 lg:mb-10">
                    Career description
                  </h3>
                  <ul class="[&>*:not(:last-child)]:mb-1.5 md:[&>*:not(:last-child)]:mb-4">
                    <li><a href="#job-description" class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to">Job Description</a></li>
                    <li><a href="#responsibilities" class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to">Responsibilities</a></li>
                    <li><a href="#requirements" class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to">Requirements</a></li>
                    <li><a href="#your-benefits" class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to">Your Benefits</a></li>
                  </ul>
                </div>
              </div>
            </aside>

            <article class="blog-details-body reveal-me">
            <!-- Job Description -->
            <h3 id="job-description">Job description</h3>
            <p>
              We are looking for motivated Sales Interns to represent our services, engage with potential clients, and drive business success through effective communication.
            </p>

            <!-- Responsibilities -->
            <h3 id="responsibilities">Responsibilities</h3>
            <p>As a Sales Intern, you will be responsible for:</p>

            <ul>
              <li>
                Understand Uxory’s services and confidently represent them to leads
              </li>
              <li>
                Attend client calls and answer inquiries
              </li>
              <li>
                Support the sales pipeline and follow up with leads
              </li>
              <li>
                Collaborate with other interns and team members to close deals
              </li>
            </ul>

            <!-- Requirements -->
            <h3 id="requirements">Requirements</h3>
            <p>The ideal candidate should have:</p>

            <ul>
              <li>Excellent verbal and written communication skills</li>
              <li>
                Confidence to take ownership of calls and communication
              </li>
              <li>
                Strong understanding of the company’s offerings
              </li>
              <li>Sales mindset with eagerness to learn and grow</li>
            </ul>

            <!-- Benefits -->
            <h3 id="your-benefits">Your Benefits</h3>
            <p>We offer a comprehensive benefits package including:</p>

            <ul>
              <li>Sales experience and exposure to startup operations</li>
              <li>High-performance commission potential</li>
              <li>Certification from a US-based company</li>
              <li>Potential for a full-time or paid opportunity</li>
            </ul>
            <p>
              Join our team and help shape the future of digital design while
              growing your career in an innovative environment.
            </p>
          </article>
          </div>
        </div>

        <!-- Apply tab content -->
        <?php 
        $positionTitle = 'Sales Intern';
        include '../components/application-form.php';
        ?>
      </div>
    </div>
  </div>
</section>


<!--=====================================
   CTA Section
======================================-->
<?php       
include '../components/cta.php';
?>

<!-- ================================
 Socials Section
================================ -->
<?php       
include '../components/socials.php';
?>

<!--=====================================
   Blog Section
======================================-->
<?php       
include '../components/blog.php';
?>

</main>

<!--=====================================
   Footer Section
======================================-->
<?php       
include '../components/footer.php';
?>

<!--=====================================
   Chatsimple Section (Chatbot)
======================================-->
<?php       
include '../components/chatsimple.php';
?>

<!--=====================================
   Scripts
======================================-->
<?php       
include '../components/scripts.php';
?>

</body>

</html>