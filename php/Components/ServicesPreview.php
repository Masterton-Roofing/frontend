<?php
function renderServicesPreview() {
    $services = [
        [
            'icon_class' => 'fas fa-hard-hat',
            'title' => 'Roofing Systems',
            'desc' => 'PVC membrane and flat roofing solutions.'
        ],
        [
            'icon_class' => 'fas fa-search',
            'title' => 'Roof Surveys',
            'desc' => 'Professional roof condition inspections.'
        ],
        [
            'icon_class' => 'fas fa-tint',
            'title' => 'Water Checks',
            'desc' => 'Leak detection and preventative checks.'
        ],
        [
            'icon_class' => 'fas fa-plus',
            'title' => 'Add-ons',
            'desc' => 'Mansafe systems, drone surveys and more.'
        ]
    ];
    ?>
    <section class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-center mb-12">
                Our Services
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($services as $service): ?>
                    <div
                        class="text-center p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition"
                    >
                        <div class="text-blue-600 flex justify-center mb-4">
                            <i class="<?php echo $service['icon_class']; ?>" style="font-size: 40px; color: #01597c;"></i>
                        </div>

                        <h3 class="font-semibold text-lg mb-2">
                            <?php echo $service['title']; ?>
                        </h3>

                        <p class="text-gray-600 text-sm">
                            <?php echo $service['desc']; ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>
    <?php
}
