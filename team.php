<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Primary Meta Tags -->
  <title>Our Team | Uxory</title>
  <meta name="description" content="Meet the Uxory team members who build software, websites, automation, and AI solutions." />

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
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

<!-- nav  -->
<?php
$currentPage = 'team';
$currentParent = 'about';
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
   Terms and Conditions Section
======================================-->
<section
  class="pt-32 md:pt-36 lg:pt-[180px] pb-12 lg:pb-16 2xl:pb-[100px] overflow-hidden relative"
>
  <!-- Background Gradient Wrapper: Creates a blurred, responsive background effect -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-1/2 md:w-[40%] h-1/2 md:h-[40%] top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 -z-10 blur-[60px] md:scale-90 lg:scale-75"
  >
    <!-- Gradient Background Image: Positioned centrally with responsive sizing -->
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <!-- Container for page content with reveal animation -->
  <div class="container reveal-me">
    <div class="text-center">
      

      <!-- Main page heading with dark mode support -->
      <h2 class="dark:text-white">Our Creative Team</h2>
      <p class="mt-5 max-w-xl lg:max-w-[750px] mx-auto">
        Turn your vision into reality with Uxory. We blend design, strategy, and
        technology to build powerful digital experiences that elevate your
        brand.
      </p>
    </div>
  </div>
</section>


<!--=====================================
   Team Member Showcase Section
======================================-->
<section
  class="pt-14 md:pt-16 lg:pt-[88px] xl:pt-[100px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative z-50 overflow-hidden"
