<?php
require_once __DIR__ . '/../php/Layout/Main.php';
require_once __DIR__ . '/../php/Components/SolutionArticle.php';

renderHeader("Drone Surveys - Masterton Roofing");
?>

<!-- Hero Section -->
<section
    class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
    style="background-image: url('https://placehold.co/600x400')"
>
    <div class="flex items-center justify-center h-full bg-black/40 px-4">
        <h1 class="text-white text-4xl md:text-5xl font-bold text-center">
            Drone Footage - Solutions
        </h1>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold mb-8 text-gray-900 text-center md:text-left">
            Drone Surveys
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <?php
            renderSolutionArticle([
                'title' => "Drone Surveys",
                'blurb' => "High-tech aerial inspections for precise roof assessment without the need for scaffolding.",
                'about' => "Our drone surveys provide a safe and cost-effective way to inspect roofs of any height or complexity. Using high-resolution cameras, we can identify leaks, structural damage, and debris without setting foot on the roof.",
                'specs' => "Resolution: 4K Video / 20MP Photos\nReach: Unlimited height\nSafety: CAA Registered Pilots\nDeliverables: Full report with high-res imagery",
                'images' => []
            ]);
            ?>
        </div>

    </div>
</section>

<?php
renderPageFooter();
?>
