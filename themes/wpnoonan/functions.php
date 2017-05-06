<?php

require_once( 'resources/library/wpnoonan.php' );
function theme_go() {
    //add_action( 'init', 'wpnoonan_head_cleanup' ); 									// launching operation cleanup
    add_filter( 'the_generator', 'wpnoonan_rss_version' ); 							// remove WP version from RSS
    add_filter( 'wp_head', 'wpnoonan_remove_wp_widget_recent_comments_style', 1 ); 	// remove pesky injected css for recent comments widget
    add_action( 'wp_head', 'wpnoonan_remove_recent_comments_style', 1 ); 			// clean up comment styles in the head
    add_filter( 'gallery_style', 'wpnoonan_gallery_style' ); 						// clean up gallery output in wp
    add_action( 'wp_enqueue_scripts', 'wpnoonan_resources', 999 ); 					// enqueue base scripts and styles
    wpnoonan_theme_support(); 														// launching this stuff after theme setup
    //add_action( 'widgets_init', 'wpnoonan_register_sidebars' ); 						// adding sidebars
}

add_action( 'after_setup_theme', 'theme_go' );






add_filter( 'rwmb_meta_boxes', 'wpn_blog_mb' );

function wpn_blog_mb($meta_boxes) {

	$cpt = array();

	$query = new WP_Query(array(
        'post_type' => 'wpn_staff',
        'post_status' => 'publish',
        'posts_per_page' => -1
    ));


    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
		$arrMeta = get_post_custom( $post_id );
		$staffFirstName = $arrMeta['wpn_staff_fname'][0];
		$staffLastName = $arrMeta['wpn_staff_lname'][0];
        $cpt[get_the_ID()] = $staffFirstName . ' ' . $staffLastName;
    }

    wp_reset_query();

	$meta_boxes[] = array(
		'id'  => 'wpn_blog_mb',
        'title'  => 'Meta',
		'post_types' => 'post',
		'priority'   => 'low',
		'fields' => array(
			array(
				'name' => 'Author',
				'id'    => 'wpn_blog_author',
				'type'  => 'select',
				'options' => $cpt
			)
		)
	);

    return $meta_boxes;
}







add_filter( 'rwmb_meta_boxes', 'wpn_homepage_mb' );

function wpn_homepage_mb($meta_boxes) {

	$allPages = array();

	$query = new WP_Query(array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => -1
    ));


    while ($query->have_posts()) {
        $query->the_post();
        $pageId = get_the_ID();
        $pageTitle = get_the_title();
        $allPages[$pageId] = $pageTitle;
    }

    wp_reset_query();

	$meta_boxes[] = array(
		'id'  => 'wpn_homepage_mb',
        'title'  => 'Homepage',
		'post_types' => 'page',
		'priority'   => 'high',
		'fields' => array(
			array(
				'name' => 'Show on homepage',
				'id'    => 'wpn_homepage_show',
				'type'  => 'checkbox'
			),
			array(
				'name' => 'Homepage content',
				'id'    => 'wpn_homepage_content',
				'type'  => 'textarea'
			),
			array(
				'name' => 'Link to',
				'id'    => 'wpn_homepage_link_id',
				'type'  => 'select',
				'options' => $allPages
			),
			array(
				'name' => 'Custom link title',
				'id'    => 'wpn_homepage_custom_link_title',
				'type'  => 'text'
			),
		)
	);

    return $meta_boxes;
}