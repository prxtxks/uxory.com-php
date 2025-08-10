<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Web Design Intern | Uxory – Create Beautiful Interfaces</title>
  <meta name="description" content="Apply for the Web Design Intern position at Uxory. Learn UI/UX design principles, collaborate with developers, and build real design portfolios." />

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
  <link rel="canonical" href="https://uxory.com/web-des-intern.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Web Design Intern | Uxory – Create Beautiful Interfaces" />
  <meta property="og:description" content="Apply for the Web Design Intern position at Uxory. Learn UI/UX design principles, collaborate with developers, and build real design portfolios." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/web-des-intern.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Web Design Intern | Uxory – Create Beautiful Interfaces" />
  <meta name="twitter:description" content="Apply for the Web Design Intern position at Uxory. Learn UI/UX design principles, collaborate with developers, and build real design portfolios." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "JobPosting",
    "title": "Web Design Intern",
    "description": "Apply for the Web Design Intern position at Uxory. Learn UI/UX design principles, collaborate with developers, and build real design portfolios.",
    "hiringOrganization": {
      "@type": "Organization",
      "name": "Uxory",
      "sameAs": "https://uxory.com",
      "logo": "https://uxory.com/images/logo.png"
    },
    "employmentType": "Internship",
    "workHours": "Flexible",
    "jobLocationType": "Remote",
    "applicantLocationRequirements": {
      "@type": "Country",
      "name": "India"
    },
    "directApply": true,
    "url": "https://uxory.com/web-des-intern.php"
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
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Header Content -->
  <div class="container text-center reveal-me">
    <div class="rv-badge mb-4">
      <span class="rv-badge-text">Web Design</span>
    </div>
    <div class="rv-badge mb-4">
      <span class="rv-badge-text">Remote</span>
    </div>
    <div class="rv-badge mb-4">
      <span class="rv-badge-text">Full Time</span>
    </div>

    <h2 class="mb-5 md:mb-8 font-semibold">Web Designer Intern</h2>
  </div>
</section>


<!--=====================================
   Career Details Section
======================================-->
<section class="lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]">
  <div class="max-w-[1440px] mx-auto px-10 md:px-20">
    <div>
      <!-- Tab Navigation -->
      <div class="flex flex-col sm:flex-row justify-center mb-12 lg:mb-14 reveal-me">
        <button
          onclick="switchTab('Overview')"
          class="tab-button active text-base uppercase leading-[1.1] tracking-[1.12px] max-md:py-5 md:py-8 max-md:px-10 md:px-16 font-medium border-y border-l dark:border-transparent dark:bg-backgroundBody dark:text-secondary"
        >
          Overview
        </button>
        <button
          onclick="switchTab('Apply')"
          class="tab-button text-base uppercase leading-[1.1] tracking-[1.12px] max-md:py-5 max-md:px-14 md:py-8 md:px-20 font-medium border-y border-r dark:border-transparent dark:bg-backgroundBody dark:text-secondary"
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
              We are looking for creative web designer interns to design beautiful, user-centered interfaces that enhance the experience across websites and web applications.
            </p>

            <!-- Responsibilities -->
            <h3 id="responsibilities">Responsibilities</h3>
            <p>As a Web Designer Intern, you will be responsible for:</p>

            <ul>
              <li>
                Design clean, modern layouts using Figma, Adobe XD, or Sketch
              </li>
              <li>
                Collaborate with developers to bring UI designs to life
              </li>
              <li>
                Maintain visual consistency through typography, icons, and branding
              </li>
              <li>
                Respond to feedback and iterate based on user and stakeholder input
              </li>
            </ul>

            <!-- Requirements -->
            <h3 id="requirements">Requirements</h3>
            <p>The ideal candidate should have:</p>

            <ul>
              <li>Basic experience with UI/UX tools and wireframing software</li>
              <li>
                Strong sense of color, spacing, and visual hierarchy
              </li>
              <li>
                Willingness to learn and apply modern design trends
              </li>
              <li>Eagerness to learn, adapt, and solve technical problems creatively.</li>
            </ul>

            <!-- Benefits -->
            <h3 id="your-benefits">Your Benefits</h3>
            <p>We offer a comprehensive benefits package including:</p>

            <ul>
              <li>Work on live designs with guidance from experienced designers</li>
              <li>Flexible work arrangements with remote options</li>
              <li>Receive a certificate and build your professional portfolio</li>
              <li>Performance-based incentives for creativity and delivery</li>
            </ul>
            <p>
              Join our team and help shape the future of digital design while
              growing your career in an innovative environment.
            </p>
          </article>
          </div>
        </div>

        <!-- Apply tab content -->
        <div class="tab-content hidden" id="Apply">
          <form class="space-y-[30px] max-w-[770px] mx-auto" action="php/submit_application.php" method="POST" enctype="multipart/form-data">
            <div class="w-full">
              <label for="name" class="text-2xl leading-[1.2] tracking-[-0.48px] text-[#000000b3] dark:text-dark-100">Full Name</label>
              <input type="text" name="name" placeholder="Enter Your Name" required class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText placeholder:text-secondary/30 placeholder:dark:text-backgroundBody/30 text-xl leading-[1.4] tracking-[0.4px] mt-3" />
            </div>

            <div class="w-full">
              <label for="email" class="text-2xl leading-[1.2] tracking-[-0.48px] text-[#000000b3] dark:text-dark-100">Email*</label>
              <input type="email" name="email" placeholder="you@example.com" required class="py-4 pl-5 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText placeholder:text-secondary/30 placeholder:dark:text-backgroundBody/30 text-xl leading-[1.4] tracking-[0.4px] mt-3" />
            </div>

            <div class="w-full">
              <label for="resume" class="text-2xl leading-[1.2] tracking-[-0.48px] text-[#000000b3] dark:text-dark-100">Resume*</label>
              <div class="border border-secondary/10 dark:border-dark p-4 mt-3">
                <div class="flex justify-between items-center">
                  <div class="flex flex-wrap items-center mx-auto gap-5">
                    <label class="relative">
                      <input type="file" name="resume" accept=".pdf,.doc,.docx,.png,.jpg" required class="hidden" onchange="document.getElementById('file-name').textContent = this.files[0] ? 'Selected file: ' + this.files[0].name : ''" />
                      <figure class="inline-flex gap-2 px-6 py-3 rounded-full  dark:bg-dark/10 border border-secondary/30 dark:border-backgroundBody/30 text-base text-secondary/70 dark:text-backgroundBody/70 hover:bg-gray-100 dark:hover:bg-dark-300 cursor-pointer transition-colors">
                        <img src="images/icons/file-upload.svg" class="inline-flex left-0 dark:hidden" alt="drag&drop" />
                        <img src="images/icons/file-upload-dark.svg" class="left-0 dark:inline hidden" alt="drag&drop" />
                        <span> Upload File </span>
                      </figure>
                    </label>
                    <h3 class="text-[21px] text-secondary/70 dark:text-backgroundBody/70 leading-7 tracking-[0.4px] mb-2">Or drag and drop here</h3>
                  </div>
                </div>
                <div id="file-name" class=""></div>
              </div>
            </div>

            <div class="w-full">
              <input type="submit" value="Submit Application" class="bg-primary dark:bg-backgroundBody hover:bg-primary/30 cursor-pointer duration-300 dark:hover:bg-backgroundBody/90 text-secondary p-8 uppercase w-full" />
            </div>
          </form>
        </div>
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