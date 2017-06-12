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

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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



		<div class="heading__cta-wrapper">
			<ul>
				<li>
					<span class="booking btn btn--small btn--grey btn--full">Book an appointment</span>
				</li>
				<li>
					<a href="tel:<?php echo $options['wpn_options_phone']; ?>" class="btn btn--small btn--blue btn--full">Call us: <?php echo $options['wpn_options_phone']; ?></a>
				</li>
			</ul>
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

	</div>


	<div id="main">