(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){


        $('.bxslider').bxSlider({
            mode: 'fade',
            captions: true,
            pager: false,
            autoStart: true,
            auto: true,
            autoControls: true,
            autoControlsCombine: true
        });

    });

}(window.jQuery, window, document));