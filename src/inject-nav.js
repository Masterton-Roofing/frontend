//* Copyright (c) 2026 Masterton Roofing Ltd.
// All rights reserved.
// */

import navbarHTML from './components/navbar.html?raw';

document.getElementById('navbar').innerHTML = navbarHTML;

const currentPath = window.location.pathname;
document.querySelectorAll('#navbar a').forEach(link => {
    if (link.getAttribute('href') === currentPath) {
        link.classList.add('bg-gray-950/50', 'text-white');
        link.setAttribute('aria-current', 'page');
    }
});