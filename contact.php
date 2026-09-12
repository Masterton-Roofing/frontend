<?php
require_once __DIR__ . '/php/Layout/Main.php';

renderHeader("Contact Us - Masterton Roofing");
?><head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CXBWH0G43P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-CXBWH0G43P');
    </script>

</head>

<section class="hero h-[80vh] md:h-screen bg-cover bg-center" style="background-image: url('/public/img/gallery/grosvenor main.jpg')">
    <div class="flex items-center justify-center h-full bg-black/30 px-4">
        <h1 class="header text-4xl md:text-5xl lg:text-6xl text-center text-white font-bold">Contact Us</h1>
    </div>
</section>
<section class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-12">
            <h2 class="text-4xl font-extrabold text-slate-900 mb-4">Get in Touch</h2>
        </div>
        <div class="text-center">
           <div>
			   <span class="text-center text-3xl"><b>lee</b></span>
			</div>
        </div>
    </div>
</section>

<script>
    // PostHog integration removed: form submits normally to Formspree
</script>

<?php
renderPageFooter();
?>
