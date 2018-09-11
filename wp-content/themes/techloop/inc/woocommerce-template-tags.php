<?php

/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 *
 * @param  array $settings Settings
 *
 * @return array           Settings
 * @since  1.0.0
 */
function techloop_cart_link() {
	if ( ! techloop_is_woocommerce_activated() ) {
		return;
	}
	get_template_part( 'woocommerce/cart-contents' );
}

/**
 * Display Header Cart
 * @since  1.0.0
 * @uses  techloop_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
function techloop_header_cart() {
	if ( ! techloop_is_woocommerce_activated() ) {
		return;
	}
	get_template_part( 'woocommerce/header-cart' );
}

/**
 * Show top currency switcher.
 *
 * @since  1.0.0
 *
 * @param  string $format Output formatting.
 *
 * @return void
 */
function techloop_currency_switcher() {
	if ( shortcode_exists( 'woocs' ) ) {
		echo do_shortcode( '[woocs show_flags=0 width="70px" txt_type="code"]' );
	}
}

/**
 * Display dropdown cart content-block
 * @since  1.0.0
 * @uses  techloop_cart_link()
 * @return void
 */
function techloop_cart_link_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	techloop_cart_link();
	$fragments[ 'div.cart-contents' ] = ob_get_clean();

	return $fragments;
}

/**
 * Open category listing item.
 *
 * @param  object $category Current category object.
 * @param  bool   $is_widget Widget trigger.
 *
 * @return void
 */
function techloop_woo_open_category_tag( $category = null, $is_widget = false ) {

	global $woocommerce_loop;

	// Store loop count we're currently on.
	if ( empty( $woocommerce_loop[ 'loop' ] ) ) {
		$woocommerce_loop[ 'loop' ] = 0;
	}

	// Store column count for displaying the grid.
	$default_woo_columns = techloop_theme()->customizer->get_default( 'woo_column_numbers' ) ? techloop_theme()->customizer->get_default( 'woo_column_numbers' ) : 4;
	$current_woo_columns = get_theme_mod( 'woo_column_numbers' );

	if ( empty( $woocommerce_loop[ 'columns' ] ) ) {
		$woocommerce_loop[ 'columns' ] = apply_filters( 'loop_shop_columns', get_theme_mod( 'woo_column_numbers', $default_woo_columns ) );
	}

	$col              = round( 12 / $woocommerce_loop[ 'columns' ] );
	$sidebar_position = get_theme_mod( 'sidebar_position' );
	$classes          = array();

	if ( function_exists( 'tm_wc_grid_list' ) && isset( tm_wc_grid_list()->condition ) && 'list' === tm_wc_grid_list()->condition ) {
		return $classes;
	}

	if ( '6' === $current_woo_columns && 'fullwidth' !== $sidebar_position ) {
		$classes[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4';
	} else if ( '4' === $current_woo_columns && 'fullwidth' !== $sidebar_position ) {
		$classes[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-3';
	} else if ( 'fullwidth' === $sidebar_position && '6' === $current_woo_columns ) {
		$classes[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-' . $col;
	} else {
		$classes[] = 'col-xs-12 col-sm-6 col-md-6 col-lg-' . $col . ' col-xl-' . $col;
	}

	if ( ! empty( $is_widget ) ) { ?>
		<li <?php wc_product_cat_class( $classes, $category ); ?>>
	<?php } else { ?>
		<div <?php wc_product_cat_class( $classes, $category ); ?>>
		<?php
	}

}

/**
 * Close category listing item.
 *
 * @param  object $category Current category object.
 * @param  bool   $is_widget Widget trigger.
 *
 * @return void
 */
function techloop_woo_close_category_tag( $category = null, $is_widget = false ) {

	if ( ! empty( $is_widget ) ) { ?>
		</li>
	<?php } else { ?>
		</div>
	<?php }
}

/**
 * Add custom wcvendors css classes
 *
 * @param array $classes - body css classes
 *
 * @return array $classes - body css classes
 */
function techloop_body_class_wc_vendors( $classes ) {
	$is_vendor = WCV_Vendors::is_vendor( get_current_user_id() );

	$dashboard_page   = WC_Vendors::$pv_options->get_option( 'vendor_dashboard_page' );
	$orders_page_shop = WC_Vendors::$pv_options->get_option( 'product_orders_page' );
	$shop_settings    = WC_Vendors::$pv_options->get_option( 'shop_settings_page' );
	$terms_page       = WC_Vendors::$pv_options->get_option( 'terms_to_apply_page' );

	if ( $is_vendor && ( is_page( $dashboard_page ) || is_page( $orders_page_shop ) || is_page( $shop_settings ) || is_page( $terms_page ) ) ) {
		$classes[] = 'wcvendors' . ' ' . 'wcvendors_vendor';
	} else if ( is_page( $dashboard_page ) || is_page( $orders_page_shop ) || is_page( $shop_settings ) || is_page( $terms_page ) ) {
		$classes[] = 'wcvendors' . ' ' . 'wcvendors_not_vendor';
	}

	return $classes;
}