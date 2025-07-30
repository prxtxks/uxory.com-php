<!DOCTYPE html>
<html lang="zxx">

<head>
  <!-- Title -->
  <title>Insights & Resources | Uxory Blog</title>
  <meta name="description" content="Stay updated with Uxory's insights, resources, and expert tips on design, development, marketing, and digital innovation." />

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
  <link rel="canonical" href="https://uxory.com/blog-listings.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Insights & Resources | Uxory Blog" />
  <meta property="og:description" content="Stay updated with Uxory's insights, resources, and expert tips on design, development, marketing, and digital innovation." />
  <meta property="og:image" content="https://uxory.com/images/logo.png" />
  <meta property="og:url" content="https://uxory.com/blog-listings.php" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Insights & Resources | Uxory Blog" />
  <meta name="twitter:description" content="Stay updated with Uxory's insights, resources, and expert tips on design, development, marketing, and digital innovation." />
  <meta name="twitter:image" content="https://uxory.com/images/logo.png" />

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "Uxory Blog",
    "url": "https://uxory.com/blog-listings.php",
    "description": "Design, development, and marketing insights from Uxory Digital Solutions LLC.",
    "publisher": {
      "@type": "Organization",
      "name": "Uxory",
      "logo": {
        "@type": "ImageObject",
        "url": "https://uxory.com/images/logo.png"
      }
    }
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
$currentPage = 'blog';
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

