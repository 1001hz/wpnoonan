<?php
function wpn_faqs_constructor($param) {
    $args = array('post_type' => 'wpn_faqs', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
        $all_faqs = get_posts($args);
$code = '<div class="faqs">';

        foreach($all_faqs as $post) :
            $arrFaqMeta = get_post_custom( $post->ID );
            $question = $arrFaqMeta['wpn_faqs_question'][0];
            $answer = $arrFaqMeta['wpn_faqs_answer'][0];


            $code .= '<div class="faqs__question" data-accordion-for="' . $post->ID . '">';
                    $code .= '<p>' .$question . '<span class="arrow arrow--medium down"></span></p>';
                $code .= '</div>';

            $code .= '<div class="faqs__answer" id="'. $post->ID.'">';
                    $code .= $answer;
                $code .= '</div>';

		endforeach;

    $code .= '</div>';

    return $code;
}

add_shortcode( 'faqs', 'wpn_faqs_constructor' );