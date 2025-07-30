<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <title>Uxory | Blog Tittle</title>

  <!--Meta For No Index-->
  <meta name="robots" content="noindex, Nofollow, Noimageindex">
  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5" />
  <meta name="description" content="Uxory is a Creative Agency Template" />


  <!-- Stylesheets -->
  <link href="/assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />
  
  <!--Favicon-->
  <link rel="icon" type="image/png" href="/images/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
  <link rel="shortcut icon" href="/images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />
  <!-- <link rel="manifest" href="images/site.webmanifest" > -->

  <link rel="canonical" href="https://uxory.com/blog-details/" />

</head>
<body>

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
   Page Header Details Section
======================================-->
<section
  class="pt-32 md:pt-44 lg:pt-[200px] pb-10 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <!-- Gradient Background Wrapper -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-full top-0 left-0 -z-10 blur-[35px] md:blur-[60px] max-sm:scale-75 sm:scale-75"
  >
    <img
      src="/images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-[45%]"
    />
  </div>

  <!-- Hero Content Container -->
  <div class="container reveal-me">
    <div class="text-center">
      <!-- Badge Component -->
      <div class="rv-badge mb-4 lg:mb-10">
        <span class="rv-badge-text">Blog Details</span>
      </div>

      <!-- Hero Title -->
      <h1 class="mb-5 lg:mb-8 max-sm:max-w-md max-sm:mx-auto">
        Changing Face of Digital Advertising
      </h1>
    </div>
  </div>
</section>


<!--=====================================
    Blog Details Section Area
