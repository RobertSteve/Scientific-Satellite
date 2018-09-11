<?php
/**
 * The template for displaying footer widget area.
 *
 * @package Techloop
 */
// Check visibility.
if ( ! get_theme_mod( 'footer_second_widget_area_visibility', techloop_theme()->customizer->get_default( 'footer_second_widget_area_visibility' ) ) || ! is_active_sidebar( 'second-footer-area' ) ) {
	return;
} ?>

<div class="footer-area-wrap second-footer-area-wrap <?php echo techloop_get_invert_class_customize_option( 'footer_widgets_bg_bottom' ); ?>">
	<div class="container">
		<?php do_action( 'techloop_render_widget_area', 'second-footer-area' ); ?>
	</div>
</div>
