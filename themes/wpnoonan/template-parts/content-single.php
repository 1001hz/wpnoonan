<?php
/**
 * The template part for displaying single posts
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="content__header">
		<div class="content">
		<?php the_title( '<h1 class="content__title">', '</h1>' ); ?>

		<div>
			<?php
				$authorId = get_the_author_id();
				$author = get_the_author();
			?>
			<div class="staff__image staff__image--round staff__image--small staff__image--border">
				<?php echo get_avatar($authorId); ?>
			</div>
			<p class="staff__author"><i>by</i> <?php echo $author ?></p>
		</div>

		</div>
	</header><!-- .entry-header -->

	<div class="content content__copy">
		<?php
			the_content();

		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