======================================-->
<section class="">
  <div class="max-w-[1440px] mx-auto px-10 md:px-20">

    <!-- Featured Image -->
    <!-- <figure class="w-full reveal-me">
      <img
        src="/images/blog-img/blog-details-img-1.png"
        alt="Blog Details"
        class="w-full"
      />
    </figure> -->

    <!-- Blog Content Wrapper -->
    <div
      class="flex flex-col gap-10 lg:flex-row justify-start mt-12 md:mt-[60px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
    >
      <!-- Sidebar -->
      <aside class="min-w-[275px] flex-1">
        <div class="sticky top-24 max-md:mb-7">
          <div class="reveal-me">
            <!-- Table of Contents -->
            <h3
              class="max-sm:text-[35px] max-md:text-[40px] md:text-[32px] mt-2 mb-4 lg:mb-10"
            >
              Table of contents
            </h3>
            <ul
              class="[&>*:not(:last-child)]:mb-2 md:[&>*:not(:last-child)]:mb-4"
            >
              <li>
                <a
                  href="#project-overview"
                  class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Get to Know the Project – Overview & Highlights
                </a>
              </li>
              <li>
                <a
                  href="#our-service-includes"
                  class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Building the User Experience
                </a>
              </li>
              <li>
                <a
                  href="#why-choose"
                  class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Building the information architecture
                </a>
              </li>
              <li>
                <a
                  href="#wireframing-the-findings-of-the-research"
                  class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Wireframing the findings of the research
                </a>
              </li>
              <li>
                <a
                  href="#testing-the-website-with-real-users"
                  class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Testing the website with real users
                </a>
              </li>
              <li>
                <a
                  href="#final-design"
                  class="text-xl normal-case font-normal leading-7 dark:text-dark-100 hover:font-medium hover:text-secondary dark:hover:text-backgroundBody transition-all lenis-scroll-to"
                >
                  Final design
                </a>
              </li>
            </ul>

            <!-- Social Share -->
            <h3
              class="max-sm:text-[35px] max-md:text-[40px] md:text-[32px] mt-5 sm:mt-7 md:mt-12 lg:mt-20 mb-7"
            >
              Share
            </h3>
            <!-- Social Media Icons -->
            <ul class="flex gap-5 items-center max-lg:mb-7">

              <li
                class="border-2 border-secondary dark:border-dark inline-block rounded-full w-10 h-10 hover:bg-primary duration-300 relative"
              >
                <a href="#" target="_blank">
                  <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 inline dark:hidden"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="#000"
                      viewBox="0 0 256 256"
                    >
                      <path
                        d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z"
                      ></path>
                    </svg>
                  </span>
                  <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 dark:inline hidden"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="#fff"
                      viewBox="0 0 256 256"
                    >
                      <path
                        d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z"
                      ></path>
                    </svg>
                  </span>
                </a>
              </li>

              <li
                class="border-2 border-secondary dark:border-dark inline-block rounded-full w-10 h-10 hover:bg-primary duration-300 relative"
              >
                <a
                  href="#"
                  target="_blank"
                >
                  <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 inline dark:hidden"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="#000"
                      viewBox="0 0 256 256"
                    >
                      <path
                        d="M216,24H40A16,16,0,0,0,24,40V216a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V40A16,16,0,0,0,216,24Zm0,192H40V40H216V216ZM96,112v64a8,8,0,0,1-16,0V112a8,8,0,0,1,16,0Zm88,28v36a8,8,0,0,1-16,0V140a20,20,0,0,0-40,0v36a8,8,0,0,1-16,0V112a8,8,0,0,1,15.79-1.78A36,36,0,0,1,184,140ZM100,84A12,12,0,1,1,88,72,12,12,0,0,1,100,84Z"
                      ></path>
                    </svg>
                  </span>
                  <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 dark:inline hidden"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="#fff"
                      viewBox="0 0 256 256"
                    >
                      <path
                        d="M216,24H40A16,16,0,0,0,24,40V216a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V40A16,16,0,0,0,216,24Zm0,192H40V40H216V216ZM96,112v64a8,8,0,0,1-16,0V112a8,8,0,0,1,16,0Zm88,28v36a8,8,0,0,1-16,0V140a20,20,0,0,0-40,0v36a8,8,0,0,1-16,0V112a8,8,0,0,1,15.79-1.78A36,36,0,0,1,184,140ZM100,84A12,12,0,1,1,88,72,12,12,0,0,1,100,84Z"
                      ></path>
                    </svg>
                  </span>
                </a>
              </li>

              <li
                class="border-2 border-secondary dark:border-dark inline-block rounded-full w-10 h-10 hover:bg-primary duration-300 relative"
              >
                <a href="#" target="_blank">
                  <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 inline dark:hidden"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="#000000"
                      viewBox="0 0 256 256"
                    >
                      <path
                        d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"
                      ></path>
                    </svg>
                  </span>
                  <span
                    class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 dark:inline hidden"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="#fff"
                      viewBox="0 0 256 256"
                    >
                      <path
                        d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z"
                      ></path>
                    </svg>
                  </span>
                </a>
              </li>

            </ul>
          </div>
        </div>
      </aside>

      <!-- Main Article Content -->
      <article class="blog-details-body">
        <div class="reveal-me">
          <h3 id="project-overview">
            Get to Know the Project – Overview & Highlights
          </h3>
          <p>
            Introducing our latest innovation: the 'Best Sellers No-Code
            Website'! Effortlessly merging creativity with functionality, this
            platform allows businesses to stylishly and efficiently display
            their top products. Say goodbye to coding complexities and hello to
            a streamlined, user-friendly experience. <br />
            <br />
            This version keeps the core idea but slightly changes the phrasing
            to make it more concise and engaging.
          </p>
        </div>
        <div class="reveal-me">
          <h3 id="our-service-includes">Building the User Experience</h3>
          <p>
            refers to the process of creating a product, service, or digital
            interface that prioritizes the needs, behaviors, and emotions of the
            user. The goal is to craft a seamless, intuitive, and satisfying
            interaction between the user and the product. Key elements involved
            in building the user experience (UX) include: <br />
          </p>
          <ul>
            <li>
              User Research: Understanding your audience through surveys,
              interviews, and data analysis to identify pain points and needs.
            </li>
            <li>
              Wireframing and Prototyping: Designing basic layouts and
              interactive models to visualize the structure and flow of the user
              interface.
            </li>
            <li>
              User Testing: Gathering feedback from actual users to refine the
              design, ensuring it meets usability standards.
            </li>
            <li>
              Interaction Design: Focusing on the way users interact with the
              interface, considering ease of navigation and user behaviors.
            </li>
            <li>
              Visual Design: Enhancing the user experience with appealing,
              cohesive, and accessible aesthetics.
            </li>
          </ul>
          <p>
            Building the user experience requires collaboration between
            designers, developers, and product teams to ensure that
            functionality and design work in harmony for the end-user.
          </p>
        </div>

        <!-- <figure class="reveal-me">
          <img
            src="/images/services/services-details-img.png"
            alt="Services Big Img"
          />
        </figure> -->

        <div class="reveal-me">
          <h3 id="why-choose">Building the information architecture</h3>
          <p>
            It sounds like you’re working on translating research findings into
            a wireframe. Are you focusing on a specific type of project or
            platform, like a website, app, or something else? And what kind of
            research findings are you incorporating?
          </p>
        </div>
        <div class="reveal-me">
          <h3 id="wireframing-the-findings-of-the-research">
            Wireframing the findings of the research
          </h3>
          <p>
            Got it. Testing with real users is crucial for refining your design
            and ensuring it meets their needs. Here’s a basic outline of how you
            might incorporate your research findings into wireframes and test
            them:
          </p>
          <ul>
            <li>
              User Research: Understanding your audience through surveys,
              interviews, and data analysis to identify pain points and needs.
            </li>
            <li>
              Wireframing and Prototyping: Designing basic layouts and
              interactive models to visualize the structure and flow of the user
              interface.
            </li>
            <li>
              User Testing: Gathering feedback from actual users to refine the
              design, ensuring it meets usability standards.
            </li>
            <li>
              Interaction Design: Focusing on the way users interact with the
              interface, considering ease of navigation and user behaviors.
            </li>
            <li>
              Visual Design: Enhancing the user experience with appealing,
              cohesive, and accessible aesthetics.
            </li>
          </ul>
        </div>

        <!-- <figure class="reveal-me">
          <img
            src="/images/services/services-details-img.png"
            alt="Services Big Img"
          />
        </figure> -->

        <div class="reveal-me">
          <h3 id="testing-the-website-with-real-users">
            Testing the website with real users
          </h3>
          <ul>
            <li>
              User Research: Understanding your audience through surveys,
              interviews, and data analysis to identify pain points and needs.
            </li>
            <li>
              Wireframing and Prototyping: Designing basic layouts and
              interactive models to visualize the structure and flow of the user
              interface.
            </li>
            <li>
              User Testing: Gathering feedback from actual users to refine the
              design, ensuring it meets usability standards.
            </li>
            <li>
              Interaction Design: Focusing on the way users interact with the
              interface, considering ease of navigation and user behaviors.
            </li>
            <li>
              Visual Design: Enhancing the user experience with appealing,
              cohesive, and accessible aesthetics.
            </li>
          </ul>
        </div>
        <div class="reveal-me">
          <h3 id="final-design">Final design</h3>
          <ul>
            <li>
              User Research: Understanding your audience through surveys,
              interviews, and data analysis to identify pain points and needs.
            </li>
            <li>
              Wireframing and Prototyping: Designing basic layouts and
              interactive models to visualize the structure and flow of the user
              interface.
            </li>
            <li>
              User Testing: Gathering feedback from actual users to refine the
              design, ensuring it meets usability standards.
            </li>
            <li>
              Interaction Design: Focusing on the way users interact with the
              interface, considering ease of navigation and user behaviors.
            </li>
            <li>
              Visual Design: Enhancing the user experience with appealing,
              cohesive, and accessible aesthetics.
            </li>
          </ul>
          <p>Let me know if you need more specifics on any of these steps!</p>
        </div>
      </article>
    </div>

    <!-- Related Articles Grid -->
   <?php       
    include '../components/blog.php';
    ?>

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