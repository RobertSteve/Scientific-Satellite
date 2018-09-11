<?php
/**
 * Plugins configuration example.
 *
 * @var array
 */
$plugins = array(
	'cherry-data-importer' => array(
		'name'   => esc_html__( 'Cherry Data Importer', 'techloop' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/CherryFramework/cherry-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'tm-mega-menu' => array(
		'name'   => esc_html__( 'TM Mega Menu', 'techloop' ),
		'source' => 'remote',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/tm-mega-menu.zip',
		'access' => 'skins',
	),
	'tm-woocommerce-ajax-filters' => array(
		'name'   => esc_html__( 'TM WooCommerce Ajax Filters', 'techloop' ),
		'source' => 'local',
		'path'   => TECHLOOP_THEME_DIR . '/assets/includes/plugins/tm-woocommerce-ajax-filters.zip',
		'access' => 'skins',
	),
	'tm-woocommerce-quick-view' => array(
		'name'   => esc_html__( 'TM WooCommerce Quick View', 'techloop' ),
		'source' => 'local',
		'path'   => TECHLOOP_THEME_DIR . '/assets/includes/plugins/tm-woocommerce-quick-view.zip',
		'access' => 'skins',
	),
	'power-builder' => array(
		'name'   => esc_html__( 'Power Builder', 'techloop' ),
		'source' => 'local',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/power-builder-upd.zip',
		'access' => 'skins',
	),
	'power-builder-integrator' => array(
		'name'   => esc_html__( 'Power Builder Integrator', 'techloop' ),
		'source' => 'remote',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/power-builder-integrator.zip',
		'access' => 'skins',
	),
	'cherry-sidebars' => array(
		'name'   => esc_html__( 'Cherry Sidebars', 'techloop' ),
		'access' => 'skins',
	),
	'woocommerce' => array(
		'name'   => esc_html__( 'Woocommerce', 'techloop' ),
		'access' => 'skins',
	),
	'tm-woocommerce-package' => array(
		'name'   => esc_html__( 'TM Woocommerce Package', 'techloop' ),
		'access' => 'skins',
	),
	'tm-woocommerce-compare-wishlist' => array(
		'name'   => esc_html__( 'TM Woocommerce Compare Wishlist', 'techloop' ),
		'access' => 'skins',
	),
	'woocommerce-currency-switcher' => array(
		'name'   => esc_html__( 'WooCommerce Currency Switcher', 'techloop' ),
		'access' => 'skins',
	),

	'cherry-popups' => array(
		'name'   => esc_html__( 'Cherry PopUps', 'techloop' ),
		'access' => 'skins',
	),
	'cherry-team-members' => array(
		'name'   => esc_html__( 'Cherry Team Members', 'techloop' ),
		'access' => 'skins',
	),
	'cherry-testi' => array(
		'name'   => esc_html__( 'Cherry Testimonials', 'techloop' ),
		'access' => 'skins',
	),
	'tm-timeline' => array(
		'name'   => esc_html__( 'TM Timeline', 'techloop' ),
		'access' => 'skins',
	),
	'motopress-slider' => array(
		'name'   => esc_html__( 'Motopress slider', 'techloop' ),
		'source' => 'local',
		'path'   => TECHLOOP_THEME_DIR . '/assets/includes/plugins/motopress-slider.zip',
		'access' => 'skins',
	),
	'cherry-socialize' => array(
		'name'   => esc_html__( 'Cherry Socialize', 'techloop' ),
		'access' => 'skins',
	),
	'cherry-search' => array(
		'name'   => esc_html__( 'Cherry Search', 'techloop' ),
		'access' => 'skins',
	),
);

/**
 * Skins configuration example
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'cherry-data-importer',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'tm-mega-menu',
				'tm-woocommerce-ajax-filters',
				'tm-woocommerce-quick-view',
				'power-builder',
				'power-builder-integrator',
				'cherry-sidebars',
				'woocommerce',
				'tm-woocommerce-package',
				'tm-woocommerce-compare-wishlist',
				'woocommerce-currency-switcher',
				'cherry-popups',
				'cherry-team-members',
				'cherry-testi',
				'tm-timeline',
				'motopress-slider',
				'cherry-socialize',
				'cherry-search',
			),
			'demo'  => 'https://ld-wp.template-help.com/woocommerce_63000_default',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default/default-thumb.png',
			'name'  => esc_html__( 'TechLoop', 'techloop' ),
		),
	),
);

$texts = array(
	'theme-name' => 'TechLoop',
);
