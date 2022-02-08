<?php


namespace Mamarmite\Sharing;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.


function getSocialButtonsTemplate()
{
    echo "wp footer";
    \Mamarmite\Sharing\load_files([
        \Mamarmite\Sharing\Config::$PLUGIN_BASE_FILEPATH . "templates/sharing-buttons.php",
    ]);
}

//add_filter('mamarmite-sharing-buttons-template', __NAMESPACE__ . '\\getSocialButtonsTemplate', 1);


function addSocialButtonsAfterContent($content)
{
    //if (is_singular())// && in_the_loop() && is_main_query())
   // {
        ob_start();
        //Config::$TEMPLATE_LOADER->get_template_part('sharing', 'buttons');
        Config::template_loader()->get_template_part('sharing','buttons');
        $sharingButtons = ob_get_contents();
        ob_end_clean();
    
        return $content . $sharingButtons;
    //}
    //return $content;
}

add_filter('the_content', __NAMESPACE__ . '\\addSocialButtonsAfterContent', 99);

//add_action('wp_footer', __NAMESPACE__ . '\\getSocialButtonsTemplate', 1);

//add_action('the_post', __NAMESPACE__ . '\\addSocialButtonsAfterContent', 10, 2);