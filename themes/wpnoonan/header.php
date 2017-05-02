<?php
/**
 * The template for displaying the header
 *
 *
 * @package WordPress
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" type="text/css" media="all" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">

	<div class="heading">

		<div class="heading__logo-wrapper">

			<img src="wp-content/themes/wpnoonan/images/WLPLogo.png" alt="logo" />
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
			<a href="#">Book an appointment</a>
			<a href="tel:+3536977700">Call us: (069) 77700</a>
		</div>

	</div>

	<div id="main">