<?php

function conduct_head_cleanup() {
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'conduct_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'conduct_remove_wp_ver_css_js', 9999 );

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

}

/*********************
SCRIPTS & ENQUEUEING
*********************/

function wpnoonan_resources() {
    global $wp_styles;

    // comment reply script for threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    // register stylesheet
    wp_register_style( 'normalize-css', get_stylesheet_directory_uri() . '/css/normalize.css', array(), '', 'all' );

    wp_register_style( 'wpnoonan-css', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
    //wp_register_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css', array(), '', 'all' );
	//wp_register_style( 'bxslider-css', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.css', array(), '', 'all' );
	//wp_register_style( 'slick-css', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css', array(), '', 'all' );

	wp_register_style( 'animate-css', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), '', 'all' );
	wp_register_style( 'bxslider-css', get_stylesheet_directory_uri() . '/css/jquery.bxslider.min.css', array(), '', 'all' );
	wp_register_style( 'slick-css', get_stylesheet_directory_uri() . '/css/slick.css', array(), '', 'all' );



    // register javascript files in the footer
	wp_deregister_script( 'jquery' );
	//wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', false, '2.2.0', true);
	//wp_register_script('jquery-scrollTo', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.0/jquery.scrollTo.min.js', false, '2.1.0', true);
	//wp_register_script('wow-js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', false, '1.1.2', true);
	//wp_register_script('bxslider-js', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js', false, '1.0.0', true);
	//wp_register_script('slick-js', 'https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', false, '1.6.0', true);


    wp_register_script( 'wpnoonan-js', get_stylesheet_directory_uri() . '/js/app.js', false, '', true );

    wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', false, '', true );
    wp_register_script( 'wow-js', get_stylesheet_directory_uri() . '/js/wow.min.js', array('jquery'), '', true );
    wp_register_script( 'bxslider-js', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '', true );
    wp_register_script( 'scrollTo-js', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array('jquery'), '', true );
    wp_register_script( 'slick-js', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), '', true );

	wp_enqueue_style( 'wpnoonan-css' );
	wp_enqueue_style( 'animate-css' );
	wp_enqueue_style( 'bxslider-css' );
	wp_enqueue_style( 'slick-css' );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'jquery-scrollTo');
	wp_enqueue_script( 'wow-js');
	wp_enqueue_script( 'bxslider-js');
	wp_enqueue_script( 'slick-js');
	wp_enqueue_script( 'wpnoonan-js' );
}

/*********************
THEME SUPPORT
*********************/

function wpnoonan_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

    // sizes handled in functions.php
    add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'main-nav' => esc_html__( 'The Main Menu', 'main-nav' ),
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	));
}

// remove WP version from RSS
function wpnoonan_rss_version() { return ''; }

// remove injected CSS for recent comments widget
function wpnoonan_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}

// remove injected CSS from recent comments widget
function wpnoonan_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

// remove injected CSS from gallery
function wpnoonan_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}

// remove WP version from scripts
function wpnoonan_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}