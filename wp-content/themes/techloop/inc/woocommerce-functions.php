<?php
/**
 * Techloop WooCommerce Theme hooks.
 *
 * @package techloop
 */

/**
 * Enable Woocommerce theme support
 */
function techloop_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Check availability tm_wc_ajax - plugin
 *
 * @return bollean
 */
function techloop_is_ajax_shop() {
	if ( function_exists( 'tm_wc_ajax_is_shop' ) ) {
		return tm_wc_ajax_is_shop();
	} else {
		return false;
	}
}


/**
 * Change WooCommerce loop category title layout
 *
 * @param object $category
 *
 * @return string
 */
function techloop_woocommerce_template_loop_category_title( $category ) {
	?>
	<div class="title_count_block">
		<h3><?php
			echo '<a href="' . get_term_link( $category, 'product_cat' ) . '">' . $category->name . '</a>';
			?>
		</h3>
		<?php if ( 0 < $category->count ) {
			echo '<a href="' . get_term_link( $category, 'product_cat' ) . '"  class="count">' . apply_filters( 'woocommerce_subcategory_count_html', ' <span><span class="count__number">' . $category->count . '</span> ' . _n( 'products', 'product', $category->count, 'techloop' ) . '</span>', $category ) . '</a>';
		}
		?>
	</div>
	<?php
}

/**
 * Arrows position swiper
 *
 * @return string
 */
function techloop_tm_categories_carousel_widget_arrows_pos() {
	return 'outside';
}


/**
 * Print sale and date format
 *
 * @return string
 */


function techloop_products_sale_end_date() {
	global $product;
	$sale_end_date = get_post_meta( get_the_id(), '_sale_price_dates_to', true );
	if ( '' != $sale_end_date ) {
		$data_format   = apply_filters( 'tm_products_sale_end_date_format', sprintf( '<span>%%D <i>%1$s</i></span> <span>%%H <i>%2$s</i></span><span>%%M <i>%3$s</i></span>', esc_html__( 'days', 'techloop' ), esc_html__( 'Hrs', 'techloop' ), esc_html__( 'Min', 'techloop' ) ) );
		$sale_end_date = '<span class="tm-products-sale-end-date" data-countdown="' . date( 'Y/m/d', $sale_end_date ) . '" data-format="' . $data_format . '"></span>';
	}
	echo $sale_end_date;
}

/**
 * Add WooCommerce 'New' and 'Featured' Flashes
 *
 * @return string
 */
function techloop_woocommerce_show_flash() {
	global $product;

	if ( ! $product->is_on_sale() ) {

		if ( 604800 > ( date( 'U' ) - strtotime( get_the_date() ) ) ) {
			echo '<span class="new">' . esc_html__( 'New', 'techloop' ) . '</span>';
		} else if ( $product->is_featured() ) {
			echo '<span class="featured">' . esc_html__( 'Featured', 'techloop' ) . '</span>';
		}
	}
}

/**
 * Change WooCommerce Price Output when Product is on Sale
 *
 * @param  string $price Price
 * @param  int|string $from Regular price
 * @param  int|string $to Sale price
 *
 * @return string
 */
function techloop_woocommerce_get_price_html_from_to( $price, $from, $to ) {
	$price = '<ins>' . ( ( is_numeric( $to ) ) ? wc_price( $to ) : $to ) . '</ins> <del>' . ( ( is_numeric( $from ) ) ? wc_price( $from ) : $from ) . '</del>';

	return $price;
}


/**
 * Open wrap comapre & wishlist button grid-listing
 *
 * @param $atts
 */
function techloop_compare_wishlist_wrap_open( $atts = '' ) {
	if ( 'list' !== $atts ) {
		echo '<div class="wishlist_compare_button_block">';
	}
}


/**
 * Close wrap comapre & wishlist button grid-listing
 *
 * @param $atts
 */
function techloop_compare_wishlist_wrap_close( $atts = '' ) {
	if ( 'list' !== $atts ) {
		echo '</div>';
	}
}

/**
 * Open product content inner grid
 *
 * @param $atts
 */
function techloop_product_content_inner_open( $atts = '' ) {
	if ( 'list' !== $atts ) {
		echo '<div class="product-content-inner">';
	}
}


