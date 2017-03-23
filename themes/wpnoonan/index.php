<?php
/**
 * The main template file
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>
<div class="hp">

    <section class="hp__section hp__section--carousel">
        <div class="hp__inner-section hp__inner-section--hero">
            <div class="hero-carousel">
                <div class="bxslider">
                  <div class="hero-carousel__item" style="background-image: url(http://www.technocrazed.com/wp-content/uploads/2015/12/beautiful-wallpaper-download-14.jpg);"></div>
                  <div class="hero-carousel__item" style="background-image: url(http://s1.picswalls.com/wallpapers/2015/12/12/beautiful-wallpapers_124418469_294.jpg);"></div>
                  <div class="hero-carousel__item" style="background-image: url(http://www.technocrazed.com/wp-content/uploads/2015/12/beautiful-wallpaper-download-13.jpg);"></div>
                </div>
            </div>
        </div>
        <div class="scroll-arrow scroll-arrow--about wow bounceInUp"></div>
    </section>



    <section class="hp__section about">
        <div class="hp__inner-section content">
            <h2>About</h2>
            <div class="hp__content hp__content--half  wow fadeInUp">
                <h3>Lorem Ipsum Dolar</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="hp__content hp__content--half  wow fadeInUp">
                <img src="http://www.technocrazed.com/wp-content/uploads/2015/12/beautiful-wallpaper-download-13.jpg" />
            </div>
        </div>
        <div class="scroll-arrow scroll-arrow--services wow bounceInUp"></div>
    </section>

    <section class="hp__section">
        <div class="hp__inner-section content services">
            <h2>Services</h2>
        </div>
        <div class="scroll-arrow scroll-arrow--team wow bounceInUp"></div>
    </section>

    <section class="hp__section">
        <div class="hp__inner-section content team">
            <h2>Team</h2>
    <?php
    $query = new WP_Query(array(
        'post_type' => 'wpn_staff',
        'post_status' => 'publish'
    ));


    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        echo $post_id;
        echo "<br>";
        $met = rwmb_meta( 'wpn_staff_description', $args = array(), $post_id = null );


    }

    wp_reset_query();


    ?>
        </div>
        <div class="scroll-arrow scroll-arrow--contact wow bounceInUp"></div>
    </section>

    <section class="hp__section">
        <div class="hp__inner-section content contact">
            <h2>Contact</h2>
        </div>
    </section>

</div>

<?php get_footer(); ?>
