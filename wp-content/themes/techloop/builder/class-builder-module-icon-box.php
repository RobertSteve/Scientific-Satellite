<?php

class Techloop_Builder_Module_Icon_Box extends Tm_Builder_Module {

	public function init() {
		$this->name = esc_html__( 'Icon Box', 'techloop' );
		$this->slug = 'tm_pb_icon_box_module';
		$this->icon = 'f1d9';

		$this->global_settings_slug = 'tm_pb_icon_box_module';

		$this->child_slug      = 'tm_pb_icon_box_module__item';
		$this->child_item_text = esc_html__( 'Icon Box', 'techloop' );

		$this->whitelisted_fields = array(
			'super_title',
			'title',
			'sub_title',
			'divider',
			'admin_label',
			'module_id',
			'module_class',
			'divider_color',
			'divider_height',
			'divider_height_laptop',
			'divider_height_tablet',
			'divider_height_phone',
			'divider_style',
			'divider_width',
			'divider_hide_on_mobile',
			'max_width',
			'max_width_laptop',
			'max_width_tablet',
			'max_width_phone',
			'template',
			'carousel_settings',
			'columns',
			'columns_laptop',
			'columns_tablet',
			'columns_phone',
			'autoplay',
			'navigate_button',
			'navigate_pagination',
			'slides_per_view',
			'centered_slides',
		);

		$this->defaults = array(
			'divider_style'         => 'solid',
			'divider_width'         => '100',
			'divider_height'        => '1',
			'divider_height_laptop' => '1',
			'divider_height_tablet' => '1',
			'divider_height_phone'  => '1',
			'template'              => array( 'grid' ),
			'autoplay'              => array( 'on' ),
			'navigate_button'       => array( 'on' ),
			'navigate_pagination'   => array( 'on' ),
			'slides_per_view'       => '3',
			'columns'               => '4',
			'columns_laptop'        => '4',
			'columns_tablet'        => '4',
			'columns_phone'         => '4',
		);

		$this->fields_defaults = array(
			'template'               => array( 'grid' ),
			'divider_color'          => array( '#000000', 'only_default_setting' ),
			'divider_hide_on_mobile' => array( 'on' ),
			'divider_height'         => array( '1' ),
			'divider_height_laptop'  => array( '1' ),
			'divider_height_tablet'  => array( '1' ),
			'divider_height_phone'   => array( '1' ),
			'divider_width'          => array( '100' ),
			'autoplay'               => array( 'on' ),
			'navigate_button'        => array( 'on' ),
			'navigate_pagination'    => array( 'on' ),
			'slides_per_view'        => array( '3' ),
			'columns'                => array( '4' ),
			'columns_laptop'         => array( '4' ),
			'columns_tablet'         => array( '4' ),
			'columns_phone'          => array( '4' ),
		);

		$css_prefix = 'tm_pb_icon_box_module';

		$this->main_css_element = ".{$css_prefix}__wrapper";

		$this->advanced_options = array(
			'fonts'                         => array(
				'super_title'          => array(
					'label'       => esc_html__( 'Super Title', 'techloop' ),
					'font_size'   => array(
						'default' => '20px',
					),
					'line_height' => array(
						'default' => '1.2em',
					),
					'css'         => array(
						'main' => "{$this->main_css_element} .{$css_prefix}__super-title"
					)
				),
				'title'                => array(
					'label'       => esc_html__( 'Title', 'techloop' ),
					'font_size'   => array(
						'default' => '24px',
					),
					'line_height' => array(
						'default' => '1.2em',
					),
					'css'         => array(
						'main' => "{$this->main_css_element} .{$css_prefix}__title"
					)
				),
				'sub_title'            => array(
					'label'       => esc_html__( 'Sub Title', 'techloop' ),
					'font_size'   => array(
						'default' => '18px',
					),
					'line_height' => array(
						'default' => '1.2em',
					),
					'css'         => array(
						'main' => "{$this->main_css_element} .{$css_prefix}__sub-title"
					)
				),
				'icon_box_name'        => array(
					'label'       => esc_html__( 'Icon Box Name', 'techloop' ),
					'font_size'   => array(
						'default' => '20px',
					),
					'line_height' => array(
						'default' => '1.2em',
					),
					'css'         => array(
						'main' => "{$this->main_css_element} .{$css_prefix}__item__title"
					)
				),
				'icon_box_description' => array(
					'label'       => esc_html__( 'Icon Box Description', 'techloop' ),
					'font_size'   => array(
						'default' => '18px',
					),
					'line_height' => array(
						'default' => '1.2em',
					),
					'css'         => array(
						'main' => "{$this->main_css_element} .{$css_prefix}__item__description"
					)
				),
			),
			'divider_custom_margin_padding' => array(
				'use_padding' => false,
				'css'         => array(
					'important' => 'all',
				),
			),
			'divider_height'                => array(
				'divider_height' => array(
					'css' => array(
						'main' => "{$this->main_css_element} .{$css_prefix}__divider"
					),
				),
			),
		);

		$this->custom_css_options = array(
			'super_title' => array(
				'label'    => esc_html__( 'Super Title', 'techloop' ),
				'selector' => '.tm_pb_icon_box__super-title',
			),
			'title'       => array(
				'label'    => esc_html__( 'Title', 'techloop' ),
				'selector' => '.tm_pb_icon_box__title'
			),
		);

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 9 );
	}

	public function get_fields() {
		$fields = array(
			'super_title'            => array(
				'label'           => esc_html__( 'Super Title', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the super title for your icon box.', 'techloop' ),
			),
			'title'                  => array(
				'label'           => esc_html__( 'Title', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the title for your icon box.', 'techloop' ),
			),
			'sub_title'              => array(
				'label'           => esc_html__( 'Sub Title', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the sub title for your icon box.', 'techloop' )
			),
			'divider'                => array(
				'label'           => esc_html__( 'Show Divider', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'techloop' ),
					'on'  => esc_html__( 'Yes', 'techloop' ),
				),
				'description'     => esc_html__( 'Toggle a separator between title & icon box.', 'techloop' ),
				'affects'         => array(
					'#tm_pb_divider_color',
					'#tm_pb_divider_height',
					'#tm_pb_divider_hide_on_mobile',
				),
			),
			'divider_color'          => array(
				'label'           => esc_html__( 'Divider Color', 'techloop' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'This will adjust the color of the 1px divider line.', 'techloop' ),
				'depends_show_if' => 'on',
			),
			'divider_height'         => array(
				'label'           => esc_html__( 'Divider Height', 'techloop' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'default'         => '1',
				'range_settings'  => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'mobile_options'  => true,
				'mobile_global'   => true,
				'description'     => esc_html__( 'Define how much space should be added below the divider.', 'techloop' ),
				'depends_show_if' => 'on',
			),
			'divider_height_laptop'  => array(
				'type' => 'skip',
			),
			'divider_height_tablet'  => array(
				'type' => 'skip',
			),
			'divider_height_phone'   => array(
				'type' => 'skip',
			),
			'divider_hide_on_mobile' => array(
				'label'           => esc_html__( 'Hide Divider On Mobile', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'techloop' ),
					'off' => esc_html__( 'No', 'techloop' ),
				),
				'tab_slug'        => 'advanced',
				'depends_show_if' => 'on',
			),
			'max_width' => array(
				'label'           => esc_html__( 'Max Width', 'techloop' ),
				'type'            => 'text',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'mobile_options'  => true,
				'validate_unit'   => true,
			),
			'max_width_laptop' => array(
				'type' => 'skip',
			),
			'max_width_tablet' => array(
				'type' => 'skip',
			),
			'max_width_phone' => array(
				'type' => 'skip',
			),
			'template'               => array(
				'label'           => esc_html__( 'Template', 'techloop' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'grid'     => esc_html__( 'Grid', 'techloop' ),
					'carousel' => esc_html__( 'Carousel', 'techloop' ),
				),
				'default'         => 'grid',
				'description'     => esc_html__( 'Here you can choose the look of the Icon boxes.', 'techloop' ),
				'affects'         => array(
					'#tm_pb_columns',
					'#tm_pb_show_pagination',
					'#tm_pb_autoplay',
					'#tm_pb_navigate_button',
					'#tm_pb_navigate_pagination',
					'#tm_pb_slides_per_view',
					'#tm_pb_centered_slides',
				),
			),
			'columns'                => array(
				'label'           => esc_html__( 'Columns', 'techloop' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '4',
				'range_settings'  => array(
					'min'  => 1,
					'max'  => 6,
					'step' => 1,
				),
				'mobile_options'  => true,
				'mobile_global'   => true,
				'depends_show_if' => 'grid',
				'tab_slug'        => 'advanced',
			),
			'columns_laptop'         => array(
				'type' => 'skip',
			),
			'columns_tablet'         => array(
				'type' => 'skip',
			),
			'columns_phone'          => array(
				'type' => 'skip',
			),
			'disabled_on'            => array(
				'label'           => esc_html__( 'Disable on', 'techloop' ),
				'type'            => 'multiple_checkboxes',
				'options'         => tm_pb_media_breakpoints(),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'techloop' ),
			),
			'autoplay'               => array(
				'label'           => esc_html__( 'Autoplay', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'techloop' ),
					'on'  => esc_html__( 'Yes', 'techloop' ),
				),
				'tab_slug'        => 'advanced',
				'depends_show_if' => 'carousel',
			),
			'navigate_button'        => array(
				'label'           => esc_html__( 'Display next/prev buttons', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'techloop' ),
					'off' => esc_html__( 'No', 'techloop' ),
				),
				'tab_slug'        => 'advanced',
				'depends_show_if' => 'carousel',
			),
			'navigate_pagination'    => array(
				'label'           => esc_html__( 'Display pagination buttons', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'techloop' ),
					'off' => esc_html__( 'No', 'techloop' ),
				),
				'tab_slug'        => 'advanced',
				'depends_show_if' => 'carousel',
			),
			'centered_slides'        => array(
				'label'           => esc_html__( 'Display first item in center', 'techloop' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'techloop' ),
					'on'  => esc_html__( 'Yes', 'techloop' ),
				),
				'tab_slug'        => 'advanced',
				'depends_show_if' => 'carousel',
			),
			'slides_per_view'        => array(
				'label'           => esc_html__( 'Multi Column slides layout', 'techloop' ),
				'option_category' => 'configuration',
				'type'            => 'range',
				'default'         => '3',
				'tab_slug'        => 'advanced',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '6',
					'step' => '1',
				),
				'depends_show_if' => 'carousel',
			),
		);

		return $fields;
	}

	private function init_divider_styles( $module_class, $function_name ) {

		$divider               = $this->shortcode_atts['divider'];
		$divider_color         = $this->shortcode_atts['divider_color'];
		$divider_height        = $this->shortcode_atts['divider_height'];
		$divider_height_laptop = $this->shortcode_atts['divider_height_laptop'];
		$divider_height_tablet = $this->shortcode_atts['divider_height_tablet'];
		$divider_height_phone  = $this->shortcode_atts['divider_height_phone'];

		$divider_module_class = str_replace( ' ', '.', $module_class ) . ' .tm_pb_icon_box_module__divider';

		if ( '' !== $divider_height ) {
			$divider_height_values = array(
				'desktop' => $divider_height,
				'laptop'  => $divider_height_laptop,
				'tablet'  => $divider_height_tablet,
				'phone'   => $divider_height_phone,
			);

			tm_pb_generate_responsive_css(
				$divider_height_values,
				$divider_module_class,
				'height',
				$function_name
			);
		}

		$divider_css_style = '';

		if ( '' !== $divider_color && 'on' === $divider ) {
			$divider_css_style .= sprintf( ' background-color: %s;',
				esc_attr( $divider_color )
			);

			if ( '' !== $divider_css_style ) {
				TM_Builder_Element::set_style( $function_name, array(
					'selector'    => '#tm_builder_outer_content ' . $divider_module_class,
					'declaration' => ltrim( $divider_css_style )
				) );
			}
		}
	}

	public function enqueue_assets() {
		wp_enqueue_style( 'tm-builder-swiper' );
		wp_enqueue_script( 'tm-builder-swiper' );
	}

	public function pre_shortcode_content() {
		global $tm_pb_icon_box;

		$tm_pb_icon_box = array(
			'template'       => $this->shortcode_atts['template'],
			'columns'        => $this->shortcode_atts['columns'],
			'columns_laptop' => $this->shortcode_atts['columns_laptop'],
			'columns_tablet' => $this->shortcode_atts['columns_tablet'],
			'columns_phone'  => $this->shortcode_atts['columns_phone'],
		);
	}

	public function shortcode_callback( $atts, $content = null, $function_name ) {

		$template          = $this->shortcode_atts['template'];
		$carousel_settings = null;

		if ( 'carousel' === $template ) {
			$carousel_settings = htmlentities( json_encode( array(
				'autoplay'           => $this->shortcode_atts['autoplay'],
				'navigateButton'     => $this->shortcode_atts['navigate_button'],
				'pagination'         => $this->shortcode_atts['navigate_pagination'],
				'slidesPerView'      => $this->shortcode_atts['slides_per_view'],
				'centeredSlides'     => $this->shortcode_atts['centered_slides'],
				'spaceBetweenSlides' => apply_filters( 'tm_pb_module_carousel_space', 10 ),
			) ) );
		}

		$this->shortcode_atts = array_merge( $this->shortcode_atts, array(
			'module_class'           => TM_Builder_Element::add_module_order_class(
					$this->_var( 'module_class' ),
					$function_name
				) . ' tm_pb_bg_layout_light',
			'divider_hide_on_mobile' => 'on' === $this->_var( 'divider_hide_on_mobile' ) ?
				' ' . self::HIDE_ON_MOBILE : '',
			'template'               => sprintf( 'icon-box/%s/icon-box-item.php', $template ),
			'carousel_settings'      => $carousel_settings
		) );

		$this->set_vars( array(
			'super_title',
			'title',
			'sub_title',
			'divider',
			'admin_label',
			'module_id',
			'module_class',
			'divider_color',
			'divider_height',
			'divider_height_laptop',
			'divider_height_tablet',
			'divider_height_phone',
			'divider_style',
			'divider_width',
			'divider_hide_on_mobile',
			'max_width',
			'max_width_laptop',
			'max_width_tablet',
			'max_width_phone',
			'template',
			'carousel_settings',
			'columns',
			'columns_laptop',
			'columns_tablet',
			'columns_phone',
			'autoplay',
			'navigate_button',
			'pagination',
			'slides_per_view',
			'centered_slides',
		) );

		if ( '' !== $this->_var( 'max_width_tablet' )
		     || '' !== $this->_var( 'max_width_phone' )
		     || '' !== $this->_var( 'max_width_laptop' )
		     || '' !== $this->_var( 'max_width' ) ) {
			$max_width_values = array(
				'desktop' => $this->_var( 'max_width' ),
				'laptop'  => $this->_var( 'max_width_laptop' ),
				'tablet'  => $this->_var( 'max_width_tablet' ),
				'phone'   => $this->_var( 'max_width_phone' ),
			);

			$additional_css = '; margin: 0 auto;';

			tm_pb_generate_responsive_css( $max_width_values, '%%order_class%%', 'max-width', $function_name, $additional_css );
		}

		$this->init_divider_styles( $this->shortcode_atts['module_class'], $function_name );
		$this->shortcode_content = trim( strip_tags( $this->shortcode_content, '<div></div><a></a><img><img/><span></span>' ) );
		$output                  = $this->get_template_part( sprintf( 'icon-box/%s/icon-box.php', $template ) );

		return $output;
	}
}

new Techloop_Builder_Module_Icon_Box;
