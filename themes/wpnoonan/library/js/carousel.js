(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){


        $('.bxslider').bxSlider({
            mode: 'fade',
            controls: false,
            captions: true,
            pager: false,
            autoStart: true,
            auto: true,
            autoControls: true,
            autoControlsCombine: true
        });

    });

}(window.jQuery, window, document));