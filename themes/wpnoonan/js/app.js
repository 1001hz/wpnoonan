(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){

        $('.modal__btn').bind('click', function() {
            var target = $(this).data('modal-for');
            $('#'+target).addClass('open');
            $('.modal__overlay').addClass('open');
            $('body').addClass('modal-open');
        });

        $('.modal__btn-close').bind('click', function() {
            console.log("test");
            var target = $(this).data('modal-close-for');
            $('#'+target).removeClass('open');
            $('.modal__overlay').removeClass('open');
            $('body').removeClass('modal-open');
        });

        $('.staff__book-with').bind('click', function() {
            var staffId = $(this).data('staff-id');

            if (typeof(Storage) !== "undefined") {
                localStorage.setItem("bookingStaffId", staffId);
            } else {
                // Sorry! No Web Storage support..
            }

            window.location.href = "/contact";
        });

        $('.booking').bind('click', function() {

            if (typeof(Storage) !== "undefined") {
                localStorage.setItem("booking", true);
            } else {
                // Sorry! No Web Storage support..
            }

            window.location.href = "/contact";
        });

        if($('#appointment').length) {
            if (typeof(Storage) !== "undefined") {

                var staffId = localStorage.getItem("bookingStaffId");
                var booking = localStorage.getItem("booking");

                if(staffId !== null && staffId !== "null") {
                    // staff ID is present so open modal form
                    $('.modal__btn').click();

                    var formExists = setInterval(function() {
                        if ($(".nf-form-cont").length) {

                            $('.preferred-physio').val(staffId).change();

                            clearInterval(formExists);
                        }
                    }, 100); // check every 100ms
                }

                if(booking !== null && booking !== "null") {
                    $('.modal__btn').click();
                }

                // reset id
                localStorage.setItem("bookingStaffId", null);
                localStorage.setItem("booking", null);

            } else {
                // Sorry! No Web Storage support..
            }
        }

    });

}(window.jQuery, window, document));
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

        $('.menu__sidebar-heading').bind('click', function() {
            var arrow = $('.menu__sidebar-heading .arrow');
            if(arrow.hasClass('up')){
                arrow.addClass('down');
                arrow.removeClass('up');
            }
            else {
                arrow.addClass('up');
                arrow.removeClass('down');
            }
            $('.menu__sidebar').toggleClass('open');
        });

    });

}(window.jQuery, window, document));
(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){



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
(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){

        $('.hp-services__item').bind('click', function() {
            var target = $(this).data('tab-for');
            $('.hp-services__panel-wrapper').removeClass('active');
            $('#'+target).addClass('active');

            $('.hp-services__item').removeClass('active');
            $(this).addClass('active');


        });

    });

}(window.jQuery, window, document));