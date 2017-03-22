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