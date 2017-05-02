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
			<div class="content post-nav">

				<?php if(!empty($prevPost)): ?>
				<a href="<?php echo get_permalink($prevPost->ID); ?>">
					<div class="post-nav__cell">
						<div class="arrow left post-nav__arrow post-nav__arrow--prev"></div>
						<div class="post-nav__direction">Previous post</div>
						<?php echo $prevPost->post_title; ?>
					</div>
				</a>
				<?php endif; ?>

				<div class="post-nav__cell">


					<?php


					if(!empty($nextPost)): ?>
						<p class="post-nav__title">Next Post</p>
						<a href="<?php echo get_permalink($nextPost->ID); ?>"><?php echo $nextPost->post_title; ?></a>
					<?php endif; ?>

				</div>
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
