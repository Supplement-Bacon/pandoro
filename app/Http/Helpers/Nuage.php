<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Storage;

use DateTimeInterface;

class Nuage {

    /**
     * @return \Illuminate\Filesystem\FilesystemManager
     */
    private static function getDisk()
    {
        return Storage::disk('ovh');
    }

    public static function checkFileExists(string $fileName): bool
    {
        return self::getDisk()->exists( $fileName );
    }

    public static function storeFile(string $path, mixed $content, string $name = null)
    {
        if ( !$name ) {
            return self::getDisk()->putFile($path, $content);
        }

        return self::getDisk()->putFileAs($path, $content, $name);
    }

    public static function getFileUrl(string $fileName)
    {
        return self::getDisk()->url( $fileName );
    }

    public static function getTemporaryFileUrl(string $fileName, DateTimeInterface $expiration)
    {
        return self::getDisk()->temporaryUrl( $fileName, $expiration );
    }

    public static function deleteFile(string $path)
    {
        if ( !self::checkFileExists( $path ) ) { return true; }
        return self::getDisk()->delete( $path );
    }

    /**
     * Format the file size
     *
     * @return string
     */
    public static function formatBytes(mixed $bytes, int $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }

}
