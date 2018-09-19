<?php
/**
 * Template part for mobile panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techloop
 */

$menu = has_nav_menu( 'top' );
?>
<div class="mobile-panel">
	<?php techloop_menu_toggle( 'main-menu', 'mobile-toggle' ); ?>
	<div class="mobile-panel__right">
		<?php techloop_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
		<?php techloop_currency_switcher() ?>
		<?php techloop_header_cart(); ?>
		<?php if ( $menu ) { ?>
			<div class="mobile-panel__menu-wrap dropdown-wrap__block dropdown">
				<i class="linearicon linearicon-cog icon-drodown"></i>
				<?php techloop_top_menu(); ?>
			</div>
		<?php } ?>
	</div>
</div>
