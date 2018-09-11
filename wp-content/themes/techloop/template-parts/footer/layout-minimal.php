<?php
/**
 * The template for displaying the minimal footer layout.
 *
 * @package Techloop
 */

$footer_contact_block_visibility = get_theme_mod( 'footer_contact_block_visibility', techloop_theme()->customizer->get_default( 'footer_contact_block_visibility' ) );
$copyright_visible               = (bool) get_theme_mod( 'footer_copyright', techloop_theme()->customizer->get_default( 'footer_copyright' ) );
?>

<div class="footer-container <?php echo techloop_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<div class="site-info-wrap">
			<?php techloop_footer_logo(); ?>
			<?php techloop_footer_menu(); ?>

			<?php if ( ( $copyright_visible && $footer_contact_block_visibility ) || $footer_contact_block_visibility ) : ?>
			<div class="site-info__bottom">
			<?php endif; ?>
				<?php techloop_contact_block( 'footer' ); ?>
				<?php techloop_footer_copyright(); ?>
			<?php if ( ( $copyright_visible && $footer_contact_block_visibility ) || $footer_contact_block_visibility ) : ?>
			</div>
			<?php endif; ?>
			<?php techloop_social_list( 'footer' ); ?>
		</div>

	</div><!-- .site-info -->
</div><!-- .container -->