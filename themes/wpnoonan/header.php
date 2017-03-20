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
			<img src="" alt="logo" />
		</div>

		<div class="heading__menu-wrapper">
			<div class="hamburger">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>

			<?php wp_nav_menu( array( "menu" => "main-nav" ) ); ?>

		</div>

	</div>

	<div id="main">