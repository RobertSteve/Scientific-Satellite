<?php
/**
 * Layout configuration.
 *
 * @package Techloop
 */

add_action( 'after_setup_theme', 'techloop_set_layout', 5 );
/**
 * Set layout configuration.
 */
function techloop_set_layout() {

	techloop_theme()->layout = array(
		'one-right-sidebar' => array(
			'1/4' => array(
				'content' => array( 'col-xs-12', 'col-lg-9' ),
				'sidebar' => array( 'col-xs-12', 'col-lg-3' ),
			),
			'1/6' => array(
				'content' => array( 'col-xs-12', 'col-lg-9', 'col-xxl-10' ),
				'sidebar' => array( 'col-xs-12', 'col-lg-3', 'col-xxl-2' ),
			),
		),
		'one-left-sidebar' => array(
			'1/4' => array(
				'content' => array( 'col-xs-12', 'col-lg-9', 'col-lg-push-3' ),
				'sidebar' => array( 'col-xs-12', 'col-lg-3', 'col-lg-pull-9' ),
			),
			'1/6' => array(
				'content' => array( 'col-xs-12', 'col-lg-9', 'col-lg-push-3', 'col-xxl-10', 'col-xxl-push-2' ),
				'sidebar' => array( 'col-xs-12', 'col-lg-3', 'col-lg-pull-9', 'col-xxl-2', 'col-xxl-pull-10' ),
			),
		),
		'fullwidth' => array(
			array(
				'content' => array( 'col-xs-12', 'col-md-12' ),
			),
		),
	);
}
