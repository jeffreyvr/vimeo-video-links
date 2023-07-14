# Vimeo Video Links

Simple WordPress plugin that provides you with shortcodes to get a download url of a Vimeo Video.

## Vimeo API

To allow for the plugin to interact with Vimeo's API, you must fill in the credentials in Settings --> Vimeo Video Links.

For more information on getting these credentials, see: https://developer.vimeo.com/api/guides/start#register-your-app

## Shortcodes

For both shortcodes, the quality attribute is optional.

### Button

`[vimeo_video_button id="vimeo_video_id" quality="hd"]Download the video[/vimeo_video_button]`

If you don't specify a text, it will fallback to 'Download'.

The button shortcodes, fetches the Vimeo download url through an ajax request. This is to prevent the Vimeo URL, which is valid for 24 hours, to be cached by a caching plugin - causing invalid url's.

### URL

`[vimeo_video_url id="vimeo_video_id" quality="hd"]`

## Contributors
* [Jeffrey van Rossum](https://github.com/jeffreyvr)
* [All contributors](https://github.com/jeffreyvr/vimeo-video-links/graphs/contributors)

## License
Please see the [License File](/LICENSE) for more information.
