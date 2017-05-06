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