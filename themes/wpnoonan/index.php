<?php
/**
 * The main template file
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>
<div class="carousel">

</div>

<div class="about">

</div>

<div class="services">

</div>

<div class="team">
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

<div class="contact">

</div>

<?php get_footer(); ?>
