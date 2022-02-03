<?php

namespace Mamarmite\Sharing\Data;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

//--  social network static array
class Socials
{
    
    static $networks = [];
    
    static function get_networks_for_select()
    {
        $select_options = [];
        foreach (self::$networks as $id => $network) {
            $select_options[$id] = $network["label"];
        }
        return $select_options;
    }
    
    static function add_network(string $network_id, array $network)
    {
        self::$networks[$network_id] = new Social($network);
    }
    
    static function get_network(string $networkSlug)
    {
        return self::$networks[$networkSlug] ?? null;
    }
    
    static function set_networks(array $networks = [])
    {
        $defaults = [
            "natif" => [
                "label"    => "Natif",
                "slug"    => "natif",
                "icon"     => " fa-share-alt",
                "url"      => "",
                "shareurl" => "",
                "active"   => true,
            ],
            "facebook" => [
                "label"    => "Facebook",
                "slug"    => "facebook",
                "icon"     => "fa-facebook-f",
                "url"      => "https://www.facebook.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "twitter"          => [
                "label"    => "Twitter",
                "slug"    => "twitter",
                "icon"     => "fa-twitter",
                "url"      => "https://www.twitter.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "flickr"           => [
                "label"    => "Flickr",
                "slug"    => "flickr",
                "icon"     => "fa-flickr",
                "url"      => "https://www.flickr.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "youtube"          => [
                "label"    => "Youtube",
                "slug"    => "youtube",
                "icon"     => "fa-youtube",
                "url"      => "https://www.youtube.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "pinterest"        => [
                "label"    => "Pinterest",
                "slug"    => "pinterest",
                "icon"     => "fa-pinterest",
                "url"      => "https://www.pinterest.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "instagram"        => [
                "label"    => "Instagram",
                "slug"    => "instagram",
                "icon"     => "fa-instagram",
                "url"      => "https://www.instagram.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "linkedin"         => [
                "label"    => "LinkedIn",
                "slug"    => "linkedin",
                "icon"     => "fa-linkedin",
                "url"      => "https://www.linkedin.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "podcast"          => [
                "label"    => "Podcast",
                "slug"    => "podcast",
                "icon"     => "fa-podcast",
                "url"      => "",
                "shareurl" => "",
                "active"   => true,
            ],
            "github"           => [
                "label"    => "Github",
                "slug"    => "github",
                "icon"     => "fa-github",
                "url"      => "https://www.github.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "behance"          => [
                "label"    => "Behance",
                "slug"    => "behance",
                "icon"     => "fa-behance",
                "url"      => "https://www.behance.net/",
                "shareurl" => "",
                "active"   => true,
            ],
            "500px"            => [
                "label"    => "500px",
                "slug"    => "500px",
                "icon"     => "fa-500px",
                "url"      => "https://www.500px.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "threadandneedles" => [
                "label"    => "Thread and needle",
                "slug"    => "threadandneedles",
                "icon"     => "",
                "url"      => "https://www.threadandneedles.fr/",
                "shareurl" => "",
                "active"   => true,
            ],
            "kollabora"        => [
                "label"    => "Kollabora",
                "slug"    => "kollabora",
                "icon"     => "",
                "url"      => "http://www.kollabora.com/",
                "shareurl" => "",
                "active"   => true,
            ],
            "etsy"             => [
                "label"    => "Etsy",
                "slug"    => "etsy",
                "icon"     => "fa-etsy",
                "url"      => "https://www.etsy.com/shop/",
                "shareurl" => "",
                "active"   => true,
            ],
            "email" => [
                "label"=>"Courriel",
                "slug"=>"email",
                "icon"=>"fas fa-envelope",
                "url"=>"mailto:",
                "shareurl"=>"mailto:",
                "active"   => true,
            ],
        ];
        foreach ($defaults as $network_id => $network) {
            self::add_network($network_id, $network);
        }
    }
}
