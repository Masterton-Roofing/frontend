<?php
require_once __DIR__ . '/../php/Layout/Main.php';

renderHeader("Drone Surveys - Masterton Roofing");
?>

<!-- Hero Section -->
<section
    class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
    style="background-image: url('https://placehold.co/600x400')"
>
    <div class="flex items-center justify-center h-full bg-black/40 px-4">
        <!-- Added a dark overlay to make text readable -->
        <h1 class="text-white text-4xl md:text-5xl font-bold text-center">
            Drone Footage - Solutions
        </h1>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-8">
        <div class="w-full md:w-1/2">
            <h2 class="text-3xl font-bold mb-4 text-gray-900">Drone</h2>
            <p class="text-gray-700 mb-6">
                ARCHIE MATE I TOLD YOU THAT YOU COULDN'T FLY IT MATE
            </p>
        </div>
    </div>
</section>

<?php
renderPageFooter();
?>
