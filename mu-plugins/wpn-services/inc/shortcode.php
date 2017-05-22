<?php
function wpn_services_constructor($param) {
//    extract(shortcode_atts(array(
//        'margin_top' => false,
//        'margin_bottom' => false
//    ), $param));

    $met = rwmb_meta( 'personal', $args = array(), $post_id = null );

    var_dump($met);

$staff .= "<h1>TEST</h1>";
return $staff;
    if(!empty($post)) {


        global $wp;
        $referrer = home_url(add_query_arg(array(),$wp->request));

        $staff .= "<div>".$post["name"]."</div>";

        return $staff;
    }
}

add_shortcode( 'wpnStaff', 'wpn_services_constructor' );