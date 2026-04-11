<?php
// Normalize URI
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));

// Support subfolder installations by stripping the base directory from the URI
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$basePath = rtrim(dirname($scriptName), '/\\');
if ($basePath === DIRECTORY_SEPARATOR || $basePath === '.') {
    $basePath = '';
}

if ($basePath !== '' && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

$uri = '/' . ltrim($uri, '/');
if ($uri === '/') {
    $uri = '/';
} else {
    $uri = rtrim($uri, '/');
}

// 1. Check if the URI corresponds to a PHP file in the root or a subfolder
if ($uri === '/') {
    $script = __DIR__ . DIRECTORY_SEPARATOR . 'home.php';
} else {
    // Map /solutions/pvc to [base]/solutions/pvc.php
    $relPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $uri);
    $script = __DIR__ . DIRECTORY_SEPARATOR . ltrim($relPath, DIRECTORY_SEPARATOR) . '.php';
}

if (file_exists($script) && !is_dir($script)) {
    require_once $script;
    exit;
}

// 2. Special case for blog slugs
if (preg_match('#^/blog/([^/.]+)$#', $uri, $matches)) {
    $_GET['slug'] = $matches[1];
    require_once __DIR__ . '/blog.php';
    exit;
}

// 3. Serve static files from the root and public/ subdirectories if they exist
// We only serve if it's NOT a directory and it's NOT a PHP file
if ($uri !== '/') {
    // Convert URI to a physical path relative to this script's directory
    $relPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $uri);
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . ltrim($relPath, DIRECTORY_SEPARATOR);
    $targetFile = null;

    // Check if the URI already points to a file correctly
    if (file_exists($filePath) && !is_dir($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) !== 'php') {
        $targetFile = $filePath;
    } else {
        // Try prepending /public (for cases like /vite.svg mapping to /public/vite.svg)
        $publicFilePath = __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . ltrim($relPath, DIRECTORY_SEPARATOR);
        if (file_exists($publicFilePath) && !is_dir($publicFilePath) && pathinfo($publicFilePath, PATHINFO_EXTENSION) !== 'php') {
            $targetFile = $publicFilePath;
        }
    }

    if ($targetFile) {
        $ext = pathinfo($targetFile, PATHINFO_EXTENSION);
        $mimeType = match ($ext) {
            'css' => 'text/css',
            'js' => 'application/javascript',
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'json' => 'application/json',
            'ico' => 'image/x-icon',
            'webp' => 'image/webp',
            'avif' => 'image/avif',
            default => 'application/octet-stream',
        };
        
        header("Content-Type: $mimeType");
        header("Content-Length: " . filesize($targetFile));
        readfile($targetFile);
        exit;
    }
}

// 4. If nothing else matches, 404
header("HTTP/1.0 404 Not Found");
echo "<h1>404 Not Found</h1><p>The page you requested was not found.</p>";
exit;
