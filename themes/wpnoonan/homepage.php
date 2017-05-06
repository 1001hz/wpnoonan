<?php
/**
 * Template Name: Homepage
 *
 */

get_header(); ?>

<?php
    $options = get_option( 'wpn_settings' );
?>
<div class="hp">

    <section class="hp__section hp__section--carousel">
        <div class="hp__inner-section hp__inner-section--hero">
            <div class="hero-carousel">

                <?php

                    $query = new WP_Query(array(
                        'post_type' => 'wpn_carousel',
                        'post_status' => 'publish'
                    ));

                    while ($query->have_posts()) {
                        $query->the_post();
                        $post_id = get_the_ID();
                        $carouselTitle = get_post_meta( $post_id, 'wpn_carousel_title', false );
                        $carouselImages = get_post_meta( $post_id, 'wpn_carousel_image', true );

                    ?>

                    <div class="bxslider">

                        <?php
                        foreach($carouselImages as $imgId) {
                            $img = wp_get_attachment_url($imgId[0]);
                            ?>

                            <div class="hero-carousel__item" style="background-image: url(<?php echo $img; ?>);"></div>

                            <?php
                        }
                        ?>

                    </div>

                    <?php

                        }


                    wp_reset_query();

                ?>


                <div class="hero-carousel__content">
                    <h1><?php echo $carouselTitle[0]; ?></h1>
                    <div class="hero-carousel__cta-wrapper">
                        <span class="hero-carousel__cta booking">Book an appointment</a>
                    </div>
                    <div class="hero-carousel__cta-wrapper">
                        <a href="/services" class="hero-carousel__cta hero-carousel__cta--transparent">See our services</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="scroll-arrow scroll-arrow--about wow bounceInUp"></div>
    </section>

    <?php
        $cpt = array();

    	$query = new WP_Query(array(
            'post_type' => 'page',
            'post_status' => 'publish',
            'posts_per_page' => -1
        ));


        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
    		$arrMeta = get_post_custom( $post_id );
    		$showOnHomepage = $arrMeta['wpn_homepage_show'][0];
    		$homepageContent = $arrMeta['wpn_homepage_content'][0];
            $image = get_the_post_thumbnail_url();
            $linkId = $arrMeta['wpn_homepage_link_id'][0];
            $linkCustomTitle = $arrMeta['wpn_homepage_custom_link_title'][0];
            $relatedLinkPost = get_post($linkId);
            $relatedLinkUrl = get_the_permalink($relatedLinkPost);
            if($linkCustomTitle) {
                $linkTitle = $linkCustomTitle;
            }
            else{
                $linkTitle = $relatedLinkPost->post_title;
            }


    		if($showOnHomepage) :
    		?>

    		<section class="hp__section about">
                <div class="hp__inner-section content">
                    <h2><?php the_title(); ?></h2>
                    <div class="hp__content <?php if($image) : ?>hp__content--half<?php endif; ?>">

                        <p class="wow fadeIn"><?php echo $homepageContent; ?></p>
                        <p class="wow fadeInUp"><a class="hp__cta" href="<?php echo $relatedLinkUrl; ?>"><?php echo $linkTitle; ?></a></p>
                    </div>
                    <?php if($image) : ?>
                        <div class="hp__content hp__content--half wow fadeIn">
                            <img src="<?php echo $image; ?>" />
                        </div>
                    <?php endif; ?>
                </div>
            </section>

    		<?php
    		endif;
        }

        wp_reset_query();
    ?>



    <section class="hp__section">
        <div class="hp__inner-section content services">
            <h2>Services</h2>
        </div>
    </section>

    <section class="hp__section">
        <div class="hp__inner-section content team">
            <h2>Meet Our Team</h2>

            <div class="slick--staff">

            <?php

                $query = new WP_Query(array(
                    'post_type' => 'wpn_staff',
                    'post_status' => 'publish'
                ));

                while ($query->have_posts()) {
                        $query->the_post();
                        $post_id = get_the_ID();
                        $staffLink = get_the_permalink();
                        $arrMeta = get_post_custom( $post_id );

                        $staffFirstName = $arrMeta['wpn_staff_fname'][0];
                        $staffLastName = $arrMeta['wpn_staff_lname'][0];
                        $staffQualification = $arrMeta['wpn_staff_qualification'][0];
                        $staffDescription = $arrMeta['wpn_staff_description'][0];
                        $staffImg = wp_get_attachment_url($arrMeta['wpn_staff_image'][0]);

                        ?>

                        <div class="staff__wrapper">
                            <div class="staff__image staff__image--round staff__image--medium">
                                <div style="background-image: url(<?php echo $staffImg; ?>)"></div>
                            </div>
                            <div class="staff__name staff__name--homepage"><?php echo $staffFirstName . ' ' . $staffLastName; ?></div>
                            <div class="staff__qualification staff__qualification--homepage"><?php echo $staffQualification; ?></div>
                            <div class="staff__link-wrapper"><a href="<?php echo $staffLink; ?>" class="staff__link">Read about <?php echo $staffFirstName; ?></a></div>
                        </div>

                        <?php

                    }


                wp_reset_query();

            ?>
            </div>


        </div>
    </section>

    <section class="hp__section">
        <div class="content hp__inner-section">
            <h2>Contact</h2>
            <p class="contact__phone">
                <i class="fa fa-phone fa-lg"></i>
                <a href="tel:<?php echo $options['wpn_options_phone']; ?>"><?php echo $options['wpn_options_phone']; ?></a></p>
            <p class="contact__email">
                <i class="fa fa-at fa-lg"></i>
                <a href="mailto:<?php echo $options['wpn_options_email']; ?>"><?php echo $options['wpn_options_email']; ?></a></p>
            <p class="contact__address">
                <i class="fa fa-map-marker fa-lg"></i>
                <span>
                    <a href="<?php echo $options['wpn_options_maps_link']; ?>">
                        <?php echo $options['wpn_options_address']; ?>
                    </a>
                </span>
            </p>

        </div>
        <div>

            <iframe src="<?php echo $options['wpn_options_maps_url']; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>

        <div class="content-full-wrapper content-full-wrapper--brand content-full-wrapper--center">
            <div class="content content--bump-top content--bump-bottom">
                <div class="btn btn--large btn--on-blue booking">
                    Book an appointment
                </div>
            </div>
        </div>


    </section>

</div>

<?php get_footer(); ?>
