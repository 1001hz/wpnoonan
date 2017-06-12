(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){
        setTimeout(function(){
            var body = $('body');
            body.addClass('loaded');
            body.removeClass('loading');
        }, 1000);
    });

}(window.jQuery, window, document));