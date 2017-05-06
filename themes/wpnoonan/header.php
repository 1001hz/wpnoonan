<?php
/**
 * The template for displaying the header
 *
 *
 * @package WordPress
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

?>
<?php
    $options = get_option( 'wpn_settings' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">

	<div class="heading">

		<div class="heading__logo-wrapper">
			<a href="<?php echo get_site_url(); ?>">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/WLPLogo.png" alt="logo" />
			</a>
		</div>

		<div class="heading__menu-wrapper">
			<div class="hamburger">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>

			<nav class="nav">
			<?php wp_nav_menu( array( "menu" => "main-nav" ) ); ?>
			</nav>
		</div>

		<div class="heading__cta-wrapper">
			<span class="booking btn btn--small btn--grey btn--full">Book an appointment</span>
			<a href="tel:<?php echo $options['wpn_options_phone']; ?>" class="btn btn--small btn--blue btn--full">Call us: <?php echo $options['wpn_options_phone']; ?></a>
		</div>

	</div>

	<div id="main">