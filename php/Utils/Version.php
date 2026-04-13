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
        // First try to read from version.txt (definitive prod override)
        // This file should be created by the deployment script/CI.
        $versionFile = __DIR__ . '/../../version.txt';
        if (file_exists($versionFile)) {
            $version = trim(file_get_contents($versionFile));
            if (!empty($version)) {
                return $version;
            }
        }

        // Second try: live git command (definitive dev)
        // Check if .git directory exists before trying shell_exec to avoid overhead if it's missing (common in prod)
        if (is_dir(__DIR__ . '/../../.git') && function_exists('shell_exec')) {
            $gitVersion = @shell_exec('git rev-parse HEAD 2>/dev/null');
            if ($gitVersion) {
                return trim($gitVersion);
            }
        }

        // Third try: composer.lock reference (fallback if composer install hasn't been run but lock is fresh)
        // This is specifically useful if the root package is managed by git but we are in a deployment
        // where .git is removed, and version.txt wasn't generated.
        $composerLock = __DIR__ . '/../../composer.lock';
        if (file_exists($composerLock)) {
            $lockData = json_decode(file_get_contents($composerLock), true);
            // In some setups, the root package hash might be in a special field if using a plugin,
            // or we might want to look at the content-hash as a last resort.
            if (isset($lockData['content-hash'])) {
                return $lockData['content-hash'];
            }
        }

        // Fourth try: fallback to composer installed versions (static metadata)
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
