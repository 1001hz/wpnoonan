<?php

add_filter( 'rwmb_meta_boxes', 'wpn_carousel_mb' );

function wpn_carousel_mb($meta_boxes) {

	$meta_boxes[] = array(
		'id'  => 'wpn_carousel_mb',
        'title'  => 'Carousel',
		'post_types' => 'wpn_carousel',
		'priority'   => 'low',
		'fields' => array(
			array(
				'name' => 'Title',
				'id'    => 'wpn_carousel_title',
				'type'  => 'text',
				'size' => 80
			),
			array(
				'name'             => __( 'Image Upload', 'image' ),
				'id'               => "wpn_carousel_image",
				'sort_clone'	   => true,
				'type'             => 'plupload_image',
				'clone' => true,
				//'desc'  => __( 'Upload a square/circluar image image only! This automatically becomes circular and has a grey border applied.', 'wptricks' ),
				'max_file_uploads' => 1,
			),
		)
	);

    return $meta_boxes;
}