/**
 * Close product content inner grid
 *
 * @param $atts
 */
function techloop_product_content_inner_close( $atts = '' ) {
	if ( 'list' !== $atts ) {
		echo '</div>';
	}
}

/**
 * Open wrap comapre & wishlist button list-listing
 *
 * @param $atts
 */
function techloop_compare_wishlist_wrap_list_open( $atts = '' ) {
	if ( 'list' === $atts ) {
		echo '<div class="wishlist_compare_button_block">';
	}
}

/**
 * Close wrap comapre & wishlist button list-listing
 *
 * @param $atts
 */
function techloop_compare_wishlist_wrap_list_close( $atts = '' ) {
	if ( 'list' === $atts ) {
		echo '</div>';
	}
}

/**
 * Rewrite functions compare & wishlist for grid or listing layouts
 *
 * @param $atts
 */
function techloop_woocompare_add_button_loop( $atts = '' ) {
	if ( 'list' !== $atts && function_exists( 'tm_woocompare_add_button_loop' ) ) {
		tm_woocompare_add_button_loop( $atts );
	}
}

function techloop_woocompare_add_button_loop_list( $atts = '' ) {
	if ( 'list' === $atts && function_exists( 'tm_woocompare_add_button_loop' ) ) {
		tm_woocompare_add_button_loop( $atts );
	}
}

function techloop_woowishlist_add_button_loop( $atts = '' ) {
	if ( 'list' !== $atts && function_exists( 'tm_woowishlist_add_button_loop' ) ) {
		tm_woowishlist_add_button_loop( $atts );
	}
}

function techloop_woowishlist_add_button_loop_list( $atts = '' ) {
	if ( 'list' === $atts && function_exists( 'tm_woowishlist_add_button_loop' ) ) {
		tm_woowishlist_add_button_loop( $atts );
	}
}

/**
 * Rewrite functions rating for grid or listing layouts
 *
 * @param $atts
 */
function techloop_woocommerce_template_loop_rating( $atts = '' ) {
	if ( 'list' !== $atts ) {
		woocommerce_template_loop_rating( $atts );
	}
}

function techloop_woocommerce_template_loop_rating_list( $atts = '' ) {
	if ( 'list' === $atts ) {
		woocommerce_template_loop_rating( $atts );
	}
}

/**
 * Display short description for listing-line template product
 *
 * @param $atts
 */
function techloop_woocommerce_display_short_excerpt( $atts = '' ) {
	if ( 'list' === $atts ) {
		echo '<div class="desc_products_listing_line">';
		woocommerce_template_single_excerpt( $atts, 5 );
		echo '</div>';
	}
}

function techloop_woocommerce_template_loop_price_grid( $atts = '' ) {
	if ( 'list' !== $atts ) {
		woocommerce_template_loop_price( $atts );
	}
}

function techloop_woocommerce_template_loop_price_list( $atts = '' ) {
	if ( 'list' === $atts ) {
		woocommerce_template_loop_price( $atts );
	}
}


/**
 * Added custom thumbnail size for listing-line category thumbnail
 *
 * @param $atts , $category
 */
function techloop_woocommerce_subcategory_thumbnail( $category, $atts = '' ) {
	global $_wp_additional_image_sizes;
	if ( 'list' === $atts ) {
		$small_thumbnail_size = apply_filters( 'subcategory_archive_thumbnail_list_size', 'techloop-thumb-listing-line-product' );
		$image_sizes          = get_intermediate_image_sizes();

		if ( in_array( $small_thumbnail_size, $image_sizes ) ) {
			$dimensions['width']  = $_wp_additional_image_sizes[ $small_thumbnail_size ]['width'];
			$dimensions['height'] = $_wp_additional_image_sizes[ $small_thumbnail_size ]['height'];
			$dimensions['crop']   = $_wp_additional_image_sizes[ $small_thumbnail_size ]['crop'];
		} else {
			$dimensions['width']  = '436';
			$dimensions['height'] = '436';
			$dimensions['crop']   = 1;
		}
	} else {
		$small_thumbnail_size = apply_filters( 'subcategory_archive_thumbnail_size', 'techloop-thumb-product-category' );
		$dimensions           = wc_get_image_size( $small_thumbnail_size );
		$dimensions['width']  = $_wp_additional_image_sizes[ $small_thumbnail_size ]['width'];
		$dimensions['height'] = $_wp_additional_image_sizes[ $small_thumbnail_size ]['height'];
		$dimensions['crop']   = $_wp_additional_image_sizes[ $small_thumbnail_size ]['crop'];
	}
	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );

	if ( $thumbnail_id ) {
		$image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size );
		$image = $image[0];
	} else {
		$image = wc_placeholder_img_src();
	}
	if ( $image ) {
		// Prevent esc_url from breaking spaces in urls for image embeds
		// Ref: https://core.trac.wordpress.org/ticket/23605
		$image = str_replace( ' ', '%20', $image );
		echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
	}
}


