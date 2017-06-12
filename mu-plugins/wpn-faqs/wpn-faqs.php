<?php
define('WPFAQS_PLUGIN_DIR', dirname(__FILE__));
define('WPFAQS_PLUGIN_URL', plugin_dir_url( __FILE__ ));

include(WPFAQS_PLUGIN_DIR . '/inc/custom-post.php');
include(WPFAQS_PLUGIN_DIR . '/inc/metaboxes.php');
include(WPFAQS_PLUGIN_DIR . '/inc/shortcode.php');