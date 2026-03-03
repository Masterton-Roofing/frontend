//* Copyright (c) 2026 Masterton Roofing Ltd.
// All rights reserved.
// */

fetch('/components/footer.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById("footer").innerHTML = data;
    });