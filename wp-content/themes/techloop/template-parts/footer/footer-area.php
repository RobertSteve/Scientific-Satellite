<?php
/**
 * The template for displaying footer widget area.
 *
 * @package Techloop
 */
// Check visibility.
if ( ! get_theme_mod( 'footer_widget_area_visibility', techloop_theme()->customizer->get_default( 'footer_widget_area_visibility' ) ) || ! is_active_sidebar( 'footer-area' ) ) {
	return;
} ?>

<div class="footer-area-wrap primary-footer-area-wrap <?php echo techloop_get_invert_class_customize_option( 'footer_widgets_bg_top' ); ?>">
	<div class="container">
		<?php do_action( 'techloop_render_widget_area', 'footer-area' ); ?>
	</div>
</div>
