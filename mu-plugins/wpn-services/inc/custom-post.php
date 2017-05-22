<?php

add_action( 'init', 'wpn_services' );
function wpn_services() {
    $labels = array(
        'name' => _x('Services', 'post type general name'),
        'singular_name' => _x('Services', 'post type singular name'),
        'add_new' => _x('Add a Services', 'page'),
        'add_new_item' => __('Add a Services'),
        'edit_item' => __('Edit'),
        'new_item' => __('New Services'),
        'view_item' => __('View Services'),
        'search_items' => __('Search Services'),
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
        'menu_position' => 4,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-admin-links',
        'supports' => array('title')
    );

    register_post_type('wpn_services', $args);
}

?>