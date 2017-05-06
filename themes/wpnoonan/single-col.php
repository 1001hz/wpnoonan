<?php
/**
 * Template Name: Single column page
 * Single column page
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>

    <div class="content content--bump-bottom">

        <?php
            while ( have_posts() ) : the_post();
            ?>

            <h1><?php the_title(); ?></h1>

            <?php
            the_content();
            endwhile;
        ?>
    </div>

<?php get_footer(); ?>
