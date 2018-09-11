<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="cart-content">

	<div class="row">
		<div class="col-xs-12 col-xl-8 col-xxl-9">
			<div class="cart-wrap woocommerce">

				<?php
				wc_print_notices();

				do_action( 'woocommerce_before_cart' ); ?>

				<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

					<?php do_action( 'woocommerce_before_cart_table' ); ?>

					<table class="shop_table shop_table_responsive cart" cellspacing="0">
						<thead>
						<tr>
							<th class="product-name"><?php esc_html_e( 'Product(s)', 'techloop' ); ?></th>
							<th colspan="2" class="product-thumbnail">&nbsp;</th>
							<th class="product-price"><?php esc_html_e( 'Price', 'techloop' ); ?></th>
							<th class="product-quantity"><?php esc_html_e( 'Quantity', 'techloop' ); ?></th>
							<th class="product-subtotal"><?php esc_html_e( 'Total', 'techloop' ); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item[ 'data' ], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item[ 'product_id' ], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item[ 'quantity' ] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

									<td class="product-thumbnail">
										<div class="product-remove">
											<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__( 'Remove this item', 'techloop' ), esc_attr( $product_id ), esc_attr( $_product->get_sku() ) ), $cart_item_key );
											?>
										</div>
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'techloop-woo-cart-product-thumb' ), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo $thumbnail;
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
										}
										?>
									</td>

									<td class="product-name" colspan="2"
									    data-title="<?php esc_html_e( 'Product', 'techloop' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
										} else {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
										}

										// Meta data
										echo WC()->cart->get_item_data( $cart_item );

										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item[ 'quantity' ] ) ) {
											echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'techloop' ) . '</p>';
										}
										?>
									</td>

									<td class="product-price" data-title="<?php esc_html_e( 'Price', 'techloop' ); ?>">
										<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
										?>
									</td>

									<td class="product-quantity" data-title="<?php esc_html_e( 'Quantity', 'techloop' ); ?>">
										<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input( array(
												'input_name'  => "cart[{$cart_item_key}][qty]",
												'input_value' => $cart_item[ 'quantity' ],
												'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
												'min_value'   => '0'
											), $_product, false );
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
										?>
									</td>

									<td class="product-subtotal" data-title="<?php esc_html_e( 'Total', 'techloop' ); ?>">
										<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item[ 'quantity' ] ), $cart_item, $cart_item_key );
										?>
									</td>
								</tr>
								<?php
							}
						}

						do_action( 'woocommerce_cart_contents' );
						?>
						<tr>
							<td colspan="6" class="actions">
								<?php if ( wc_coupons_enabled() ) { ?>
									<div class="coupon">
										<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'techloop' ); ?></label>
										<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'techloop' ); ?>"/>
										<input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'techloop' ); ?>"/>

										<?php do_action( 'woocommerce_cart_coupon' ); ?>
									</div>
								<?php } ?>

								<label for="update_cart">
									<i class="update_cart_icon"></i>
									<input type="submit" class="header-btn btn btn-default" name="update_cart"
									       value="<?php esc_attr_e( 'Update Cart', 'techloop' ); ?>"/>
								</label>

								<?php do_action( 'woocommerce_cart_actions' ); ?>
								<?php wp_nonce_field( 'woocommerce-cart' ); ?>

							</td>
						</tr>
						<?php do_action( 'woocommerce_after_cart_contents' ); ?>
						</tbody>
					</table>
					<?php do_action( 'woocommerce_after_cart_table' ); ?>
				</form>
			</div>
		</div>
		<div class="col-xs-12 col-xl-4 col-xxl-3">
			<div class="cart-wrap">
				<svg class="border-top" fill="#<?php background_color(); ?>" viewBox="0 0 1574.4883 13.88189" height="13.88189" width="1574.4882">
					<g transform="translate(0,-1038.4804)" id="layer1">
						<path id="path4146"
						      d="m 0.02204515,1045.6533 0,-7.1448 255.26999485,0 255.27,0 -6.7913,6.8767 -6.7913,6.8767 -6.6175,-6.5353 -6.6175,-6.5353 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.6057,6.5236 -6.6057,6.5236 -6.1758,-6.27 -6.1757,-6.27 -6.254,6.254 -6.254,6.254 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.5895,6.5077 -6.5895,6.5077 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6197,6.5375 -6.6197,6.5375 -6.1636,-6.2577 -6.1636,-6.2577 -6.3202,6.2417 -6.32019,6.2417 -6.521499,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.690004,6.5225 -6.522003,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.520999,-6.5215 -6.8891999,6.8034 -6.88899995,6.803 0,-7.1448 z m 517.49999485,-0.2698 -6.7896,-6.875 7.1448,0 7.1448,0 0,6.875 c 0,3.7813 -0.15984,6.875 -0.3552,6.875 -0.19536,0 -3.4105,-3.0938 -7.1448,-6.875 z"/>
						<path id="path4146-7"
						      d="m 524.68096,1045.6085 0,-7.1448 255.26999,0 255.27005,0 -6.7913,6.8767 -6.7913,6.8767 -6.6175,-6.5353 -6.6175,-6.5353 -6.5215,6.5215 -6.52147,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.52158,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.6057,6.5236 -6.6057,6.5236 -6.1758,-6.27 -6.1757,-6.27 -6.254,6.254 -6.254,6.254 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.5895,6.5077 -6.5895,6.5077 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6197,6.5375 -6.6197,6.5375 -6.1636,-6.2577 -6.1636,-6.2577 -6.3202,6.2417 -6.32019,6.2417 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.69,6.5225 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.8892,6.8034 -6.889,6.803 0,-7.1448 z m 517.50004,-0.2698 -6.7896,-6.875 7.1448,0 7.1448,0 0,6.875 c 0,3.7813 -0.1598,6.875 -0.3552,6.875 -0.1954,0 -3.4105,-3.0938 -7.1448,-6.875 z"/>
						<path id="path4146-7-5"
						      d="m 1049.4453,1045.5582 0,-7.1448 255.27,0 255.27,0 -6.7913,6.8767 -6.7913,6.8767 -6.6175,-6.5353 -6.6175,-6.5353 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.6057,6.5236 -6.6057,6.5236 -6.1758,-6.27 -6.1757,-6.27 -6.254,6.254 -6.254,6.254 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.5895,6.5077 -6.5895,6.5077 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6197,6.5375 -6.6197,6.5375 -6.1636,-6.2577 -6.1636,-6.2577 -6.3202,6.2417 -6.3202,6.2417 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.69,6.5225 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.8892,6.8034 -6.889,6.803 0,-7.1448 z m 517.5,-0.2698 -6.7896,-6.875 7.1448,0 7.1448,0 0,6.875 c 0,3.7813 -0.1598,6.875 -0.3552,6.875 -0.1954,0 -3.4105,-3.0938 -7.1448,-6.875 z"/>
					</g>
				</svg>
				<h3 class="cart-title">Cart Totals</h3>
				<div class="cart-collaterals">
					<?php do_action( 'woocommerce_cart_collaterals' ); ?>
				</div>

				<svg class="border-bottom" fill="#<?php background_color(); ?>" viewBox="0 0 1574.4883 13.88189"
				     height="13.88189" width="1574.4882">
					<g transform="translate(0,-1038.4804)" id="layer1">
						<path id="path4146"
						      d="m 0.02204515,1045.6533 0,-7.1448 255.26999485,0 255.27,0 -6.7913,6.8767 -6.7913,6.8767 -6.6175,-6.5353 -6.6175,-6.5353 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.6057,6.5236 -6.6057,6.5236 -6.1758,-6.27 -6.1757,-6.27 -6.254,6.254 -6.254,6.254 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.5895,6.5077 -6.5895,6.5077 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6197,6.5375 -6.6197,6.5375 -6.1636,-6.2577 -6.1636,-6.2577 -6.3202,6.2417 -6.32019,6.2417 -6.521499,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.690004,6.5225 -6.522003,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.520999,-6.5215 -6.8891999,6.8034 -6.88899995,6.803 0,-7.1448 z m 517.49999485,-0.2698 -6.7896,-6.875 7.1448,0 7.1448,0 0,6.875 c 0,3.7813 -0.15984,6.875 -0.3552,6.875 -0.19536,0 -3.4105,-3.0938 -7.1448,-6.875 z"/>
						<path id="path4146-7"
						      d="m 524.68096,1045.6085 0,-7.1448 255.26999,0 255.27005,0 -6.7913,6.8767 -6.7913,6.8767 -6.6175,-6.5353 -6.6175,-6.5353 -6.5215,6.5215 -6.52147,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.52158,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.6057,6.5236 -6.6057,6.5236 -6.1758,-6.27 -6.1757,-6.27 -6.254,6.254 -6.254,6.254 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.5895,6.5077 -6.5895,6.5077 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6197,6.5375 -6.6197,6.5375 -6.1636,-6.2577 -6.1636,-6.2577 -6.3202,6.2417 -6.32019,6.2417 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.69,6.5225 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.8892,6.8034 -6.889,6.803 0,-7.1448 z m 517.50004,-0.2698 -6.7896,-6.875 7.1448,0 7.1448,0 0,6.875 c 0,3.7813 -0.1598,6.875 -0.3552,6.875 -0.1954,0 -3.4105,-3.0938 -7.1448,-6.875 z"/>
						<path id="path4146-7-5"
						      d="m 1049.4453,1045.5582 0,-7.1448 255.27,0 255.27,0 -6.7913,6.8767 -6.7913,6.8767 -6.6175,-6.5353 -6.6175,-6.5353 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.6057,6.5236 -6.6057,6.5236 -6.1758,-6.27 -6.1757,-6.27 -6.254,6.254 -6.254,6.254 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.6035,-6.5215 -6.6035,-6.5215 -6.5215,6.5215 -6.5215,6.5215 -6.5895,-6.5077 -6.5895,-6.5077 -6.5895,6.5077 -6.5895,6.5077 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.6035,6.5215 -6.5215,-6.5215 -6.5215,-6.5215 -6.6197,6.5375 -6.6197,6.5375 -6.1636,-6.2577 -6.1636,-6.2577 -6.3202,6.2417 -6.3202,6.2417 -6.5215,-6.5215 -6.5215,-6.5215 -6.6035,6.5215 -6.69,6.5225 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.604,6.5215 -6.603,6.5219 -6.522,-6.5219 -6.521,-6.5215 -6.8892,6.8034 -6.889,6.803 0,-7.1448 z m 517.5,-0.2698 -6.7896,-6.875 7.1448,0 7.1448,0 0,6.875 c 0,3.7813 -0.1598,6.875 -0.3552,6.875 -0.1954,0 -3.4105,-3.0938 -7.1448,-6.875 z"/>
					</g>
				</svg>
			</div>
		</div>
		<div class="col-xs-12 col-xl-8 col-xxl-9">
			<?php do_action( 'woocommerce_after_cart' ); ?>
		</div>
	</div>
</div>