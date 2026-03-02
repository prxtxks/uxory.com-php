<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Client Reviews | The Uxory Wall</title>
  <meta name="description" content="Read real reviews from Uxory clients. Share your experience working with us — no account needed. Star ratings, threaded discussions, and honest feedback." />

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <meta name="googlebot" content="index, follow" />

  <!-- Theme & Mobile Optimization -->
  <meta name="theme-color" content="#000000" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="format-detection" content="telephone=no" />

  <!-- Canonical URL -->
  <link rel="canonical" href="https://uxory.com/reviews.php" />

  <!-- Performance Hints -->
  <link rel="preconnect" href="https://www.google.com" crossorigin />
  <link rel="dns-prefetch" href="https://www.google.com" />
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
  <link rel="dns-prefetch" href="https://fonts.googleapis.com" />

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
  <link rel="icon" type="image/png" href="/images/favicon.png" sizes="96x96" />
  <link rel="shortcut icon" href="/images/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />

  <!-- Stylesheets -->
  <link href="assets/css/main.css?v=<?= filemtime('assets/css/main.css') ?>" rel="stylesheet" />

  <!-- Open Graph -->
  <meta property="og:title" content="Client Reviews | The Uxory Wall" />
  <meta property="og:description" content="Read real reviews from Uxory clients. Share your experience — no account needed." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/reviews.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:url" content="https://uxory.com/reviews.php" />
  <meta name="twitter:title" content="Client Reviews | The Uxory Wall" />
  <meta name="twitter:description" content="Read real reviews from Uxory clients. Share your experience — no account needed." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />
  <meta name="twitter:image:alt" content="Uxory Client Reviews" />

  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "https://uxory.com/#organization",
        "name": "Uxory",
        "url": "https://uxory.com",
        "logo": {
          "@type": "ImageObject",
          "@id": "https://uxory.com/#logo",
          "url": "https://uxory.com/images/logo.png",
          "contentUrl": "https://uxory.com/images/logo.png",
          "width": 512,
          "height": 512
        }
      },
      {
        "@type": "WebPage",
        "@id": "https://uxory.com/reviews.php#webpage",
        "url": "https://uxory.com/reviews.php",
        "name": "Client Reviews | The Uxory Wall",
        "description": "Read real reviews from Uxory clients. Share your experience working with us.",
        "isPartOf": {
          "@id": "https://uxory.com/#website"
        }
      },
      {
        "@type": "WebSite",
        "@id": "https://uxory.com/#website",
        "url": "https://uxory.com",
        "name": "Uxory",
        "publisher": {
          "@id": "https://uxory.com/#organization"
        }
      }
    ]
  }
  </script>

  <style>
    .star-rating-input svg { cursor: pointer; transition: transform 0.15s ease; }
    .star-rating-input svg:hover { transform: scale(1.2); }
    .review-form-wrapper { max-height: 0; overflow: hidden; transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease; opacity: 0; }
    .review-form-wrapper.open { max-height: 900px; opacity: 1; }
    .reply-thread { max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease; opacity: 0; }
    .reply-thread.open { max-height: 5000px; opacity: 1; }
    .sort-btn { border-radius: 8px; }
    .sort-btn.active { background-color: rgb(18 216 204 / 0.15); color: #12D8CC; border-color: #12D8CC; }
    .review-card { transition: transform 0.2s ease, box-shadow 0.2s ease; border-radius: 16px; }
    .review-card:hover { transform: translateY(-2px); }
    .review-form-card { border-radius: 16px; background-color: #F5F7FA; }
    :is(:where(.dark) .review-form-card) { background-color: #1e1e1e; }
    .review-input { border-radius: 10px; }
    .reply-input { border-radius: 8px; }
    .review-avatar { border-radius: 12px; }
    .reply-avatar { border-radius: 8px; }
    .reply-submit-btn { border-radius: 8px; }
    .uxory-honeypot { position: absolute; left: -9999px; opacity: 0; height: 0; width: 0; overflow: hidden; }
  </style>

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

<!-- header -->
<?php
include 'components/header.php';
?>

<!-- nav -->
<?php
$currentPage = 'reviews';
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
   Hero Section
======================================-->
<section
  class="pt-[120px] md:pt-[180px] pb-10 md:pb-14 relative overflow-hidden"
>
  <!-- Gradient Background Effect -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full h-full top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 -z-10 blur-[60px] scale-90"
  >
    <img
      src="images/hero-gradient-background.png"
      alt=""
      id="hero-gradient"
      class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2"
    />
  </div>

  <div class="container">
    <div class="reveal-me text-center mb-8">
      <p class="font-satoshi text-sm font-normal leading-6 tracking-[3px] uppercase mb-4">
        Client Reviews
      </p>
      <h2 class="font-normal text-appear">
        The Uxory
        <span class="font-instrument italic">Wall</span>
      </h2>
      <p class="mt-5 max-w-lg mx-auto text-secondary/70 dark:text-backgroundBody/70 text-lg">
        Real feedback from real people. No account needed — just your honest experience.
      </p>
    </div>

    <!-- Live Stats Bar -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-6 sm:gap-12 reveal-me mt-8">
      <div class="flex items-center gap-3">
        <span id="stats-avg-number" class="text-5xl md:text-6xl font-medium text-primary">—</span>
        <div>
          <div id="stats-avg-stars" class="flex gap-0.5">
            <!-- Populated by JS -->
          </div>
          <p class="text-sm text-secondary/50 dark:text-backgroundBody/50 mt-1">average rating</p>
        </div>
      </div>
      <div class="hidden sm:block w-px h-12 bg-secondary/20 dark:bg-backgroundBody/20"></div>
      <div class="text-center sm:text-left">
        <span id="stats-total" class="text-4xl md:text-5xl font-medium">0</span>
        <p class="text-sm text-secondary/50 dark:text-backgroundBody/50 mt-1">total reviews</p>
      </div>
    </div>
  </div>
</section>

<!--=====================================
   Write a Review Section
======================================-->
<section
  class="pb-10 md:pb-14 relative overflow-hidden"
>
  <div class="container">
    <div class="max-w-[700px] mx-auto">

      <!-- Toggle Button -->
      <div class="text-center reveal-me">
        <button id="toggle-review-form" class="rv-button rv-button-primary">
          <div class="rv-button-top">
            <span>Write a Review</span>
          </div>
          <div class="rv-button-bottom">
            <span>Write a Review</span>
          </div>
        </button>
      </div>

      <!-- Collapsible Review Form -->
      <div id="review-form-wrapper" class="review-form-wrapper mt-8">
        <div class="review-form-card border dark:border-dark p-6 md:p-8">
          <h4 class="text-2xl leading-[1.2] tracking-[-0.48px] mb-6">Share Your Experience</h4>

          <form id="reviewForm" method="POST">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

              <!-- Name -->
              <div>
                <label for="review-name" class="text-lg leading-[1.2] tracking-[-0.36px] text-secondary dark:text-backgroundBody">
                  Your Name <span class="text-primary">*</span>
                </label>
                <input
                  required
                  type="text"
                  name="author_name"
                  id="review-name"
                  maxlength="100"
                  placeholder="John Doe"
                  class="review-input py-3 pl-4 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base leading-[1.4] mt-2"
                />
              </div>

              <!-- Company -->
              <div>
                <label for="review-company" class="text-lg leading-[1.2] tracking-[-0.36px] text-secondary dark:text-backgroundBody">
                  Company Name
                </label>
                <input
                  type="text"
                  name="company_name"
                  id="review-company"
                  maxlength="100"
                  placeholder="Acme Inc. (optional)"
                  class="review-input py-3 pl-4 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base leading-[1.4] mt-2"
                />
              </div>

              <!-- Email -->
              <div class="md:col-span-full">
                <label for="review-email" class="text-lg leading-[1.2] tracking-[-0.36px] text-secondary dark:text-backgroundBody">
                  Email Address <span class="text-primary">*</span>
                </label>
                <input
                  required
                  type="email"
                  name="email"
                  id="review-email"
                  maxlength="255"
                  placeholder="you@company.com (not displayed publicly)"
                  class="review-input py-3 pl-4 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base leading-[1.4] mt-2"
                />
                <p class="text-xs text-secondary/40 dark:text-backgroundBody/40 mt-1">Your email will never be shown publicly.</p>
              </div>

              <!-- Star Rating -->
              <div class="md:col-span-full">
                <label class="text-lg leading-[1.2] tracking-[-0.36px] text-secondary dark:text-backgroundBody">
                  Rating <span class="text-primary">*</span>
                </label>
                <div class="star-rating-input flex gap-1 mt-2" id="star-rating-input">
                  <!-- 5 interactive stars rendered by JS -->
                </div>
                <input type="hidden" name="rating" id="review-rating" value="0" />
              </div>

              <!-- Review Text -->
              <div class="md:col-span-full">
                <label for="review-text" class="text-lg leading-[1.2] tracking-[-0.36px] text-secondary dark:text-backgroundBody">
                  Your Review <span class="text-primary">*</span>
                </label>
                <textarea
                  required
                  name="review_text"
                  id="review-text"
                  maxlength="2000"
                  rows="4"
                  placeholder="Tell us about your experience working with Uxory..."
                  class="review-input py-3 pl-4 bg-backgroundBody dark:bg-dark focus:outline-none focus:border-primary border dark:border-dark w-full text-colorText dark:text-backgroundBody/70 text-base leading-[1.4] mt-2 resize-y"
                ></textarea>
                <p class="text-xs text-secondary/40 dark:text-backgroundBody/40 mt-1"><span id="review-char-count">0</span>/2000</p>
              </div>

              <!-- Honeypot -->
              <div class="uxory-honeypot" aria-hidden="true">
                <label for="review-website">Website</label>
                <input type="text" name="website" id="review-website" tabindex="-1" autocomplete="off" />
              </div>

              <!-- reCAPTCHA (hidden by default) -->
              <div id="review-recaptcha-wrapper" class="md:col-span-full hidden">
                <div id="review-recaptcha" class="g-recaptcha" data-sitekey="6LeSajcsAAAAALS4VDz_NUpt7ZxXziL1q-GZuklX"></div>
              </div>

              <div id="review-status" class="md:col-span-full text-base font-medium"></div>

              <!-- Submit -->
              <div class="md:col-span-full">
                <button type="submit" id="review-submit-btn" class="rv-button rv-button-primary">
                  <div class="rv-button-top">
                    <span>Post Review</span>
                  </div>
                  <div class="rv-button-bottom">
                    <span>Post Review</span>
                  </div>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!--=====================================
   Reviews Feed Section
======================================-->
<section
  class="pt-6 md:pt-10 pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] relative overflow-hidden"
>
  <div class="container">
    <div class="max-w-[700px] mx-auto">

      <!-- Sort Options -->
      <div class="flex flex-wrap items-center gap-3 mb-8 reveal-me">
        <span class="text-sm text-secondary/50 dark:text-backgroundBody/50 font-satoshi uppercase tracking-[2px] mr-2">Sort by</span>
        <button class="sort-btn active text-sm px-4 py-2 border dark:border-dark transition-colors duration-200" data-sort="newest">
          Newest First
        </button>
        <button class="sort-btn text-sm px-4 py-2 border dark:border-dark transition-colors duration-200" data-sort="highest">
          Highest Rated
        </button>
        <button class="sort-btn text-sm px-4 py-2 border dark:border-dark transition-colors duration-200" data-sort="discussed">
          Most Discussed
        </button>
      </div>

      <!-- Reviews Container -->
      <div id="reviews-container">
        <!-- Skeleton loader -->
        <div id="reviews-skeleton" class="space-y-6">
          <div class="border dark:border-dark p-6 md:p-8 animate-pulse" style="border-radius:16px">
            <div class="flex items-center gap-4 mb-4">
              <div class="w-11 h-11 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:12px"></div>
              <div class="flex-1">
                <div class="h-4 w-32 bg-secondary/10 dark:bg-backgroundBody/10 mb-2" style="border-radius:6px"></div>
                <div class="h-3 w-20 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:6px"></div>
              </div>
            </div>
            <div class="h-3 w-full bg-secondary/10 dark:bg-backgroundBody/10 mb-2" style="border-radius:6px"></div>
            <div class="h-3 w-3/4 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:6px"></div>
          </div>
          <div class="border dark:border-dark p-6 md:p-8 animate-pulse" style="border-radius:16px">
            <div class="flex items-center gap-4 mb-4">
              <div class="w-11 h-11 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:12px"></div>
              <div class="flex-1">
                <div class="h-4 w-28 bg-secondary/10 dark:bg-backgroundBody/10 mb-2" style="border-radius:6px"></div>
                <div class="h-3 w-24 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:6px"></div>
              </div>
            </div>
            <div class="h-3 w-full bg-secondary/10 dark:bg-backgroundBody/10 mb-2" style="border-radius:6px"></div>
            <div class="h-3 w-2/3 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:6px"></div>
          </div>
          <div class="border dark:border-dark p-6 md:p-8 animate-pulse" style="border-radius:16px">
            <div class="flex items-center gap-4 mb-4">
              <div class="w-11 h-11 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:12px"></div>
              <div class="flex-1">
                <div class="h-4 w-36 bg-secondary/10 dark:bg-backgroundBody/10 mb-2" style="border-radius:6px"></div>
                <div class="h-3 w-16 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:6px"></div>
              </div>
            </div>
            <div class="h-3 w-full bg-secondary/10 dark:bg-backgroundBody/10 mb-2" style="border-radius:6px"></div>
            <div class="h-3 w-1/2 bg-secondary/10 dark:bg-backgroundBody/10" style="border-radius:6px"></div>
          </div>
        </div>
      </div>

      <!-- Empty State -->
      <div id="reviews-empty" class="hidden text-center py-20">
        <div class="w-16 h-16 mx-auto mb-6 bg-primary/10 flex items-center justify-center">
          <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
          </svg>
        </div>
        <h4 class="text-xl font-medium mb-2">No reviews yet</h4>
        <p class="text-secondary/50 dark:text-backgroundBody/50">Be the first to share your experience with Uxory.</p>
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

<!-- reCAPTCHA (loaded on-demand) -->
<script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>

<!-- Reviews App -->
<script src="/js/reviews.js?v=<?= time() ?>"></script>

</body>

</html>
