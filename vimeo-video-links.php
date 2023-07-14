<?php
/**
 * Plugin Name: Vimeo Video Links
 * Description: Adds a shortcode to embed Vimeo videos with a link to the video file.
 * Plugin URI: https://vanrossum.dev
 * Version: 0.1.0
 * Author: Jeffrey van Rossum
 * Author URI: https://vanrossum.dev
 * Text Domain: vimeo-video-links
 */

use Jeffreyvr\VimeoVideoLinks\VimeoVideoLinks;

define('VIMEO_VIDEO_LINKS_PLUGIN_VERSION', '0.1.0');
define('VIMEO_VIDEO_LINKS_PLUGIN_FILE', __FILE__);
define('VIMEO_VIDEO_LINKS_PLUGIN_DIR', __DIR__);

if (! class_exists(VimeoVideoLinks::class)) {
    if (is_file(__DIR__.'/vendor/autoload_packages.php')) {
        require_once __DIR__.'/vendor/autoload_packages.php';
    }
}

function vimeo_video_links()
{
    return VimeoVideoLinks::instance();
}

vimeo_video_links();
