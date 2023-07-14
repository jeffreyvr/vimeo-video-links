<?php

namespace Jeffreyvr\VimeoVideoLinks;

class VimeoVideoLinks
{
    private static $instance;

    public static function instance()
    {
        if (! isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->boot();

        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue()
    {
        wp_enqueue_script('vimeo-video-links', plugin_dir_url(VIMEO_VIDEO_LINKS_PLUGIN_FILE) . 'assets/js/vimeo-video-links.js', ['jquery'], '0.1.0');
        wp_localize_script('vimeo-video-links', 'vimeo_video_links', ['ajax_url' => admin_url('admin-ajax.php')]);
    }

    public function boot()
    {
        $bootables = [
            Settings::class,
            Shortcodes\Url::class,
            Shortcodes\Button::class,
            Actions\GetDownloadUrl::class,
        ];

        foreach ($bootables as $bootable) {
            new $bootable;
        }
    }
}
