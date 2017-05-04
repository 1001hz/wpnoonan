<?php
/**
 * The template part for displaying single posts
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="content__header blog__header">
		<?php
		$dat = date_create_from_format('Y-m-d H:i:s', $post->post_date);
		?>
		<div class="content wow fadeIn">
			<h1 class="content__title"><?php echo the_title(); ?></h1>
			<div class="content__post-date">Published <?php echo date_format($dat, 'd-m-Y') ?></div>
		<div>

		<?php
		$arrBlogMeta = get_post_custom( $post->ID );
		$blogAuthorID = $arrBlogMeta['wpn_blog_author'][0];
		$staffLink = get_post_permalink($blogAuthorID);
		$arrUserMeta = get_post_custom( $blogAuthorID );
		$staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
		$staffLastName = $arrUserMeta['wpn_staff_lname'][0];
		$staffDescription = $arrUserMeta['wpn_staff_description'][0];
		$staffRole = $arrUserMeta['wpn_staff_role'][0];
		$staffContactMessage = $arrUserMeta['wpn_staff_contact'][0];
		$staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);
		$categories = wp_get_post_categories($post->ID);
		?>

		<div class="staff__card content__author wow fadeInUp">
			<div class="staff__card-image staff__image staff__image--round staff__image--small">
				<div style="background-image: url(<?php echo $staffImg; ?>)"></div>
			</div>
			<div class="staff__card-details">
				<div class="staff__card-name"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
				<div class="staff__card-role"><?php echo $staffRole; ?></div>
			</div>
		</div>

	</div>

	</div>
	</header><!-- .entry-header -->



	<div class="content content__copy">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->

	<div class="content">
		<?php foreach($categories as $c):
			$cat = get_category( $c );
		?>
			<span class="blog__cat-btn"><?php echo $cat->name ?></span>
		<?php endforeach; ?>
	</div>

<div class="content-full-wrapper content-full-wrapper--grey">
	<div class="blog__about content">
		<h2>About the author</h2>
		<div class="blog__about-cell">

			<div class="staff__card content__author">
				<a href="<?php echo $staffLink; ?>">
					<div class="staff__card-image staff__image staff__image--round staff__image--small">
						<div style="background-image: url(<?php echo $staffImg; ?>)"></div>
					</div>
					<div class="staff__card-details">
						<div class="staff__card-name"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
						<div class="staff__card-role"><?php echo $staffRole; ?></div>
					</div>
				</a>
				<p class="staff__card-description">
					<?php echo $staffDescription; ?>
				</p>
			</div>

		</div>



	</div>
</div>

<div class="content-full-wrapper content-full-wrapper--brand">
			<div class="content content--bump-bottom content--thin">

				<p class="staff__cta wow fadeInUp"><?php echo $staffContactMessage; ?></p>
				<div class="content--center wow fadeInUp">
					<a href="#" class="staff__book-btn">Book with <?php echo $staffFirstName; ?></a>
				</div>
			</div>
		</div>
</article><!-- #post-## -->
