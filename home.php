<?php
require_once __DIR__ . '/php/Layout/Main.php';
require_once __DIR__ . '/php/Components/ServicesPreview.php';

renderHeader("Welcome to Masterton Roofing");
?>

<!-- Hero section -->
<section class="hero h-[80vh] md:h-screen bg-cover bg-center" style="background-image: url('/public/img/hero.jpg');">
    <div class="flex items-center justify-center h-full bg-black/30 px-4">
        <h1 class="header text-4xl md:text-5xl lg:text-6xl text-center text-white font-bold">Welcome to Masterton Roofing</h1>
    </div>
</section>

<!-- About -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-8">
        <div class="w-full md:w-1/2 text-center md:text-left">
            <h2 class="text-3xl font-bold mb-4">About Us</h2>
            <p class="text-gray-700 mb-6">
                Welcome to Masterton Roofing Limited! With 30+ years of experience in roofing the industry, our team is dedicated to delivering top-quality roofing solutions that stand the test of time.
                We take pride in our workmanship, attention to detail, and commitment to customer satisfaction. From the initial consultation to the final inspection, we ensure every project is completed efficiently, safely, and to the maximum standards.
                Trust us to provide you with a roof that not only looks great but also offers lasting protection for your home or business.
            </p>
        </div>
        <div class="w-full md:w-1/2">
            <img src="/public/img/vcl.jpg" alt="About us" class="rounded-lg shadow-lg w-full" />
        </div>
    </div>
</section>

<!-- Our Services Section -->
<?php renderServicesPreview(); ?>

<?php
renderPageFooter();
?>
