<?php
require_once __DIR__ . '/../php/Layout/Main.php';

renderHeader("Vapour Control Layer (VCL) - Masterton Roofing");
?>

<!-- Hero Section -->
<section
    class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
    style="background-image: url('/img/vcl.jpg')"
>
    <div class="flex items-center justify-center h-full bg-black/40 px-4">
        <!-- Added a dark overlay to make text readable -->
        <h1 class="text-white text-4xl md:text-5xl font-bold text-center">
            Vapor Control Layer - Solutions
        </h1>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-8">
        <div class="w-full md:w-1/2">
            <h2 class="text-3xl font-bold mb-4 text-gray-900">
                Our VCL Solutions
            </h2>
            <p class="text-gray-700 mb-6">
                The Vapor Control Layer (VCL) is essential for protecting the
                integrity of your building's insulation and structure by managing
                moisture movement. We provide high-performance VCL installations
                tailored to your specific roofing system.
            </p>
        </div>
    </div>
</section>

<?php
renderPageFooter();
?>
