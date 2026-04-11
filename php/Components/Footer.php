<?php
function renderFooter() {
    ?>
    <div class="relative mt-16 bg-[#01597c]">
      <svg
        class="absolute top-0 w-full h-6 -mt-5 sm:-mt-10 sm:h-16 text-[#01597c]"
        preserveAspectRatio="none"
        viewBox="0 0 1440 54"
      >
        <path
          fill="currentColor"
          d="M0 22L120 16.7C240 11 480 1.00001 720 0.700012C960 1.00001 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z"
        ></path>
      </svg>
      <div class="px-4 pt-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        <div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6 text-white">
          <div class="md:max-w-md lg:col-span-2">
            <a
              href="/"
              aria-label="Go home"
              title="Company"
              class="inline-flex items-center"
            >
              <img
                src="/public/img/templogo.png"
                alt="Masterton Roofing"
                class="h-8 w-auto"
              />
              <span class="ml-2 text-xl font-bold tracking-wide text-gray-100 uppercase">
                Masterton Roofing
              </span>
            </a>
            <div class="mt-4 lg:max-w-sm">
              <p class="text-sm text-gray-300">
                Quality roofing solutions for your home and business.
              </p>
              <p class="mt-4 text-sm text-gray-300">
                Contact us today for a free quote.
              </p>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 md:grid-cols-4">
            <div>
              <p class="font-semibold tracking-wide text-[#f2e599]">
                Services
              </p>
              <ul class="mt-2 space-y-2">
                <li><a href="/solutions" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Residential</a></li>
                <li><a href="/solutions" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Commercial</a></li>
                <li><a href="/solutions" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Repairs</a></li>
                <li><a href="/solutions" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Maintenance</a></li>
              </ul>
            </div>
            <div>
              <p class="font-semibold tracking-wide text-[#f2e599]">
                Company
              </p>
              <ul class="mt-2 space-y-2">
                <li><a href="/about" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">About Us</a></li>
                <li><a href="/about" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Team</a></li>
                <li><a href="/about" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Careers</a></li>
                <li><a href="/about" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Safety</a></li>
              </ul>
            </div>
            <div>
              <p class="font-semibold tracking-wide text-[#f2e599]">
                Projects
              </p>
              <ul class="mt-2 space-y-2">
                <li><a href="/projects" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Recent Work</a></li>
                <li><a href="/projects" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Case Studies</a></li>
                <li><a href="/projects" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Testimonials</a></li>
              </ul>
            </div>
            <div>
              <p class="font-semibold tracking-wide text-[#f2e599]">Legal</p>
              <ul class="mt-2 space-y-2">
                <li><a href="/" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Terms of Service</a></li>
                <li><a href="/" class="transition-colors duration-300 text-gray-300 hover:text-[#f2e599]">Privacy Policy</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="flex flex-col justify-between pt-5 pb-10 border-t border-slate-700 sm:flex-row">
          <p class="text-sm text-gray-100">
            © Copyright 2026 Masterton Roofing Ltd. All rights reserved. Website
            written by Ben House. Powered by <a class="hover:text-[#f2e599]" href="https://php.net">PHP</a>
          </p>
          <div class="flex items-center mt-4 space-x-4 sm:mt-0">
            <!-- Social icons (simplified) -->
            <a href="https://www.facebook.com/leeamasterton" class="text-gray-300 hover:text-teal-400">Facebook</a>
             <a href="https://uk.linkedin.com/in/lee-masterton-43513811b" class="text-gray-300 hover:text-teal-400">LinkedIn</a>
          </div>
        </div>
      </div>
    </div>
    <?php
}
