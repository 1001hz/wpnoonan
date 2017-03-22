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
(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){


        $('.slick').slick({
            dots: true,
            infinite: true,
            speed: 700,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows:false,
            slidesToShow: 1,
            slidesToScroll: 1
        });

    });

}(window.jQuery, window, document));