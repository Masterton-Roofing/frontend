<?php
require_once __DIR__ . '/php/Layout/Main.php';
require_once __DIR__ . '/php/Components/Gallery.php';
renderHeader("Gallery | Masterton Roofing");

$images = getGalleryImagesWithMeta();
?>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CXBWH0G43P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-CXBWH0G43P');
    </script>

</head>

<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-bg-mr-blue mb-8">Project Gallery</h1>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach ($images as $index => $img): ?>
            <div class="group rounded-xl overflow-hidden bg-white shadow-md hover:shadow-xl transition duration-300">
                <div class="relative overflow-hidden aspect-video cursor-pointer" onclick="openLightbox(<?php echo $index; ?>)">
                    <img
                            src="/public/img/gallery/<?php echo htmlspecialchars($img['file']); ?>"
                            class="h-full w-full object-cover group-hover:scale-110 transition duration-500"
                            loading="lazy"
                            alt="<?php echo htmlspecialchars($img['caption'] ?: 'Roofing project'); ?>"
                    >
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-search-plus text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-3xl"></i>
                    </div>
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

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-50 hidden bg-black bg-opacity-90 flex items-center justify-center p-4">
    <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white text-4xl hover:text-gray-300 focus:outline-none z-50">
        <i class="fas fa-times"></i>
    </button>
    
    <button onclick="prevImage()" class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-gray-300 focus:outline-none z-50">
        <i class="fas fa-chevron-left"></i>
    </button>
    
    <button onclick="nextImage()" class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-4xl hover:text-gray-300 focus:outline-none z-50">
        <i class="fas fa-chevron-right"></i>
    </button>

    <div class="max-w-5xl w-full h-full flex flex-col items-center justify-center">
        <img id="lightbox-img" src="" alt="" class="max-h-[80vh] max-w-full object-contain shadow-2xl transition-transform duration-300">
        <p id="lightbox-caption" class="text-white text-xl mt-6 text-center font-medium"></p>
        <p id="lightbox-counter" class="text-gray-400 text-sm mt-2"></p>
    </div>
</div>

<script>
    const images = <?php echo json_encode($images); ?>;
    let currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        updateLightbox();
        document.getElementById('lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.body.style.overflow = ''; // Restore scrolling
    }

    function updateLightbox() {
        const img = images[currentIndex];
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxCaption = document.getElementById('lightbox-caption');
        const lightboxCounter = document.getElementById('lightbox-counter');

        lightboxImg.src = '/public/img/gallery/' + img.file;
        lightboxImg.alt = img.caption || 'Roofing project';
        lightboxCaption.textContent = img.caption || '';
        lightboxCounter.textContent = `${currentIndex + 1} / ${images.length}`;
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        updateLightbox();
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateLightbox();
    }

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (document.getElementById('lightbox').classList.contains('hidden')) return;

        if (e.key === 'ArrowRight') nextImage();
        if (e.key === 'ArrowLeft') prevImage();
        if (e.key === 'Escape') closeLightbox();
    });

    // Close on background click
    document.getElementById('lightbox').addEventListener('click', (e) => {
        if (e.target === e.currentTarget) closeLightbox();
    });
</script>

<?php
renderPageFooter();
?>