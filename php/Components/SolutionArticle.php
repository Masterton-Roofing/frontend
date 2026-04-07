<?php
function renderSolutionArticle($params) {
    $title = $params['title'];
    $blurb = $params['blurb'];
    $about = $params['about'];
    $specs = $params['specs'];
    $images = isset($params['images']) ? $params['images'] : [];
    $id = 'article-' . md5($title);
    ?>
    <article class="w-full max-w-4xl mx-auto my-8 bg-white rounded-xl shadow-md border border-gray-200">
        <!-- Preview -->
        <div class="p-6">
            <h2 class="text-xl md:text-2xl font-bold text-gray-800"><?php echo $title; ?></h2>
            <p class="mt-2 text-gray-600 text-sm md:text-base">
                <?php echo $blurb; ?>
            </p>

            <button
                onclick="toggleArticle('<?php echo $id; ?>', this)"
                class="mt-4 inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition"
            >
                <span class="btn-text">Read more</span>
                <span class="ml-2 transform transition-transform duration-300">
                    ▼
                </span>
            </button>
        </div>

        <!-- Expandable section -->
        <div
            id="<?php echo $id; ?>"
            class="max-h-0 opacity-0 overflow-hidden transition-all duration-300 ease-in-out"
        >
            <div class="px-6 pb-6">
                <h3 class="text-xl font-semibold mt-4 mb-2">About</h3>
                <p class="text-gray-700 mb-4"><?php echo $about; ?></p>

                <h3 class="text-xl font-semibold mb-2">Specifications</h3>
                <p class="text-gray-700 mb-6 whitespace-pre-line"><?php echo $specs; ?></p>

                <?php if (count($images) > 0): ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php foreach ($images as $img): ?>
                            <img
                                src="<?php echo $img; ?>"
                                class="rounded-lg shadow-md w-full object-cover"
                                alt="<?php echo $title; ?>"
                                onerror="this.src='https://placehold.co/600x400?text=Solution+Image'"
                            />
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <?php
}
?>
<script>
if (typeof toggleArticle !== 'function') {
    function toggleArticle(id, btn) {
        const content = document.getElementById(id);
        const arrow = btn.querySelector('span:last-child');
        const text = btn.querySelector('.btn-text');
        
        if (content.style.maxHeight && content.style.maxHeight !== '0px') {
            content.style.maxHeight = '0px';
            content.style.opacity = '0';
            arrow.style.transform = 'rotate(0deg)';
            text.textContent = 'Read more';
        } else {
            content.style.maxHeight = '2000px';
            content.style.opacity = '1';
            arrow.style.transform = 'rotate(180deg)';
            text.textContent = 'Hide details';
        }
    }
}
</script>
