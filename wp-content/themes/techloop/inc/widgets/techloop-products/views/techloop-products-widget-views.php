<?php
global $product;

?>
<li>
	<a href="<?php echo esc_url( get_permalink() ); ?>"
	   title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
	</a>
	<?php if ( ! empty( $instance['show_categories'] ) ) : ?>
		<div class="product-widget-categories"><?php
			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0', '>=' ) ) {
				echo wc_get_product_category_list( get_the_id() );
			} else {
				echo $product->get_categories();
			}
			?>
		</div>
	<?php endif; ?>
	<span class="product-title"><?php echo $product->get_title(); ?></span>
	<?php
	if ( ! empty( $instance['show_rating'] ) ) {
		if ( function_exists( 'wc_get_rating_html' ) ) {
			echo wc_get_rating_html( $product->get_average_rating() );
		} else {
			echo $product->get_rating_html();
		}
	}
	?>
	<?php echo $product->get_price_html(); ?>
	<?php if ( ! empty( $instance['show_add_to_cart_button'] ) ) { ?>
		<div class="add_to_cart_button-wrap">
			<?php woocommerce_template_loop_add_to_cart(); ?>
		</div>
	<?php } ?>
	<?php if ( ! empty( $instance['show_quick_view_compare_wishlist'] ) ) { ?>
		<div class="wishlist_compare_button_block">
			<?php
			if ( function_exists( 'tm_woowishlist_add_button_loop' ) ) {
				tm_woowishlist_add_button_loop( $args );
			}
			if ( function_exists( 'tm_woocompare_add_button_loop' ) ) {
				tm_woocompare_add_button_loop( $args );
			}
			if ( class_exists( 'TM_Woo_Quick_View_Render' ) ) {
				tm_woo_quick_view_render()->render_button();
			}
			?>
		</div>
	<?php } ?>
</li>
