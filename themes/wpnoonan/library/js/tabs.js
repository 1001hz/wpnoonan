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