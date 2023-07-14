<?php

namespace Jeffreyvr\VimeoVideoLinks\Actions;

use Jeffreyvr\VimeoVideoLinks\Client;

class GetDownloadUrl
{
    public function __construct()
    {
        add_action('wp_ajax_vimeo_video_links_get_download_url', [$this, 'handle']);
        add_action('wp_ajax_nopriv_vimeo_video_links_get_download_url', [$this, 'handle']);
    }

    public function handle()
    {
        if(! wp_verify_nonce($_POST['nonce'], 'vimeo_video_links_get_download_url_nonce')) {
            wp_send_json_error(['message' => 'Invalid nonce.']);
        }

        if(! isset($_POST['id'])) {
            wp_send_json_error(['message' => 'Video ID not set.']);
        }

        $id = $_POST['id'];
        $quality = $_POST['quality'] ?? null;

        $client = Client::instance();

        $url = $client->videoDownloadUrl($id, $quality);

        if (! $url) {
            wp_send_json_error(['message' => 'Video download URL not found.']);
        }

        wp_send_json_success(['url' => $url]);
    }
}
