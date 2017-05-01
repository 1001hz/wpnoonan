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


        $('.slick--staff').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            prevArrow: '<i class="arrow left staff__arrow staff__arrow--prev"></i>',
            nextArrow: '<i class="arrow right staff__arrow staff__arrow--next"></i>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
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

        new WOW().init();

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