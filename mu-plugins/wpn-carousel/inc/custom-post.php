<?php

add_action( 'init', 'wpn_carousel' );
function wpn_carousel() {
    $labels = array(
        'name' => _x('Carousel', 'post type general name'),
        'singular_name' => _x('Carousel', 'post type singular name'),
        'add_new' => _x('Add a carousel', 'page'),
        'add_new_item' => __('Add a carousel'),
        'edit_item' => __('Edit'),
        'new_item' => __('New carousel'),
        'view_item' => __('View carousel'),
        'search_items' => __('Search carousel'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
        'menu_position' => 5,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-admin-links',
        'supports' => array('title')
    );

    register_post_type('wpn_carousel', $args);
}

?>