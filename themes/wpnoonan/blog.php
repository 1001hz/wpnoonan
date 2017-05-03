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

        $arrBlogMeta = get_post_custom( $post->ID );
        $blogAuthorID = $arrBlogMeta['wpn_blog_author'][0];

        $arrUserMeta = get_post_custom( $blogAuthorID );
		$staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
		$staffLastName = $arrUserMeta['wpn_staff_lname'][0];
		$staffDescription = $arrUserMeta['wpn_staff_description'][0];
		$staffRole = $arrUserMeta['wpn_staff_role'][0];
		$staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);
        ?>
        <header class="content__header content__header--list">
        <a href="<?php echo get_the_permalink($post->ID); ?>">
			<div class="content wow fadeInUp">
				<h1 class="content__title"><?php echo $post->post_title ?></h1>
				<div class="content__post-date">Published <?php echo date_format($dat, 'd-m-Y') ?></div>
			<div>


			<div class="staff__card content__author">
				<img class="staff__card-image" src="<?php echo $staffImg; ?>" alt="image of <?php echo $staffFirstName; ?>" />
				<div class="staff__card-details">
					<div class="staff__card-name"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
               		<div class="staff__card-role"><?php echo $staffRole; ?></div>
                </div>
			</div>

		</div>

		</div>
		</a>
		</header><!-- .entry-header -->
		<?php endforeach; ?>


<?php get_footer(); ?>
