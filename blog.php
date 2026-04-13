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
<?php
require_once __DIR__ . '/php/Layout/Main.php';
require_once __DIR__ . '/php/Utils/Blog.php';

use App\Utils\Blog;

$slug = $_GET['slug'] ?? null;

if ($slug) {
    $post = Blog::getBlogPost($slug);
    if (!$post) {
        header("Location: /blog");
        exit;
    }
    renderHeader($post['title'] . " - Masterton Roofing");
    ?>
    <article class="bg-white py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto">
        <a href="/blog" class="text-blue-600 hover:text-blue-500 font-semibold inline-flex items-center mb-8">
          <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
          Back to Blog
        </a>
        
        <header class="mb-8">
          <h1 class="text-4xl font-extrabold text-gray-900 mb-4"><?php echo $post['title']; ?></h1>
          <div class="flex items-center text-gray-500 text-sm space-x-6">
            <span class="flex items-center">
              <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
              <?php echo date('n/j/Y', strtotime($post['date'])); ?>
            </span>
            <span class="flex items-center">
              <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              <?php echo $post['author'] ?? 'Admin'; ?>
            </span>
          </div>
        </header>

        <?php if (!empty($post['image'])): ?>
          <div class="mb-8 overflow-hidden rounded-xl">
            <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" class="w-full h-auto object-cover max-h-[400px]" />
          </div>
        <?php endif; ?>

        <div class="prose prose-lg prose-blue max-w-none">
          <?php echo $post['content']; ?>
        </div>
      </div>
    </article>
    <?php
} else {
    $posts = Blog::getBlogPosts();
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
            <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border border-gray-100 transition hover:shadow-xl hover:-translate-y-1">
              <div class="flex-shrink-0 h-48 w-full bg-gray-200">
                <?php if (!empty($post['image'])): ?>
                  <img class="h-full w-full object-cover" src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" />
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
                  <a href="/blog/<?php echo $post['slug']; ?>" class="block mt-2">
                    <p class="text-xl font-semibold text-gray-900"><?php echo $post['title']; ?></p>
                    <p class="mt-3 text-base text-gray-500 line-clamp-3"><?php echo $post['excerpt'] ?? ($post['description'] ?? ''); ?></p>
                  </a>
                </div>
                <div class="mt-6 flex items-center">
                  <div class="flex-shrink-0">
                    <span class="sr-only"><?php echo $post['author'] ?? 'Admin'; ?></span>
                  </div>
                  <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900"><?php echo $post['author'] ?? 'Admin'; ?></p>
                    <div class="flex space-x-1 text-sm text-gray-500">
                      <a href="/blog/<?php echo $post['slug']; ?>" class="text-blue-600 font-semibold hover:text-blue-500">
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
}

renderPageFooter();
?>
