<?php
// home.php
include_once "../components/ServicesPreview.php";
?>

    <section class="hero h-[80vh] md:h-screen bg-cover bg-center" style="background-image: url('https://placehold.co/600x400');">
        <div class="flex items-center justify-center h-full bg-black/30 px-4">
            <h1 class="header text-4xl md:text-5xl lg:text-6xl text-center text-white font-bold">
                Welcome to Masterton Roofing
            </h1>
        </div>
    </section>

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
                <img src="https://www.mastertonroofing.com/img/work/unnamed.jpg" alt="About us" class="rounded-lg shadow-lg w-full" />
            </div>
        </div>
    </section>

<?php
// Render services preview
if (function_exists('servicesPreview')) {
    servicesPreview(); // or include the HTML version
}
?>