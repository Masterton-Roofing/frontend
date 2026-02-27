//* Copyright (c) 2026 Masterton Roofing Ltd.
// All rights reserved.
// */
import navbarHTML from './navbar.html?raw';
fetch('navbar.html').then(response => response.text()).then(html => {
    document.getElementById('navbar').innerHTML = html;
});

const currentPath = window.location.pathname;
document.querySelectorAll('.nav-link').forEach(link => {
    if (link.getAttribute('href') === currentPath) {
        link.classList.remove('text-gray-300');
        link.classList.add('bg-gray-950/50', 'text-white');
        link.setAttribute('aria-current', 'page');
    }
});