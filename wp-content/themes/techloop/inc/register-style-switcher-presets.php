<?php
/**
 * Register presets for TM Style Switcher
 *
 * @package Techloop
 */
if ( function_exists( 'tmss_register_preset' ) ) {

	tmss_register_preset(
		'default',
		esc_html__( 'Clothes', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/default.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/default.json'
	);

	tmss_register_preset(
		'skin1',
		esc_html__( 'Tools', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/skin1.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/skin1.json'
	);

	tmss_register_preset(
		'skin2',
		esc_html__( 'Marketplace', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/skin2.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/skin2.json'
	);

	tmss_register_preset(
		'skin3',
		esc_html__( 'Jewelry', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/skin3.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/skin3.json'
	);

	tmss_register_preset(
		'skin4',
		esc_html__( 'Lingerie', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/skin4.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/skin4.json'
	);

	tmss_register_preset(
		'skin5',
		esc_html__( 'Kids Clothes', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/skin5.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/skin5.json'
	);

	tmss_register_preset(
		'skin6',
		esc_html__( 'Electronics', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/skin6.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/skin6.json'
	);

	tmss_register_preset(
		'skin7',
		esc_html__( 'Handmade', 'techloop' ),
		get_stylesheet_directory_uri() . '/tm-style-switcher-pressets/skin7.png',
		get_stylesheet_directory() . '/tm-style-switcher-pressets/skin7.json'
	);
}