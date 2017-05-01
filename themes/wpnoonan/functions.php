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


add_filter( 'rwmb_meta_boxes', 'wpn_homepage_mb' );

function wpn_homepage_mb($meta_boxes) {

	$meta_boxes[] = array(
		'id'  => 'wpn_homepage_mb',
        'title'  => 'Homepage',
		'post_types' => 'page',
		'priority'   => 'low',
		'default_hidden'  => true,
		'fields' => array(
			array(
				'name' => 'About Title',
				'id'    => 'wpn_hp_about_title',
				'type'  => 'text',
				'size' => 80
			),
			array(
				'name'             => __( 'Image Upload', 'image' ),
				'id'               => "wpn_hp_about_image",
				'sort_clone'	   => true,
				'type'             => 'plupload_image',
				'max_file_uploads' => 1
			),
		)
	);

    return $meta_boxes;
}