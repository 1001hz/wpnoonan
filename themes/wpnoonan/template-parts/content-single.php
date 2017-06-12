<?php
/**
 * The template part for displaying single posts
 *
 */
?>
<?php
	$featuredImageUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="content__header blog__header" <?php if($featuredImageUrl !== ''): ?> style="background-image: url(<?php echo $featuredImageUrl; ?>);" <?php endif; ?>>
		<div class="blog__watermark">

			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/WLP_Finished Art_Circle Device_CMYK-01.png" alt="logo" />
		</div>
		<?php
			$dat = date_create_from_format('Y-m-d H:i:s', $post->post_date);
		?>
		<img src="<?php echo $url ?>" />
		<div class="content wow fadeIn blog__heading-content">
			<h1 class="content__title content__title--white blog__title"><?php echo the_title(); ?></h1>
			<div class="content__post-date content__post-date--on-color">Published <?php echo date_format($dat, 'd-m-Y') ?></div>
		<div>

		<?php
		$arrBlogMeta = get_post_custom( $post->ID );
		$blogAuthorID = $arrBlogMeta['wpn_blog_author'][0];
		$staffLink = get_post_permalink($blogAuthorID);
		$arrUserMeta = get_post_custom( $blogAuthorID );
		$staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
		$staffLastName = $arrUserMeta['wpn_staff_lname'][0];
		$staffDescription = $arrUserMeta['wpn_staff_description'][0];
		$staffSellingPoint = $arrBlogMeta['wpn_blog_author_selling_point'][0];
		$staffRole = $arrUserMeta['wpn_staff_role'][0];
		$staffRole2 = $arrUserMeta['wpn_staff_role2'][0];
		$staffContactMessage = $arrUserMeta['wpn_staff_contact'][0];
		$staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);
		$categories = wp_get_post_categories($post->ID);
		?>

		<div class="staff__card content__author wow fadeInUp">
			<div class="staff__card-image staff__image staff__image--round staff__image--small">
				<div style="background-image: url(<?php echo $staffImg; ?>)"></div>
			</div>
			<div class="staff__card-details">
				<div class="staff__card-name staff__card-name--on-color"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
				<div class="staff__card-role staff__card-role--on-color"><?php echo $staffRole; ?><br /><?php echo $staffRole2; ?></div>
			</div>
		</div>

	</div>

	</div>
	</header><!-- .entry-header -->

<div class="content content--no-pad">
	<div class="breadcrumb">
		<a href="/blog" class="breadcrumb__link">Blog</a>
		<span class="arrow right breadcrumb__arrow"></span>
		<span class="breadcrumb__current"><?php echo the_title(); ?></span>
	</div>
</div>

<div class="content content__copy">

	<div class="content__left">
		<?php
			the_content();
		?>
		<div>
			<ul class="blog__pills">
				<?php foreach($categories as $cat) :
				?>
				<li class="blog__pill-item">
					<a class="blog__pill blog__pill--link" href="/blog?category=<?php echo get_the_category_by_ID($cat); ?>"><?php echo get_the_category_by_ID($cat); ?></a>
				</li>
				<?php endforeach ?>

			</ul>
		</div>
	</div>

	<div class="content__right">
		<?php
		get_template_part( 'template-parts/hot-topics', '' );
		?>
	</div>

</div><!-- .entry-content -->



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
						<div class="staff__card-role"><?php echo $staffRole; ?><br /><?php echo $staffRole2; ?></div>
					</div>
				</a>
				<p class="staff__card-description">
					<?php if($staffSellingPoint !== '') {
						echo $staffSellingPoint; ?>
					}
					else {
						echo $staffDescription; ?>
					}
				</p>
			</div>

		</div>



	</div>
</div>

<div class="content-full-wrapper content-full-wrapper--brand">
			<div class="content content--bump-bottom content--thin">

				<p class="staff__cta wow fadeInUp"><?php echo $staffContactMessage; ?></p>
				<div class="content--center wow fadeInUp">
					<span class="btn btn--large btn--on-blue staff__book-with" data-staff-id="<?php echo $blogAuthorID; ?>">Book with <?php echo $staffFirstName; ?></span>
				</div>
			</div>
		</div>
</article><!-- #post-## -->
