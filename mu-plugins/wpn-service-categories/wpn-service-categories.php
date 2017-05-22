<?php
define('WPNSERVICECATEGORIES_PLUGIN_DIR', dirname(__FILE__));
define('WPNSERVICECATEGORIES_PLUGIN_URL', plugin_dir_url( __FILE__ ));

include(WPNSERVICECATEGORIES_PLUGIN_DIR . '/inc/custom-post.php');
include(WPNSERVICECATEGORIES_PLUGIN_DIR . '/inc/metaboxes.php');
include(WPNSERVICECATEGORIES_PLUGIN_DIR . '/inc/shortcode.php');