<?php
/**
 * Template part for style-4 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techloop
 */
?>
<div class="header-container_wrap container">
	<div class="header-container__flex">
		<div class="site-branding">
			<?php techloop_header_logo() ?>
			<?php techloop_site_description(); ?>
		</div>
		<?php techloop_main_menu(); ?>
			<div class="top-panel__menu-wrap dropdown-wrap__block">
				<i class="linearicon linearicon-cog icon-drodown"></i>
				<?php techloop_top_menu(); ?>
			</div>

			<?php techloop_header_cart(); ?>
			<?php techloop_currency_switcher() ?>

		<div class="header-icons">
			<?php techloop_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
		</div>
	</div>
</div>
