<?php

add_action( 'init', 'wpn_faqs' );
function wpn_faqs() {
    $labels = array(
        'name' => _x('FAQs', 'post type general name'),
        'singular_name' => _x('Faqs', 'post type singular name'),
        'add_new' => _x('Add a Faqs', 'page'),
        'add_new_item' => __('Add a Faqs'),
        'edit_item' => __('Edit'),
        'new_item' => __('New Faqs'),
        'view_item' => __('View Faqs'),
        'search_items' => __('Search Faqs'),
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

        'menu_position' => 5,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-admin-links',
        'supports' => array('title')
    );

    register_post_type('wpn_faqs', $args);
}

?>