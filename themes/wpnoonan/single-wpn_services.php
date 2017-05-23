<?php
/**
 * The template for displaying a service
 *
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main>
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/service', 'single' );
        endwhile;
        ?>
	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_footer(); ?>