/**
 * Add links into product title
 *
 * @param $atts
 */
function techloop_template_loop_product_title() {
	echo '<h3><a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link">' . get_the_title() . '</a></h3>';
}

/**
 * Added custom thumbnail size for listing-line products
 *
 * @param $atts
 */
function techloop_get_product_thumbnail_size( $atts = '' ) {
	if ( 'list' === $atts ) {
		echo woocommerce_get_product_thumbnail( 'techloop-thumb-listing-line-product' );
	} else {
		echo woocommerce_get_product_thumbnail();
	}
}

/**
 * Added custom thumbnail size for smart box widget products
 *
 */
function techloop_products_smart_box_widget__cat_img_size() {
	return 'techloop-thumb-products-smart-box-widget';
}

/**
 * Open wrap product loop elements
 *
 * @return string
 */
function techloop_product_image_wrap_open() {
	echo '<div class="block_product_thumbnail">';
}

/**
 * Close wrap product loop elements
 *
 * @return string
 */
function techloop_product_image_wrap_close() {
	echo '</div>';
}

/**
 * Open wrap content product loop elements
 *
 * @return string
 */
function techloop_product_content_wrap_open() {
	echo '<div class="block_product_content">';
}

/**
 * Open wrap content product loop elements
 *
 * @return string
 */
function techloop_product_content_wrap_close() {
	echo '</div>';
}

/**
 * Add product categories in product list
 *
 * @return string
 */
function techloop_woocommerce_list_categories() {

	$sep    = '</li> <li>';
	$before = '<ul class="product-categories"><li>';
	$after  = '</li></ul>';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0', '>=' ) ) {
		echo wc_get_product_category_list( get_the_id(), $sep, $before, $after );
	} else {
		global $product;
		if ( ! empty( $product ) ) {
			echo $product->get_categories( $sep, $before, $after );
		}
	}

}

/**
 * Add layout synchronization for product loop and product carousel widget
 *
 * @param $hooks
 *
 * @return array
 */

function techloop_products_carousel_widget_hooks( $hooks ) {

	$hooks['cat'] = array(
		'woocommerce_shop_loop_item_title',
		'techloop_woocommerce_list_categories',
		9,
		1
	);

	$hooks['title'] = array(
		'woocommerce_shop_loop_item_title',
		'techloop_template_loop_product_title',
		10,
		1
	);

	$hooks['price'] = array(
		'woocommerce_after_shop_loop_item',
		'techloop_woocommerce_template_loop_price_grid',
		5,
		1
	);

	$hooks['desc'] = array(
		'woocommerce_after_shop_loop_item',
		'tm_products_carousel_widget_desc',
		5,
		1
	);

	return $hooks;
}

/**
 * Open wrapper for carousel loop products
 *
 * @param array Provided arguments
 * @param bool Columns argument for backwards compat
 * @param bool Order by argument for backwards compat
 */
