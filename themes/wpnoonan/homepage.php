<?php
/**
 * Template Name: Homepage
 *
 */

get_header();
?>

<?php
    $options = get_option( 'wpn_settings' );
?>
<div class="hp">

    <section class="hp__section hp__section--carousel">
        <div class="hp__inner-section hp__inner-section--hero">
            <div class="hero-carousel">

                <?php

                    $carouselTitles = array();
                    $carouselImages = array();

                    $query = new WP_Query(array(
                        'post_type' => 'wpn_carousel',
                        'post_status' => 'publish'
                    ));

                    while ($query->have_posts()) {
                        $query->the_post();
                        $post_id = get_the_ID();

                        $carouselTitle = get_post_meta( $post_id, 'wpn_carousel_title', true );
                        $carouselImage = get_post_meta( $post_id, 'wpn_carousel_image', true );

                        array_push($carouselTitles, $carouselTitle);
                        array_push($carouselImages, $carouselImage);

                       }
                       wp_reset_query();

                    ?>

                    <div class="bxslider">

                        <?php
                        $i = -1;
                        foreach($carouselImages as $imgId) {
                            $i++;
                            $img = wp_get_attachment_url($carouselImages[$i]);
                            ?>
                            <div class="hero-carousel__item-wrapper">
                            <div class="hero-carousel__item" style="background-image: url(<?php echo $img; ?>);"></div>

                            <div class="hero-carousel__watermark">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/WLP_Finished Art_Circle Device_CMYK-01.png" alt="logo" />
                            </div>

                            <div class="hero-carousel__content">
                                <h1><?php echo $carouselTitles[$i]; ?></h1>
                                <div class="hero-carousel__cta-wrapper">
                                    <span class="hero-carousel__cta booking">Book an appointment</a>
                                </div>
                                <div class="hero-carousel__cta-wrapper">
                                    <a href="/our-services" class="hero-carousel__cta hero-carousel__cta--transparent">See our services</a>
                                </div>
                            </div>

                            </div>
                            <?php

                        }
                        ?>

                    </div>


            </div>

        </div>


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

    		<section class="hp__section about hp__section--grey">
                <div class="hp__inner-section content">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="hp__content <?php if($image) : ?>hp__content--half<?php endif; ?> <?php if(!$image) : ?>hp__content--center<?php endif; ?>">

                        <?php echo $homepageContent; ?>
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


