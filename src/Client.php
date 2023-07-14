<?php

namespace Jeffreyvr\VimeoVideoLinks;

use Vimeo\Vimeo;

class Client
{
    private static $instance;
    public $vimeo;
    public $client_id;
    public $client_secret;
    public $access_token;

    public static function instance()
    {
        if (! isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->client_id = vimeo_video_links_get_option('vimeo_api_client_id');
        $this->client_secret = vimeo_video_links_get_option('vimeo_api_client_secret');
        $this->access_token = vimeo_video_links_get_option('vimeo_api_access_token');

        if (! $this->client_id || ! $this->client_secret || ! $this->access_token) {
            throw new \Exception('Vimeo API credentials are missing.');
        }

        $this->vimeo = new Vimeo($this->client_id, $this->client_secret, $this->access_token);
    }

    public function video($id)
    {
        return $this->vimeo->request('/videos/' . $id);
    }

    /**
     * Get the download URL for a video.
     *
     * If no quality is specified, the highest quality will be returned.
     */
    public function videoDownloadUrl($id, $quality = null)
    {
        if ($url = get_transient('vimeo_video_links_' . $id . '_' . $quality)) {
            return $url;
        }

        $video = $this->video($id);
        $url = null;

        foreach ($video['body']['download'] as $download) {
            if ($download['quality'] === $quality) {
                return $download['link'];
            }

            $url = $download['link'];
        }

        set_transient('vimeo_video_links_' . $id . '_' . $quality, $url, DAY_IN_SECONDS);

        return $url;
    }
}
