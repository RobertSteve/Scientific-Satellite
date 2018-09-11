<?php
/**
 * Menus configuration.
 *
 * @package Techloop
 */

add_action( 'after_setup_theme', 'techloop_register_menus', 5 );
/**
 * Register menus.
 */
function techloop_register_menus() {

	register_nav_menus( array(
		'top'     => esc_html__( 'Top', 'techloop' ),
		'main'    => esc_html__( 'Main', 'techloop' ),
		'footer'  => esc_html__( 'Footer', 'techloop' ),
		'social'  => esc_html__( 'Social', 'techloop' ),
	) );
}
