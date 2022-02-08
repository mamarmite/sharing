<?php


namespace Mamarmite\Sharing;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

function addSocialButtonsAfterContent($content)
{
    ob_start();
    Config::template_loader()->get_template_part('sharing', 'buttons');
    $sharingButtons = ob_get_contents();
    ob_end_clean();
    
    return $content . $sharingButtons;
}

add_filter('the_content', __NAMESPACE__ . '\\addSocialButtonsAfterContent', 99);