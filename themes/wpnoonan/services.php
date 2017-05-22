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



    <div class="content content--bump-top content--bump-bottom service">
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
        <article class="service__panel-wrapper">
        	<div>
        		<div class="service__panel-image" style="background-image: url(<?php echo $categoryImg; ?>)">
        			<div class="service__panel-desc">
        				<?php echo $categoryDesc; ?>
        			</div>
        		</div>
        		<h2 class="service__panel-title"><?php echo $category->post_title; ?></h2>

        		<ul class="service__panel-items">
        			<?php
        			foreach($all_services as $post):

        				$arrServiceMeta = get_post_custom( $post->ID );
                    	$serviceName = $arrServiceMeta['wpn_services_name'][0];
						$serviceCategory = $arrServiceMeta['wpn_services_category'][0];

						if((int)$category->ID === (int)$serviceCategory) :
        			?>
        			<li><a href="<?php echo get_permalink($post->ID); ?>" class="btn "><?php echo $serviceName; ?></a></li>
        			<?php
        				endif;
	        			endforeach;
					?>
        		</ul>
        	</div>
        </article>
		<?php endforeach; ?>

	</div>

<?php get_footer(); ?>
