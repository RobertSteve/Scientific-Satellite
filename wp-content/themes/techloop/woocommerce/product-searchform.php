<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
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
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form role="search" method="get" class="search-form woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div class="search-form__input-wrap">
		<label class="screen-reader-text" for="woocommerce-product-search-field"><?php esc_html_e( 'Search for:', 'techloop' ); ?></label>
		<?php echo $icon = apply_filters( 'techloop_search_form_input_icon', '<i class="linearicon linearicon-magnifier"></i>' ); ?>
		<input type="search" id="woocommerce-product-search-field" class="search-form__field"
		       placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'techloop' ); ?>"
		       value="<?php echo get_search_query(); ?>" name="s"
		       title="<?php echo esc_attr_x( 'Search for:', 'label', 'techloop' ); ?>" />
	</div>
	<button type="submit" class="search-form__submit btn-secondary"><?php esc_html_e( 'Search', 'techloop' ); ?></button>
	<input type="hidden" name="post_type" value="product" />
</form>
