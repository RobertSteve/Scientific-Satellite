<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Techloop
 */

$footer_contact_block_visibility = get_theme_mod( 'footer_contact_block_visibility', techloop_theme()->customizer->get_default( 'footer_contact_block_visibility' ) );
$copyright_visible               = (bool) get_theme_mod( 'footer_copyright', techloop_theme()->customizer->get_default( 'footer_copyright' ) );
$pay_systems                     = get_theme_mod( 'footer_pay_systems', techloop_theme()->customizer->get_default( 'footer_pay_systems' ) );
$footer_menu                     = get_theme_mod( 'footer_menu_visibility', techloop_theme()->customizer->get_default( 'footer_menu_visibility' ) );
?>
<div class="footer-container <?php echo techloop_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<div class="site-info-wrap">
			<div class="site-info-logo_copyright">
				<?php techloop_footer_logo(); ?>
				<?php if ( ( $copyright_visible && $footer_contact_block_visibility ) || $footer_contact_block_visibility ) : ?>
				<div class="site-info__bottom">
				<?php endif; ?>
					<?php techloop_footer_copyright(); ?>
					<?php techloop_contact_block( 'footer' ); ?>
				<?php if ( ( $copyright_visible && $footer_contact_block_visibility ) || $footer_contact_block_visibility ) : ?>
				</div>
				<?php endif; ?>
			</div>
			<?php techloop_social_list( 'footer' ); ?>
			<?php
				if (( $pay_systems && $footer_menu ) || $pay_systems ) {
					techloop_footer_pay_system();
				}  else {
					techloop_footer_menu();
				}
			?>
		</div>

	</div><!-- .site-info -->
</div><!-- .container -->
