<?php

namespace Mamarmite\Sharing\Data;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

//--  social sharing static array
class SocialsSharing
{
    
    static $sharing_networks = [];
    
    static function set_share_networks()
    {
        $shareableNetworks = [
            "facebook",
            "twitter",
            "email",
            "natif",
        ];
        foreach ($shareableNetworks as $network_id) {
            self::$sharing_networks[$network_id] = \Mamarmite\Sharing\Data\Socials::get_network($network_id);
        }
    }
}
