<a
    href="#"
    data-id="<?php echo $id; ?>"
    data-quality="<?php echo $quality; ?>"
    data-nonce="<?php echo wp_create_nonce('vimeo_video_links_get_download_url_nonce'); ?>"
    class="vimeo-video-link <?php echo $class; ?>"
    style="display: inline-flex; gap: 4px; align-items: center;">
    <?php echo $content; ?>

    <img src="<?php echo admin_url('images/wpspin_light.gif'); ?>" class="vimeo-video-link-spinner" style="display: none;">
</a>
