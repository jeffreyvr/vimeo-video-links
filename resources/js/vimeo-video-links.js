jQuery(function($) {
    $('.vimeo-video-link').on('click', function(e) {
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            method: 'POST',
            url: vimeo_video_links.ajax_url,
            data: {
                action: 'vimeo_video_links_get_download_url',
                id: $this.data('id'),
                quality: $this.data('quality'),
                nonce: $this.data('nonce')
            },
            beforeSend: function() {
                $this.attr('disabled', true);
                $this.find('.vimeo-video-link-spinner').show();
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.data.url;
                } else {
                    alert('Error: ' + response.data.message);
                }

                $this.attr('disabled', false);

                $this.find('.vimeo-video-link-spinner').hide();
            }
        });
    });
})
