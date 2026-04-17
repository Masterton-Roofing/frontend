<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-CXBWH0G43P"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-CXBWH0G43P');
  </script>

</head>
<?php
require_once __DIR__ . '/php/Layout/Main.php';

// Read statically generated index
$posts = [];
$indexFile = __DIR__ . '/content/blog_index.json';
if (file_exists($indexFile)) {
  $posts = json_decode(file_get_contents($indexFile), true) ?: [];
}

renderHeader("Blog - Masterton Roofing");
?>
<div class="bg-white py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <h1 class="text-4xl font-bold text-gray-900 mb-4">Latest Blog Posts</h1>
      <p class="text-xl text-gray-600 mb-12">Insights and updates from Masterton Roofing Limited.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($posts as $post): ?>
        <div
          class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-gray-100 transition hover:shadow-xl hover:-translate-y-1">
          <div class="flex-shrink-0 h-48 w-full bg-gray-200">
            <?php if (!empty($post['image'])): ?>
              <img class="h-full w-full object-cover" src="<?php echo htmlspecialchars($post['image']); ?>"
                alt="<?php echo htmlspecialchars($post['title']); ?>" />
            <?php else: ?>
              <div class="h-full w-full flex items-center justify-center text-gray-400">
                No image available
              </div>
            <?php endif; ?>
          </div>
          <div class="flex-1 bg-white p-6 flex flex-col justify-between">
            <div class="flex-1">
              <p class="text-sm font-medium text-blue-600 mb-2">
                <?php echo date('n/j/Y', strtotime($post['date'])); ?>
              </p>
              <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>" class="block mt-2">
                <p class="text-xl font-semibold text-gray-900"><?php echo htmlspecialchars($post['title']); ?></p>
                <p class="mt-3 text-base text-gray-500 line-clamp-3">
                  <?php echo htmlspecialchars($post['excerpt'] ?? ($post['description'] ?? '')); ?></p>
              </a>
            </div>
            <div class="mt-6 flex items-center">
              <div class="flex-shrink-0">
                <span class="sr-only"><?php echo htmlspecialchars($post['author'] ?? 'Admin'); ?></span>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($post['author'] ?? 'Admin'); ?>
                </p>
                <div class="flex space-x-1 text-sm text-gray-500">
                  <a href="/blog/<?php echo htmlspecialchars($post['slug']); ?>"
                    class="text-blue-600 font-semibold hover:text-blue-500">
                    Read more &rarr;
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php
renderPageFooter();
?>