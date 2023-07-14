<?php

namespace Jeffreyvr\VimeoVideoLinks\Shortcodes;

class Button
{
    public function __construct()
    {
        add_shortcode('vimeo_video_button', [$this, 'render'], 10, 2);
    }

    public function render($atts, $content = null)
    {
        $atts = shortcode_atts([
            'id' => null,
            'quality' => null,
            'content' => $content ?? 'Download',
            'class' => 'button'
        ], $atts);

        if (! $atts['id']) {
            return;
        }

        return vimeo_video_links_view('button', $atts, true);
    }
}
