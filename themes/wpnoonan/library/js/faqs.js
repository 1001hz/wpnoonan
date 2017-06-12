(function($, window, document) {
    "use strict";


    /**
     * Dom Ready
     */
    $(document).ready(function(){

        $('.faqs__question').bind('click', function() {
            var target = $(this).data('accordion-for');
            $('.faqs__answer').removeClass('active');

            if($(this).hasClass('active')){

                $(this).removeClass('active');
                $(this).find('span').addClass('down');
                $(this).find('span').removeClass('up');
            }
            else {
                $('#'+target).addClass('active');
                $('.faqs__question').removeClass('active');
                $(this).addClass('active');
                $(this).find('span').addClass('up');
                $(this).find('span').removeClass('down');
            }


        });

    });

}(window.jQuery, window, document));