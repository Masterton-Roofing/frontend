<?php
require_once __DIR__ . '/../php/Layout/Main.php';
require_once __DIR__ . '/../php/Components/SolutionArticle.php';

renderHeader("Vapour Control Layer (VCL) - Masterton Roofing");
?>

<!-- Hero Section -->
<section
    class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
    style="background-image: url('/public/img/vcl.jpg')"
>
    <div class="flex items-center justify-center h-full bg-black/40 px-4">
        <h1 class="text-white text-4xl md:text-5xl font-bold text-center">
            Vapor Control Layer - Solutions
        </h1>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold mb-8 text-gray-900 text-center md:text-left">
            Our VCL Solutions
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <?php
            renderSolutionArticle([
                'title' => "Vapour Control Layer (VCL)",
                'blurb' => "The Vapor Control Layer (VCL) is essential for protecting the integrity of your building's insulation and structure by managing moisture movement.",
                'about' => "We provide high-performance VCL installations tailored to your specific roofing system. A correctly installed VCL prevents warm, moist air from the building's interior from reaching the cold side of the insulation, where it could condense and cause structural damage or reduce thermal efficiency.",
                'specs' => "Material: Reinforced Polyethylene / Bituminous\nThickness: 0.2mm - 4.0mm\nInstallation: Loose laid or fully bonded\nCompatibility: All flat roofing systems",
                'images' => ["/public/img/vcl.jpg"]
            ]);
            ?>
        </div>

    </div>
</section>

<?php
renderPageFooter();
?>
