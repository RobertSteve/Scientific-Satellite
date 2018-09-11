<?php

class Techloop_Builder_Module_Icon_Box_Item extends Tm_Builder_Module {
	public $function_name;

	public function init() {
		$this->name             = esc_html__( 'Icon Box', 'techloop' );
		$this->slug             = 'tm_pb_icon_box_module__item';
		$this->main_css_element = 'tm_pb_icon_box_module__item';
		$this->type             = 'child';
		$this->child_title_var  = 'icon_box_name';

		$this->advanced_setting_title_text = esc_html__( 'New Icon Box', 'techloop' );

		$this->whitelisted_fields = array(
			'icon_box_bg',
			'icon_box_hover_bg',
			'icon_box_hover_icon_color',
			'icon_box_hover_icon_bg',
			'icon_box_hover_icon_border_color',
			'icon_box_hover_title_color',
			'icon_box_hover_description_color',
			'font_icon',
			'icon_color',
			'use_circle',
			'circle_color',
			'circle_size',
			'use_circle_border',
			'circle_border_color',
			'circle_border_width',
			'animation',
			'icon_orientation',
			'admin_label',
			'use_icon_font_size',
			'icon_font_size',
			'circle_size_laptop',
			'circle_size_tablet',
			'circle_size_phone',
			'icon_font_size_laptop',
			'icon_font_size_tablet',
			'icon_font_size_phone',
			'icon_box_url',
			'url_new_window',
			'icon_box_name',
			'icon_box_description',
			'module_id',
			'module_class',
		);

		$tm_accent_color    = tm_builder_accent_color();
		$tm_secondary_color = tm_builder_secondary_color();

		$this->fields_defaults = array(
			'icon_color'          => array( $tm_accent_color, 'add_default_setting' ),
			'use_circle'          => array( 'off' ),
			'circle_color'        => array( $tm_secondary_color, 'only_default_setting' ),
			'use_circle_border'   => array( 'off' ),
			'circle_border_color' => array( $tm_accent_color, 'only_default_setting' ),
			'animation'           => array( 'top' ),
			'icon_orientation'    => array( 'center' ),
			'use_icon_font_size'  => array( 'off' ),// new
			'url_new_window'      => array( 'off' ),
			'background_color'    => array( tm_builder_accent_color(), 'add_default_setting' ),
		);

		$this->advanced_options = array(
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
		);

		$css_prefix             = 'tm_pb_icon_box_module__item';
		$this->main_css_element = ".{$css_prefix}";
	}

