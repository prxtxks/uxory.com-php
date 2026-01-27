<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Schedule a Meeting | Uxory - Book Your Free Consultation</title>
  <meta name="description" content="Let’s talk! Schedule a free consultation with Uxory to discuss your digital needs — websites, branding, SEO, and more." />

  <meta charset="utf-8" />

  <!-- Responsive Meta -->
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
  <link rel="canonical" href="https://uxory.com/calendly.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Schedule a Meeting | Uxory - Book a Free Consultation" />
  <meta property="og:description" content="Book your free consultation with Uxory. Let's discuss how we can help you build a better digital presence." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/calendly.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Schedule a Meeting | Uxory" />
  <meta name="twitter:description" content="Book a free strategy session with Uxory to discuss your next big project." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Uxory",
    "url": "https://uxory.com",
    "logo": "https://uxory.com/images/logo.png",
    "description": "Design-Driven Digital Solutions Agency building websites and brand experiences for forward-thinking businesses.",
    "sameAs": []
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
$currentPage = 'calendly';
$currentParent = 'contact';
include 'components/nav.php';
?>

<div
  class="menu-overflow fixed z-[9999] bg-[rgba(10,10,10,0.95)] bg-opacity-60 backdrop-blur-[25px] w-full h-full pointer-events-none"
></div>


<!-- Dark Mode toggle -->
<?php       
include 'components/dark_mode.php';
?>

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">

<!-- Calendly inline widget begin -->
<section class="pt-[120px]">
  <div class="calendly-inline-widget" data-url="https://calendly.com/uxory/30min" style="min-width:320px;height:700px;"></div>
</section>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<!-- Calendly inline widget begin -->

<!-- Calendly inline widget end -->
<!-- Calendly inline widget end -->


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