<?php
/**
 * Import remap hooks
 */

add_action( 'cherry_data_import_home_regex_replace', 'techloop_remap_shortcodes' );
add_action( 'cherry_data_import_remap_posts',        'techloop_remap_slider_ids' );

/**
 * Remap terms in shortocdes
 *
 * @param  array $regex Shortcode data for regex.
 * @return array
 */
function techloop_remap_shortcodes( $regex ) {

	$regex[] = array(
		'shortcode' => 'tm_pb_posts',
		'attr'      => 'categories',
	);

	$regex[] = array(
		'shortcode' => 'mprm_items',
		'attr'      => 'categ',
	);

	$regex[] = array(
		'shortcode' => 'mprm_categories',
		'attr'      => 'categ',
	);

	$regex[] = array(
		'shortcode' => 'tm_pb_menu_items',
		'attr'      => 'tags_list',
	);

	return $regex;
}

/**
 * Remap slider images id's
 *
 * @since  1.0.8
 * @return void|bool false
 */
function techloop_remap_slider_ids( $posts ) {

	global $wpdb;

	$table = $wpdb->prefix . 'mpsl_slides';

	$table_exists = $wpdb->get_var( "SHOW TABLES LIKE '" . $table . "'" );

	if ( $table !== $table_exists ) {
		return false;
	}

	$slides = $wpdb->get_results(
		"
		SELECT *
		FROM $table
		"
	);

	if ( ! is_array( $slides ) ) {
		return false;
	}

	foreach ( $slides as $slide ) {

		if ( ! isset( $slide->options ) ) {
			continue;
		}

		$slide_opt = json_decode( $slide->options, true );

		if ( ! isset( $slide_opt['bg_image_id'] ) ) {
			continue;
		}

		$old_id = $slide_opt['bg_image_id'];
		$new_id = isset( $posts[ $old_id ] ) ? $posts[ $old_id ] : $old_id;

		if ( empty( $new_id ) ) {
			continue;
		}

		$slide_opt['bg_image_id'] = $new_id;

		$slide_opt = json_encode( $slide_opt );

		$wpdb->update(
			$table,
			array( 'options' => $slide_opt ),
			array( 'id' => $slide->id ),
			array( '%s' ),
			array( '%d' )
		);
	}

}
