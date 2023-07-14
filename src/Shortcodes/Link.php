<?php

namespace Jeffreyvr\VimeoVideoLinks\Shortcodes;

class Link
{
    public function __construct()
    {
        add_shortcode('vimeo_video_link', [$this, 'render'], 10, 2);
    }

    public function render($atts, $content = null)
    {
        $atts = shortcode_atts([
            'id' => null,
            'quality' => null,
            'content' => $content ?? 'Download',
            'class' => ''
        ], $atts);

        if (! $atts['id']) {
            return;
        }

        return vimeo_video_links_view('link', $atts, true);
    }
}
