<div class="sharing-buttons-container">
    <div class="sharing-box">
        <p><strong><?php _e('Partager', 'mamarmite-sharing'); ?></strong></p>
        <div class="sharing-buttons">
            <?php
            if (isset(\Mamarmite\Sharing\Data\SocialsSharing::$sharing_networks)) {
                foreach (\Mamarmite\Sharing\Data\SocialsSharing::$sharing_networks as $id => $network) {
                    if (isset($network)) {
                        $post_id = get_the_ID();
                        $image = \get_the_post_thumbnail_url($post_id,'large');
                        ?>
                        <a href="#">
                            <a href="#"
                               title="<?= __(" Partager sur", "mamarmite-sharing") . " " . $network->label; ?>"
                               rel="nofollow"
                               class="btn-share p-3"
                               data-socialtext=""
                               data-media="<?= $network->slug ?>"
                               data-title="<?= get_the_title() ?>"
                               data-thumb="<?= $image ?>"
                               data-url="<?= get_the_permalink() ?>">
                                <i class="fa <?= $network->icon ?> share-network-<?= $network->slug ?> display-4"></i>
                            </a>
                        </a>
                    <?php
                    }
                }
            }
            ?>
        </div>
        <div class="sharing-logs"></div>
    </div>
</div>