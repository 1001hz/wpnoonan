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

        $('.service__select').change(function(){
            var val = $(this).val();
            location.href = "#"+val;
        });

    });

}(window.jQuery, window, document));