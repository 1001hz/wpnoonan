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

        <?php
        $args = array('post_type' => 'wpn_service_cat', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
		$all_service_categories = get_posts($args);

		$args = array('post_type' => 'wpn_services', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
        $all_services = get_posts($args);



        foreach($all_service_categories as $category) :

        ?>
        <article>
        	<div>
        		<h2><?php echo $category->post_title; ?></h2>

        		<ul>
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
        </article>
		<?php endforeach; ?>


<?php get_footer(); ?>
