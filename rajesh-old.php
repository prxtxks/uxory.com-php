<!DOCTYPE html>
<html lang="zxx" class="dark">


<head>
  <!-- Title -->
  <title>Rajesh Chaudhari | Uxory Digital Solutions</title>
  <meta name="description" content="Get in touch with Rajesh Chaudhari, Uxory Digital Solutions. Providing expert digital solutions including web development, SEO, and marketing." />

  <meta charset="utf-8" />

  <!-- Mobile Responsive Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="index, follow" />

  <!-- Stylesheets -->
  <link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="/images/favicon.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
  <link rel="shortcut icon" href="/images/favicon.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />

  <!-- Canonical -->
  <link rel="canonical" href="https://uxory.com/rajesh" />

  <!-- Open Graph -->
  <meta property="og:title" content="Rajesh Chaudhari | Uxory Digital Solutions" />
  <meta property="og:description" content="Connect with Rajesh Chaudhari at Uxory Digital Solutions for expert web development, SEO, and marketing services." />
  <meta property="og:image" content="https://www.uxory.com/images/social-preview.png" />
  <meta property="og:url" content="https://uxory.com/rajesh" />
  <meta property="og:type" content="profile" />
  <meta property="profile:first_name" content="Rajesh" />
  <meta property="profile:last_name" content="Chaudhari" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Rajesh Chaudhari | Uxory Digital Solutions" />
  <meta name="twitter:description" content="Get in touch with Rajesh Chaudhari, Uxory Digital Solutions. Providing expert web development, SEO, and marketing services." />
  <meta name="twitter:image" content="https://www.uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Rajesh Chaudhari",
      "jobTitle": "Director & Consultant",
      "worksFor": {
        "@type": "Organization",
        "name": "Uxory Technologies Pvt. Ltd.",
        "url": "https://uxory.com"
      },
      "email": "mailto:rajesh@uxory.com",
      "telephone": "+91 98340 69756",
      "url": "https://uxory.com/rajesh",
      "sameAs": [
        "mailto:contact@uxory.com",
        "https://wa.me/919834069756"
      ]
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
include 'components/nav.php';
?>

<div
  class="menu-overflow fixed z-[9999] bg-[rgba(10,10,10,0.95)] bg-opacity-60 backdrop-blur-[25px] w-full h-full pointer-events-none"
></div>

<!-- Cursor Pointer -->
<div class="pointer"></div>

<!-- Dark Mode toggle -->
<div class="toggle-button fixed right-10 bottom-10 z-[1000]">
  <button
    aria-label="Toggle dark/light theme"
    id="theme-toggle"
    type="button"
    class="text-secondary bg-black/90 dark:bg-backgroundBody/90 rounded-[1px] backdrop-blur-xl dark:text-white focus:outline-none focus:ring-0 focus:ring-gray-200 w-[44px] h-[44px] flex justify-center items-center"
  >
    <svg
      data-testid="geist-icon"
      id="theme-toggle-dark-icon"
      class="hidden w-5 h-5"
      fill="#fff"
      stroke-linejoin="round"
      viewBox="0 0 16 16"
    >
      <path
        fill-rule="evenodd"
        clip-rule="evenodd"
        d="M10.5 0.25V1V1.5H11L11.75 1.5V3H11H10.5V3.5V4.25H9V3.5V3H8.5H7.75V1.5H8.5H9V1V0.25H10.5ZM3.25514 2.75496C2.33413 3.53491 1.75 4.69972 1.75 6C1.75 8.34721 3.65279 10.25 6 10.25C7.30029 10.25 8.4651 9.66587 9.24505 8.74485C9.16377 8.74827 9.08207 8.74999 9 8.74999C5.82436 8.74999 3.25 6.17563 3.25 2.99999C3.25 2.91792 3.25172 2.83623 3.25514 2.75496ZM0.25 6C0.25 3.51072 1.83142 1.39271 4.042 0.592193L5.00256 1.55275C4.83933 2.00347 4.75 2.49047 4.75 2.99999C4.75 5.3472 6.65279 7.24999 9 7.24999C9.50953 7.24999 9.99653 7.16065 10.4473 6.99743L11.4078 7.95798C10.6073 10.1686 8.48929 11.75 6 11.75C2.82436 11.75 0.25 9.17564 0.25 6Z"
        fill="#fff"
        transform="translate(2.25, 2.25)"
      ></path>
    </svg>
    <svg
      id="theme-toggle-light-icon"
      class="hidden w-5 h-5"
      fill="#000"
      viewBox="0 0 16 16"
      data-testid="geist-icon"
      stroke-linejoin="round"
    >
      <path
        fill-rule="evenodd"
        clip-rule="evenodd"
        d="M7.75 1V0.25H6.25V1V1.25V2H7.75V1.25V1ZM7 9C8.10457 9 9 8.10457 9 7C9 5.89543 8.10457 5 7 5C5.89543 5 5 5.89543 5 7C5 8.10457 5.89543 9 7 9ZM7 10.5C8.933 10.5 10.5 8.933 10.5 7C10.5 5.067 8.933 3.5 7 3.5C5.067 3.5 3.5 5.067 3.5 7C3.5 8.933 5.067 10.5 7 10.5ZM7.75 12V12.75V13V13.75H6.25V13V12.75V12H7.75ZM12 6.25H12.75H13H13.75V7.75H13H12.75H12V6.25ZM1 6.25H0.25V7.75H1H1.25H2V6.25H1.25H1ZM10.0052 2.93414L10.5355 2.40381L10.7123 2.22703L11.2426 1.6967L12.3033 2.75736L11.773 3.28769L11.5962 3.46447L11.0659 3.9948L10.0052 2.93414ZM2.22703 10.7123L1.6967 11.2426L2.75736 12.3033L3.28769 11.773L3.46447 11.5962L3.9948 11.0659L2.93414 10.0052L2.40381 10.5355L2.22703 10.7123ZM2.93414 3.9948L2.40381 3.46447L2.22703 3.28769L1.6967 2.75736L2.75736 1.6967L3.28769 2.22703L3.46447 2.40381L3.9948 2.93414L2.93414 3.9948ZM10.7123 11.773L11.2426 12.3033L12.3033 11.2426L11.773 10.7123L11.5962 10.5355L11.0659 10.0052L10.0052 11.0659L10.5355 11.5962L10.7123 11.773Z"
        fill="#000"
        transform="translate(1.25, 1.25)"
      ></path>
    </svg>
  </button>
