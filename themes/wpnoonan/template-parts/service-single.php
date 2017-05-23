<?php
/**
 * The template part for displaying single service
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$dat = date_create_from_format('Y-m-d H:i:s', $post->post_date);

		$arrServiceMeta = get_post_custom( $post->ID );
		$serviceId = $post->ID;
		$name = $arrServiceMeta['wpn_services_name'][0];
		$content = $arrServiceMeta['wpn_services_content'][0];
		$categoryId = $arrServiceMeta['wpn_services_category'][0];
		$category = get_post( $categoryId );
	?>




	<div class="content content__copy">
		<h1 class="content__heading"><?php echo $name; ?></h1>
		<div class="breadcrumb">
			<a href="/our-services">All Services</a>
			<span class="arrow right breadcrumb__arrow"></span>
			<?php echo $category->post_title; ?>
		 	<span class="arrow right breadcrumb__arrow"></span>
		 	<?php echo $name; ?>
		</div>
		<p><?php echo $content; ?></p>
	</div>



</article><!-- #post-## -->
