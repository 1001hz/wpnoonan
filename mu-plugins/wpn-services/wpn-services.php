<?php
define('WPNSERVICES_PLUGIN_DIR', dirname(__FILE__));
define('WPNSERVICES_PLUGIN_URL', plugin_dir_url( __FILE__ ));

include(WPNSERVICES_PLUGIN_DIR . '/inc/custom-post.php');
include(WPNSERVICES_PLUGIN_DIR . '/inc/metaboxes.php');
include(WPNSERVICES_PLUGIN_DIR . '/inc/shortcode.php');