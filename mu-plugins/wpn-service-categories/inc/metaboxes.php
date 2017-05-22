<?php

add_filter( 'rwmb_meta_boxes', 'wpn_service_categories_mb' );

function wpn_service_categories_mb($meta_boxes) {


	$meta_boxes[] = array(
		'id'  => 'wpn_service_categories_mb',
        'title'  => 'Service Categories',
		'post_types' => 'wpn_service_categories',
		'priority'   => 'low',
		'fields' => array(
			array(
				'name' => 'Name',
				'id'    => 'wpn_service_categories_name',
				'type'  => 'text',
				'size' => 80
			),

		)
	);

    return $meta_boxes;
}


add_action('add_meta_boxes', 'wpn_service_categories_shortcode');

function wpn_service_categories_shortcode() {
    add_meta_box(
        'wpn_service_categories_shortcode',
        'Shortcode',
        'wpn_service_categories_shortcode_cb',
        'wpn_service_categories'
    );

}

function wpn_service_categories_shortcode_cb() {
	// Use nonce for verification
	wp_nonce_field(plugin_basename(__FILE__), 'dynamicMeta_noncename');
?>
    <div id="meta_inner">
        <span id="addMetabox" data-postid="<?php echo get_the_ID(); ?>">
			<pre style="background-color: #d9edf7; border: 1px solid #bce8f1; color: #31708f; border-radius: 4px; padding:15px;">[wpnStaff id=<?= get_the_ID(); ?>]</pre>
        </span>
    </div>
<?php
}
?>