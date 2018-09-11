<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 * */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $upsells;

if ( $upsells ) : ?>

	<div class="up-sells upsells products">

		<?php echo apply_filters( 'techloop_single_up_sells_products_title', sprintf( '<h5>%s</h5>', esc_html__( 'You may also like&hellip;', 'techloop' ) ) ); ?>

		<?php techloop_woocommerce_product_loop_carousel_start( true, false, $columns ); ?>

		<?php foreach ( $upsells as $upsell ) : ?>
			<?php
			$post_object = get_post( $upsell->get_id() );
			setup_postdata( $GLOBALS['post'] =& $post_object );
			wc_get_template_part( 'content', 'product' );
			?>
		<?php endforeach; ?>


		<?php techloop_woocommerce_product_loop_carousel_end(); ?>

	</div>

<?php endif;
wp_reset_postdata();