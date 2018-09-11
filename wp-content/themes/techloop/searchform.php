<?php
/**
 * The template for displaying search form.
 *
 * @package Techloop
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-form__input-wrap">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'techloop' ) ?></span>
		<?php echo $icon = apply_filters( 'techloop_search_form_input_icon', '<i class="linearicon linearicon-magnifier"></i>' ); ?>
		<input type="search" class="search-form__field"
			placeholder="<?php echo esc_attr_x( 'Enter keyword', 'placeholder', 'techloop' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'techloop' ) ?>" />
	</div>
	<button type="submit" class="search-form__submit btn btn-secondary"><?php esc_html_e( 'Search', 'techloop' ); ?></button>
</form>
