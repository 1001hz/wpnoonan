<?php
/**
 * The template part for displaying single staff
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$dat = date_create_from_format('Y-m-d H:i:s', $post->post_date);

		$arrUserMeta = get_post_custom( $post->ID );
		$staffId = $post->ID;
		$staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
		$staffLastName = $arrUserMeta['wpn_staff_lname'][0];
		$staffQualification = $arrUserMeta['wpn_staff_qualification'][0];
		$staffDescription = $arrUserMeta['wpn_staff_description'][0];
		$staffRole = $arrUserMeta['wpn_staff_role'][0];
		$staffBio = $arrUserMeta['wpn_staff_bio'][0];
		$staffContactMessage = $arrUserMeta['wpn_staff_contact'][0];
		$staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);
		$categories = wp_get_post_categories($post->ID);
	?>


	<div class="content content--bump-top">

		<div class="blog__about-cell">

			<div class="staff__card content__author">
				<div class="staff__card-image staff__image staff__image--round staff__image--medium">
					<div style="background-image: url(<?php echo $staffImg; ?>)"></div>
    			</div>
				<div class="staff__card-details staff__card-details--medium">
					<div class="staff__card-name staff__card-name--medium"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
					<div class="staff__card-qualification staff__card-qualification--medium"><?php echo $staffQualification; ?></div>
					<div class="staff__card-role staff__card-role--medium"><?php echo $staffRole; ?></div>
				</div>

			</div>

		</div>
	</div>


	<div class="content">
		<h2>About <?php echo $staffFirstName; ?></h2>
		<p><?php echo $staffDescription; ?></p>
	</div>

	<div class="content content--bump-bottom">
		<h2><?php echo $staffFirstName; ?>'s Full Bio</h2>
		<p><?php echo $staffBio; ?></p>
	</div>

	<div class="content-full-wrapper content-full-wrapper--brand">
		<div class="content content--bump-bottom content--thin">

			<p class="staff__cta wow fadeInUp"><?php echo $staffContactMessage; ?></p>
			<div class="content--center wow fadeInUp">
				<span class="btn btn--large btn--on-blue staff__book-with" data-staff-id="<?php echo $staffId; ?>">Book with <?php echo $staffFirstName; ?></span>
			</div>
		</div>
	</div>


	<?php
		$latest_posts = get_posts();
		$usersBlogs = array();
		foreach($latest_posts as $post) :

		$userData = get_userdata($post->post_author);


		$arrBlogMeta = get_post_custom( $post->ID );
		$blogAuthorID = $arrBlogMeta['wpn_blog_author'][0];

		if((int)$staffId === (int)$blogAuthorID) {
			array_push($usersBlogs, array("id" => $post->ID, "title" => $post->post_title, "date" => $post->post_date));
		}
		endforeach;

		if(count($usersBlogs) > 0) :
		?>


<div class="content content--bump-top">
	<h2><?php echo $staffFirstName; ?>'s Blog Posts</h2>
</div>

	<div class="content content--bump-bottom ">

	<?php
		foreach($usersBlogs as $blog) :
		$dat = date_create_from_format('Y-m-d H:i:s', $blog["date"]);
	?>

		<div class="blog__related-cell">
			<a href="<?php echo get_the_permalink($blog["id"]);?> ">
				<div class="wow fadeIn">
					<h3 class="content__title content__title--small"><?php echo $blog["title"] ?></h3>
					<div class="content__post-date">Published <?php echo date_format($dat, 'd-m-Y') ?></div>
				</div>
			</a>
		</div>

	<?php
		endforeach;
	?>

	</div>

	<?php
		endif;
	?>

</article><!-- #post-## -->
