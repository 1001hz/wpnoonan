<?php
/**
 * Template Name: Two column page
 * Two column page
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

        <div class="content__left">
            <?php
                the_content();
            ?>
        </div>

        <?php
        $args = array(
        	'post_parent' => $post->ID,
        	'post_type'   => 'page',
        	'numberposts' => -1,
        	'post_status' => 'publish'
        );
        $children = get_children( $args );

        ?>
        <div class="content__right">

            <?php if(count($children) > 0) : ?>
                <div class="menu__sidebar-heading">
                    <?php echo $post->post_title ?>
                    <span class="arrow down"></span>
                </div>
                <ul class="menu__sidebar menu__sidebar--count-<?php echo count($children); ?>">

                    <?php foreach($children as $child) :

                    ?>
                    <li><a href="<?php echo get_the_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php
                if(count($children) === 0) :
                    $parents = get_post_ancestors($post->ID);
                    if(count($parents) > 0) :

                        $args = array(
                            'post_parent' => $parents[0],
                            'post_type'   => 'page',
                            'numberposts' => -1,
                            'post_status' => 'publish'
                        );
                        $children = get_children( $args );
                        ?>

                        <?php if(count($children) > 0) :
                            $parent = get_post($parents[0]);
                            $parentTitle = $parent->post_title;
                        ?>
                            <div class="menu__sidebar-heading"><?php echo $parentTitle ?></div>
                            <ul class="menu__sidebar menu__sidebar--count-<?php echo count($children); ?>">
                                <?php foreach($children as $child) :
                                    $class = "";
                                    if($post->ID === $child->ID) {
                                        $class = "active";
                                    }
                                ?>
                                <li class="<?php echo $class; ?>"><a href="<?php echo get_the_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php
                    endif;
                endif;
            ?>


        </div>

    <?php endwhile; ?>
    </div>



<?php get_footer(); ?>
