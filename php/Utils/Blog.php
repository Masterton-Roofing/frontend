<?php
namespace App\Utils;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Parsedown;

class Blog {
    private static $postsDir = __DIR__ . '/../../content/blog';

    public static function getBlogPosts() {
        if (!is_dir(self::$postsDir)) {
            return [];
        }

        $files = glob(self::$postsDir . '/*.md');
        $posts = [];

        foreach ($files as $file) {
            $slug = basename($file, '.md');
            $object = YamlFrontMatter::parse(file_get_contents($file));
            
            $posts[] = array_merge([
                'slug' => $slug,
                'title' => $object->matter('title'),
                'date' => $object->matter('date'),
                'description' => $object->matter('description')
            ], $object->matter());
        }

        // Sort by date descending
        usort($posts, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });

        return $posts;
    }

    public static function getBlogPost($slug) {
        $file = self::$postsDir . '/' . $slug . '.md';
        if (!file_exists($file)) {
            return null;
        }

        $object = YamlFrontMatter::parse(file_get_contents($file));
        $parsedown = new Parsedown();

        return array_merge([
            'slug' => $slug,
            'title' => $object->matter('title'),
            'date' => $object->matter('date'),
            'content' => $parsedown->text($object->body())
        ], $object->matter());
    }
}
