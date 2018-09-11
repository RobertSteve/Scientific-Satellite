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
} ?>

<div class="top-panel <?php echo techloop_get_invert_class_customize_option( 'top_panel_bg' ); ?>">
	<div class="top-panel__container container">
		<div class="top-panel__top">
			<div class="top-panel__left">
				<?php techloop_contact_block( 'header' ); ?>
			</div>
			<div class="top-panel__right">
				<?php techloop_social_list( 'header' ); ?>
				<?php techloop_currency_switcher() ?>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
