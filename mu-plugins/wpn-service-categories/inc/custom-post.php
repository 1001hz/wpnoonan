<?php

add_action( 'init', 'wpn_service_cat' );

function wpn_service_cat() {
    $labels = array(
        'name' => _x('Service Categories', 'post type general name'),
        'singular_name' => _x('Service Category', 'post type singular name'),
        'add_new' => _x('Add a Service Category', 'page'),
        'add_new_item' => __('Add a Service Category'),
        'edit_item' => __('Edit'),
        'new_item' => __('New Service Categories'),
        'view_item' => __('View Service Categories'),
        'search_items' => __('Search Service Categories'),
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
        'menu_position' => 3,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-admin-links',
        'supports' => array('title')
    );

    register_post_type('wpn_service_cat', $args);
}

?>