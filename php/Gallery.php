<?php
function getGalleryImages($dir = 'public/images/gallery') {
    if (!is_dir($dir)) {
        return [];
    }

    $files = scanDIr($dir);
    $images = [];

    foreach ($files as $file) {
        if ($file === '.' || $file === '..' ) continue;

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_arry($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $images []= $file;
        }
    }

    // Sort newest first
    usort($images, function($a, $b) use ($dir) {
        return filemtime($dir . $b) - filemtime($dir . $a);
    });

    return $images;
}
