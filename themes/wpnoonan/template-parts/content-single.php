<?php
/**
 * The template part for displaying single posts
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="content__header content__header--list">
		<?php
		$dat = date_create_from_format('Y-m-d H:i:s', $post->post_date);
		?>
		<div class="content wow fadeInUp">
			<h1 class="content__title"><?php echo the_title(); ?></h1>
			<div class="content__post-date">Published <?php echo date_format($dat, 'd-m-Y') ?></div>
		<div>

		<?php
		$arrBlogMeta = get_post_custom( $post->ID );
		$blogAuthorID = $arrBlogMeta['wpn_blog_author'][0];
		$arrUserMeta = get_post_custom( $blogAuthorID );
		$staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
		$staffLastName = $arrUserMeta['wpn_staff_lname'][0];
		$staffDescription = $arrUserMeta['wpn_staff_description'][0];
		$staffRole = $arrUserMeta['wpn_staff_role'][0];
		$staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);
		$categories = wp_get_post_categories($post->ID);
		?>

		<div class="staff__card content__author">
			<img class="staff__card-image" src="<?php echo $staffImg; ?>" alt="image of <?php echo $staffFirstName; ?>" />
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

	<div class="blog__about content">
		<h2>About the author</h2>
		<div class="blog__about-cell">

			<div class="staff__card content__author">
				<img class="staff__card-image" src="<?php echo $staffImg; ?>" alt="image of <?php echo $staffFirstName; ?>" />
				<div class="staff__card-details">
					<div class="staff__card-name"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
					<div class="staff__card-role"><?php echo $staffRole; ?></div>
				</div>
				<p class="staff__card-description">
					<?php echo $staffDescription; ?>
				</p>
			</div>

		</div>
		<div class="blog__about-cell">
			<a href="#" class="btn blog__book-btn">Book with <?php echo $staffFirstName; ?></a>
		</div>
	</div>


</article><!-- #post-## -->
