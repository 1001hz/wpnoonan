<?php
/**
 * The main template file
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>
<section class="hp__section hp__section--carousel">
    <div class="hp__inner-section">
        <h1>Intro</h1>
    </div>
    <div class="scroll-arrow scroll-arrow--about"></div>
</section>

<section class="hp__section about">
    <div class="hp__inner-section content">
        <h2>About</h2>
    </div>
    <div class="scroll-arrow scroll-arrow--services"></div>
</section>

<section class="hp__section">
    <div class="hp__inner-section content services">
        <h2>Services</h2>
    </div>
    <div class="scroll-arrow scroll-arrow--team"></div>
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

        var_dump($met);
}

wp_reset_query();


?>
    </div>
    <div class="scroll-arrow scroll-arrow--contact"></div>
</section>

<section class="hp__section">
    <div class="hp__inner-section content contact">
        <h2>Contact</h2>
    </div>
</section>

<?php get_footer(); ?>
