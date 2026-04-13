<?php
namespace App\Utils;

class Version {
    private static $repoUrl = 'https://git.meowcat.site/meowcat767/mr-frontend';

    /**
     * Gets the current build ID (short commit hash or version string).
     * @return string
     */
    public static function getBuildId() {
        $hash = self::getCommitHash();
        if ($hash && preg_match('/^[0-9a-f]{40}$/i', $hash)) {
            return substr($hash, 0, 7);
        }
        return $hash ?: 'unknown';
    }

    /**
     * Gets the full commit hash if available, otherwise fallback to version.txt or git command.
     * @return string|null
     */
    public static function getCommitHash() {
        // First try to read from version.txt (useful for prod)
        $versionFile = __DIR__ . '/../../version.txt';
        if (file_exists($versionFile)) {
            $version = trim(file_get_contents($versionFile));
            if (!empty($version)) {
                return $version;
            }
        }

        // Fallback to git command (useful for dev) - Prioritize live git over stale composer metadata
        if (function_exists('shell_exec')) {
            $gitVersion = @shell_exec('git rev-parse HEAD');
            if ($gitVersion) {
                return trim($gitVersion);
            }
        }

        // Fallback to composer installed versions (useful for prod if deployed via composer)
        try {
            if (class_exists('\Composer\InstalledVersions')) {
                $rootPackage = \Composer\InstalledVersions::getRootPackage();
                if (isset($rootPackage['reference']) && !empty($rootPackage['reference'])) {
                    $ref = $rootPackage['reference'];
                    // We return the full reference if it's a hash
                    return $ref;
                }
            }
        } catch (\Exception $e) {
            // Ignore errors from Composer
        }

        return null;
    }

    /**
     * Returns the URL for the current commit if possible.
     * @return string|null
     */
    public static function getCommitUrl() {
        $hash = self::getCommitHash();
        // Only return a URL if it's a 40-character commit hash
        if ($hash && preg_match('/^[0-9a-f]{40}$/i', $hash)) {
            return rtrim(self::$repoUrl, '/') . '/commit/' . $hash;
        }
        return null;
    }
}
