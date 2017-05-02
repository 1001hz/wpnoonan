<?php
/**
 * Template Name: Blog listing
 * The blog listing
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>


        <?php
        $latest_posts = get_posts();


        foreach($latest_posts as $post) :
        $userData = get_userdata($post->post_author);
        $dat = date_create_from_format('Y-m-d H:i:s', $post->post_date);
        ?>
        <header class="content__header content__header--list">
        <a href="<?php echo get_the_permalink($post->ID); ?>">
		<div class="content wow fadeInUp">
		<h1 class="content__title"><?php echo $post->post_title ?></h1>

		<div>

			<div class="staff__image staff__image--round staff__image--small staff__image--border">
				<?php echo get_avatar($post->post_author); ?>
			</div>
			<p class="staff__author"><i>by</i> <b><?php echo $userData->data->display_name ?></b></p>
			<p class="staff__post-date"><?php echo date_format($dat, 'd-m-Y') ?></p>
		</div>

		</div>
		</a>
		</header><!-- .entry-header -->
		<?php endforeach; ?>


<?php get_footer(); ?>
