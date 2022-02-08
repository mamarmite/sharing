<?php

namespace Mamarmite\Sharing;

use Mamarmite\Sharing\Templates\TemplateLoader;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Config
{
    const PLUGIN_BASE_SLUG = "mamarmite-sharing-admin";
    const PLUGIN_OPTION_PREFIX = "mamarmite_sharing_";
    const PLUGIN_ASSOCIATE_THEME_NAME = "Journal TDN";
    
    public static $PLUGIN_BASE_FILEPATH;
    public static $PLUGIN_BASE_PATH;
    public static $PLUGIN_ASSETS_PATH;
    public static $PLUGIN_BASE_URL;
    public static $PLUGIN_INDEX;
    public static $PLUGIN_SETTING_PREFIX;
    
    public static $TEMPLATE_LOADER;
    
    public static function init($from = __FILE__)
    {
        self::$PLUGIN_BASE_FILEPATH = plugin_dir_path($from);
        self::$PLUGIN_BASE_PATH = plugins_url("mamarmite-sharing");
        self::$PLUGIN_ASSETS_PATH = self::$PLUGIN_BASE_PATH . '/assets/';
        self::$PLUGIN_BASE_URL = "admin.php?page=".self::PLUGIN_BASE_SLUG;
        self::$PLUGIN_SETTING_PREFIX = self::PLUGIN_BASE_SLUG."-settings";
        self::init_env_vars();
        self::setup_data();
    }
    
    public static function init_env_vars() {
        if (class_exists('\Dotenv\Dotenv', false)) {
            $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();
        }
    }
    
    public static function get_env_var($var)
    {
        if (class_exists('\Dotenv\Dotenv', false)) {
            return $_ENV[$var];
        }
        return false;
    }
    
    public static function setup_data() {
        Data\Socials::set_networks();
        Data\SocialsSharing::set_share_networks();
    }
    
    public static function get_index()
    {
        if (!self::$PLUGIN_INDEX)
        {
            self::$PLUGIN_INDEX =  "index";
        }
        return self::$PLUGIN_INDEX;
    }
    
    /**
     * Double singleton ? Too much ? Test performance to be shure.
     * @return TemplateLoader
     */
    public static function template_loader() {
        if (!isset(self::$TEMPLATE_LOADER)) {
            self::$TEMPLATE_LOADER = TemplateLoader::get_instance();
        }
        return self::$TEMPLATE_LOADER;
    }
}