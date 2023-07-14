<?php

namespace Jeffreyvr\VimeoVideoLinks\Shortcodes;

use Jeffreyvr\VimeoVideoLinks\Client;

class Url
{
    public function __construct()
    {
        add_shortcode('vimeo_video_url', [$this, 'render']);
    }

    public function render($atts)
    {
        $atts = shortcode_atts([
            'id' => null,
            'quality' => null
        ], $atts);

        $id = $atts['id'];
        $quality = $atts['quality'];

        if (! $id) {
            return;
        }

        $client = Client::instance();

        return $client->videoDownloadUrl($id, $quality);
    }
}
