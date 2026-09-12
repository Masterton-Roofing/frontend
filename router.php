<?php
// Simple router for PHP built-in server to support extensionless URLs like /solutions/drone -> /solutions/drone.php
// Usage: php -S localhost:8000 router.php

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$docRoot = __DIR__;
$requested = $docRoot . $uri;

// Serve existing files (images, css, php files excluded)
if ($uri !== '/' && file_exists($requested) && !is_dir($requested)) {
    return false; // let the built-in server serve the file
}

// Try appending .php
$phpFile = rtrim($requested, '/') . '.php';
if (file_exists($phpFile)) {
    require $phpFile;
    return true;
}

// Try index.php inside directory
$indexFile = rtrim($requested, '/') . '/index.php';
if (file_exists($indexFile)) {
    require $indexFile;
    return true;
}

// Fallback to root index.php if exists
$rootIndex = $docRoot . '/index.php';
if (file_exists($rootIndex)) {
    require $rootIndex;
    return true;
}

// Not found — send 404
http_response_code(404);
echo "404 Not Found";
return true;
