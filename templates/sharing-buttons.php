<div class="sharing-buttons-container">
    <div class="sharing-box">
        <p><strong><?php _e('Partager', 'mamarmite-sharing'); ?></strong></p>
        <div class="sharing-buttons">
            <?php
            if (isset(\Mamarmite\Sharing\Data\SocialsSharing::$sharing_networks)) {
                foreach (\Mamarmite\Sharing\Data\SocialsSharing::$sharing_networks as $id => $network) {
                    //$network->render();
                    $network->setupData();
                    ?>
                    <a href="#"
                       title="<?= __(" Partager sur", "mamarmite-sharing") . " " . $network->label; ?>"
                       rel="nofollow"
                       class="btn-share p-3"
                       data-socialtext="<?= $network->sharingTitle ?>"
                       data-media="<?= $network->slug ?>"
                       data-title="<?= $network->sharingTitle ?>"
                       data-thumb="<?= $network->sharingImage ?>"
                       data-url="<?= \get_the_permalink() ?>">
                        <i class="fa <?= $network->icon ?> share-network-<?= $network->slug ?> display-4"></i>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
        <div class="sharing-logs"></div>
    </div>
</div>
