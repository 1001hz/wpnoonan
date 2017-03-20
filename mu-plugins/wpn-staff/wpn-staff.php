<?php
define('WPSTAFF_PLUGIN_DIR', dirname(__FILE__));
define('WPSTAFF_PLUGIN_URL', plugin_dir_url( __FILE__ ));

include(WPSTAFF_PLUGIN_DIR . '/inc/custom-post.php');
include(WPSTAFF_PLUGIN_DIR . '/inc/metaboxes.php');
include(WPSTAFF_PLUGIN_DIR . '/inc/shortcode.php');