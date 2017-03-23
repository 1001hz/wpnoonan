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
(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){

        new WOW({offset: 100}).init();

        $('.scroll-arrow--about').bind('click', function(){
            $(window).scrollTo('.about', 300);
        });

        $('.scroll-arrow--services').bind('click', function(){
            $(window).scrollTo('.services', 300);
        });

        $('.scroll-arrow--team').bind('click', function(){
            $(window).scrollTo('.team', 300);
        });

        $('.scroll-arrow--contact').bind('click', function(){
            $(window).scrollTo('.contact', 300);
        });

    });

}(window.jQuery, window, document));