>
  <div class="container reveal-me">
    <!-- Main Profile Card -->
    <div class="flex flex-col gap-6">
    <div
      class="our-team-details sets-apart-card flex flex-col lg:flex-row gap-10 gap-x-[30px] max-md:justify-center max-md:items-center p-5 lg:p-10"
    >
      <figure class="max-lg:w-full lg:max-w-[290px] lg:max-h-[305px]" style="border-radius: 16px; overflow: hidden;">
        <img
          src="images/home-ai/team/ai-team.png"
          alt="Team Leader"
          class="w-full object-cover"
        />
      </figure>

      <!-- Profile Details Container -->
      <div>
        <div
          class="flex flex-col gap-y-10 md:flex-row justify-between mb-5 lg:mb-10"
        >
          <div>
            <h2 class="lg:text-4xl lg:leading-[1.2] lg:-tracking-[1.08px] mb-3">
              Rajesh Chaudhari
            </h2>

            <p class="text-lg font-light leading-[20px]">Director</p>
          </div>
          <ul class="flex gap-5 md:self-end">
            <!-- <li>
              <a href="https://x.com/" target="_blank">
                <img
                  src="images\icons\x-twitter.svg"
                  alt="Twitter"
                  class="inline dark:hidden"
                />
                <img
                  src="images\icons\x-twitter-dark.svg"
                  alt="Twitter"
                  class="hidden dark:inline"
                />
              </a>
            </li>
            <li>
              <a
                href="https://www.linkedin.com/"
                target="_blank"
              >
                <img
                  src="images\icons\LinkedinLogo.svg"
                  alt="linkedin"
                  class="inline dark:hidden"
                />
                <img
                  src="images\icons\LinkedinLogo-dark.svg"
                  alt="linkedin"
                  class="hidden dark:inline"
                />
              </a>
            </li> -->
          </ul>
        </div>
        <div class="max-w-[730px] border-t dark:border-dark pt-5 lg:pt-10">
          <p>
            Guiding Uxory with a clear vision for sustainable growth and financial strength. Passionate about building a company that blends smart strategy with long-term impact.
          </p>
        </div>
      </div>
    </div>

    <div
      class="our-team-details sets-apart-card flex flex-col lg:flex-row gap-10 gap-x-[30px] max-md:justify-center max-md:items-center p-5 lg:p-10"
    >
      <figure class="max-lg:w-full lg:max-w-[290px] lg:max-h-[305px]" style="border-radius: 16px; overflow: hidden;">
        <img
          src="images/home-ai/team/ai-team-1.png"
          alt="Team Leader"
          class="w-full object-cover"
        />
      </figure>

      <!-- Profile Details Container -->
      <div>
        <div
          class="flex flex-col gap-y-10 md:flex-row justify-between mb-5 lg:mb-10"
        >
          <div>
            <h2 class="lg:text-4xl lg:leading-[1.2] lg:-tracking-[1.08px] mb-3">
              Pratik Chaudhari
            </h2>

            <p class="text-lg font-light leading-[20px]">Chief Technology Officer</p>
          </div>
          <ul class="flex gap-5 md:self-end">
            <li>
              <a href="https://x.com/" target="_blank">
                <img
                  src="images\icons\x-twitter.svg"
                  alt="Twitter"
                  class="inline dark:hidden"
                />
                <img
                  src="images\icons\x-twitter-dark.svg"
                  alt="Twitter"
                  class="hidden dark:inline"
                />
              </a>
            </li>

            <li>
              <a
                href="https://www.linkedin.com/in/chaudharipratik/"
                target="_blank"
              >
                <img
                  src="images\icons\LinkedinLogo.svg"
                  alt="linkedin"
                  class="inline dark:hidden"
                />
                <img
                  src="images\icons\LinkedinLogo-dark.svg"
                  alt="linkedin"
                  class="hidden dark:inline"
                />
              </a>
            </li>
          </ul>
        </div>
        <div class="max-w-[730px] border-t dark:border-dark pt-5 lg:pt-10">
          <p>
            Software Development graduate from the University of Cincinnati with 6+ years of experience across a wide range of technologies. Passionate and innovative, with a strong foundation in software development, problem-solving, and leadership - committed to delivering impactful solutions.          </p>
        </div>
      </div>
    </div>
    </div><!-- end founders gap wrapper -->

    <!-- Team Member Selection Tabs -->

      <!-- <div class="marquee-container">

        <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">
          <div
            class="tab-member max-w-[370px] flex-auto p-5 flex items-center h-auto gap-5 transitionTimingFunction tab-active"
            data-member="marvin"
          >
            <div>
              <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
                Zara Ali
              </h3>
              <p class=text-white>Product Designer</p>
            </div>
          </div>
        </div> 

        <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">
          <div
            class="tab-member max-w-[370px] flex-auto p-5 flex items-center h-auto gap-5 transitionTimingFunction tab-active"
            data-member="marvin"
          >
            <div>
              <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
                Miles Chen
              </h3>
              <p class=text-white>Frontend Developer</p>
            </div>
          </div>
        </div>

        <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">
          <div
            class="tab-member max-w-[370px] flex-auto p-5 flex items-center h-auto gap-5 transitionTimingFunction tab-active"
            data-member="marvin"
          >
            <div>
              <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
                Sofia Patel
              </h3>
              <p class=text-white>UI/UX Designer</p>
            </div>
          </div>
        </div>

        <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">
          <div
            class="tab-member max-w-[370px] flex-auto p-5 flex items-center h-auto gap-5 transitionTimingFunction tab-active"
            data-member="marvin"
          >
            <div>
              <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
                Ethan Walker
              </h3>
              <p class=text-white>Senior Developer</p>
            </div>
          </div>
        </div>

        <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">
          <div
            class="tab-member max-w-[370px] flex-auto p-5 flex items-center h-auto gap-5 transitionTimingFunction tab-active"
            data-member="marvin"
          >
            <div>
              <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
                Noah Kim
              </h3>
              <p class=text-white>QA & Testing Engineer</p>
            </div>
          </div>
        </div>

        <div class="flex max-lg:flex-wrap gap-6 justify-center mt-[30px]">
          <div
            class="tab-member max-w-[370px] flex-auto p-5 flex items-center h-auto gap-5 transitionTimingFunction tab-active"
            data-member="marvin"
          >
            <div>
              <h3 class="text-2xl leading-[1.2] tracking-[-0.72px] mb-3">
                Aria Thompson
              </h3>
              <p class=text-white>SEO Specialist</p>
            </div>
          </div>
        </div>

      </div> -->

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