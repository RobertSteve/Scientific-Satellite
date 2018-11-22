<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techloop
 */

// Don't show top panel if all elements are disabled.
if ( ! techloop_is_top_panel_visible() ) {
	return;
}

$contact_block_visibility = get_theme_mod( 'header_contact_block_visibility', techloop_theme()->customizer->get_default( 'header_contact_block_visibility' ) );
?>
<style>

</style>
<div class="top-panel top-panel-4rzo <?php echo techloop_get_invert_class_customize_option( 'top_panel_bg' ); ?>">
	<div class="div">
		<?php techloop_contact_block( 'header' );?>
	</div>
	<div class="div">
		<?php echo do_shortcode ("[weglot_switcher]"); ?>
	</div>
</div>