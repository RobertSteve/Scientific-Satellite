<?php
/**
 * Contextual functions for the header, footer, content and sidebar classes.
 *
 * @package Techloop
 */

/**
 * Contain utility module from Cherry framework
 *
 * @since  1.0.0
 * @return object
 */
function techloop_utility() {
	return techloop_theme()->get_core()->modules['cherry-utility'];
}

/**
 * Prints site header CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function techloop_header_class( $classes = array() ) {
	$classes[] = 'site-header';
	$classes[] = get_theme_mod( 'header_layout_type' );

	if ( get_theme_mod( 'header_transparent_layout' ) ) {
		$classes[] = 'transparent';
	}

	echo techloop_get_container_classes( $classes, 'header' );
}

/**
 * Prints site header container CSS classes
 *
 * @since   1.0.0
 * @param   array $classes Additional classes.
 * @return  void
 */
function techloop_header_container_class( $classes = array() ) {
	$classes[] = 'header-container';

	if ( get_theme_mod( 'header_transparent_layout' ) ) {
		$classes[] = 'transparent';
	}

	if ( get_theme_mod( 'header_invert_color_scheme' ) ) {
		$classes[] = 'invert';
	}

	echo 'class="' . join( ' ', $classes ) . '"';
}

/**
 * Prints site content CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function techloop_content_class( $classes = array() ) {
	$classes[] = 'site-content';
	echo techloop_get_container_classes( $classes, 'content' );
}

/**
 * Query WooCommerce activation
 */
function techloop_is_woocommerce_activated() {
	return class_exists( 'WooCommerce' );
}

/**
 * Prints site content wrap CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function techloop_content_wrap_class( $classes = array() ) {
	$classes[] = 'site-content_wrap';

	if ( function_exists( 'tm_pb_is_pagebuilder_used' ) ) {
		if ( ! tm_pb_is_pagebuilder_used( get_the_ID() ) || is_search() ) {
			$classes[] = 'container';
		}
	} else {
		$classes[] = 'container';
	}

	$classes = apply_filters( 'techloop_content_wrap_classes', $classes );

	echo 'class="' . join( ' ', $classes ) . '"';
}

/**
 * Prints site footer CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function techloop_footer_class( $classes = array() ) {
	$classes[] = 'site-footer';
	$classes[] = get_theme_mod( 'footer_layout_type' );

	if ( techloop_widget_area()->is_active_sidebar( 'after-content-full-width-area' ) ) {
		$classes[] = 'before-full-width-area';
	}

	echo techloop_get_container_classes( $classes, 'footer' );
}

/**
 * Retrieve a CSS class attribute for container based on `Page Layout Type` option.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return string
 */
function techloop_get_container_classes( $classes, $target = 'content' ) {

	$layout_type = get_theme_mod( $target . '_container_type' );

	if ( 'boxed' == $layout_type ) {
		$classes[] = 'container';
	}

	return 'class="' . join( ' ', $classes ) . '"';
}

/**
 * Prints primary content wrapper CSS classes.
 *
 * @since  1.0.0
 * @param  array $classes Additional classes.
 * @return void
 */
function techloop_primary_content_class( $classes = array() ) {
	echo techloop_get_layout_classes( 'content', $classes );
}

/**
 * Get CSS class attribute for passed layout context.
 *
 * @since  1.0.0
 * @param  string $layout  Layout context.
 * @param  array  $classes Additional classes.
 * @return string
 */
function techloop_get_layout_classes( $layout = 'content', $classes = array() ) {
	$sidebar_position = get_theme_mod( 'sidebar_position' );
	$sidebar_width    = get_theme_mod( 'sidebar_width' );

	if ( 'fullwidth' === $sidebar_position ) {
		$sidebar_width = 0;
	}

	$layout_classes = ! empty( techloop_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] ) ? techloop_theme()->layout[ $sidebar_position ][ $sidebar_width ][ $layout ] : array();

	$layout_classes = apply_filters( "techloop_{$layout}_classes", $layout_classes );

	if ( ! empty( $classes ) ) {
		$layout_classes = array_merge( $layout_classes, $classes );
	}

	if ( empty( $layout_classes ) ) {
		return '';
	}

	return 'class="' . join( ' ', $layout_classes ) . '"';
}

/**
 * Retrieve or print `class` attribute for Post List wrapper.
 *
 * @since  1.0.0
 * @param  array   $classes Additional classes.
 * @param  boolean $echo    True for print. False - return.
 * @return string|void
 */
function techloop_posts_list_class( $classes = array(), $echo = true ) {
	$layout_type         = get_theme_mod( 'blog_layout_type', techloop_theme()->customizer->get_default( 'blog_layout_type' ) );
	$layout_type         = ! is_search() ? $layout_type : 'default';
	$sidebar_position    = get_theme_mod( 'sidebar_position', techloop_theme()->customizer->get_default( 'sidebar_position' ) );
	$blog_content        = get_theme_mod( 'blog_posts_content', techloop_theme()->customizer->get_default( 'blog_posts_content' ) );
	$blog_featured_image = ! is_search() ? get_theme_mod( 'blog_featured_image', techloop_theme()->customizer->get_default( 'blog_featured_image' ) ) : 'none';

	$classes[] = 'posts-list';
	$classes[] = 'posts-list--' . sanitize_html_class( $layout_type );
	$classes[] = 'content-' . sanitize_html_class( $blog_content );
	$classes[] = sanitize_html_class( $sidebar_position );

	if ( in_array( $layout_type, array( 'grid-3-cols', 'grid-4-cols' ) ) ) {
		$classes[] = 'card-deck';
	}

	if ( in_array( $layout_type, array( 'masonry-3-cols', 'masonry-4-cols' ) ) ) {
		$classes[] = 'card-columns';
	}

	if ( 'default' === $layout_type ) {
		$classes[] = 'featured-image--' . sanitize_html_class( $blog_featured_image );
	}

	$sidebars = array(
		'full-width-header-area',
		'before-content-area',
		'before-loop-area',
	);

	$has_sidebars = false;

	foreach ( $sidebars as $sidebar ) {
		if ( techloop_widget_area()->is_active_sidebar( $sidebar ) ) {
			$has_sidebars = true;
		}
	}

	if ( ! $has_sidebars && is_home() ) {
		$classes[] = 'no-sidebars-before';
	}

	$classes = apply_filters( 'techloop_posts_list_class', $classes );

	$output = 'class="' . join( ' ', $classes ) . '"';

	if ( ! $echo ) {
		return $output;
	}

	echo $output;
}

/**
 * Check if product paage currently displaying
 *
 * @return bool
 */
function techloop_is_product_page() {
	if ( ! function_exists( 'is_product' ) || ! function_exists( 'is_shop' ) || ! function_exists( 'is_product_category' ) ) {
		return false;
	}

	return is_product() || is_shop() || is_product_category();
}
