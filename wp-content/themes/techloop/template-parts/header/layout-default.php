<?php
/**
 * Template part for default header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
		<?php techloop_header_search( '<div class="header-search">%s</div>' ); ?>
		<div class="shop-menu__cart">
			<div class="top-panel__menu-wrap dropdown-wrap__block">
				<i class="linearicon linearicon-cog icon-drodown"></i>
				<?php techloop_top_menu(); ?>
			</div>
			<?php techloop_header_cart(); ?>
		</div>
	</div>
</div>
<?php
$sidebar_position = get_theme_mod( 'sidebar_position' );
$header_layout = get_theme_mod( 'header_layout_type' );
if ( 'fullwidth' === $sidebar_position && is_front_page() || !is_front_page() ) { ?>
	<div class="header-main-menu">
		<div class="container">
			<?php techloop_main_menu(); ?>
		</div>
	</div>
<?php } ?>
