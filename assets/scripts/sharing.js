(function($) {
    'use strict';

    /**
     * Social share for posts
     */
    $.fn.sharing = function(options) {
        var settings = $.extend({
            // These are the defaults.datetarget
            media: '',
            title: '',
            url: '',
            thumb: '',
            windowtitle: '',
            socialtext: '',
            windowsettings: 'height=280,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0',
        }, options);

        //prevent the parent from doing default a href behavior.
        return this.each(function() {

            if ($(this).data('media') === 'natif' && (typeof navigator.share === 'undefined' || !navigator.share)) {
                $(this).hide();
            }

            $(this).click(function(e) {
                e.preventDefault();

                settings.media 			= $(this).data('media');
                settings.mediaTitle 	= 'Partager sur '+settings.media;
                settings.url 			= $(this).data('url');
                settings.title 			= $(this).data('title');
                settings.socialtext 	= $(this).data('socialtext');
                settings.thumb 			= $(this).data('thumb');

                var $logs = $('.sharing-logs');

                if(settings.media === 'natif')
                {
                    if ((typeof navigator.share !== 'undefined' || navigator.share)) {
                        const shareData = {
                            title: settings.title,
                            text: settings.socialtext,
                            url: settings.url
                        };
                        $.fn.shareViaNavigator(shareData, $logs);
                    }
                }
                else
                {
                    var targetUrl = $.fn.getShareableUrl(settings);
                    window.open(targetUrl, settings.mediaTitle, settings.windowsettings);
                }
            });
        });
    };

    $.fn.getShareableUrl = function(params) {
        switch (params.media) {
            case 'facebook':
            case 'Facebook':
                return 'https://www.facebook.com/sharer/sharer.php?u=' + params.url + '&quote=' + params.title;

            case 'twitter':
            case 'Twitter':
                return 'http://twitter.com/intent/tweet?text='+params.title+' '+params.url;

            case 'pinterest':
            case 'Pinterest':
                return 'http://pinterest.com/pin/create/button/?url='+params.url+'&media='+params.thumb+'&description='+params.title;

            case 'natif':
                return '';

            default:
            case 'email':
            case 'Email':
            case 'Courriel':
                return 'mailto:?subject='+params.title+'&body='+params.socialtext+' '+params.url;
        }
    };

    $.fn.shareViaNavigator = function(shareData, $log) {

        try {
            navigator.share(shareData);
            $log.html('Votre navigateur a bien reçu la requête de partage.');
        } catch(err) {
            $log.html('Une erreur est survenue, cette fonction n,est pas accessible dans tous les navigateurs. (' + err + ')');
        }
    }

    //send to
    $.fn.dispatchToGA = function(name, action) {
        if ( typeof __gaTracker !== "undefined" ) {
            __gaTracker( 'send', 'social',
                name,
                action,
                document.querySelector( "link[rel='canonical']" ).getAttribute( "href" ) );
        }
    };

})(jQuery);
