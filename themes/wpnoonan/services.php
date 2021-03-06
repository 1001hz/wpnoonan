<?php
/**
 * Template Name: Services listing
 * The services listing
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>

	<div class="content">
        <h1 class="content__heading">Our Services</h1>
    </div>


	<div class="content content--flat-top content--mobile">
		<select class="service__select">
			<option value="">--Select Category--</option>
			<?php
				$args = array('post_type' => 'wpn_service_cat', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
        		$full_all_service_categories = get_posts($args);
				foreach($full_all_service_categories as $category) :
			?>
			<option value="<?php echo $category->post_name; ?>"><?php echo $category->post_title; ?></option>
			<?php endforeach; ?>
		</select>
	</div>

    <div>
        <?php
        $args = array('post_type' => 'wpn_service_cat', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
		$all_service_categories = get_posts($args);

		$args = array('post_type' => 'wpn_services', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
        $all_services = get_posts($args);



        foreach($all_service_categories as $category) :
        $arrCatMeta = get_post_custom( $category->ID );
			$categoryImg = wp_get_attachment_url($arrCatMeta['wpn_service_categories_image'][0]);
			$categoryDesc = $arrCatMeta['wpn_service_categories_desc'][0];
        ?>
        <article class="service__panel-wrapper" id="<?php echo $category->post_name; ?>">
        	<div class="service__heading-wrapper">
				<div class="content service__heading">
					<h2 class="service__panel-title"><?php echo $category->post_title; ?></h2>
				</div>
        	</div>
        	<div class="service__content-panel">
				<div class="content service__content">
					<div class="service__panel-image" style="background-image: url(<?php echo $categoryImg; ?>)">
					</div>
					<div class="service__panel-content">

					<p> <?php echo $categoryDesc; ?> </p>
					<ul class="tick-list">
						<?php
						foreach($all_services as $post):

							$arrServiceMeta = get_post_custom( $post->ID );
							$serviceName = $arrServiceMeta['wpn_services_name'][0];
							$serviceCategory = $arrServiceMeta['wpn_services_category'][0];

							if((int)$category->ID === (int)$serviceCategory) :
						?>
						<li><?php echo $serviceName; ?></li>
						<?php
							endif;
							endforeach;
						?>
					</ul>
					</div>
				</div>
        	</div>
        </article>
		<?php endforeach; ?>

	</div>

<?php get_footer(); ?>
