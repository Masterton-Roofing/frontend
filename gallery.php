<?php
require_once __DIR__ . '/php/Layout/Main.php';
require_once __DIR__ . '/php/Components/Gallery.php';
renderHeader("Gallery | Masterton Roofing");

$images = getGalleryImagesWithMeta();
?>

<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-bg-mr-blue mb-8">Project Gallery</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach ($images as $img): ?>
            <div class="group rounded-xl overflow-hidden bg-white shadow-md hover:shadow-xl transition duration-300">
                <div class="relative overflow-hidden aspect-video">
                    <a href="/public/img/gallery/<?php echo htmlspecialchars($img['file']); ?>" target="_blank">
                        <img
                                src="/public/img/gallery/<?php echo htmlspecialchars($img['file']); ?>"
                                class="h-full w-full object-cover group-hover:scale-110 transition duration-500"
                                loading="lazy"
                                alt="<?php echo htmlspecialchars($img['caption'] ?: 'Roofing project'); ?>"
                        >
                    </a>
                </div>

                <?php if (!empty($img['caption'])): ?>
                    <div class="p-4 text-center">
                        <p class="font-medium text-gray-800">
                            <?php echo htmlspecialchars($img['caption']); ?>
                        </p>
                    </div>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>
    
    <?php if (empty($images)): ?>
        <div class="text-center py-20">
            <p class="text-xl text-gray-500">No images found in the gallery yet. Please check back later!</p>
        </div>
    <?php endif; ?>
</div>

<?php
renderPageFooter();
?>