<?php

add_filter( 'rwmb_meta_boxes', 'wpn_services_mb' );

function wpn_services_mb($meta_boxes) {

	$categories = array();

	$query = new WP_Query(array(
		'post_type' => 'wpn_service_cat',
		'post_status' => 'publish',
		'posts_per_page' => -1
	));


	while ($query->have_posts()) {
		$query->the_post();
		$pageId = get_the_ID();
		$pageTitle = get_the_title();
		$categories[$pageId] = $pageTitle;
	}


	$meta_boxes[] = array(
		'id'  => 'wpn_services_mb',
        'title'  => 'Services',
		'post_types' => 'wpn_services',
		'priority'   => 'low',
		'fields' => array(
			array(
				'name' => 'Name',
				'id'    => 'wpn_services_name',
				'type'  => 'text',
				'size' => 80
			),
			array(
				'name' => 'Content',
				'id'    => 'wpn_services_content',
				'type' => 'wysiwyg'
			),
			array(
				'name' => 'Category',
				'id'    => 'wpn_services_category',
				'type'  => 'select',
				'options' => $categories
			),
		)
	);

    return $meta_boxes;
}


add_action('add_meta_boxes', 'wpn_services_shortcode');

function wpn_services_shortcode() {
    add_meta_box(
        'wpn_services_shortcode',
        'Shortcode',
        'wpn_services_shortcode_cb',
        'wpn_services'
    );

}

function wpn_services_shortcode_cb() {
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