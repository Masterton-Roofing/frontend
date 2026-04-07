<?php
require_once __DIR__ . '/php/Layout/Main.php';
require_once __DIR__ . '/php/Components/ServicesPreview.php';

renderHeader("Our Solutions - Masterton Roofing");
?>

<section
    class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
    style="background-image: url('https://placehold.co/600x400')"
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <a href="/solutions/pvc">
                <button
                    type="button"
                    class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                >
                    PVC Roofing
                </button>
            </a>
        </div>

    </div>
</section>

<?php
renderPageFooter();
?>
