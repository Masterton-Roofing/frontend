<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Spatie\YamlFrontMatter\YamlFrontMatter;

// Initialize Parsedown
$parsedown = new Parsedown();

$postsDir = __DIR__ . '/../content/blog';
$buildDir = __DIR__ . '/../blog';

if (!is_dir($postsDir)) {
  echo "No content/blog directory found.\n";
  return;
}

if (!is_dir($buildDir)) {
  mkdir($buildDir, 0755, true);
}

$files = glob($postsDir . '/*.md');
$posts = [];

foreach ($files as $file) {
  echo "Processing " . basename($file) . "...\n";
  $slug = basename($file, '.md');
  $object = YamlFrontMatter::parse(file_get_contents($file));

  $title = $object->matter('title');
  $date = $object->matter('date');
  $author = $object->matter('author') ?? 'Admin';
  $image = $object->matter('image') ?? '';
  $content = $parsedown->text($object->body());

  $postData = array_merge([
    'slug' => $slug,
    'title' => $title,
    'date' => $date,
    'description' => $object->matter('description'),
    'author' => $author,
    'image' => $image,
  ], $object->matter());

  $posts[] = $postData;

  // Generate blog/{slug}.php
  $formattedDate = date('n/j/Y', strtotime($date));
  $imageHtml = $image ? <<<HTML
        <div class="mb-8 overflow-hidden rounded-xl">
            <img src="{$image}" alt="{$title}" class="w-full h-auto object-cover max-h-[400px]" />
        </div>
HTML : '';

  $phpContent = <<<PHP
<?php
require_once __DIR__ . '/../php/Layout/Main.php';
renderHeader("{$title} - Masterton Roofing");
?>
<article class="bg-white py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-3xl mx-auto">
    <a href="/blog" class="text-blue-600 hover:text-blue-500 font-semibold inline-flex items-center mb-8">
      <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
      Back to Blog
    </a>
    
    <header class="mb-8">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{$title}</h1>
      <div class="flex items-center text-gray-500 text-sm space-x-6">
        <span class="flex items-center">
          <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          {$formattedDate}
        </span>
        <span class="flex items-center">
          <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
          {$author}
        </span>
      </div>
    </header>

{$imageHtml}

    <div class="prose prose-lg prose-blue max-w-none">
{$content}
    </div>
  </div>
</article>
<?php
renderPageFooter();
?>
PHP;

  file_put_contents($buildDir . '/' . $slug . '.php', $phpContent);
}

// Sort by date descending
usort($posts, function ($a, $b) {
  return strtotime($b['date']) - strtotime($a['date']);
});

// Save posts metadata to content/blog_index.json
file_put_contents(__DIR__ . '/../content/blog_index.json', json_encode($posts, JSON_PRETTY_PRINT));

echo "Generated " . count($posts) . " blog pages successfully.\n";
