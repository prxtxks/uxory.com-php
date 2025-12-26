<!DOCTYPE html>
<html lang="zxx" class="dark">

<head>
  <!-- Title -->
  <title>Meet the Team | Uxory – Designers, Developers & Growth Experts</title>
  <meta name="description" content="Get to know the Uxory team – a collective of designers, developers, and strategists building impactful digital solutions." />

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
  <link rel="canonical" href="https://uxory.com/team.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Meet the Team | Uxory – Designers, Developers & Growth Experts" />
  <meta property="og:description" content="Get to know the Uxory team – a collective of designers, developers, and strategists building impactful digital solutions." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/team.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Meet the Team | Uxory – Designers, Developers & Growth Experts" />
  <meta name="twitter:description" content="Get to know the Uxory team – a collective of designers, developers, and strategists building impactful digital solutions." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />
</head>

<body >

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

<!-- Cursor Pointer -->
<div class="pointer"></div>

<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
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
      <!-- Badge to provide additional context or categorization -->
      <div class="rv-badge mb-4 md:mb-8">
        <span class="rv-badge-text"> Team</span>
      </div>

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
    
    <div
      class="our-team-details flex flex-col lg:flex-row gap-10 gap-x-[30px] max-md:justify-center max-md:items-center border dark:border-dark p-5 lg:p-10 bg-backgroundBody dark:bg-dark"
    >
      <figure class="max-lg:w-full lg:max-w-[290px] lg:max-h-[305px]">
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
      class="our-team-details flex flex-col lg:flex-row gap-10 gap-x-[30px] max-md:justify-center max-md:items-center border dark:border-dark p-5 lg:p-10 bg-backgroundBody dark:bg-dark"
    >
      <figure class="max-lg:w-full lg:max-w-[290px] lg:max-h-[305px]">
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
            Software Development graduate from the University of Cincinnati with 6+ years of experience across a wide range of technologies. Passionate and innovative, with a strong foundation in software development, problem-solving, and leadership — committed to delivering impactful solutions.          </p>
        </div>
      </div>
    </div>

    <div
      class="our-team-details flex flex-col lg:flex-row gap-10 gap-x-[30px] max-md:justify-center max-md:items-center border dark:border-dark p-5 lg:p-10 bg-backgroundBody dark:bg-dark"
    >
      <figure class="max-lg:w-full lg:max-w-[290px] lg:max-h-[305px]">
        <img
          src="images/home-ai/team/ai-team-female.jpg"
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
              Jahnavi Ammineni
            </h2>

            <p class="text-lg font-light leading-[20px]">Principal Engineer </p>
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
            With an engineering degree from a top U.S. university, Jahnavi leads Uxory’s core architecture design. She mentors engineers, drives innovation, and ensures scalable, secure, and high-quality tech solutions.
          </p>
        </div>
      </div>
    </div>

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