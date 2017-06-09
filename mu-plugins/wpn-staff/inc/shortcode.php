<?php
function wpn_staff_constructor($param) {
    $args = array('post_type' => 'wpn_staff', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
        $all_staff = get_posts($args);
$code = '<div class="staff__wrapper">';

        foreach($all_staff as $post) :
            $arrUserMeta = get_post_custom( $post->ID );
            $staffLink = get_post_permalink($post->ID);
            $staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
            $staffLastName = $arrUserMeta['wpn_staff_lname'][0];
            $staffDescription = $arrUserMeta['wpn_staff_description'][0];
            $staffRole = $arrUserMeta['wpn_staff_role'][0];
            $staffRole2 = $arrUserMeta['wpn_staff_role2'][0];
            $staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);

            $code .= '<a href="'.$staffLink.'" class="staff__card staff__card-item">';


            $code .= '<div class="staff__card-image staff__image staff__image--round staff__image--small">';
                    $code .= '<div style="background-image: url('.$staffImg.'"></div>';
                $code .= '</div>';

            $code .= '<div class="staff__card-details">';
                    $code .= '<div class="staff__card-name">'.$staffFirstName .' '.$staffLastName .'</div>';
                    $code .= '<div class="staff__card-role">'. $staffRole.'<br />'.$staffRole2.'</div>';
                $code .= '</div>';
                $code .= '<div class="staff__card-description">';
                    $code .= '<p>'.$staffDescription.'</p>';
                $code .= '</div>';


        $code .= '</a>';

		endforeach;

    $code .= '</div>';

    return $code;
}

add_shortcode( 'staff', 'wpn_staff_constructor' );