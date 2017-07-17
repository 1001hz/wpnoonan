(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){


        $('.bxslider').bxSlider({
            mode: 'fade',
            controls: true,
            nextText: '>',
            prevText: '<',
            captions: true,
            pager: true,
            autoStart: true,
            auto: true,
            autoControls: true,
            autoControlsCombine: true
        });

        //$('.bx-viewport').css('height', '');
        //$('.bx-viewport').height(0).css('min-height', '602px');
        //$('hero-carousel').find('.bxslider').reloadSlider()

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