<!-- DB connection Use 'uxory_pratikesh_2025' for hostinger or 'newpassword' for mac -->
<?php
$conn = new mysqli("localhost", "root", "uxory_pratikesh_2025", "uxory_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-- pagination -->
<?php
$limit = 9;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $limit;

$sql = "SELECT * FROM blogs ORDER BY created_at DESC LIMIT $start_from, $limit";
$result = $conn->query($sql);

$total_sql = "SELECT COUNT(*) FROM blogs";
$total_result = $conn->query($total_sql);
$total_rows = $total_result->fetch_row()[0];
$total_pages = ceil($total_rows / $limit);
?>

<main class="lg:mb-[600px] relative z-10 bg-backgroundBody dark:bg-dark">
<!--=====================================
   Page Header v3
======================================-->
<section class="pt-36 lg:pt-[240px] pb-10 lg:pb-20 relative overflow-hidden">
  <!-- Gradient Background Wrapper -->
  <div
    id="hero-gradient-wrapper"
    class="absolute w-full md:w-[40%] h-full md:h-[40%] max-md:top-1/2 max-lg:-translate-y-1/2 lg:top-0 -z-10 blur-[60px] scale-90"
  >
    <img
      src="images/hero-gradient-background.png"
      alt="hero-gradient-background"
      id="hero-gradient"
      class="absolute lg:left-[78%] xl:left-full max-md:top-20 md:top-[45%] lg:-translate-x-[78%]"
    />
  </div>

  <!-- Content Container -->
  <div class="container">
    <!-- Header Content Flex Container -->
    <div
      class="flex flex-col md:flex-row gap-x-10 gap-y-4 justify-center lg:justify-between mb-20"
    >
      <!-- Title Section -->
      <div class="max-sm:self-start">
        <h1
          class="text-appear text-[46px] lg:text-7xl xl:text-[80px] lg:leading-[1.11] font-normal"
        >
          <span class="font-instrument lg:text-[90px] italic"> Insights </span>
          <br class="hidden md:block" />
          we share
        </h1>
      </div>

      <!-- Description Section -->
      <div class="md:max-w-[470px] self-center md:self-end">
        <p class="text-appear">
          We champion athletes, storytellers, and brands that shape culture and
          inspire the world with their unique perspectives.
        </p>
      </div>
    </div>
  </div>
</section>

<!--=====================================
    Blog Posts Grid Section
======================================-->
<section class="pb-14 md:pb-16 lg:pb-[88px] xl:pb-[100px] bg-transparent">
  <div class="container">
    <div
      class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center items-center md:items-start gap-x-6 gap-y-[60px]"
    >
      
      <!-- <div class="max-w-[370px] reveal-me group">
        <figure class="overflow-hidden">
          <img
            src="images/blog-img/blogV2-img-1.png"
            alt="Web Design Trends"
            class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3"
          />
        </figure>
        <a href="blog-details.php">
          <div class="blog-title mt-[30px] mb-5">
            <h3
              class="text[25px] md:text-3xl lg:text-4xl lg:leading-[1.2] lg:tracking-[-0.72px]"
            >
              Web Design Trends That Will Dominate 2024
            </h3>
          </div>
        </a>

        <p class="mb-7 md:mb-10">
          Explore the cutting-edge design trends shaping the digital landscape,
          from AI-driven interfaces to immersive experiences.
        </p>
        <a href="blog-details.php" class="rv-button rv-button-primary2">
          <div class="rv-button-top !text-center flex items-center">
            <span class="pr-1">3 minute read</span>
            <img
              class="inline dark:hidden"
              src="images/icons/top-arrow.svg"
              alt="Arrow Icon"
            />
            <img
              class="hidden dark:inline"
              src="images/icons/top-arrow-dark.svg"
              alt="Arrow Icon"
            />
          </div>
          <div class="rv-button-bottom !text-center flex items-center">
            <span class="pr-1">3 minute read</span>
            <img
              class="inline"
              src="images/icons/top-arrow.svg"
              alt="Arrow Icon"
            />
          </div>
        </a>
      </div> -->

      <?php while($row = $result->fetch_assoc()): ?>
        <div class="max-w-[370px] reveal-me group">
          <figure class="overflow-hidden">
            <img src="<?= $row['image'] ?>" alt="<?= $row['title'] ?>" class="w-full h-full transition-all duration-500 group-hover:scale-125 group-hover:rotate-3" />
          </figure>
          <a href="blog-details.php?slug=<?= $row['slug'] ?>">
            <div class="blog-title mt-[30px] mb-5">
              <h3 class="text[25px] md:text-3xl lg:text-4xl lg:leading-[1.2] lg:tracking-[-0.72px]">
                <?= $row['title'] ?>
              </h3>
            </div>
          </a>
          <p class="mb-7 md:mb-10">
            <?= substr($row['content'], 0, 120) ?>...
          </p>
          <a href="<?= $row['link'] ?>" class="rv-button rv-button-primary2">
            <div class="rv-button-top flex items-center">
              <span class="pr-1">Read More</span>
            </div>
            <div class="rv-button-bottom flex items-center">
              <span class="pr-1">Read More</span>
            </div>
          </a>
        </div>
      <?php endwhile; ?>

     
    </div>

    <!--page no's -->
    <!-- <div class="mt-16 md:mt-24">
      <ul class="flex items-center justify-center gap-3">
        <li class="group">
          <a
            href="blog-details.php"
            class="flex w-10 md:w-14 h-10 md:h-14 items-center justify-center border dark:border-colorText hover:bg-primary duration-300 text-sm font-normal group"
          >
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="18"
                height="16"
                viewBox="0 0 18 16"
                fill="none"
                class="stroke-black dark:stroke-white"
              >
                <path
                  d="M17.25 8H0.75M0.75 8L7.5 1.25M0.75 8L7.5 14.75"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </a>
        </li>
        <li class="group">
          <a
            href="blog-details.php"
            class="flex w-10 md:w-14 h-10 md:h-14 items-center text-sm justify-center hover:bg-primary duration-300 hover:text-secondary/70 group-[.page-active]::bg-primary"
          >
            1
          </a>
        </li>
        <li class="group">
          <a
            href="blog-details.php"
            class="flex w-10 md:w-14 h-10 md:h-14 items-center text-sm justify-center hover:bg-primary duration-300 hover:text-secondary/70 group-[.page-active]::bg-primary"
          >
            2
          </a>
        </li>
        <li class="group page-active">
          <a
            href="blog-details.php"
            class="flex w-10 md:w-14 h-10 md:h-14 items-center justify-center hover:bg-primary duration-300 group-[.page-active]:bg-primary"
          >
            3
          </a>
        </li>

        <li class="group max-md:hidden">
          <a
            href="blog-details.php"
            class="flex w-10 md:w-14 h-10 md:h-14 items-center text-sm font-medium justify-center hover:bg-primary duration-300 hover:text-secondary/70 group-[.page-active]::bg-primary"
          >
            4
          </a>
        </li>
        <li class="group max-md:hidden">
          <a
            href="blog-details.php"
            class="flex w-10 md:w-14 h-10 md:h-14 items-center text-sm font-medium justify-center hover:bg-primary duration-300 hover:text-secondary/70 group-[.page-active]::bg-primary"
          >
            5
          </a>
        </li>
        <li class="group">
          <a
            href="blog-details.php"
            class="flex w-10 md:w-14 h-10 md:h-14 items-center justify-center border dark:border-colorText hover:bg-primary duration-300 text-sm font-normal group"
          >
            <span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="stroke-black dark:stroke-white"
                width="18"
                height="16"
                viewBox="0 0 18 16"
                fill="none"
              >
                <path
                  d="M0.75 8H17.25M17.25 8L10.5 1.25M17.25 8L10.5 14.75"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </span>
          </a>
        </li>
      </ul>
    </div> -->
    
    <div class="mt-16 md:mt-24">
      <ul class="flex items-center justify-center gap-3">
        <?php if ($page > 1): ?>
          <li><a href="?page=<?= $page - 1 ?>" class="pagination-button">←</a></li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <li class="<?= $i == $page ? 'page-active' : '' ?>">
            <a href="?page=<?= $i ?>" class="pagination-button"><?= $i ?></a>
          </li>
        <?php endfor; ?>

        <?php if ($page < $total_pages): ?>
          <li><a href="?page=<?= $page + 1 ?>" class="pagination-button">→</a></li>
        <?php endif; ?>
      </ul>
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

</main>

<!--=====================================
   Footer Section
======================================-->
<?php       
include 'components/footer.php';
?>

<!---Modal -->
<div
  aria-hidden="false"
  class="fixed z-[99999999990] hidden inset-0 top-6 items-start justify-center bg-metal-900 bg-dark-200/25"
  onclick="javascript.void(0)"
  id="modal"
  role="dialog"
>
  <div class="relative w-full p-4 h-auto animate-keep-bounce max-w-xl">
    <div class="relative bg-white dark:bg-dark p-2.5">
      <div class="p-10 max-lg:p-5">
        <div class="flex items-center justify-between pb-5">
          <h5 class="text-secondary dark:text-backgroundBody">Search</h5>
          <button class="text-secondary dark:text-backgroundBody" id="ok-btn">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              x="0px"
              y="0px"
              width="30"
              height="30"
              viewBox="0 0 50 50"
            >
              <path
                d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"
                class="fill-secondary dark:fill-backgroundBody"
              ></path>
            </svg>
          </button>
        </div>
        <form class="mt-5">
          <div>
            <div class="flex">
              <div class="relative w-full">
                <input
                  class="block w-full focus:outline-none focus:ring-0 text-secondary dark:text-backgroundBody border py-3.5 px-5 dark:border-dark bg-transparent placeholder:text-secondary/50 dark:placeholder:text-backgroundBody/50 outline-none focus:border-primary dark:focus:border-primary duration-300 transition-all"
                  id="#id-10"
                  placeholder="Search Uxory Component"
                  type="text"
                  value=""
                />
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

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