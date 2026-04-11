<?php
// Mocking some environment variables to simulate a request
$_SERVER['REQUEST_URI'] = '/projects';
$_SERVER['SCRIPT_NAME'] = '/index.php';
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$basePath = rtrim(dirname($scriptName), '/\\');
if ($basePath !== '' && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
echo "DIRNAME: ".dirname($scriptName)."\n";
echo "BASEPATH: $basePath\n";
echo "URI: $uri\n";

if ($basePath !== '' && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
echo "URI after BasePath: $uri\n";

if (empty($uri) || $uri === '/') {
    $uri = '/';
} else {
    $uri = rtrim($uri, '/');
}
echo "URI after rtrim: $uri\n";

// 1. Check if the URI corresponds to a PHP file in the root or a subfolder
if ($uri === '/') {
    $script = __DIR__ . DIRECTORY_SEPARATOR . 'home.php';
} else {
    // Map /solutions/pvc to [base]/solutions/pvc.php
    $script = __DIR__ . str_replace('/', DIRECTORY_SEPARATOR, $uri) . '.php';
}

echo "Computed Script: $script\n";
echo "File Exists: " . (file_exists($script) ? 'YES' : 'NO') . "\n";
echo "Is Dir: " . (is_dir($script) ? 'YES' : 'NO') . "\n";

echo "\nTesting /solutions/pvc:\n";
$_SERVER['REQUEST_URI'] = '/solutions/pvc';
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH));
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$basePath = rtrim(dirname($scriptName), '/\\');
if ($basePath !== '' && strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
if (empty($uri) || $uri === '/') {
    $uri = '/';
} else {
    $uri = rtrim($uri, '/');
}
$script = __DIR__ . str_replace('/', DIRECTORY_SEPARATOR, $uri) . '.php';
echo "URI: $uri\n";
echo "Computed Script: $script\n";
echo "File Exists: " . (file_exists($script) ? 'YES' : 'NO') . "\n";
