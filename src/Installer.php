<?php

namespace Mamarmite\Sharing;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

use Mamarmite\Sharing\Config;
use Mamarmite\Sharing\Traits\LoggerTrait;

class Installer
{
    use LoggerTrait;
    
    const PLUGIN_VERSION = '0.0.1';
    const DB_VERSION = '0.0.1';
    const INSTALLED_DB_VERSION = '0.0.1';
    const TABLE_NAME = 'mailings';
    
    public static $installation_result;
    
    public $templates;
    public $template_manager;
    
    public $update_mailings_task;
    
    public static function activate()
    {
        if ( !current_user_can('activate_plugins') ) return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        $referer = check_admin_referer( "activate-plugin_{$plugin}" );
        
        self::install();
    }
    
    
    public static function install()
    {
        if ( !current_user_can('activate_plugins') ) return;
        //if we need more table some day
        //create a prop for tables
        //loop throught it with [name, Class]
        //build an interface with install method in it.
    }
    
    
    public function init()
    {
        \add_action('plugins_loaded', [$this, 'need_update']);
        //\add_action('admin_notices', [$this, 'flash_message']);
        
        //add_action('admin_init', array($this, 'setup_sceens'));
        //add_action('', [$this, 'flash_message']);
    }
    
    
    public function setup_cron_tasks() { }
    
    
    function setup_sceens()
    {
        if (is_admin())
        {
            Config::get_index();
        }
    }
    
    
    public function need_update()
    {
        if (is_admin())
        {
            if ( !current_user_can('activate_plugins') ) return;
            if (self::is_new_version())
            {
                $this->update(self::DB_VERSION);
            }
        }
    }
    
    
    public function update(string $to_version)
    {
    
    }
    
    
    public function uninstall()
    {
    
    }
    
    
    public function flash_message($msg) {
        return $msg;
    }
    
    
    public function register_templates($posts_templates)
    {
        $posts_templates = array_merge($posts_templates, $this->templates);
        return $posts_templates;
    }
    
    
    public function register_widgets()
    {
    
    }
    
    /**
     * Checks if the template is assigned to the page
     */
    public function view_template($template)
    {
        // Get global post
        global $post;
        
        // Return template if post is empty
        if (!$post) {
            return $template;
        }
        
        // Return default template if we don't have a custom one defined
        if (!isset($this->templates[get_post_meta(
                $post->ID, '_wp_page_template', true
            )])) {
            return $template;
        }
        
        $file = $this->template_manager->locate_template(get_post_meta(
            $post->ID, '_wp_page_template', true
        ), true);
        
        // Just to be safe, we check if the file exist first
        if (file_exists($file)) {
            return $file;
        }
        else {
            echo $file;
        }
        
        // Return template
        return $template;
    }
    
    
    public static function is_new_version(): bool
    {
        $current_db_version = \get_site_option(Config::PLUGIN_OPTION_PREFIX.'installed_db_version', self::DB_VERSION);
        return $current_db_version ===  self::DB_VERSION;
    }
}