function techloop_woocommerce_product_loop_carousel_start( $echo = true, $swiper = false, $columns = 4 ) {
	$uniqid            = uniqid();
	$GLOBALS['uniqid'] = $uniqid;

	$data_attr_array = apply_filters( 'techloop_woocommerce_product_loop_carousel_data_attr', array(
		'class'                     => 'techloop-carousel swiper-container',
		'data-slides-per-view'      => $columns,
		'data-slides-per-view-xs'   => '1',
		'data-slides-per-view-sm'   => '2',
		'data-slides-per-view-md'   => '3',
		'data-slides-per-view-lg'   => '3',
		'data-slides-per-group'     => '1',
		'data-slides-per-column'    => '1',
		'data-space-between-slides' => '50',
		'data-duration-speed'       => '500',
		'data-swiper-loop'          => 'false',
		'data-free-mode'            => 'false',
		'data-grab-cursor'          => 'true',
		'data-mouse-wheel'          => 'false'
	) );

	$data_attr_line = 'class="' . $data_attr_array['class'] . '"';
	$data_attr_line .= ' data-uniq-id="swiper-carousel-' . $uniqid . '"';
	$data_attr_line .= ' data-slides-per-view="' . $data_attr_array['data-slides-per-view'] . '"';
	$data_attr_line .= ' data-slides-per-view-xs="' . $data_attr_array['data-slides-per-view-xs'] . '"';
	$data_attr_line .= ' data-slides-per-view-sm="' . $data_attr_array['data-slides-per-view-sm'] . '"';
	$data_attr_line .= ' data-slides-per-view-md="' . $data_attr_array['data-slides-per-view-md'] . '"';
	$data_attr_line .= ' data-slides-per-view-lg="' . $data_attr_array['data-slides-per-view-lg'] . '"';
	$data_attr_line .= ' data-slides-per-group="' . $data_attr_array['data-slides-per-group'] . '"';
	$data_attr_line .= ' data-slides-per-column="' . $data_attr_array['data-slides-per-column'] . '"';
	$data_attr_line .= ' data-space-between-slides="' . $data_attr_array['data-space-between-slides'] . '"';
	$data_attr_line .= ' data-duration-speed="' . $data_attr_array['data-duration-speed'] . '"';
	$data_attr_line .= ' data-swiper-loop="' . $data_attr_array['data-swiper-loop'] . '"';
	$data_attr_line .= ' data-free-mode="' . $data_attr_array['data-free-mode'] . '"';
	$data_attr_line .= ' data-grab-cursor="' . $data_attr_array['data-grab-cursor'] . '"';
	$data_attr_line .= ' data-mouse-wheel="' . $data_attr_array['data-mouse-wheel'] . '"';

	$html = '<div class="swiper-carousel-container">';
	$html .= '<div id="swiper-carousel-' . $uniqid . '" ' . $data_attr_line . '>';
	$html .= '<div class="swiper-wrapper">';

	if ( true === $echo ) {
		echo $html;
	} else {
		return $html;
	}
}


/**
 * Closed wrapper for carousel loop products
 *
 * @param type|bool $echo
 * @param type|bool $swiper
 */
function techloop_woocommerce_product_loop_carousel_end( $echo = true, $swiper = false ) {

	global $uniqid;
	$html = '</div>';
	$html .= '</div>';
	$html .= '<div id="swiper-carousel-' . $uniqid . '-next" class="swiper-button-next button-next"></div><div id="swiper-carousel-' . $uniqid . '-prev" class="swiper-button-prev button-prev"></div>';
	$html .= '</div>';
	unset( $GLOBALS['uniqid'] );
	if ( true === $echo ) {
		echo $html;
	} else {
		return $html;
	}
}


/**
 * Remove Woocommerce bootstrap grid
 *
 * @return bool
 */
function techloop_woocommerce_include_bootstrap_grid() {
	return false;
}


/**
 * Wrap products carousel - div
 *
 * @return stroke
 */
function techloop_tm_products_carousel_widget_wrapper_open() {
	return '<div class="swiper-wrapper tm-products-carousel-widget-wrapper products">';
}

function techloop_tm_products_carousel_widget_wrapper_close() {
	return '</div>';
}

/**
 * Output the related products.
 *
 * @subpackage  Product
 */
