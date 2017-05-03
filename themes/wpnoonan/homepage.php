<?php
/**
 * Template Name: Homepage
 *
 */

get_header(); ?>
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
                        <a href="#" class="hero-carousel__cta">Book an appointment</a>
                    </div>
                    <div class="hero-carousel__cta-wrapper">
                        <a href="#" class="hero-carousel__cta hero-carousel__cta--transparent">See our services</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="scroll-arrow scroll-arrow--about wow bounceInUp"></div>
    </section>



    <section class="hp__section about">
        <div class="hp__inner-section content">
            <h2>About</h2>
            <div class="hp__content hp__content--half hp__content--pad  wow fadeInUp wow fadeInUp">
                <h3>Lorem Ipsum Dolar</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a class="hp__cta" href="#">Meet our team</a></p>
            </div>
            <div class="hp__content hp__content--half  wow fadeInUp">
                <img src="http://www.technocrazed.com/wp-content/uploads/2015/12/beautiful-wallpaper-download-13.jpg" />
            </div>
        </div>
    </section>

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
                        $arrMeta = get_post_custom( $post_id );

                        $staffFirstName = $arrMeta['wpn_staff_fname'][0];
                        $staffLastName = $arrMeta['wpn_staff_lname'][0];
                        $staffDescription = $arrMeta['wpn_staff_description'][0];
                        $staffImg = wp_get_attachment_url($arrMeta['wpn_staff_image'][0]);

                        ?>

                        <div class="staff__wrapper">
                            <div class="staff__image staff__image--round staff__image--medium">
                                <img src="<?php echo $staffImg; ?>" />
                            </div>
                            <div class="staff__name"><?php echo $staffFirstName . ' ' . $staffLastName; ?></div>
                            <div class="staff__link-wrapper"><a href="#" class="staff__link">Read about <?php echo $staffFirstName; ?></a></div>
                        </div>

                        <?php

                    }


                wp_reset_query();

            ?>
            </div>


        </div>
    </section>

    <section class="hp__section">
        <div class="hp__inner-section content contact">
            <h2>Contact</h2>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d12613.528707585925!2d145.0217797!3d-37.781082399999995!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sau!4v1492239203630" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="hp__content hp__content--half hp__content--pad bump-top bump-bottom">
                <a href="#" class="btn">Book an appointment</a>
            </div>

            <div class="hp__content hp__content--half hp__content--pad">
                <h3>Our Location</h3>
                <p>Lorem Ipsum dolar</p>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
