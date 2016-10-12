<?php

namespace Cybtow\Utils;

/**
 * Description of FileSystem
 *
 * @author cybtow
 */
class FileSystem {

    /**
     * mkdir
     * @param string $pathname
     * @param int $mode
     * @param bool $recursive
     */
    public static function mkdir($pathname, $mode = 0777, $recursive = true) {
        \mkdir($pathname, $mode, $recursive);
    }

    /**
     * Delete a tree directory recursively
     * 
     * @param string $src Path
     */
    public static function rrmdir($src) {
        if (\is_dir($src)) {
            $dir = \opendir($src);
            while (false !== ($file = \readdir($dir))) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    $full = $src . '/' . $file;
                    if (\is_dir($full)) {
                        static::rrmdir($full);
                    } else {
                        \unlink($full);
                    }
                }
            }
            \closedir($dir);
            \rmdir($src);
        }
    }

}