function techloop_woocommerce_output_related_products() {

	$args = array(
		'posts_per_page' => 10,
		'columns'        => 4,
		'orderby'        => 'rand'
	);

	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

/**
 * Function for Smartbox thumbnail
 *
 * @return stroke
 */

function techloop_woocommerce_template_loop_product_thumbnail_custom_size() {
	echo woocommerce_get_product_thumbnail( 'techloop-thumb-products-smart-box-widget' );
}


/**
 * Remove woo-pagination and added theme pagination
 *
 * @param type|array $args
 *
 * @return array
 */

function techloop_woocommerce_pagination_args( $args = array() ) {

	$args['prev_text'] = 'prev';
	$args['next_text'] = 'next';
	unset( $args['type'] );
	unset( $args['end_size'] );
	unset( $args['mid_size'] );

	return $args;
}


/**
 * Add number of switch products
 *
 * @param type $classes
 * @param type|string $class
 * @param type|string $post_id
 *
 * @return array
 */

function techloop_woo_loop_columns( $classes, $class = '', $post_id = '', $atts = '' ) {

	if ( is_admin() && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		return $classes;
	}

	global $swiper,
	       $woocommerce_loop_desktop,
	       $woocommerce_loop_laptop,
	       $woocommerce_loop_tablet;

	if ( ! $post_id || 'product' !== get_post_type( $post_id ) ) {
		return $classes;
	}

	if ( $swiper || is_product() ) {
		$classes[] = 'swiper-slide';

		return $classes;
	}

	if ( is_main_query() || techloop_is_ajax_shop() ) {

		// Store column count for displaying the grid
		$default_woo_columns_desktop = techloop_theme()->customizer->get_default( 'woo_column_numbers_desktop' ) ? techloop_theme()->customizer->get_default( 'woo_column_numbers_desktop' ) : 4;
		$default_woo_columns_laptop  = techloop_theme()->customizer->get_default( 'woo_column_numbers_laptop' ) ? techloop_theme()->customizer->get_default( 'woo_column_numbers_laptop' ) : 3;
		$default_woo_columns_tablet  = techloop_theme()->customizer->get_default( 'woo_column_numbers_tablet' ) ? techloop_theme()->customizer->get_default( 'woo_column_numbers_tablet' ) : 3;

		$woo_columns_desktop = get_theme_mod( 'woo_column_numbers_desktop' );
		$woo_columns_laptop  = get_theme_mod( 'woo_column_numbers_laptop' );
		$woo_columns_tablet  = get_theme_mod( 'woo_column_numbers_tablet' );

		if ( empty( $woocommerce_loop_desktop['columns'] ) ) {
			$woocommerce_loop_desktop['columns'] = apply_filters(
				'loop_shop_columns_desktop',
				get_theme_mod( 'woo_column_numbers_desktop', $default_woo_columns_desktop )
			);
		}

		if ( empty( $woocommerce_loop_laptop['columns'] ) ) {
			$woocommerce_loop_laptop['columns'] = apply_filters(
				'loop_shop_columns_laptop',
				get_theme_mod( 'woo_column_numbers_laptop', $default_woo_columns_laptop )
			);
		}

		if ( empty( $woocommerce_loop_tablet['columns'] ) ) {
			$woocommerce_loop_tablet['columns'] = apply_filters(
				'loop_shop_columns_tablet',
				get_theme_mod( 'woo_column_numbers_tablet', $default_woo_columns_tablet )
			);
		}

		$col_desk   = round( 12 / $woocommerce_loop_desktop['columns'] );
		$col_laptop = round( 12 / $woocommerce_loop_laptop['columns'] );
		$col_tablet = round( 12 / $woocommerce_loop_tablet['columns'] );

		$sidebar_position = get_theme_mod( 'sidebar_position' );

		if ( function_exists( 'tm_wc_grid_list' ) && isset( tm_wc_grid_list()->condition ) && 'list' === tm_wc_grid_list()->condition && ( is_shop() || is_product_taxonomy() ) ) {
			return $classes;
		}

		if ( '6' === $woo_columns_desktop && 'fullwidth' !== $sidebar_position ) {
			$classes[] = 'col-xs-12 col-sm-6 col-md-' . $col_tablet . ' col-lg-' . $col_tablet . ' col-xl-' . $col_laptop . ' col-xxl-3';
		} else {
			$classes[] = 'col-xs-12 col-sm-6 col-md-' . $col_tablet . ' col-lg-' . $col_tablet . ' col-xl-' . $col_laptop . ' col-xxl-' . $col_desk;
		}
	}

	return $classes;
}


/**
 * Loop list products column
 *
 * @param type $template_name
 * @param type $template_path
 * @param type $located
 * @param type $args
 */
function techloop_numbers_woo_columns( $template_name, $template_path, $located, $args ) {
	if ( 'content-product.php' === $template_name && isset( $args['swiper'] ) && $args['swiper'] ) {
		$GLOBALS['swiper'] = $args['swiper'];
	} else if ( 'content-product_cat.php' === $template_name && isset( $args['swiper'] ) && $args['swiper'] ) {
		$GLOBALS['swiper'] = $args['swiper'];
	}
}


/**
 * @param $banners_grids
 *
 * @return mixed
 */
function techloop_banners_grid_widget_grids( $banners_grids ) {
	array_push( $banners_grids[3],
		array(
			array( 'w' => 4, 'h' => 2 ),
			array( 'w' => 5, 'h' => 2 ),
			array(
				'w' => 3,
				'h' => array( 1, 1 )
			)
		),
		array(
			array( 'w' => 3, 'h' => 2 ),
			array( 'w' => 6, 'h' => 2 ),
			array(
				'w' => 3,
				'h' => array( 1, 1 )
			)
		)
	);

	array_push( $banners_grids[2],
		array(
			array( 'w' => 3, 'h' => 1 ),
			array( 'w' => 6, 'h' => 1 ),
			array( 'w' => 3, 'h' => 1 )
		)
	);

	array_push( $banners_grids[4],
		array(
			array(
				'w' => 3,
				'h' => array( 1, 1 )
			),
			array(
				'w' => 3,
				'h' => array( 1, 1 )
			),
			array( 'w' => 6, 'h' => 2 ),
		)
	);

	return $banners_grids;

}


/**
 * Single Product Sale Flash
 *
 *
 * @param $post
 * @param $product
 *
 * @return string
 */

function techloop_woocommerce_sale_flash() {
	return '<span class="onsale">' . esc_html__( 'Sale', 'techloop' ) . '</span>';
}


/**
 * Wrap content single product
 *
 */
function techloop_before_single_product_summary_wrap_before() {
	echo '<div class="row single_product_wrapper"><div class="col-xl-6 col-md-12 col-sm-12 col-xs-12"><div class="single-image-container">';
}

function techloop_before_single_product_summary_wrap_after() {
	echo '</div></div><div class="col-xl-6 col-md-12 col-sm-12 col-xs-12">';
}

function techloop_after_single_product_summary_wrap() {
	echo '</div></div>';
}

function techloop_before_single_product_category() {
	global $post, $product;
	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0', '>=' ) ) {
		echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">', '</span>' );
	} else {
		echo $product->get_categories( ', ', '<span class="posted_in">', '</span>' );
	}

}

