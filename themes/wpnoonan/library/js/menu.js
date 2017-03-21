(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){

        $('.hamburger').bind('click', function() {
            $(this).toggleClass('open');
            $('.nav').toggleClass('open');
        });

    });

}(window.jQuery, window, document));