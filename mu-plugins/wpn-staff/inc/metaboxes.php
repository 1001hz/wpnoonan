<?php

add_filter( 'rwmb_meta_boxes', 'wpn_staff_mb' );

function wpn_staff_mb($meta_boxes) {



	$meta_boxes[] = array(
		'id'  => 'wpn_staff_mb',
        'title'  => 'Staff',
		'post_types' => 'wpn_staff',
		'priority'   => 'low',
		'fields' => array(
			array(
				'name' => 'First Name',
				'id'    => 'wpn_staff_fname',
				'type'  => 'text',
				'size' => 80
			),
			array(
				'name' => 'Last Name',
				'id'    => 'wpn_staff_lname',
				'type'  => 'text',
				'size' => 80
			),
			array(
				'name' => 'Description',
				'id'    => 'wpn_staff_description',
				'type' => 'text',
				'size' => 80
			),
			array(
				'name'             => __( 'Image Upload', 'image' ),
				'id'               => "wpn_staff_image",
				'type'             => 'plupload_image',
				//'desc'  => __( 'Upload a square/circluar image image only! This automatically becomes circular and has a grey border applied.', 'wptricks' ),
				'max_file_uploads' => 1,
			),
		)
	);

    return $meta_boxes;
}


add_action('add_meta_boxes', 'wpn_staff_shortcode');

function wpn_staff_shortcode() {
    add_meta_box(
        'wpn_staff_shortcode',
        'Shortcode',
        'wpn_staff_shortcode_cb',
        'wpn_staff'
    );

}

function wpn_staff_shortcode_cb() {
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