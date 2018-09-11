<?php
/**
 * Thumbnails configuration.
 *
 * @package Techloop
 */

add_action( 'after_setup_theme', 'techloop_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function techloop_register_image_sizes() {
	set_post_thumbnail_size( 420, 338, true );

	// Registers a new image sizes.
	add_image_size( 'techloop-thumb-xs', 81, 65, true );
	add_image_size( 'techloop-thumb-s', 150, 150, true );
	add_image_size( 'techloop-slider-thumb', 158, 88, true );
	add_image_size( 'techloop-thumb-m', 400, 400, true );
	add_image_size( 'techloop-thumb-m-2', 420, 340, true );
	add_image_size( 'techloop-thumb-m-3', 530, 530, true );
	add_image_size( 'techloop-thumb-masonry', 420, 9999 );
	add_image_size( 'techloop-thumb-l', 886, 668, true );
	add_image_size( 'techloop-thumb-l-2', 886, 315, true );
	add_image_size( 'techloop-thumb-xl', 1770, 817, true );
	add_image_size( 'techloop-author-avatar', 190, 190, true );

	add_image_size( 'techloop-woo-cart-product-thumb', 191, 237, true ); // for cart page, wishlist, compare
	add_image_size( 'techloop-thumb-products-smart-box-widget', 317, 393, true ); // for products smart box widget
	add_image_size( 'techloop-thumb-listing-line-product', 672, 835, true ); // for listing-line-product
	add_image_size( 'techloop-thumb-product-category', 436, 436, true ); // for listing-line-product
}
