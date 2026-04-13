<?php
require_once __DIR__ . '/php/Layout/Main.php';

renderHeader("About Us - Masterton Roofing");
?>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CXBWH0G43P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-CXBWH0G43P');
    </script>

</head>

<section class="hero h-[60vh] md:h-[70vh] bg-cover bg-center flex items-center" style="background-image: url('/img/work/unnamed.jpg');">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full text-center">
        <div class="bg-black/40 p-12 rounded-3xl backdrop-blur-sm inline-block">
            <h1 class="text-5xl md:text-7xl text-white font-extrabold mb-4">About Us</h1>
            <p class="text-2xl text-gray-100 font-medium">Over 3 decades of roofing excellence.</p>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16 mb-24">
            <div class="w-full lg:w-1/2">
                <h2 class="text-4xl font-bold text-gray-900 mb-8 flex items-center">
                    <span class="w-12 h-1 bg-teal-500 mr-4"></span>
                    Our Story
                </h2>
                <div class="space-y-6 text-lg text-gray-600 leading-relaxed">
                    <p>Masterton Roofing Limited has been a cornerstone of the roofing industry for over 30 years. Founded on the principles of quality, integrity, and exceptional service, we have grown from a small local team to a trusted name in high-performance roofing solutions.</p>
                    <p>Our journey has been defined by our commitment to staying at the forefront of roofing technology. From traditional techniques to modern PVC membranes and drone surveys, we continuously evolve to provide our clients with the best possible protection for their homes and businesses.</p>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 text-center shadow-sm">
                        <span class="block text-5xl font-bold text-teal-600 mb-2">30+</span>
                        <span class="text-gray-500 font-bold uppercase tracking-widest text-xs">Years of Service</span>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 text-center shadow-sm">
                        <span class="block text-5xl font-bold text-teal-600 mb-2">1k+</span>
                        <span class="text-gray-500 font-bold uppercase tracking-widest text-xs">Projects Done</span>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 text-center shadow-sm">
                        <span class="block text-5xl font-bold text-teal-600 mb-2">100%</span>
                        <span class="text-gray-500 font-bold uppercase tracking-widest text-xs">Quality Guaranteed</span>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-2xl border border-gray-100 text-center shadow-sm">
                        <span class="block text-5xl font-bold text-teal-600 mb-2">24/7</span>
                        <span class="text-gray-500 font-bold uppercase tracking-widest text-xs">Expert Support</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-slate-900 rounded-[3rem] p-12 md:p-20 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500/10 rounded-full -mr-32 -mt-32 blur-3xl"></div>
            <div class="relative z-10 max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-5xl font-bold mb-10">Our Commitment</h2>
                <p class="text-xl text-gray-300 leading-relaxed mb-12">
                    "We don't just build roofs; we build peace of mind. Every project we undertake is executed with the same level of care and precision as if it were our own. Our legacy is built on the satisfaction of our clients and the durability of our work."
                </p>
                <div class="flex items-center justify-center space-x-4">
                    <div class="w-16 h-16 bg-teal-500 rounded-full flex items-center justify-center font-bold text-2xl shadow-xl">M</div>
                    <div class="text-left">
                        <p class="font-bold text-xl">The Masterton Team</p>
                        <p class="text-teal-400">Roofing Excellence Since 1990</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
renderPageFooter();
?>
