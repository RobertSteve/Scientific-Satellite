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
$menu                     = has_nav_menu( 'top' );
?>

<div class="top-panel <?php echo techloop_get_invert_class_customize_option( 'top_panel_bg' ); ?>">
	<div class="top-panel__container container">
		<div class="top-panel__top">
			<?php if ( $contact_block_visibility ) { ?>
				<div class="top-panel__left">
					<?php techloop_contact_block( 'header' );?>
				</div>
			<?php } ?>

			<div class="top-panel__center">
				<?php if ( $menu ) { ?>
					<div class="top-panel__menu-wrap dropdown-wrap__block">
						<i class="linearicon linearicon-cog icon-drodown"></i>
						<?php techloop_top_menu(); ?>
					</div>
				<?php } ?>
			</div>

			<div class="top-panel__right">
				<?php techloop_header_cart(); ?>
				<?php techloop_currency_switcher() ?>
			</div>
		</div>
	</div>
</div><!-- .top-panel -->
