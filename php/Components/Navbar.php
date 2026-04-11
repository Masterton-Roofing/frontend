<?php
function renderNavbar() {
    ?>
    <nav class="fixed top-0 left-0 right-0 z-50 bg-slate-900 text-white shadow-xl">
      <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-20">

    <!-- Logo -->
    <a href="/" class="flex items-center" id="logo-link">
      <img src="/public/img/logo.png" alt="Masterton Roofing" class="h-12 md:h-16 w-auto" />
    </a>

    <!-- Desktop Navigation -->
    <div class="hidden lg:flex items-center space-x-8">
      <!-- Solutions Dropdown -->
      <div class="relative group">
        <a href="/solutions" class="flex items-center text-gray-300 hover:text-white font-bold transition">
          Solutions
          <svg class="ml-1 h-3 w-3 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
        </a>

        <!-- Main dropdown -->
        <div class="absolute right-0 mt-0 pt-3 w-80 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200">
          <div class="bg-slate-800 rounded-lg shadow-2xl border border-slate-700 overflow-hidden">
            <div class="py-2">
              <span class="block px-4 py-1 text-xs font-bold uppercase tracking-wider text-slate-500">
                Main Solutions
              </span>
              <a href="/solutions/pvc" class="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                PVC Membrane
              </a>
              <a href="/solutions/vcl" class="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                Vapour Control Layer (VCL)
              </a>
              <a href="/solutions/drone" class="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                Drone Surveys
              </a>
            </div>

            <div class="border-t border-slate-700 py-2">
              <span class="block px-4 py-1 text-xs font-bold uppercase tracking-wider text-slate-500">
                More Services
              </span>
              <div class="relative group/services">
                <div class="flex justify-between items-center px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white cursor-pointer transition">
                  Additional Services
                  <svg class="ml-1 h-3 w-3 fill-current rotate-270" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                </div>
                <div class="absolute top-0 left-full ml-1 w-64 opacity-0 invisible group-hover/services:visible group-hover/services:opacity-100 transition-all duration-200">
                  <div class="bg-slate-800 rounded-lg shadow-2xl border border-slate-700 overflow-hidden">
                    <a href="/solutions/vcl" class="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                      Leak Detection
                    </a>
                    <a href="/solutions/drone" class="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                      Roof Surveys
                    </a>
                    <a href="/solutions" class="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                      Add-ons
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <a href="/projects" class="text-gray-300 hover:text-white font-bold transition">Projects</a>
      <a href="/blog" class="text-gray-300 hover:text-white font-bold transition">Blog</a>
      <a href="/contact" class="text-gray-300 hover:text-white font-bold transition">Contact</a>
      <a href="/about" class="text-gray-300 hover:text-white font-bold transition">About</a>
    </div>

    <!-- Mobile Menu Button -->
    <div class="lg:hidden flex items-center">
      <button
        id="mobile-menu-button"
        class="text-gray-300 hover:text-white p-2 transition"
        aria-label="Toggle Menu"
      >
        <svg id="menu-icon-bars" class="h-6 w-6 fill-current" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
        <svg id="menu-icon-times" class="hidden h-6 w-6 fill-current" viewBox="0 0 24 24"><path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
      </button>
    </div>
  </div>
</div>

<!-- Mobile Menu Overlay -->
<div
  id="mobile-menu"
  class="lg:hidden fixed inset-0 z-40 bg-slate-900 translate-x-full transition-transform duration-300 ease-in-out"
  style="top: 80px"
>
  <div class="flex flex-col p-6 space-y-4 h-full overflow-y-auto">
    <!-- Solutions Mobile Accordion -->
    <div>
      <button id="mobile-solutions-button" class="flex justify-between items-center w-full text-xl font-bold text-gray-300 hover:text-white">
        Solutions
        <svg id="mobile-solutions-icon" class="h-4 w-4 fill-current transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
      </button>
      <div id="mobile-solutions-menu" class="mt-2 ml-4 space-y-2 max-h-0 opacity-0 overflow-hidden transition-all duration-300">
        <a href="/solutions" class="block py-2 text-gray-400 hover:text-white">All Solutions</a>
        <a href="/solutions/pvc" class="block py-2 text-gray-400 hover:text-white">PVC Membrane</a>
        <a href="/solutions/vcl" class="block py-2 text-gray-400 hover:text-white">Vapour Control Layer (VCL)</a>
        <a href="/solutions/drone" class="block py-2 text-gray-400 hover:text-white">Drone Surveys</a>
        
        <div class="pt-2 border-t border-slate-800">
          <button id="mobile-additional-button" class="flex justify-between items-center w-full py-2 text-gray-300 hover:text-white font-semibold">
            Additional Services
            <svg id="mobile-additional-icon" class="h-4 w-4 fill-current transition-transform duration-200" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
          </button>
          <div id="mobile-additional-menu" class="mt-1 ml-4 space-y-2 max-h-0 opacity-0 overflow-hidden transition-all duration-300">
            <a href="/solutions/vcl" class="block py-2 text-gray-400 hover:text-white">Leak Detection</a>
            <a href="/solutions/drone" class="block py-2 text-gray-400 hover:text-white">Roof Surveys</a>
            <a href="/solutions" class="block py-2 text-gray-400 hover:text-white">Add-ons</a>
          </div>
        </div>
      </div>
    </div>

    <a href="/projects" class="text-xl font-bold text-gray-300 hover:text-white">Projects</a>
    <a href="/blog" class="text-xl font-bold text-gray-300 hover:text-white">Blog</a>
    <a href="/contact" class="text-xl font-bold text-gray-300 hover:text-white">Contact</a>
    <a href="/about" class="text-xl font-bold text-gray-300 hover:text-white">About</a>
  </div>
</div>
</nav>

<script>
const btn = document.getElementById('mobile-menu-button');
const menu = document.getElementById('mobile-menu');
const logoLink = document.getElementById('logo-link');
const barsIcon = document.getElementById('menu-icon-bars');
const timesIcon = document.getElementById('menu-icon-times');

const solutionsBtn = document.getElementById('mobile-solutions-button');
const solutionsMenu = document.getElementById('mobile-solutions-menu');
const solutionsIcon = document.getElementById('mobile-solutions-icon');

const additionalBtn = document.getElementById('mobile-additional-button');
const additionalMenu = document.getElementById('mobile-additional-menu');
const additionalIcon = document.getElementById('mobile-additional-icon');

if (btn && menu) {
  btn.addEventListener('click', () => {
    const isOpen = menu.classList.contains('translate-x-0');
    if (isOpen) {
      menu.classList.add('translate-x-full');
      menu.classList.remove('translate-x-0');
      barsIcon.classList.remove('hidden');
      timesIcon.classList.add('hidden');
    } else {
      menu.classList.remove('translate-x-full');
      menu.classList.add('translate-x-0');
      barsIcon.classList.add('hidden');
      timesIcon.classList.remove('hidden');
    }
  });
}

if (solutionsBtn && solutionsMenu) {
  solutionsBtn.addEventListener('click', () => {
    const isOpen = solutionsMenu.classList.contains('opacity-100');
    if (isOpen) {
      solutionsMenu.classList.remove('max-h-96', 'opacity-100');
      solutionsMenu.classList.add('max-h-0', 'opacity-0');
      solutionsIcon.classList.remove('rotate-180');
    } else {
      solutionsMenu.classList.add('max-h-96', 'opacity-100');
      solutionsMenu.classList.remove('max-h-0', 'opacity-0');
      solutionsIcon.classList.add('rotate-180');
    }
  });
}

if (additionalBtn && additionalMenu) {
  additionalBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isOpen = additionalMenu.classList.contains('opacity-100');
    if (isOpen) {
      additionalMenu.classList.remove('max-h-40', 'opacity-100');
      additionalMenu.classList.add('max-h-0', 'opacity-0');
      additionalIcon.classList.remove('rotate-180');
    } else {
      additionalMenu.classList.add('max-h-40', 'opacity-100');
      additionalMenu.classList.remove('max-h-0', 'opacity-0');
      additionalIcon.classList.add('rotate-180');
    }
  });
}

if (logoLink && menu) {
  logoLink.addEventListener('click', () => {
    menu.classList.add('translate-x-full');
    menu.classList.remove('translate-x-0');
    barsIcon.classList.remove('hidden');
    timesIcon.classList.add('hidden');
  });
}
</script>
    <?php
}
