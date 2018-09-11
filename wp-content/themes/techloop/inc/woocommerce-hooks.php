<?php


if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'techloop_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'techloop_cart_link_fragment' );
}


/**
 * Wiistroid WooCommerce Theme hooks.
 *
 * @package Wiistroid
 */

add_action( 'after_setup_theme', 'techloop_woocommerce_support' );

/**
 * Remove Woocommerce bootstrap grid
 *
 */
add_filter( 'tm_woocommerce_include_bootstrap_grid', 'techloop_woocommerce_include_bootstrap_grid' );

/**
 * Product Loop Items.
 *
 * @see techloop_product_image_wrap_open()
 * @see techloop_woowishlist_add_button_loop()
 * @see techloop_woocompare_add_button_loop()
 * @see techloop_compare_wishlist_wrap_open()
 * @see techloop_compare_wishlist_wrap_close()
 * @see techloop_compare_wishlist_wrap_list_open()
 * @see techloop_compare_wishlist_wrap_list_close()
 * @see techloop_product_content_wrap_open()
 * @see techloop_product_content_wrap_close()
 * @see techloop_woocommerce_list_categories()
 * @see techloop_template_loop_product_title()
 * @see techloop_woocommerce_template_loop_rating()
 * @see techloop_woocommerce_template_loop_rating_list()
 * @see techloop_woowishlist_add_button_loop()
 * @see techloop_woocommerce_template_loop_rating_list()
 * @see techloop_woocompare_add_button_loop_list()
 * @see techloop_woocommerce_display_short_excerpt()
 * @see woocommerce_template_loop_product_link_open()
 * @see woocommerce_template_loop_product_link_close()
 * @see woocommerce_template_loop_price()
 * @see techloop_product_content_inner_open()
 * @see techloop_product_content_inner_close()
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'tm_woowishlist_add_button_loop', 12 );
remove_action( 'woocommerce_after_shop_loop_item', 'tm_woocompare_add_button_loop', 12 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'tm_smart_box_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

add_action( 'woocommerce_before_shop_loop_item', 'techloop_product_image_wrap_open', 2 ); // open block_product_thumbnail
add_action( 'woocommerce_after_shop_loop_item', 'techloop_product_content_inner_open', 9 ); // open techloop_product_content_inner_open
add_action( 'woocommerce_after_shop_loop_item', 'techloop_compare_wishlist_wrap_open', 11 ); // open wishlist_compare_button_block
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woowishlist_add_button_loop', 12 );
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woocompare_add_button_loop', 12 );
add_action( 'woocommerce_after_shop_loop_item', 'techloop_compare_wishlist_wrap_close', 14 ); // close wishlist_compare_button_block
add_action( 'woocommerce_after_shop_loop_item', 'techloop_product_content_inner_close', 15 ); // close techloop_product_content_inner_close
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 8 ); //open link
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 10 ); //close link
add_action( 'woocommerce_before_shop_loop_item_title', 'techloop_product_image_wrap_close', 11 ); // close block_product_thumbnail
add_action( 'woocommerce_before_shop_loop_item_title', 'techloop_product_content_wrap_open', 11 ); // open block_product_content
add_action( 'woocommerce_shop_loop_item_title', 'techloop_woocommerce_list_categories', 9 );
add_action( 'woocommerce_shop_loop_item_title', 'techloop_template_loop_product_title', 10 ); // Title
add_action( 'woocommerce_after_shop_loop_item', 'techloop_product_content_wrap_close', 12 ); // close block_product_content
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woocommerce_template_loop_price_grid', 5 ); // Price
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woocommerce_template_loop_rating', 7 ); // rating
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woocommerce_display_short_excerpt', 9 );
add_action( 'tm_smart_box_woocommerce_shop_loop_item_title', 'techloop_template_loop_product_title_widget', 10 );
add_filter( 'techloop_pb_module_posts_layout_3_excerpt_visible', '__return_true' );
add_filter( 'techloop_pb_module_posts_layout_3_more_btn_visible', '__return_true' );
add_filter( 'techloop_product_thumbnails_data_attr_filter', 'techloop_product_thumbnails_data_attr_filter' );
add_filter( 'techloop_woocommerce_product_loop_carousel_data_attr', 'techloop_woocommerce_product_loop_carousel_data_attr' );
add_filter( 'techloop_single_product_sidebar_show', '__return_false' );
add_filter( 'techloop_content_classes', 'techloop_single_set_specific_content_classes' );

add_action( 'woocommerce_after_shop_loop_item', 'techloop_woocommerce_template_loop_rating_list', 8 ); // rating for horizontal layout
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woocommerce_template_loop_price_list', 5 ); // Price for horizontal layout
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woowishlist_add_button_loop_list', 11 );
add_action( 'woocommerce_after_shop_loop_item', 'techloop_woocompare_add_button_loop_list', 11 );
add_action( 'woocommerce_after_shop_loop_item', 'techloop_compare_wishlist_wrap_list_open', 10 ); // open wishlist_compare_button_block for horizontal layout
add_action( 'woocommerce_after_shop_loop_item', 'techloop_compare_wishlist_wrap_list_close', 12 ); // close wishlist_compare_button_block for horizontal layout
add_filter( 'woocommerce_sale_flash', 'techloop_woocommerce_sale_flash', 20, 2 ); //Sale Flash
add_filter( 'tm_woo_quick_view_button_hook', 'techloop_tm_woo_quick_view_button_hook' );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 11 );


/**
 * Category Loop Items.
 *
 * @see techloop_woocommerce_template_loop_category_title()
 * @see techloop_woocommerce_subcategory_thumbnail()
 * @see techloop_get_product_thumbnail_size()
 */
remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
remove_action( 'woocommerce_shop_loop_subcategory_title', 'tm_wc_ajax_filters_shop_loop_subcategory_title', 10 );
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'woocommerce_after_subcategory', 'techloop_woocommerce_template_loop_category_title', 10 );
add_action( 'woocommerce_before_subcategory_title', 'techloop_woocommerce_subcategory_thumbnail', 10, 2 );
add_action( 'woocommerce_before_shop_loop_item_title', 'techloop_get_product_thumbnail_size', 9 );

/**
 * Single Products Loop Items.
 *
 * @see techloop_compare_wishlist_wrap_open()
 * @see techloop_compare_wishlist_wrap_close()
 * @see woocommerce_template_single_rating()
 * @see toastie_wc_smsb_form_code()
 * @see techloop_woocommerce_output_related_up_sells_products_args()
 * @see template_loop_sold_by()
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

if ( function_exists( 'toastie_wc_smsb_form_code' ) ) {
	remove_action('woocommerce_single_product_summary', 'toastie_wc_smsb_form_code', 31);
	add_action( 'woocommerce_single_product_summary', 'toastie_wc_smsb_form_code', 45);
}

add_action( 'woocommerce_single_product_summary', 'techloop_compare_wishlist_wrap_open', 34 );
add_action( 'woocommerce_single_product_summary', 'techloop_compare_wishlist_wrap_close', 36 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 12 );

if ( class_exists( 'WCV_Vendor_Shop' ) && WC_Vendors::$pv_options->get_option( 'sold_by' ) ) {
	remove_action( 'woocommerce_after_shop_loop_item', array('WCV_Vendor_Shop', 'template_loop_sold_by'), 9 );
	add_action( 'woocommerce_before_shop_loop_item', 'techloop_template_loop_sold_by', 15 );
}


/**
 * Swiper arrows position
 *
 * @see techloop_tm_categories_carousel_widget_arrows_pos()
 */
add_filter( 'tm_categories_carousel_widget_arrows_pos', 'techloop_tm_categories_carousel_widget_arrows_pos' );
add_filter( 'tm_products_carousel_widget_arrows_pos', 'techloop_tm_categories_carousel_widget_arrows_pos' );
add_filter( 'tm_wc_products_carousel_widget_visible', 'techloop_wc_products_carousel_widget_visible' );

/**
 * Single product wrap elements
 *
 * @see techloop_single_product_open_wrapper()
 * @see techloop_single_product_close_wrapper()
 * @see techloop_before_single_product_image_wrap_before()
 * @see techloop_before_single_product_image_wrap_after()
 * @see techloop_before_single_product_summary_wrap_before()
 * @see techloop_before_single_product_summary_wrap_after()
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 8 );


/**
 * Single product images
 *
 */
