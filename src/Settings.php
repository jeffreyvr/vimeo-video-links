<?php

namespace Jeffreyvr\VimeoVideoLinks;

use Jeffreyvr\WPSettings\WPSettings;

class Settings
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'register']);
    }

    public function register()
    {
        $settings = new WPSettings(__('Vimeo Video Links', 'vimeo-video-links'));

        $settings->set_menu_parent_slug('options-general.php');

        $tab = $settings->add_tab(__('General', 'vimeo-video-links'));

        $section = $tab->add_section('API');

        $section->add_option('text', [
            'name' => 'vimeo_api_client_id',
            'label' => __('Client ID', 'vimeo-video-links')
        ]);

        $section->add_option('text', [
            'name' => 'vimeo_api_client_secret',
            'label' => __('Client Secret', 'vimeo-video-links')
        ]);

        $section->add_option('text', [
            'name' => 'vimeo_api_access_token',
            'label' => __('Access token', 'vimeo-video-links')
        ]);

        $settings->make();
    }
}
