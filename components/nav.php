<!-- Navigation  -->

<nav
  data-lenis-prevent="true"
  class="menu fixed right-6 top-0 w-full min-h-screen overflow-y-auto z-[99999] before:content-none md:before:content-[''] before:absolute before:w-[1px] before:h-[calc(100vh-94px)] before:left-[45%] before:top-0 before:bg-backgroundBody before:bg-opacity-10 opacity-0"
>

<!-- Cross Icon  -->
  <div
    class="menu-close cursor-pointer sticky top-8 mt-8 left-[89%] sm:left-[90%] md:left-[93%] lg:left-[94.7%] xl:left-[96.5%] 2xl:left-[96%] h-[40px] w-[40px] text-white"
  >
    <svg
      xmlns="https://www.w3.org/2000/svg"
      x="0px"
      y="0px"
      width="30"
      height="30"
      viewBox="0 0 50 50"
    >
      <path
        d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"
        fill="#fff"
      ></path>
    </svg>
  </div>

  <!-- menu list  -->
  <div
    class="menu-wrapper relative max-w-[300px] sm:max-w-[400px] md:max-w-[600px] lg:max-w-[900px] xl:max-w-[1130px] mx-auto pb-4 flex flex-col gap-8 md:gap-16 md:top-20 z-[99999]"
  >
    <ul class="menu-list">

      <li class="menu-list-item menu-list-item-anchor <?= ($currentParent ?? '') === 'home' ? 'active' : '' ?>">
        <a
          href="#"
          class="text-white text-[28px] md:text-[42px] xl:text-[56px] leading-[70px] xl:leading-[90px] menu-list-item-text"
          >Home</a
        >
        <ul
          class="menu-list-item-dropdown relative md:absolute top-0 w-full md:w-auto h-fit left-0 md:left-[48%]"
        >
          
          <li>
            <a
              href="/"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'index' ? 'active' : '' ?>"
              >Homepage
            </a>
          </li>

          <li>
            <a
              href="/available-soon.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'all_services' ? 'active' : '' ?>"
              >All Services
            </a>
          </li>

          <li>
            <a
              href="/coming-soon.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'shop' ? 'active' : '' ?>"
              >The Uxory Store
            </a>
          </li>

        </ul>
      </li>

      <li class="menu-list-item menu-list-item-anchor <?= ($currentParent ?? '') === 'about' ? 'active' : '' ?>">
        <a
          href="#"
          class="text-white text-[28px] md:text-[42px] xl:text-[56px] leading-[70px] xl:leading-[90px] menu-list-item-text"
          >About</a
        >
        <ul
          class="menu-list-item-dropdown relative md:absolute top-0 w-full md:w-auto h-fit left-0 md:left-[48%]"
        >

          <li>
            <a
              href="/coming-soon.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'about' ? 'active' : '' ?>"
              >About Us</a
            >
          </li>

          <li>
            <a
              href="/blog-listings.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'blog' ? 'active' : '' ?>"
              >Blogs & Insights
            </a>
          </li>
          
          <li>
            <a
              href="/coming-soon.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'faqs' ? 'active' : '' ?>"
              >FAQs
            </a>
          </li>

          <li>
            <a
              href="/team.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'team' ? 'active' : '' ?>"
              >Our Team
            </a>
          </li>

          <li>
            <a
              href="/career.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'career' ? 'active' : '' ?>"
              >Career
            </a>
          </li>

          <li>
            <a
              href="/privacy-policy.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'privacy_policy' ? 'active' : '' ?>"
              >Privacy Policy
            </a>
          </li>

        </ul>
      </li>

      <li class="menu-list-item menu-list-item-anchor <?= ($currentParent ?? '') === 'services' ? 'active' : '' ?>">
        <a
          href="#"
          class="text-white text-[28px] md:text-[42px] xl:text-[56px] leading-[70px] xl:leading-[90px] menu-list-item-text"
          >Services</a
        >
        <ul
          class="menu-list-item-dropdown relative md:absolute top-0 w-full md:w-auto h-fit left-0 md:left-[48%]"
        >
          

          <li>
            <a
              href="/available-soon.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'empty' ? 'active' : '' ?>"
              >AI Systems & Agents
            </a>
          </li>

          <li>
            <a
              href="/available-soon.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'empty' ? 'active' : '' ?>"
              >Business Process Automation
            </a>
          </li>

          <li>
            <a
              href="/available-soon.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'empty' ? 'active' : '' ?>"
              >AI-Powered SaaS Development
            </a>
          </li>

          <li>
            <a
              href="/website-dev.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'website_dev' ? 'active' : '' ?>"
              >High-Performance Websites
            </a>
          </li>

          <li>
            <a
              href="/web-and-app-solutions.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'web-app-solutions' ? 'active' : '' ?>"
              >Web & Mobile App Development
            </a>
          </li>

          <li>
            <a
              href="/ecommerce-solutions.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'ecommerce-solutions' ? 'active' : '' ?>"
              >E-commerce Solutions
            </a>
          </li>
          
        </ul>
      </li>  

      <li class="menu-list-item menu-list-item-anchor <?= ($currentParent ?? '') === 'pricing' ? 'active' : '' ?>">
        <a
          href="#"
          class="text-white text-[28px] md:text-[42px] xl:text-[56px] leading-[70px] xl:leading-[90px] menu-list-item-text"
          >Pricing</a
        >
        <ul
          class="menu-list-item-dropdown relative md:absolute top-0 w-full md:w-auto h-fit left-0 md:left-[48%]"
        >
          <li>
            <a
              href="/pricing.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'pricing' ? 'active' : '' ?>"
              >Explore Pricing
            </a>
          </li>
          <li>
            <a
              href="/smb-hosting.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'smb-hosting' ? 'active' : '' ?>"
              >SMB Hosting Plans
            </a>
          </li>
          
        </ul>
      </li>

      <li class="menu-list-item menu-list-item-anchor <?= ($currentParent ?? '') === 'contact' ? 'active' : '' ?>">
        <a
          href="#"
          class="text-white text-[28px] md:text-[42px] xl:text-[56px] leading-[70px] xl:leading-[90px] menu-list-item-text"
          >Contact</a
        >
        <ul
          class="menu-list-item-dropdown relative md:absolute top-0 w-full md:w-auto h-fit left-0 md:left-[48%]"
        >
          <li>
            <a
              href="/contact.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'contact' ? 'active' : '' ?>"
              >Contact Us
            </a>
          </li>

          <li>
            <a
              href="/calendly.php"
              class="text-white inline-block pb-1 pl-3 menu-list-item-dropdown-list text-base md:text-lg leading-8 md:leading-[50px] <?= ($currentPage ?? '') === 'calendly' ? 'active' : '' ?>"
              >Schedule a Meeting
            </a>
          </li>
          
        </ul>
       </li> 

    
    </ul>
    
  </div>

  <div
    class="menu-footer max-lg:hidden lg:block fixed bottom-0 w-full border-t border-white border-opacity-10"
  >
    <div
      class="menu-footer-content max-w-[300px] sm:max-w-[400px] md:max-w-[600px] lg:max-w-[900px] xl:max-w-[1130px] flex justify-between mx-auto py-8 flex-col md:flex-row"
    >
      <p class="text-sm text-white w-full md:w-auto mb-4 md:mb-0">
        <a href="mailto:contact@uxory.com" class="text-white hover:text-primary transition-colors duration-300">
          contact@uxory.com
        </a>
      </p>

    </div>
  </div>
  

</nav>