//* Copyright (c) 2026 Masterton Roofing Ltd.
// All rights reserved.
// */
fetch('navbar.html').then(response => response.text()).then(html => {
    document.getElementById('navbar').innerHTML = html;
});