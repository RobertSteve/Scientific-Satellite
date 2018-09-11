<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Techloop
 */
$sidebar_position = get_theme_mod( 'sidebar_position' );

if ( is_active_sidebar( 'sidebar' ) && 'fullwidth' !== $sidebar_position && ! techloop_is_product_page() ) {
	do_action( 'techloop_render_widget_area', 'sidebar' );
}

if ( is_active_sidebar( 'shop-sidebar' ) && 'fullwidth' !== $sidebar_position && techloop_is_product_page() ) {
	if ( is_product() && apply_filters( 'techloop_single_product_sidebar_show', true ) ) {
		do_action( 'techloop_render_widget_area', 'shop-sidebar' );
	} else if ( is_shop() || is_product_category() ) {
		do_action( 'techloop_render_widget_area', 'shop-sidebar' );
	}
}
