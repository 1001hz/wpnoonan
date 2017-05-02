<?php

/*********************
REGISTER CUSTOM SHORTCODE.
 *********************/

// @Model : [quote content="..." author="..."]

function wpn_quotes_constructor( $param ) {
    extract(shortcode_atts(array(
        'margin_top' => false,
        'margin_bottom' => false
    ), $param));

    if(!empty($param)) {
        if($margin_top !== false) {
            $margin_top = 'bump-top';
        } else {
            $margin_top = '';
        }
        if($margin_bottom !== false) {
            $margin_bottom = 'bump-bottom';
        } else {
            $margin_bottom = '';
        }

        $quote = '<div class="quote  wow fadeInUp '.$margin_top.' '.$margin_bottom.'">';
        $quote .= '<p class="quote__copy">"'.$param['content'].'"</p>';
        $quote .= '<p class="quote__author"> - '.$param['author'].'</p>';
        $quote .= '</div>';

        return $quote;
    }
}

add_shortcode( 'quote', 'wpn_quotes_constructor' );

?>
