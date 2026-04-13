<?php
require_once __DIR__ . '/php/Layout/Main.php';
require_once __DIR__ . '/php/Components/ServicesPreview.php';

renderHeader("Our Solutions - Masterton Roofing");
?>

<section
    class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
    style="background-image: url('/public/img/gallery/weybridge terrace.jpg')"
>
    <div class="flex items-center justify-center h-full bg-black/40 px-4">
        <h1 class="text-white text-4xl md:text-5xl font-bold text-center">
            Solutions Hub
        </h1>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold mb-8 text-gray-900 text-center md:text-left">
            Our Roofing Solutions
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="/solutions/pvc" class="block">
                <div class="bg-white hover:shadow-lg transition-shadow p-8 rounded-xl border border-gray-200 text-center">
                    <h3 class="text-xl font-bold mb-4">PVC Membrane</h3>
                    <p class="text-gray-600 mb-6">Extreme weather resistance and durability with 20-year warranty.</p>
                    <span class="text-blue-600 font-semibold">Learn More &rarr;</span>
                </div>
            </a>
            <a href="/solutions/vcl" class="block">
                <div class="bg-white hover:shadow-lg transition-shadow p-8 rounded-xl border border-gray-200 text-center">
                    <h3 class="text-xl font-bold mb-4">Vapour Control Layer</h3>
                    <p class="text-gray-600 mb-6">Essential moisture management for building insulation and structure.</p>
                    <span class="text-blue-600 font-semibold">Learn More &rarr;</span>
                </div>
            </a>
            <a href="/solutions/drone" class="block">
                <div class="bg-white hover:shadow-lg transition-shadow p-8 rounded-xl border border-gray-200 text-center">
                    <h3 class="text-xl font-bold mb-4">Drone Surveys</h3>
                    <p class="text-gray-600 mb-6">High-tech aerial inspections for precise roof assessment.</p>
                    <span class="text-blue-600 font-semibold">Learn More &rarr;</span>
                </div>
            </a>
        </div>

    </div>
</section>

<?php
renderPageFooter();
?>
