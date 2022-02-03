<?php

function facebook_social_button() {
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
}

?>

<div id="social-share">
    <div class="socialbox">
        <a rel="nofollow" target="_blank" data-name="facebook" aria-label="Share on Facebook" data-action="share"
           href="<?php facebook_social_button(); ?>"> <i class="fa fa-facebook-square text-icon--facebook"></i> </a>
    </div>
</div>


@if (isset(\Mamarmite\SocialsSharing::$sharing_networks))
@foreach (\Mamarmite\SocialsSharing::$sharing_networks as $id => $network)
<div class="col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">
    <div class="primary">
        <div class="d-flex align-items-center">
            <a href="#" title="{{__("Partager sur", "cap")}} {{$network['label']}}" rel="nofollow" class="btn-share p-3" data-socialtext="{{esc_html($desc)}}" data-media="{{$id}}" data-title="{{$title}}" data-thumb="{{$thumb}}" data-url="{{$url}}">
            <i class="{{$network['icon']}} share-network-{{$id}} display-4"></i>
            </a>
        </div>
    </div>
</div>
@endforeach
@endif