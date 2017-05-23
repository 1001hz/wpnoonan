<?php

add_action( 'init', 'wpn_staff' );
function wpn_staff() {
    $labels = array(
        'name' => _x('Staff', 'post type general name'),
        'singular_name' => _x('Staff', 'post type singular name'),
        'add_new' => _x('Add a Staff', 'page'),
        'add_new_item' => __('Add a Staff'),
        'edit_item' => __('Edit'),
        'new_item' => __('New Staff'),
        'view_item' => __('View Staff'),
        'search_items' => __('Search Staff'),
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
        'rewrite' => array(
            'slug' => 'about/staff'
        ),
        'menu_position' => 5,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-admin-links',
        'supports' => array('title')
    );

    register_post_type('wpn_staff', $args);
}

?>