</div>


<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
<!--=====================================
   Team Member Profile Section
======================================-->
<section
  class="pt-32 md:pt-36 lg:pt-[200px] pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px]"
>
  <div class="container">
    <!-- Profile Card Container -->
    <div
      class="p-6 md:p-7 lg:p-10 border dark:border-dark flex flex-col lg:flex-row justify-center lg:justify-normal max-lg:items-center gap-x-8 gap-y-6 reveal-me"
    >
      <!-- Profile Image -->
      <figure class="w-full lg:w-[428px] md:h-[682px]">
        <img
          src="images/rajesh.png"
          alt="Single Team Member"
          class="w-full h-full object-cover"
        />
      </figure>

      <!-- Profile Information -->
      <div class="flex-1">
        <!-- Name and Role -->
        <h2
          class="text-3xl md:text-4xl md:leading-[1.2] md:tracking-[-1.08px] mb-3 md:mb-5"
        >
          Rajesh Chaudhari
        </h2>
        <span
          class="text-lg font-light leading-[20px] text-colorText inline-block mb-4 md:mb-10"
          >Director, Uxory Technologies Pvt. Ltd.</span
        >

        <!-- Biography -->
        <p class="py-4 md:py-10 border-t dark:border-dark">
          Welcome! I’m Rajesh Chaudhari, Director of Uxory Technologies — glad to connect with you.
        </p>


        <!-- Portfolio Links -->
        <h3
          class="text-2xl md:text-4xl md:leading-[1.2] md:tracking-[-1.08px] mb-3.5 md:mb-5"
        >
          Quick Links
        </h3>
        <!-- Hero Buttons -->
    <div class="flex flex-col md:flex-row mt-14 pb-10 gap-6">

       <!-- Button 1 -->
      <div
        class="flex w-full md:w-auto p-3 group bg-primary bg-opacity-30 gap-3 justify-between items-center backdrop-blur-2xl max-w-[320px] md:max-w-[320px]"
      >
        <div>
          <h6 class="text-sm font-satoshi font-bold text-black dark:text-white">
            Save Contact
          </h6>
        </div>
        <a href="/rajesh-chaudhari.vcf" download>
          <figure
            class="bg-primary w-[44px] h-[44px] cursor-pointer relative overflow-hidden"
          >
            <img
              src="images/icons/download-arrow.svg"
              alt="Arrow Icon"
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
            Explore Services
          </h6>
          <!-- <p class="text-sm text-black dark:text-white">Few spots left this month</p> -->
        </div>
          <a href="services.php">
            <figure
              class="bg-primary w-[44px] h-[44px] cursor-pointer relative overflow-hidden"
            >
              <img
                src="images/icons/hyper-arrow-new.svg"
                alt="Arrow Icon"              />
            </figure>
          </a>
      </div> 

    </div>

        <!-- Social Media Links -->
        <h3
          class="text-2xl md:text-4xl md:leading-[1.2] md:tracking-[-1.08px] mb-3.5 md:mb-5"
        >
          Reach Me (click to connect)
        </h3>
        <ul class="flex gap-x-10 gap-y-5 md:self-end">
          <!-- Mail -->
          <li>
            <a target="_blank" href="mailto:rajesh@uxory.com">
              <img
                src="/images/marquee-img/4.svg"
                alt="Mail"
                class="h-12 w-12 inline dark:hidden"
              />
              <img
                src="/images/marquee-img/4.svg"
                alt="Mail"
                class="h-12 w-12 hidden dark:inline"
              />
            </a>
          </li>

          <!-- Whatsapp -->
          <li>
            <a target="_blank" href="https://wa.me/919834069756">
              <img
                src="/images/marquee-img/2.svg"
                alt="WhatsApp"
                class="h-12 w-12 inline dark:hidden"
              />
              <img
                src="/images/marquee-img/2.svg"
                alt="WhatsApp"
                class="h-12 w-12 hidden dark:inline"
              />
            </a>
          </li>

          <!-- Phone -->
          <li>
            <a target="_blank" href="tel:+919834069756">
              <img
                src="/images/marquee-img/phone.svg"
                alt="Phone"
                class="h-12 w-12 inline dark:hidden"
              />
              <img
                src="/images/marquee-img/phone.svg"
                alt="Phone"
                class="h-12 w-12 hidden dark:inline"
              />
            </a>
          </li>
        </ul>

        <!-- Biography -->
        <p class="py-4 font-bold">
          <span href="mailto:rajesh@uxory.com" class="hover:underline">rajesh@uxory.com</span> | 
          <span href="tel:+919403383635" class="hover:underline">+91 98340 69756</span>
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