<?php

namespace Mamarmite\Sharing\Data;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

/**
 * Class for orginising socials
 */
class Social
{
    
    public $label;
    public $slug;
    public $icon;
    public $url;
    public $shareUrl;
    
    public $sharingTitle;
    public $sharingDescription;
    public $sharingImage;
    
    public function __construct(array $data)
    {
        $this->label = $data['label'] ?? '';
        $this->slug = $data['slug'] ?? '';
        $this->icon = $data['icon'] ?? '';
        $this->url = $data['url'] ?? '';
        $this->shareUrl = $data['shareUrl'] ?? '';
    }
    
    public function render()
    {
        $this->setupData();
        $title = __(" Partager sur", "mamarmite-sharing") . " " . $this->label;
        ?>
        <a href="#"
           title="<?= $title ?>"
           rel="nofollow"
           class="btn-share p-3"
           data-socialtext="<?= $this->sharingTitle ?>"
           data-media="<?= $this->slug ?>"
           data-title="<?= $this->sharingTitle ?>"
           data-thumb="<?= $this->sharingImage ?>"
           data-url="<?= \get_the_permalink() ?>">
            <i class="<?= $this->icon ?> share-network-<?= $this->slug ?> display-4"></i>
        </a>
        <?php
    }
    
    public function setupData()
    {
        /*if (function_exists('YoastSEO'))
        {
            $post_id = get_the_ID();
            $currentPage = YoastSEO()->meta->for_current_page();
            $this->sharingTitle = $currentPage->title;
            $this->sharingDescription = $currentPage->description;
            $this->sharingImage = \get_the_post_thumbnail_url($post_id,'large');
        }
        else
        {*/
            $post_id = \get_the_ID();
            $this->sharingTitle = \get_the_title();
            $this->sharingDescription = \get_the_excerpt();
            $this->sharingImage = \get_the_post_thumbnail_url($post_id,'large');
       // }
    }
    
    /*function facebook_social_button() {
        $article_url = get_article_url(); // Psuedo-code method to retrieve the article's URL.
        $article_url .= '#utm_source=facebook&utm_medium=social&utm_campaign=social_buttons';
        
        $title       = html_entity_decode( get_og_title() ); // Psuedo-code method to retrieve the og_title.
        $description = html_entity_decode( get_og_description() ); // Psuedo-code method to retrieve the og_description.
        $og_image    = get_og_image(); // Psuedo-code method to retrieve the og_image assigned to a post.
        $images      = $og_image->get_images();
        $url         = 'http://www.facebook.com/sharer/sharer.php?s=100';
        $url         .= '&p[url]=' . urlencode( $article_url );
        $url         .= '&p[title]=' . urlencode( $title );
        $url         .= '&p[images][0]=' . urlencode( $images[0] );
        $url         .= '&p[summary]=' . urlencode( $description );
        $url         .= '&u=' . urlencode( $article_url );
        $url         .= '&t=' . urlencode( $title );
        
        echo esc_attr( $url );
    }*/
    
}
