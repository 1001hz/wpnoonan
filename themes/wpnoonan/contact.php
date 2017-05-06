<?php
/**
 * Template Name: Contact
 * The contact page
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header();
$options = get_option( 'wpn_settings' );
?>

	<div class="content">
		<h1>Contact</h1>
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


	<div class="content">
		<iframe src="<?php echo $options['wpn_options_maps_url']; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>





	<div class="content-full-wrapper content-full-wrapper--brand content-full-wrapper--center">
		<div class="content content--bump-top content--bump-bottom">
			<div class="btn btn--large btn--on-blue modal__btn" data-modal-for="appointment">
				Book an appointment
			</div>
		</div>
		<div class="modal" id="appointment">
			<div class="modal__inner">
			<div class="modal__btn-close" data-modal-close-for="appointment">
				<i class="fa fa-close fa-lg"></i>
			</div>
			<?php
				while ( have_posts() ) : the_post();
				the_content();
				endwhile;
			?>
			</div>
		</div>
	</div>



<?php get_footer(); ?>