/**
 * Register scripts for single product gallery
 */
function techloop_enqueue_assets() {
	wp_register_script( 'jquery-easyzoom', TECHLOOP_THEME_URI . '/assets/js/easyzoom.js', array( 'jquery' ), '2.3.1', true );
}


function techloop_before_login_form_wrap() {
	echo '<div class="login-form-wrap">';
}

function techloop_after_login_form_wrap() {
	echo '</div>';
}

function techloop_before_checkout_coupon_form() {
	echo '<div class="coupon-form-wrap">';
}

function techloop_after_checkout_coupon_form() {
	echo '</div>';
}

function techloop_wc_compare_wishlist_ahax_filters_loader() {
	return '<div class="page-preloader"></div>';
}

/**
 * Replace default breadcrubs trail with WooCommerce-related.
 *
 * @param  bool $is_custom_breadcrumbs Default cutom breadcrumbs trigger.
 * @param  array $args Breadcrumb arguments.
 *
 * @return bool|array
 */
function techloop_get_woo_breadcrumbs( $is_custom_breadcrumbs, $args ) {

	if ( ! function_exists( 'is_woocommerce' ) || ! is_woocommerce() ) {
		return false;
	}

	if ( ! class_exists( 'Techloop_Woo_Breadcrumbs' ) ) {
		require_once trailingslashit( TECHLOOP_THEME_CLASSES ) . 'class-woocommerce-breadcrumbs.php';
	}

	$woo_breadcrums = new Techloop_Woo_Breadcrumbs( techloop_theme()->get_core(), $args );

	return array( 'items' => $woo_breadcrums->items, 'page_title' => $woo_breadcrums->page_title );

}