<?php
        $args = array('post_type' => 'wpn_service_cat', 'post_status' => 'publish', 'posts_per_page' => 5, 'orderby' => 'menu_order');
		$all_service_categories = get_posts($args);

		$args = array('post_type' => 'wpn_services', 'post_status' => 'publish', 'posts_per_page' => -1, 'orderby' => 'menu_order');
        $all_services = get_posts($args);
    ?>

    <section class="hp__section">
        <div class="hp__inner-section hp__inner-section--mosaic  services">
            <h2><a href="/our-services">Our Services</a></h2>

            <div class="content content--flat-top content--flat hp-services__select">
             <select>
             <?php
                 $index = 0;
                 foreach($all_service_categories as $category) :
                        $arrCatMeta = get_post_custom( $category->ID );
                        $categoryImg = wp_get_attachment_url($arrCatMeta['wpn_service_categories_image'][0]);
                        $categoryDesc = $arrCatMeta['wpn_service_categories_desc'][0];
                        $class = "";
                        if($index === 0) {
                            $class = "active";
                        }
                        $index++;
                        ?>
                        <option value="<?php echo $category->ID; ?>" <?php if($index === 0){ echo 'selected'; } ?>>
                            <?php echo $category->post_title; ?>
                        </option>
                    <?php endforeach; ?>
          </select>
          </div>

            <ul class="hp-services">
            <?php
                $index = 0;
                foreach($all_service_categories as $category) :
                        $arrCatMeta = get_post_custom( $category->ID );
                			$categoryImg = wp_get_attachment_url($arrCatMeta['wpn_service_categories_image'][0]);
                			$categoryDesc = $arrCatMeta['wpn_service_categories_desc'][0];
                			$class = "";
                			if($index === 0) {
                			    $class = "active";
                			}
                			$index++;
                			?><li class="hp-services__item <?php echo $class; ?>" data-tab-for="tab-panel-<?php echo $category->ID; ?>">
                			<span class="before" style="background-image: url(<?php echo $categoryImg; ?>)"></span>
                    <h4><?php echo $category->post_title; ?></h4>
                </li><?php endforeach; ?>
            </ul>

        </div>
    </section>



    <section class="hp__section hp__section--divider">
        <div class="hp__inner-section content services">
            <?php
            $index = 0;
            foreach($all_service_categories as $category) :
                $class = "";
                if($index === 0) {
                    $class = "active";
                }
                $index++;
            ?>
            <div class="hp-services__panel-wrapper <?php echo $class; ?>" id="tab-panel-<?php echo $category->ID; ?>">
                <div class="hp-services__panel">
                    <div>
                        <h5><a href="/our-services#<?php echo $category->post_name; ?>"><?php echo $category->post_title; ?></a></h5>
                         <ul class="tick-list">
                         <?php
                         foreach($all_services as $post):

                            $arrServiceMeta = get_post_custom( $post->ID );
                            $serviceName = $arrServiceMeta['wpn_services_name'][0];
                            $serviceCategory = $arrServiceMeta['wpn_services_category'][0];

                            if((int)$category->ID === (int)$serviceCategory) :
                         ?>
                            <li><?php echo $serviceName; ?></li>
                         <?php
                            endif;
                          endforeach;
                        ?>
                         </ul>
                         <div>
                            <span class="btn btn--large booking btn--keyline">Book an appointment</span>
                         </div>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>

    <section class="hp__section">
        <div class="hp__inner-section content team">
            <h2><a href="/about-us/staff/">Meet Our Team</a></h2>

            <div class="slick--staff">

            <?php

                $query = new WP_Query(array(
                    'post_type' => 'wpn_staff',
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'posts_per_page' => -1,
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

                        <a href="<?php echo $staffLink; ?>" class="staff__wrapper">
                            <div class="staff__image staff__image--round staff__image--medium">
                                <div style="background-image: url(<?php echo $staffImg; ?>)"></div>
                            </div>
                            <div class="staff__name staff__name--homepage"><?php echo $staffFirstName . ' ' . $staffLastName; ?></div>
                            <div class="staff__qualification staff__qualification--homepage"><?php echo $staffQualification; ?></div>
                            <div class="staff__link-wrapper"><span class="staff__link">Read about <?php echo $staffFirstName; ?></div>
                        </a>

                        <?php

                    }


                wp_reset_query();

            ?>
            </div>


        </div>
    </section>

    <section class="hp__section hp__section--grey">
        <div class="content hp__inner-section content--no-pad">

            <a href="<?php echo $options['wpn_options_maps_link']; ?>">
                <div class="hp-contact hp-contact__address">
                    <div class="hp-contact__icon-wrapper"><i class="fa fa-map-marker fa-lg zoomIn wow"></i></div>
                    <div class="hp-contact__heading">Address</div>
                    <div class="fadeInUp wow">
                            <?php echo $options['wpn_options_address']; ?>
                    </div>
                </div>
            </a>



            <a href="tel:<?php echo $options['wpn_options_phone']; ?>">
                <div class="hp-contact hp-contact__phone">
                    <div class="hp-contact__icon-wrapper">
                        <i class="fa fa-phone fa-lg zoomIn wow"></i>
                    </div>
                    <div class="hp-contact__heading">Phone</div>
                    <div class="fadeInUp wow"><?php echo $options['wpn_options_phone']; ?>
                    </div>
                </div>
            </a>

            <a href="mailto:<?php echo $options['wpn_options_email']; ?>">
                <div class="hp-contact hp-contact__email">
                    <div class="hp-contact__icon-wrapper">
                        <i class="fa fa-at fa-lg zoomIn wow"></i>
                    </div>
                    <div class="hp-contact__heading">Email</div>
                    <div class="fadeInUp wow">
                    <?php echo $options['wpn_options_email']; ?>
                    </div>
                </div>
            </a>

        </div>

    </section>
    <section class="hp__section">

        <div>

            <iframe src="<?php echo $options['wpn_options_maps_url']; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>

        <div class="content-full-wrapper content-full-wrapper--brand content-full-wrapper--center">
            <div class=" content--bump-top content--bump-bottom">
                <div class="btn btn--large btn--on-blue booking">
                    Book an appointment
                </div>
            </div>
        </div>


    </section>

</div>

<?php get_footer(); ?>
