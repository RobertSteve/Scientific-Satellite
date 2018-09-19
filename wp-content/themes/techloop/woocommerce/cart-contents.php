<?php
/**
 * Display Header Cart
 * @since  1.0.0
 * @uses  techloop_is_woocommerce_activated() check if WooCommerce is activated
 * @return void
 */
?>
<div class="cart-contents" title="<?php esc_html_e( 'View your shopping cart', 'techloop' ); ?>">
	<span class="linearicon linearicon4rzo linearicon-cart"></span>
	<span class="cart-text"><?php esc_html_e( 'Cart', 'techloop' ); ?></span>
	<span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
</div>
