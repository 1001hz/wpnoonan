<?php
/**
 * Template Name: Staff listing
 * The staff listing
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>

    <div class="content">
        <h1>Our Staff</h1>
        <?php
            while ( have_posts() ) : the_post();
            the_content();
            endwhile;
        ?>
    </div>



    <div class="content content--bump-top content--bump-bottom">

        <?php
        $args = array('post_type' => 'wpn_staff', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
        $all_staff = get_posts($args);


        foreach($all_staff as $post) :
            $arrUserMeta = get_post_custom( $post->ID );
            $staffLink = get_post_permalink($post->ID);
            $staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
            $staffLastName = $arrUserMeta['wpn_staff_lname'][0];
            $staffDescription = $arrUserMeta['wpn_staff_description'][0];
            $staffRole = $arrUserMeta['wpn_staff_role'][0];
            $staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);


        ?>

        <a href="<?php echo $staffLink; ?>" class="staff__card staff__card-item">


                <div class="staff__card-image staff__image staff__image--round staff__image--small">
                    <div style="background-image: url(<?php echo $staffImg; ?>)"></div>
                </div>
                <div class="staff__card-details">
                    <div class="staff__card-name"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
                    <div class="staff__card-role"><?php echo $staffRole; ?></div>
                </div>
                <div class="staff__card-description">
                    <p><?php echo $staffDescription; ?></p>
                </div>


        </a>

		<?php endforeach; ?>

    </div>
<?php get_footer(); ?>
