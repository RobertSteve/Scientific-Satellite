<?php
/**
 * Display Woocommerce top search
 * @since  1.0.0
 * @uses  techloop_is_woocommerce_activated() check if WooCommerce is activated
 * @return widget
 */
?>
<div class="top-panel__search">
	<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
</div>