	public function get_fields() {
		$fields = array(
			'icon_box_bg'                      => array(
				'label'       => esc_html__( 'Icon Box Background', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom background for your icon box.', 'techloop' ),
			),
			'icon_box_hover_bg'                => array(
				'label'       => esc_html__( 'Icon Box Hover Background', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom background for your icon box in hover state.', 'techloop' ),
			),
			'icon_box_hover_title_color'       => array(
				'label'       => esc_html__( 'Icon Box Hover Title Color', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your title in hover state.', 'techloop' ),
			),
			'icon_box_hover_description_color' => array(
				'label'       => esc_html__( 'Icon Box Hover Description Color', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your description in hover state.', 'techloop' ),
			),
			'icon_color'                       => array(
				'label'       => esc_html__( 'Icon Color', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your icon.', 'techloop' ),
			),
			'icon_box_hover_icon_color'        => array(
				'label'       => esc_html__( 'Icon Box Hover Icon Color', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your icon in hover state.', 'techloop' ),
			),
			'font_icon'                        => array(
				'label'               => esc_html__( 'Icon', 'techloop' ),
				'type'                => 'text',
				'option_category'     => 'basic_option',
				'class'               => array( 'tm-pb-font-icon' ),
				'renderer'            => 'tm_pb_get_font_icon_list',
				'renderer_with_field' => true,
				'description'         => esc_html__( 'Choose an icon to display.', 'techloop' ),
			),
			'use_circle'                       => array(
				'label'           => esc_html__( 'Circle Icon', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'techloop' ),
					'on'  => esc_html__( 'Yes', 'techloop' ),
				),
				'affects'         => array(
					'#tm_pb_use_circle_border',
					'#tm_pb_circle_color',
					'#tm_pb_circle_size',
				),
				'description'     => esc_html__( 'Here you can choose whether icon set above should display within a circle.', 'techloop' ),
			),
			'icon_box_hover_icon_bg'           => array(
				'label'       => esc_html__( 'Icon Box Hover Icon Background', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom background for your icon in hover state.', 'techloop' ),
			),
			'circle_color'                     => array(
				'label'       => esc_html__( 'Circle Color', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for the icon circle.', 'techloop' ),
			),
			'use_circle_border'                => array(
				'label'           => esc_html__( 'Show Circle Border', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'techloop' ),
					'on'  => esc_html__( 'Yes', 'techloop' ),
				),
				'affects'         => array(
					'#tm_pb_circle_border_color',
					'#tm_pb_circle_border_width',
				),
				'description'     => esc_html__( 'Here you can choose whether if the icon circle border should display.', 'techloop' ),
			),
			'circle_border_color'              => array(
				'label'       => esc_html__( 'Circle Border Color', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for the icon circle border.', 'techloop' ),
			),
			'icon_box_hover_icon_border_color' => array(
				'label'       => esc_html__( 'Icon Box Hover Icon Border Color', 'techloop' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom border color for your icon in hover state.', 'techloop' ),
			),
			'animation'                        => array(
				'label'           => esc_html__( 'Icon Animation', 'techloop' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'top'    => esc_html__( 'Top To Bottom', 'techloop' ),
					'left'   => esc_html__( 'Left To Right', 'techloop' ),
					'right'  => esc_html__( 'Right To Left', 'techloop' ),
					'bottom' => esc_html__( 'Bottom To Top', 'techloop' ),
					'off'    => esc_html__( 'No Animation', 'techloop' ),
				),
				'description'     => esc_html__( 'This controls the direction of the lazy-loading animation.', 'techloop' ),
			),
			'icon_orientation'                 => array(
				'label'           => esc_html__( 'Icon Orientation', 'techloop' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'left'   => esc_html__( 'Left', 'techloop' ),
					'right'  => esc_html__( 'Right', 'techloop' ),
					'center' => esc_html__( 'Center', 'techloop' ),
				),
				'description'     => esc_html__( 'This will control how your icon is aligned.', 'techloop' ),
			),
			'use_icon_font_size'               => array(
				'label'           => esc_html__( 'Use Icon Font Size', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'font_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'techloop' ),
					'on'  => esc_html__( 'Yes', 'techloop' ),
				),
				'affects'         => array(
					'#tm_pb_icon_font_size',
				),
				'tab_slug'        => 'advanced',
			),
			'icon_font_size'                   => array(
				'label'           => esc_html__( 'Icon Font Size', 'techloop' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'tab_slug'        => 'advanced',
				'default'         => '96px',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'mobile_options'  => true,
				'depends_default' => true,
			),
			'circle_size'                      => array(
				'label'           => esc_html__( 'Circle Size', 'techloop' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'default'         => '100',
				'range_settings'  => array(
					'min'  => '40',
					'max'  => '260',
					'step' => '1',
				),
				'description'     => esc_html__( 'Here you can define a custom diameter for the icon circle.', 'techloop' ),
				'mobile_options'  => true,
				'depends_default' => true,
			),
			'circle_border_width'              => array(
				'label'           => esc_html__( 'Circle Border Width', 'techloop' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'default'         => '2',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '20',
					'step' => '1',
				),
				'description'     => esc_html__( 'Here you can define a custom width for the icon circle border.', 'techloop' ),
				'depends_default' => true,
			),
			'circle_size_laptop'               => array(
				'type' => 'skip',
			),
			'circle_size_tablet'               => array(
				'type' => 'skip',
			),
			'circle_size_phone'                => array(
				'type' => 'skip',
			),
			'icon_font_size_laptop'            => array(
				'type' => 'skip',
			),
			'icon_font_size_tablet'            => array(
				'type' => 'skip',
			),
			'icon_font_size_phone'             => array(
				'type' => 'skip',
			),
			'icon_box_url'                     => array(
				'label'           => esc_html__( 'Icon box URL', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the destination URL.', 'techloop' ),
			),
			'url_new_window'                   => array(
				'label'           => esc_html__( 'Url Opens', 'techloop' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'techloop' ),
					'on'  => esc_html__( 'In The New Tab', 'techloop' ),
				),
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'techloop' ),
			),
			'icon_box_name'                    => array(
				'label'           => esc_html__( 'Icon Box Name', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the icon box name.', 'techloop' ),
			),
			'icon_box_description'             => array(
				'label'           => esc_html__( 'Icon Box Description', 'techloop' ),
				'type'            => 'textarea',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the description of the icon box.', 'techloop' ),
			),
			'module_id'                        => array(
				'label'           => esc_html__( 'CSS ID', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
			'module_class'                     => array(
				'label'           => esc_html__( 'CSS Class', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
		);

		return $fields;
	}

	public function shortcode_callback( $atts, $content = null, $function_name ) {
		global $tm_pb_icon_box;

		$this->set_vars( array(
			'icon_box_bg',
			'icon_box_hover_bg',
			'icon_box_hover_icon_bg',
			'icon_box_hover_icon_border_color',
			'icon_box_hover_title_color',
			'icon_box_hover_description_color',
			'icon_orientation',
			'animation',
			'font_icon',
			'use_circle',
			'use_circle_border',
			'icon_color',
			'icon_box_hover_icon_color',
			'circle_color',
			'circle_size',
			'circle_size_laptop',
			'circle_size_tablet',
			'circle_size_phone',
			'circle_border_color',
			'circle_border_width',
			'use_icon_font_size',
			'icon_font_size',
			'icon_font_size_laptop',
			'icon_font_size_tablet',
			'icon_font_size_phone',
			'icon_box_url',
			'url_new_window',
			'icon_box_name',
			'icon_box_description',
			'module_id',
			'module_class',
		) );

		$this->function_name = $function_name;

		$cols = array(
			'columns',
			'columns_laptop',
			'columns_tablet',
			'columns_phone',
		);

		foreach ( $cols as $col ) {
			$this->_var( $col, $tm_pb_icon_box[ $col ] );
		}

		TM_Builder_Element::add_module_order_class( 'tm_pb_icon_box_module__item', $function_name );

		$icon_box_bg                      = sprintf( ' background-color: %1$s;', esc_attr( $this->_var( 'icon_box_bg' ) ) );
		$icon_box_hover_bg                = sprintf( ' background-color: %1$s;', esc_attr( $this->_var( 'icon_box_hover_bg' ) ) );
		$icon_box_hover_icon_bg           = sprintf( ' background-color: %1$s !important;', esc_attr( $this->_var( 'icon_box_hover_icon_bg' ) ) );
		$icon_box_hover_icon_border_color = sprintf( ' border-color: %1$s !important;', esc_attr( $this->_var( 'icon_box_hover_icon_border_color' ) ) );
		$icon_box_hover_icon_color        = sprintf( ' color: %1$s !important;', esc_attr( $this->_var( 'icon_box_hover_icon_color' ) ) );
		$icon_box_hover_title_color       = sprintf( ' color: %1$s !important;', esc_attr( $this->_var( 'icon_box_hover_title_color' ) ) );
		$icon_box_hover_description_color = sprintf( ' color: %1$s;', esc_attr( $this->_var( 'icon_box_hover_description_color' ) ) );

		if ( $icon_box_bg ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%%.tm_pb_icon_box_module__item',
				'declaration' => $icon_box_bg
			) );
		}

		if ( $icon_box_hover_bg ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%%.tm_pb_icon_box_module__item:hover',
				'declaration' => $icon_box_hover_bg
			) );
		}

		if ( $icon_box_hover_icon_color ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%%.tm_pb_icon_box_module__item:hover .tm-pb-icon',
				'declaration' => $icon_box_hover_icon_color
			) );
		}

		if ( $icon_box_hover_icon_bg ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%%.tm_pb_icon_box_module__item:hover .tm-pb-icon',
				'declaration' => $icon_box_hover_icon_bg
			) );
		}

		if ( $icon_box_hover_icon_border_color ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%%.tm_pb_icon_box_module__item:hover .tm-pb-icon',
				'declaration' => $icon_box_hover_icon_border_color
			) );
		}

		if ( $icon_box_hover_title_color ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%%.tm_pb_icon_box_module__item:hover .tm_pb_icon_box_module__item__title',
				'declaration' => $icon_box_hover_title_color
			) );
		}

		if ( $icon_box_hover_description_color ) {
			TM_Builder_Element::set_style( $this->function_name, array(
				'selector'    => '%%order_class%%.tm_pb_icon_box_module__item:hover .tm_pb_icon_box_module__item__description',
				'declaration' => $icon_box_hover_description_color
			) );
		}

		return $this->get_template_part( sprintf( 'icon-box/%s/icon-box-item.php', $tm_pb_icon_box['template'] ) );
	}

	public function get_icon() {

		if ( 'off' !== $this->_var( 'use_icon_font_size' ) ) {
			$font_size_values = array(
				'desktop' => $this->_var( 'icon_font_size' ),
				'laptop'  => $this->_var( 'icon_font_size_laptop' ),
				'tablet'  => $this->_var( 'icon_font_size_tablet' ),
				'phone'   => $this->_var( 'icon_font_size_phone' ),
			);

			tm_pb_generate_responsive_css(
				$font_size_values,
				'%%order_class%% .tm-pb-icon',
				'font-size',
				$this->function_name
			);
		}

		if ( is_rtl() && 'left' === $this->_var( 'icon_orientation' ) ) {
			$this->_var( 'icon_orientation', 'right' );
		}

		$animation = $this->_var( 'animation' );

		if ( '' !== $this->_var( 'font_icon' ) ) {
			$icon_style = sprintf( 'color: %1$s;', esc_attr( $this->_var( 'icon_color' ) ) );

			if ( 'on' === $this->_var( 'use_circle' ) ) {
				$icon_style .= sprintf( ' background-color: %1$s;', esc_attr( $this->_var( 'circle_color' ) ) );

				if ( 'on' === $this->_var( 'use_circle_border' ) ) {
					$icon_style .= sprintf(
						' border-color: %1$s;',
						esc_attr( $this->_var( 'circle_border_color' ) )
					);
				}

				if ( '' !== $this->_var( 'circle_border_width' ) ) {
					$icon_style .= sprintf(
						' border-width: %1$spx;',
						esc_attr( $this->_var( 'circle_border_width' ) )
					);
				}

				$this->set_circle_size();
			}

			$icon        = esc_attr( tm_pb_process_font_icon( $this->_var( 'font_icon' ) ) );
			$icon_family = tm_builder_get_icon_family();

			if ( $icon_family ) {
				TM_Builder_Element::set_style( $this->function_name, array(
					'selector'    => '%%order_class%% .tm-pb-icon:before',
					'declaration' => sprintf(
						'font-family: "%1$s" !important;',
						esc_attr( $icon_family )
					),
				) );
			}

			return sprintf(
				'<span class="tm-pb-icon tm-waypoint%2$s%3$s%4$s %6$s" style="%5$s" data-icon="%1$s"></span>',
				$icon,
				esc_attr( ' tm_pb_animation_' . $animation ),
				( 'on' === $this->_var( 'use_circle' ) ? ' tm-pb-icon-circle' : '' ),
				( 'on' === $this->_var( 'use_circle' ) && 'on' === $this->_var( 'use_circle_border' ) ? ' tm-pb-icon-circle-border' : '' ),
				$icon_style,
				'tm_pb_icon_align_' . $this->_var( 'icon_orientation' )
			);
		};
	}

	/**
	 * Set circle size values
	 */
	public function set_circle_size() {

		$circle_size_d  = intval( $this->_var( 'circle_size' ) );
		$circle_size_l  = intval( $this->_var( 'circle_size_laptop' ) );
		$circle_size_t  = intval( $this->_var( 'circle_size_tablet' ) );
		$circle_size_ph = intval( $this->_var( 'circle_size_phone' ) );

		if ( ! $circle_size_l ) {
			$circle_size_l = $circle_size_d;
		}

		if ( ! $circle_size_t ) {
			$circle_size_t = $circle_size_d;
		}

		if ( ! $circle_size_ph ) {
			$circle_size_ph = $circle_size_t;
		}

		if ( ! empty( $circle_size_d ) || ! empty( $circle_size_l ) || ! empty( $circle_size_t ) || ! empty( $circle_size_ph ) ) {

			$radius_d  = round( $circle_size_d / 2 );
			$radius_l  = round( $circle_size_l / 2 );
			$radius_t  = round( $circle_size_t / 2 );
			$radius_ph = round( $circle_size_ph / 2 );

			$sizes = array(
				'desktop' => $circle_size_d,
				'laptop'  => $circle_size_l,
				'tablet'  => $circle_size_t,
				'phone'   => $circle_size_ph,
			);

			$radius = array(
				'desktop' => $radius_d,
				'laptop'  => $radius_l,
				'tablet'  => $radius_t,
				'phone'   => $radius_ph,
			);

			tm_pb_generate_responsive_css( $sizes, '%%order_class%% .tm-pb-icon', 'width', $this->function_name );
			tm_pb_generate_responsive_css( $sizes, '%%order_class%% .tm-pb-icon', 'height', $this->function_name );
			tm_pb_generate_responsive_css( $sizes, '%%order_class%% .tm-pb-icon', 'line-height', $this->function_name );
			tm_pb_generate_responsive_css( $radius, '%%order_class%% .tm-pb-icon', 'border-radius', $this->function_name );
		}
	}
}

new Techloop_Builder_Module_Icon_Box_Item;
