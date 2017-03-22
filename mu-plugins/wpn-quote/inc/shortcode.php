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

        $quote = '<div class="quote '.$margin_top.' '.$margin_bottom.'">';
        $quote .= '<p class="h3">'.$param['content'].'</p>';
        $quote .= '<p class="h6">'.$param['author'].'</p>';
        $quote .= '</div>';

        return $quote;
    }
}

add_shortcode( 'quote', 'wpn_quotes_constructor' );

?>
