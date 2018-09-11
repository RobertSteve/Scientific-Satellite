<?php
/**
 * The template for displaying the centered footer layout.
 *
 * @package Techloop
 */

?>
<div class="footer-container <?php echo techloop_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<?php
			techloop_footer_logo();
			techloop_footer_menu();
			techloop_contact_block( 'footer' );
			techloop_footer_copyright();
			techloop_footer_pay_system();
			techloop_social_list( 'footer' );
		?>
	</div><!-- .site-info -->
</div><!-- .container -->
