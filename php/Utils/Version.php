<?php
namespace App\Utils;

class Version {
    public static function getBuildId() {
        // First try to read from version.txt (useful for prod)
        // Since when did we have a version.txt?
        $versionFile = __DIR__ . '/../../version.txt';
        if (file_exists($versionFile)) {
            $version = trim(file_get_contents($versionFile));
            if (!empty($version)) {
                return $version;
            }
        }

        // Fallback to git command (useful for dev)
        if (function_exists('shell_exec')) {
            $gitVersion = @shell_exec('git rev-parse --short HEAD');
            if ($gitVersion) {
                return trim($gitVersion);
            }
        }

        return 'unknown';
    }
}
