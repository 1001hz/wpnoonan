<?php

add_filter( 'rwmb_meta_boxes', 'wpn_faqs_mb' );

function wpn_faqs_mb($meta_boxes) {



	$meta_boxes[] = array(
		'id'  => 'wpn_faqs_mb',
        'title'  => 'FAQs',
		'post_types' => 'wpn_faqs',
		'priority'   => 'low',
		'fields' => array(
			array(
				'name' => 'Question',
				'id'    => 'wpn_faqs_question',
				'type'  => 'text',
				'size' => 80
			),

			array(
				'name' => 'Answer',
				'id'    => 'wpn_faqs_answer',
				'type' => 'wysiwyg'
			),

		)
	);

    return $meta_boxes;
}


add_action('add_meta_boxes', 'wpn_faqs_shortcode');

function wpn_faqs_shortcode() {
    add_meta_box(
        'wpn_faqs_shortcode',
        'Shortcode',
        'wpn_faqs_shortcode_cb',
        'wpn_faqs'
    );

}

function wpn_faqs_shortcode_cb() {
	// Use nonce for verification
	wp_nonce_field(plugin_basename(__FILE__), 'dynamicMeta_noncename');
?>
    <div id="meta_inner">
        <span id="addMetabox" data-postid="<?php echo get_the_ID(); ?>">
			<pre style="background-color: #d9edf7; border: 1px solid #bce8f1; color: #31708f; border-radius: 4px; padding:15px;">[faqs]</pre>
        </span>
    </div>
<?php
}
?>