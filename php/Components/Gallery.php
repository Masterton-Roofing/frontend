<?php
function getGalleryImagesWithMeta($dir = 'public/img/gallery/', $metaFile = 'content/gallery.json') {
    $meta = [];

    if (file_exists($metaFile)) {
        $json = file_get_contents($metaFile);
        $metaData = json_decode($json, true);

        if (is_array($metaData)) {
            // Check if it's a single object or an array of objects
            if (isset($metaData['file'])) {
                $meta[$metaData['file']] = $metaData['caption'] ?? '';
            } else {
                foreach ($metaData as $item) {
                    if (isset($item['file'])) {
                        $meta[$item['file']] = $item['caption'] ?? '';
                    }
                }
            }
        }
    }

    $files = scandir($dir);
    $images = [];

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (in_array($ext, ['jpg','jpeg','png','gif','webp'])) {
            $images[] = [
                'file' => $file,
                'caption' => $meta[$file] ?? ''
            ];
        }
    }

    return $images;
}
