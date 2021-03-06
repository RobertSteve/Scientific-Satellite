<?php
/**
 * Default manifest file
 *
 * @var array
 */
$settings = array(
	'xml' => false,
	'advanced_import' => array(
		'default' => array(
			'label'    => esc_html__( 'TechLoop', 'techloop' ),
			'full'     => get_template_directory() . '/assets/demo-content/default/default-full.xml',
			'thumb'    => get_template_directory_uri() . '/assets/demo-content/default/default-thumb.png',
			'demo_url' => 'https://ld-wp.template-help.com/woocommerce_61250',
			'plugins'  => array(),
		),
	),
	'export' => array(
		'options' => array(
			'mprm_settings',
			'bp-pages',
			'bp-active-components',
			'mp_timetable_general',
			'woocommerce_default_country',
			'woocommerce_shop_page_id',
			'woocommerce_default_catalog_orderby',
			'shop_catalog_image_size',
			'shop_single_image_size',
			'shop_thumbnail_image_size',
			'woocommerce_cart_page_id',
			'woocommerce_checkout_page_id',
			'woocommerce_terms_page_id',
			'tm_woowishlist_page',
			'tm_woocompare_page',
			'tm_woocompare_enable',
			'tm_woocompare_show_in_catalog',
			'tm_woocompare_show_in_single',
			'tm_woocompare_compare_text',
			'tm_woocompare_remove_text',
			'tm_woocompare_page_btn_text',
			'tm_woocompare_show_in_catalog',
			'cherry_projects_options',
			'cherry_projects_options_default',
			'cherry-team',
			'cherry-team_default',
			'cherry-services',
			'cherry-services_default',
			'woocs_first_activation',
			'woocs_drop_down_view',
			'woocs_currencies_aggregator',
			'woocs_welcome_currency',
			'woocs_is_multiple_allowed',
			'woocs_show_flags',
			'woocs_show_money_signs',
			'woocs_customer_signs',
			'woocs_customer_price_format',
			'woocs_currencies_rate_auto_update',
			'woocs_use_curl',
			'woocs_storage',
			'woocs_geo_rules',
			'woocs_use_geo_rules',
			'woocs_hide_cents',
			'woocs_decimals',
			'woocs_price_info',
			'woocs_no_cents',
			'woocs_restrike_on_checkout_page',
			'woocs_shop_is_cached',
			'woocs_show_approximate_amount',
			'tm_woocompare_enable',
			'tm_woocompare_page',
			'tm_woocompare_show_in_catalog',
			'tm_woocompare_show_in_single',
			'tm_woocompare_compare_text',
			'tm_woocompare_remove_text',
			'tm_woocompare_page_btn_text',
			'tm_woocompare_empty_btn_text',
			'tm_woocompare_empty_text',
			'tm_woocompare_page_template',
			'tm_woocompare_widget_template',
			'tm_woowishlist_enable',
			'tm_woowishlist_page',
			'tm_woowishlist_show_in_catalog',
			'tm_woowishlist_add_text',
			'tm_woowishlist_added_text',
			'tm_woowishlist_page_btn_text',
			'tm_woowishlist_empty_text',
			'tm_woowishlist_cols',
			'tm_woowishlist_page_template',
			'tm_woowishlist_widget_template',
			'tm_woo_thumb_enabled',
			'tm_woo_thumb_effect',
			'tm_woo_thumb_featured',
			'tm_woo_thumb_recent',
			'tm_woo_thumb_sale',
		),
		'tables'  => array(
			'mpsl_sliders',
			'mpsl_sliders_preview',
		),
	),
);
