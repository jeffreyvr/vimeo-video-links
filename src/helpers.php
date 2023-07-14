<?php

if (!function_exists('vimeo_video_links_get_option')) {
    function vimeo_video_links_get_option($key, $fallback = null)
    {
        $options = get_option('vimeo_video_links', []);

        return $options[$key] ?? $fallback;
    }
}

if(! function_exists('vimeo_video_links_view')) {
    function vimeo_video_links_view($view, $data = [], $buffer = false)
    {
        $file = plugin_dir_path(VIMEO_VIDEO_LINKS_PLUGIN_FILE) . 'views/' . $view . '.php';

        if (! file_exists($file)) {
            return;
        }

        extract($data);

        if($buffer) {
            ob_start();
        }

        include $file;

        if($buffer) {
            return ob_get_clean();
        }
    }
}
