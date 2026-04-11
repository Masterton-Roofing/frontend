<?php
require_once 'php/Components/Gallery.php';
$images = getGalleryImages();
?>

<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-6">Gallery</h1>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach ($images as $img): ?>
            <a
                href="/public/images/gallery/<?php echo htmlspecialchars($img); ?>"
                class="group block overflow-hidden rounded-xl bg-gray-100 shadow hover:shadow-lg transition"
                target="_blank"
            >
                <img
                    src="/public/images/gallery/<?php echo htmlspecialchars($img); ?>"
                    class="h-48 w-full object-cover group-hover:scale-105 transition duration-300"
                    loading="lazy"
                    alt=""
                >
            </a>
        <?php endforeach; ?>
    </div>
</div>