/**
 * Add synchronization ajax-filter-widget in footer-widget-area
 *
 * @param  $html
 * @param  $id
 *
 * @return stroke
 */

function techloop_ajax_sidebar_before( $html, $id ) {
	if ( in_array( $id, array( 'footer-area' ) ) ) {
		$html = str_replace( 'data-sidebar=', 'class="col-xs-12" data-sidebar=', $html );
		$html .= '<div class="row">';
	}

	return $html;
}

function techloop_ajax_sidebar_after( $html, $id ) {
	if ( in_array( $id, array( 'footer-area' ) ) ) {
		$html .= '</div>';
	}

	return $html;
}

function techloop_wc_qw_product_title() {
	global $product;

	if ( empty( $product ) ) {
		return;
	}
	$link  = $product->get_permalink();
	$title = $product->get_title();
	$html  = sprintf( '<h5 itemprop="name" class="product_title entry-title"><a href="%s">%s</a></h5>', $link, $title );

	return $html;
}

/**
 * Change quickview button position
 *
 * @return number
 */

function techloop_tm_woo_quick_view_button_hook( $data ) {
	$data['priority'] = 11;

	return $data;
}

function techloop_compare_count_format() {
	return '<span class="compare-count">( %count% )</span>';
}

/**
 * Replace WC Vendor plugin template loop sold_by
 */
function techloop_template_loop_sold_by() {
	global $product_id;
	$vendor_id     = WCV_Vendors::get_vendor_from_product( $product_id );
	$sold_by_label = WC_Vendors::$pv_options->get_option( 'sold_by_label' );
	$sold_by       = WCV_Vendors::is_vendor( $vendor_id )
		? sprintf( '<a href="%s">%s</a>', WCV_Vendors::get_vendor_shop_page( $vendor_id ), WCV_Vendors::get_vendor_sold_by( $vendor_id ) )
		: get_bloginfo( 'name' );

	wc_get_template( 'vendor-sold-by.php', array(
		'vendor_id'     => $vendor_id,
		'sold_by_label' => $sold_by_label,
		'sold_by'       => $sold_by,

	), 'wc-vendors/front/', wcv_plugin_dir . 'templates/front/' );
}

function techloop_carousel_columns( $atts, $args, $instance ) {

	$atts['space-between-slides'] = 0;

	if ( $atts['slides-per-view'] > 3 ) {
		$atts['custom-breakpoints'] = array(
			'1199' => array(
				'slidesPerView' => 3,
				'spaceBetween'  => 0,
			),
			'767' => array(
				'slidesPerView' => 2,
				'spaceBetween'  => 0,
			),
			'479' => array(
				'slidesPerView' => 1,
				'spaceBetween'  => 0,
			),
		);
	}

	return $atts;
}

/**
 * Carousel TM Woocommerce Package widget visible
 *
 * @return int
 */
function techloop_wc_products_carousel_widget_visible() {
	return 5;
}

/**
 * Add links into product title
 *
 * @param $atts
 */
function techloop_template_loop_product_title_widget() {
	echo '<h3>' . get_the_title() . '</h3>';
}

/**
 * Change data options product thumbnails carousel
 *
 * @param string $atts
 *
 * @return string
 */
function techloop_product_thumbnails_data_attr_filter( $atts = array() ) {
	$atts['data-slides-per-view'] = '6';
	return $atts;
}

/**
 * Change data options product carousel in related products
 *
 * @param string $attr
 *
 * @return string
 */
function techloop_woocommerce_product_loop_carousel_data_attr( $attr = array() ){
	$attr['data-slides-per-view'] = '4';
	$attr['data-space-between-slides'] = '0';

	return $attr;
}


/**
 * Set specific classes on single product page
 *
 * @param $layout_classes
 *
 * @return array
 */
function techloop_single_set_specific_content_classes( $layout_classes ) {

	if ( techloop_is_woocommerce_activated() ){
		if ( is_product() ) {
			$layout_classes = array( 'col-xs-12', 'col-md-12', 'col-xl-12', '' );
		}
	}

	return $layout_classes;
}