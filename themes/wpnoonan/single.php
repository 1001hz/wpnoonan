<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// Post nav
$prevPost = get_previous_post();
$nextPost = get_next_post();
			?>
			<div class="content">

				<?php if(!empty($prevPost)): ?>

				<div class="blog__split-cell">
					<h2>Previous Post</h2>
				</div>
				<?php endif; ?>

				<?php if(!empty($nextPost)): ?>
				<div class="blog__split-cell blog__split-cell--right">
					<h2>Next Post</h2>
				</div>
				<?php endif; ?>

</div>
<div class="content">
				<?php if(!empty($prevPost)): ?>
				<div class="blog__related-cell">
					<a href="<?php echo get_the_permalink($prevPost->ID);?> ">
						<div class="wow fadeIn">
							<h1 class="content__title content__title--small"><?php echo $prevPost->post_title; ?></h1>

						</div>
					</a>
				</div>

				<?php endif; ?>
				<?php if(!empty($nextPost)): ?>
				<div class="blog__related-cell">
					<a href="<?php echo get_permalink($nextPost->ID); ?>">
						<div class="wow fadeIn">
							<h1 class="content__title content__title--small"><?php echo $nextPost->post_title; ?></h1>

						</div>
					</a>
				</div>


				<?php endif; ?>


			</div>
			<?php
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
