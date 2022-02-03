<?php

namespace Mamarmite\Sharing\Data;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Log {
    
    private static $_mode = 'a';
    private static $_filename = 'mamarmite-sharing';
    private static $_ext = '.log';
    private static $_filepath = '';
    
    public static function info($content)
    {
        self::_write_to_file(
            "[info] ".self::_sanitize_content($content)
        );
    }
    
    public static function warning($content)
    {
        self::_write_to_file(
            "[WARNING] ".self::_sanitize_content($content)
        );
    }
    
    public static function error($content)
    {
        self::_write_to_file(
            "[ERROR] ".self::_sanitize_content($content)
        );
    }
    
    public static function write($content)
    {
        self::_write_to_file(
            self::_sanitize_content($content)
        );
    }
    
    private static function _sanitize_content($content): string
    {
        if (is_array($content) || is_object($content))
        {
            $content = json_encode( $content );
        }
        return $content;
    }
    
    private static function _write_to_file($content)
    {
        // Write the log file.
        $file = self::get_file_path() . '/' . self::$_filename . self::$_ext;
        $file = fopen($file, self::$_mode);
        $bytes = fwrite($file, current_time('mysql') . "::" . $content . "\n");
        fclose($file);
        
        return $bytes;
    }
    
    protected static function get_file_path()
    {
        if (!self::$_filepath) {
            $upload_dir = \wp_upload_dir();
            self::$_filepath = $upload_dir['basedir'];
        }
        return self::$_filepath;
    }
}