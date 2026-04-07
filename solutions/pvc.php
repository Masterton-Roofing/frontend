<?php
require_once __DIR__ . '/../php/Layout/Main.php';
require_once __DIR__ . '/../php/Components/SolutionArticle.php';

renderHeader("PVC Membrane Solutions - Masterton Roofing");
?>

<!-- Hero Section -->
<section
    class="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
    style="background-image: url('https://placehold.co/600x400')"
>
    <div class="flex items-center justify-center h-full bg-black/40 px-4">
        <h1 class="text-white text-4xl md:text-5xl font-bold text-center">
            PVC Membrane - Solutions
        </h1>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-bold mb-8 text-gray-900 text-center md:text-left">
            Our PVC Roofing Solutions
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <?php
            renderSolutionArticle([
                'title' => "PVC Membrane",
                'blurb' => "Our main material used for the waterproofing is single ply PVC membrane, which we have chosen to use for all our roofs due to its extreme weather resistance and durability. It can either be mechanically fixed or glued down (see adhered membrane article). Using this material we gain a minimum product warranty of 20 years directly from the manufacturer ",
                'about' => "This PVC roofing membrane is designed to work on flat roofs of all shapes and sizes, making it suitable for both simple and more complex designs. It is made to last, with strong resistance to the elements like natural effects of UV damage and ageing over time. The material remains flexible, allowing for all building movements along with the building as temperatures change and the building structure settles, which helps prevent damage. Using mechanically fixed  systems, not only has a great tolerants with building movents  it also keeps the roof  secure with excellent resistance to strong winds and uplift forces.",
                'specs' => "Danosa DANOPOL 1.5 HS+ Available colours: Anthracite Roll Lengths (cm per roll): 2000 \n (cm per roll):1500 Roll Widths (cm per roll): 108\n(cm per roll):1800 Fire Regulation: Broof(T4)",
                'images' => ["/img/hs.png"]
            ]);

            renderSolutionArticle([
                'title' => "PVC Membrane - Adhered",
                'blurb' => "Adhered Membrane is very similar to mechanically fixed membrane except it's adhered to either substrate or onto tissue insulation board. The membrane still has the same flexibility, durability and 20-year product warranty, as the other main membrane.",
                'about' => " This PVC roofing membrane is designed to work on flat roofs of all shapes and sizes, making it suitable for both simple and more complex designs. It is made to last, with strong resistance to the elements like natural effects of UV damage and ageing over time. The material remains flexible, allowing for all building movements along with the building as temperatures change and the building structure settles, which helps prevent damage. When using adhered roofing systems, it is glued down to the roof deck using an adhesive.",
                'specs' => "Danosa DANOPOL+ HSF 1.5 mm Available thicknesses: 1.5 mm\n\nAvailable colours: Anthracite Roll  Length (cm per roll): 1500 Width (cm per roll): 180 Fire Regulation: Broof(T4",
                'images' => ["/img/pvc-adh.png"]
            ]);

            renderSolutionArticle([
                'title' => "PVC Corners",
                'blurb' => "Corners are essential for all roofs as they seal open edges and corners  prevent water from entering the building. It is incredibly effective at preventing leaks since it is factory  pre-made and fit like puzzle pieces.",
                'about' => "The pre-made corners seal all corner openings on the roof by putting in a corner and hot air welding them in place just like normal PVC membrane. This makes sure that no rainwater can enter your home or business through these areas. The best part about using pre-made corners is that you can adjust them to the angle of the corner whether it's an obtuse angle or acute.",
                'specs' => "Danosa External/Internal PVC Corners\n\nColour: Anthracite\n\nLength (cm): 10\n\nAvailable variants: Internal, External",
                'images' => ["/img/corner.png", "/img/corner2.png"]
            ]);
            ?>
        </div>

    </div>
</section>

<?php
renderPageFooter();
?>
