<?php
namespace Mamarmite\Sharing;
/*
 *  Plugin Name: Outil de partage
 *  Plugin URI: https://mamarmite.com
 *  Version: 0.0.2
 *  Author: Marc-André Martin
 *  Author uri: https://mamarmite.com
 *  Description: Extensions pour ajouter des outils de partage sur le site
 *  Text Domain: mamarmitesharing
 *  Domain Path: /languages
*/


if (!defined('ABSPATH')) exit; // Exit if accessed directly.

define('MAMARMITE_SHARING_VERSION', '0.0.2');

function load_files($file_paths) {
    foreach ($file_paths as $file) {
        if (file_exists($file)) {
            require_once $file;
        }
    }
    unset($file);
}

$src_path = dirname(__FILE__)."/src/";

$load_includes = [
    $src_path.'Config.php',
    $src_path.'Settings.php',
    
    $src_path.'Data/Log.php',
    $src_path.'Traits/LoggerTrait.php',
    
    $src_path.'Templates/TemplatesLoader.php',
    
    $src_path.'Data/Social.php',
    $src_path.'Data/Socials.php',
    $src_path.'Data/SocialsSharing.php',
    
    $src_path.'Installer.php',
    $src_path.'Post.php',
    $src_path.'FrontEnd.php',
];
load_files($load_includes);


use Mamarmite\Sharing\Installer;

\Mamarmite\Sharing\Config::init(__FILE__);

$installer = new Installer();
$installer->init();


\register_activation_hook( __FILE__, ['Mamarmite\Sharing\Installer', 'activate'] );
//\register_deactivation_hook( __FILE__, ['Mamarmite\Sharing\Installer', ''] );
\register_uninstall_hook( __FILE__, ['Mamarmite\Sharing\Installer', 'uninstall'] );

// filters
FrontEnd::add_public_assets();