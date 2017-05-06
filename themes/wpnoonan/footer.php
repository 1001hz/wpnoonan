<?php
/**
 * The template for displaying the footer
 *
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */
?>

    </div>
    <?php
    $options = get_option( 'wpn_settings' );
    ?>
    <div id="footer" class="footer">
        <div class="footer__inner">
            <div class="footer__section">
                <h3>Quick Links</h3>
                <?php wp_nav_menu( array( "menu" => "main-nav", "depth" => 1 ) ); ?>
            </div>

            <div class="footer__section">
                <h3>Contact Us</h3>
                <p class="footer__phone">
                    <i class="fa fa-phone fa-lg"></i>
                    <a href="tel:<?php echo $options['wpn_options_phone']; ?>"><?php echo $options['wpn_options_phone']; ?></a>
                </p>
                <p class="footer__address"><i class="fa fa-map-marker fa-lg"></i>
                   <span>
                       <a href="<?php echo $options['wpn_options_maps_link']; ?>">
                           <?php echo $options['wpn_options_address']; ?>
                       </a>
                   </span>
               </p>
                <p class="footer__email"><i class="fa fa-at fa-lg"></i><a href="mailto:<?php echo $options['wpn_options_email']; ?>"><?php echo $options['wpn_options_email']; ?></a></p>
            </div>

            <div class="footer__section">
                <h3>Connect With Us</h3>
                <div class="footer__social-icon">
                    <a href="<?php echo $options['wpn_options_instagram_url']; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram.png" /></a>
                </div>
                <div class="footer__social-icon">
                    <a href="<?php echo $options['wpn_options_facebook_url']; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" /></a>
                </div>

            </div>

        </div>

    <?php wp_footer(); ?>
    </div>
</div>

</body>
</html>