remove_action( 'tm_smart_box_woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'tm_smart_box_woocommerce_before_shop_loop_item_title', 'techloop_woocommerce_template_loop_product_thumbnail_custom_size', 10 );


add_filter( 'tm_products_smart_box_widget__cat_img_size', 'techloop_products_smart_box_widget__cat_img_size' );


/**
 * Change sale and date format
 *
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'tm_products_carousel_widget_sale_end_date', 11 );
if ( function_exists( 'tm_products_carousel_widget_sale_end_date' ) ) {
	add_action( 'woocommerce_before_shop_loop_item_title', 'tm_products_carousel_widget_sale_end_date', 10 );
};

/**
 * Add new and featured badge
 * @see techloop_woocommerce_show_flash
 */
add_action( 'woocommerce_before_shop_loop_item', 'techloop_woocommerce_show_flash', 12 );
add_action( 'woocommerce_before_single_product_summary', 'techloop_woocommerce_show_flash', 30 );


/**
 * Change layout of price
 * @see techloop_woocommerce_get_price_html_from_to
 */
add_filter( 'woocommerce_get_price_html_from_to', 'techloop_woocommerce_get_price_html_from_to', 10, 3 );

/**
 * Wrap swiper carousel
 *
 */
add_filter( 'tm_products_carousel_widget_wrapper_open', 'techloop_tm_products_carousel_widget_wrapper_open' );
add_filter( 'tm_products_carousel_widget_wrapper_close', 'techloop_tm_products_carousel_widget_wrapper_close' );

/**
 *
 * Remove woocommerce breadcrumb & deffault woo-sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

add_filter( 'cherry_breadcrumbs_custom_trail', 'techloop_get_woo_breadcrumbs', 10, 2 );

remove_filter( 'post_class', 'wc_product_post_class', 20 );
add_filter( 'post_class', 'techloop_woo_loop_columns', 20, 3 );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 12 );


/**
 *
 * Changed cart and checkout woo-page
 */
add_action( 'woocommerce_before_checkout_form', 'techloop_before_login_form_wrap', 9 );
add_action( 'woocommerce_before_checkout_form', 'techloop_after_login_form_wrap', 11 );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 15 );

add_action( 'woocommerce_before_checkout_form', 'techloop_before_checkout_coupon_form', 14 );
add_action( 'woocommerce_before_checkout_form', 'techloop_after_checkout_coupon_form', 16 );

/**
 * Update format sale end date to TM Woocommerce Package widget
 *
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'techloop_products_sale_end_date', 10 );


/**
 * Add layout synchronization for product loop and product carousel widget
 *
 */
add_filter( 'tm_products_carousel_widget_hooks', 'techloop_products_carousel_widget_hooks'  );


/**
 * Add synchronization ajax-filter-widget in footer
 *
 */
add_filter( 'tm_wc_ajax_sidebar_before', 'techloop_ajax_sidebar_before', 10, 2 );
add_filter( 'tm_wc_ajax_sidebar_after', 'techloop_ajax_sidebar_after', 10, 2 );

/**
 * Remove woo-pagination and added theme pagination
 *
 */

add_filter( 'woocommerce_pagination_args', 'techloop_woocommerce_pagination_args', 10 );

add_filter( 'tm_banners_grid_widget_grids', 'techloop_banners_grid_widget_grids' );

/**
 * Single Product Sale Flash
 *
 */

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 30 );
add_action( 'woocommerce_before_single_product_summary', 'techloop_before_single_product_summary_wrap_before', 18 );
add_action( 'woocommerce_single_product_summary', 'techloop_before_single_product_category', 1 );

add_action( 'woocommerce_before_single_product_summary', 'techloop_before_single_product_summary_wrap_after', 98 );
add_action( 'woocommerce_after_single_product_summary', 'techloop_after_single_product_summary_wrap', 1 );

/**
 * Change quickview button position
 */

add_filter( 'tm_compare_count_format', 'techloop_compare_count_format');
add_filter( 'tm_woo_quick_view_button_hook', 'techloop_tm_woo_quick_view_button_hook' );

/**
 * Register scripts for single product gallery
 */
add_action( 'wp_enqueue_scripts', 'techloop_enqueue_assets', 11 );

add_filter( 'tm_wc_ahax_filters_loader', 'techloop_wc_compare_wishlist_ahax_filters_loader' );
add_filter( 'tm_wc_compare_wishlist_loader', 'techloop_wc_compare_wishlist_ahax_filters_loader' );

add_filter( 'tm_wc_qw_product_title', 'techloop_wc_qw_product_title');

/**
 * Add custom wcvendors pro css classes
 */
if (class_exists( 'WCV_Vendors' )) {
	add_filter( 'body_class', 'techloop_body_class_wc_vendors' );
}

add_filter( 'tm_woocommerce_carousel_data_atts', 'techloop_carousel_columns', 10, 3 );