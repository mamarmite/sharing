<?php
namespace Mamarmite\Sharing;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class FrontEnd {
    
    public static function add_public_assets() {
        add_action( 'wp_enqueue_scripts', [__CLASS__, 'enqueue_styles'] );
        add_action( 'wp_enqueue_scripts', [__CLASS__, 'enqueue_scripts'] );
    }
    
    public static function enqueue_scripts():void {
        wp_enqueue_script('mamarmite-sharing', Config::$PLUGIN_ASSETS_PATH . 'scripts/sharing.js', 'jquery', MAMARMITE_SHARING_VERSION,true);
        wp_enqueue_script('mamarmite-sharing-main', Config::$PLUGIN_ASSETS_PATH . 'scripts/mamarmite-sharing.js', ['jquery','mamarmite-sharing'], MAMARMITE_SHARING_VERSION,true);
    }
    
    public static function enqueue_styles():void {
        wp_enqueue_style('mamarmite-sharing-main', Config::$PLUGIN_ASSETS_PATH.'styles/mamarmite-sharing.css', null, MAMARMITE_SHARING_VERSION);
    }
}