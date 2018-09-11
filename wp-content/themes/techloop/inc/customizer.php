<?php
/**
 * Theme Customizer.
 *
 * @package Techloop
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function techloop_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'techloop_get_customizer_options' , array(
		'prefix'     => 'techloop',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'techloop' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'    => esc_html__( 'Show ToTop button', 'techloop' ),
				'section'  => 'title_tagline',
				'priority' => 61,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'techloop' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'preloader_img' => array(
				'title'           => esc_html__( 'Preloader Upload', 'techloop' ),
				'description'     => esc_html__( 'Upload Preloader image', 'techloop' ),
				'section'         => 'title_tagline',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
			),
			'general_settings' => array(
				'title'    => esc_html__( 'General Site settings', 'techloop' ),
				'priority' => 40,
				'type'     => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'    => esc_html__( 'Logo &amp; Favicon', 'techloop' ),
				'priority' => 25,
				'panel'    => 'general_settings',
				'type'     => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'techloop' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'techloop' ),
					'text'  => esc_html__( 'Text', 'techloop' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'techloop' ),
				'description'     => esc_html__( 'Upload logo image', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_image',
			),
			'invert_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Logo Upload', 'techloop' ),
				'description'     => esc_html__( 'Upload logo image', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => '%s/assets/images/invert-logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'techloop' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'techloop' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_image',
			),
			'invert_retina_header_logo_url' => array(
				'title'           => esc_html__( 'Invert Retina Logo Upload', 'techloop' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => 'Libre Franklin, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => techloop_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => '600',
				'field'           => 'select',
				'choices'         => techloop_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => '23',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'techloop' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => techloop_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'techloop_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'techloop' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'techloop' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'techloop' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'techloop' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'techloop' ),
				'section' => 'breadcrumbs',
				'default' => 'full',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'techloop' ),
					'minified' => esc_html__( 'Minified', 'techloop' ),
				),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'techloop' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'techloop' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'techloop' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'techloop' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'techloop' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'techloop' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'techloop' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'techloop' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'techloop' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'techloop' ),
				'section' => 'page_layout',
				'default' => 'Boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'techloop' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'techloop' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'techloop' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'techloop' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'techloop' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'techloop' ),
				'section'     => 'page_layout',
				'default'     => 1800,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'techloop' ),
				'section' => 'page_layout',
				'default' => '1/6',
				'field'   => 'select',
				'choices' => array(
					'1/6' => '1/6',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),
			'main_box_color' => array(
				'title'   => esc_html__( 'Main box color', 'techloop' ),
				'section' => 'page_layout',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'techloop' ),
				'description' => esc_html__( 'Configure Color Scheme', 'techloop' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'techloop' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#2479d0',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#fd3030',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_4' => array(
				'title'   => esc_html__( 'Accent color (4)', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#59bc6c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#999999',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#2479d0',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'techloop' ),
				'section' => 'regular_scheme',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'techloop' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_3' => array(
				'title'   => esc_html__( 'Accent color (3)', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#fd3030',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#2479d0',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'techloop' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'techloop' ),
				'description' => esc_html__( 'Configure typography settings', 'techloop' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'techloop' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'body_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'body_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'body_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'techloop' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => techloop_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'    => esc_html__( 'H1 Heading', 'techloop' ),
				'priority' => 10,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'h1_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'h1_typography',
				'default' => '300',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'h1_typography',
				'default'     => '72',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'h1_typography',
				'default'     => '1.152',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 0.9,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'techloop' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => techloop_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'    => esc_html__( 'H2 Heading', 'techloop' ),
				'priority' => 15,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'h2_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'h2_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'h2_typography',
				'default'     => '50',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'h2_typography',
				'default'     => '1.36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'techloop' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => techloop_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'    => esc_html__( 'H3 Heading', 'techloop' ),
				'priority' => 20,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'h3_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'h3_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'h3_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'h3_typography',
				'default'     => '1.36',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'techloop' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => techloop_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'    => esc_html__( 'H4 Heading', 'techloop' ),
				'priority' => 25,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'h4_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'h4_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'h4_typography',
				'default'     => '24',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'h4_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'techloop' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => techloop_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'    => esc_html__( 'H5 Heading', 'techloop' ),
				'priority' => 30,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'h5_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'h5_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'h5_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'h5_typography',
				'default'     => '1.66',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'techloop' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => techloop_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'    => esc_html__( 'H6 Heading', 'techloop' ),
				'priority' => 35,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'h6_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'h6_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'h6_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'h6_typography',
				'default'     => '1.75',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'h6_typography',
				'default'     => '0.08',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'techloop' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => techloop_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'techloop' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '12',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Entry meta', 'techloop' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'techloop' ),
				'section' => 'meta_typography',
				'default' => 'Hind Siliguri, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'techloop' ),
				'section' => 'meta_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => techloop_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'techloop' ),
				'section' => 'meta_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => techloop_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'techloop' ),
				'section'     => 'meta_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'techloop' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'techloop' ),
				'section'     => 'meta_typography',
				'default'     => '1.42',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'techloop' ),
				'section'     => 'meta_typography',
				'default'     => '0.08',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'techloop' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => techloop_get_character_sets(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'    => esc_html__( 'Header', 'techloop' ),
				'priority' => 60,
				'type'     => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'    => esc_html__( 'Styles', 'techloop' ),
				'priority' => 5,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'techloop' ),
				'section' => 'header_styles',
				'default' => 'default',
				'field'   => 'select',
				'choices' => techloop_get_header_layout_options(),
				'type'    => 'control',
			),
			'header_transparent_layout' => array(
				'title'   => esc_html__( 'Header overlay', 'techloop' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_invert_color_scheme' => array(
				'title'   => esc_html__( 'Enable invert color scheme', 'techloop' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'techloop' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'techloop' ),
				'section' => 'header_styles',
				'default' => false,
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'techloop' ),
				'section' => 'header_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat' => esc_html__( 'No Repeat', 'techloop' ),
					'repeat'    => esc_html__( 'Tile', 'techloop' ),
					'repeat-x'  => esc_html__( 'Tile Horizontally', 'techloop' ),
					'repeat-y'  => esc_html__( 'Tile Vertically', 'techloop' ),
				),
				'type'    => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'techloop' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'techloop' ),
					'center' => esc_html__( 'Center', 'techloop' ),
					'right'  => esc_html__( 'Right', 'techloop' ),
				),
				'type'    => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'techloop' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'techloop' ),
					'fixed'  => esc_html__( 'Fixed', 'techloop' ),
				),
				'type'    => 'control',
			),
			'header_search' => array(
				'title'   => esc_html__( 'Enable search', 'techloop' ),
				'section' => 'header_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'    => esc_html__( 'Top Panel', 'techloop' ),
				'priority' => 10,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'top_panel_visibility' => array(
				'title'   => esc_html__( 'Enable top panel', 'techloop' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'techloop' ),
				'section' => 'header_top_panel',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Header contact block` section */
			'header_contact_block' => array(
				'title'    => esc_html__( 'Header Contact Block', 'techloop' ),
				'priority' => 15,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Header Contact Block', 'techloop' ),
				'section' => 'header_contact_block',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_contact_icon_1' => array(
				'title'       => esc_html__( 'Contact item 1', 'techloop' ),
				'description' => esc_html__( 'Choose icon', 'techloop' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'linearicon-telephone',
				'icon_data'   => array(
					'icon_set'    => 'techloopLinearIcons',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => techloop_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'techloop' ),
				'section'     => 'header_contact_block',
				'default'     => esc_html__( '+3(800) 2345-6789', 'techloop' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'techloop' ),
				'section'     => 'header_contact_block',
				'default'     => techloop_get_default_contact_information( 'address' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'header_contact_icon_2' => array(
				'title'       => esc_html__( 'Contact item 2', 'techloop' ),
				'description' => esc_html__( 'Choose icon', 'techloop' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => 'linearicon-truck',
				'icon_data'   => array(
					'icon_set'    => 'techloopLinearIcons',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => techloop_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'techloop' ),
				'section'     => 'header_contact_block',
				'default'     => esc_html__( 'Free Shipping', 'techloop' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'techloop' ),
				'section'     => 'header_contact_block',
				'default'     => techloop_get_default_contact_information( 'phones' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'header_contact_icon_3' => array(
				'title'       => esc_html__( 'Contact item 3', 'techloop' ),
				'description' => esc_html__( 'Choose icon', 'techloop' ),
				'section'     => 'header_contact_block',
				'field'       => 'iconpicker',
				'default'     => false,
				'icon_data'   => array(
					'icon_set'    => 'techloopLinearIcons',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => techloop_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'header_contact_label_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'techloop' ),
				'section'     => 'header_contact_block',
				'default'     => false,
				'field'       => 'text',
				'type'        => 'control',
			),
			'header_contact_text_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Description', 'techloop' ),
				'section'     => 'header_contact_block',
				'default'     => techloop_get_default_contact_information( 'time' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'    => esc_html__( 'Main Menu', 'techloop' ),
				'priority' => 20,
				'panel'    => 'header_options',
				'type'     => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'techloop' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable description', 'techloop' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'more_button_type' => array(
				'title'   => esc_html__( 'More Menu Button Type', 'techloop' ),
				'section' => 'header_main_menu',
				'default' => 'text',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'techloop' ),
					'icon'  => esc_html__( 'Icon', 'techloop' ),
					'text'  => esc_html__( 'Text', 'techloop' ),
				),
				'type'    => 'control',
			),
			'more_button_text' => array(
				'title'           => esc_html__( 'More Menu Button Text', 'techloop' ),
				'section'         => 'header_main_menu',
				'default'         => esc_html__( 'More', 'techloop' ),
				'field'           => 'input',
				'type'            => 'control',
				'active_callback' => 'techloop_is_more_button_type_text',
			),
			'more_button_icon' => array(
				'title'           => esc_html__( 'More Menu Button Icon', 'techloop' ),
				'section'         => 'header_main_menu',
				'field'           => 'iconpicker',
				'type'            => 'control',
				'active_callback' => 'techloop_is_more_button_type_icon',
				'icon_data'       => array(
					'icon_set'    => 'moreButtonFontAwesome',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/font-awesome.min.css',
					'icon_base'   => 'fa',
					'icon_prefix' => 'fa-',
					'icons'       => techloop_get_icons_set(),
				),
			),
			'more_button_image_url' => array(
				'title'           => esc_html__( 'More Button Image Upload', 'techloop' ),
				'description'     => esc_html__( 'Upload More Button image', 'techloop' ),
				'section'         => 'header_main_menu',
				'default'         => false,
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'techloop_is_more_button_type_image',
			),
			'retina_more_button_image_url' => array(
				'title'           => esc_html__( 'Retina More Button Image Upload', 'techloop' ),
				'description'     => esc_html__( 'Upload More Button image for retina-ready devices', 'techloop' ),
				'section'         => 'header_main_menu',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'techloop_is_more_button_type_image',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'techloop' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'techloop' ),
				'section' => 'sidebar_settings',
				'default' => 'one-left-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'techloop' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'techloop' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'techloop' ),
				),
				'type' => 'control',
			),

			/** `MailChimp` section */
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'techloop' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'techloop' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'techloop' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'techloop' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),

			/** `Ads Management` panel */
			'ads_management' => array(
				'title'    => esc_html__( 'Ads Management', 'techloop' ),
				'priority' => 110,
				'type'     => 'section',
			),
			'ads_header' => array(
				'title'             => esc_html__( 'Header', 'techloop' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_home_before_loop' => array(
				'title'             => esc_html__( 'Front Page Before Loop', 'techloop' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_content' => array(
				'title'             => esc_html__( 'Post Before Content', 'techloop' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),
			'ads_post_before_comments' => array(
				'title'             => esc_html__( 'Post Before Comments', 'techloop' ),
				'section'           => 'ads_management',
				'field'             => 'textarea',
				'default'           => false,
				'sanitize_callback' => 'esc_html',
				'type'              => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'techloop' ),
				'priority' => 110,
				'type'     => 'panel',
			),

			/** `Footer styles` section */
			'footer_styles' => array(
				'title'    => esc_html__( 'Footer Styles', 'techloop' ),
				'priority' => 5,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_logo_url' => array(
				'title'   => esc_html__( 'Logo upload', 'techloop' ),
				'section' => 'footer_styles',
				'field'   => 'image',
				'default' => '%s/assets/images/footer-logo.png',
				'type'    => 'control',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'techloop' ),
				'section' => 'footer_styles',
				'default' => techloop_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'techloop' ),
				'section' => 'footer_styles',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'  => esc_html__( 'Style 1', 'techloop' ),
					'centered' => esc_html__( 'Style 2', 'techloop' ),
					'minimal' => esc_html__( 'Style 3', 'techloop' ),
				),
				'type' => 'control',
			),
			'footer_widget_columns' => array(
				'title'   => esc_html__( 'Top Widget Area Columns', 'techloop' ),
				'section' => 'footer_styles',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control',
			),
			'second_footer_widget_columns' => array(
				'title'   => esc_html__( 'Bottom Widget Area Columns', 'techloop' ),
				'section' => 'footer_styles',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'techloop' ),
				'section' => 'footer_styles',
				'default' => '#1b1b1b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widgets_bg_top' => array(
				'title'   => esc_html__( 'Footer Widgets Top Area Background color', 'techloop' ),
				'section' => 'footer_styles',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widgets_bg_bottom' => array(
				'title'   => esc_html__( 'Footer Widgets Bottom Area Background color', 'techloop' ),
				'section' => 'footer_styles',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_widgets_bg_top_image' => array(
				'title'   => esc_html__( 'Footer Widgets Top Area Background Image', 'techloop' ),
				'section' => 'footer_styles',
				'default' => false,
				'field'   => 'image',
				'type'    => 'control',
			),
			'footer_widgets_bg_top_repeat' => array(
				'title'   => esc_html__( 'Footer Widgets Top Area Background Repeat,', 'techloop' ),
				'section' => 'footer_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat' => esc_html__( 'No Repeat', 'techloop' ),
					'repeat'    => esc_html__( 'Tile', 'techloop' ),
					'repeat-x'  => esc_html__( 'Tile Horizontally', 'techloop' ),
					'repeat-y'  => esc_html__( 'Tile Vertically', 'techloop' ),
				),
				'type'    => 'control',
				'active_callback' => 'techloop_is_footer_widgets_bg_top_image',
			),
			'footer_widgets_bg_top_position_x' => array(
				'title'   => esc_html__( 'Footer Widgets Top Area Background Position', 'techloop' ),
				'section' => 'footer_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'techloop' ),
					'center' => esc_html__( 'Center', 'techloop' ),
					'right'  => esc_html__( 'Right', 'techloop' ),
				),
				'type'    => 'control',
				'active_callback' => 'techloop_is_footer_widgets_bg_top_image',
			),
			'footer_widgets_bg_top_attachment' => array(
				'title'   => esc_html__( 'Footer Widgets Top Area Background Attachment', 'techloop' ),
				'section' => 'footer_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'techloop' ),
					'fixed'  => esc_html__( 'Fixed', 'techloop' ),
				),
				'type'    => 'control',
				'active_callback' => 'techloop_is_footer_widgets_bg_top_image',
			),
			'footer_widgets_bg_bottom_image' => array(
				'title'   => esc_html__( 'Footer Widgets Bottom Area Background Image', 'techloop' ),
				'section' => 'footer_styles',
				'field'   => 'image',
				'default' => false,
				'type'    => 'control',
			),
			'footer_widgets_bg_bottom_repeat' => array(
				'title'   => esc_html__( 'Footer Widgets Bottom Area Background Repeat', 'techloop' ),
				'section' => 'footer_styles',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat' => esc_html__( 'No Repeat', 'techloop' ),
					'repeat'    => esc_html__( 'Tile', 'techloop' ),
					'repeat-x'  => esc_html__( 'Tile Horizontally', 'techloop' ),
					'repeat-y'  => esc_html__( 'Tile Vertically', 'techloop' ),
				),
				'type'    => 'control',
				'active_callback' => 'techloop_is_footer_widgets_bg_bottom_image',
			),
			'footer_widgets_bg_bottom_position_x' => array(
				'title'   => esc_html__( 'Footer Widgets Bottom Area Background Position', 'techloop' ),
				'section' => 'footer_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'techloop' ),
					'center' => esc_html__( 'Center', 'techloop' ),
					'right'  => esc_html__( 'Right', 'techloop' ),
				),
				'type'    => 'control',
				'active_callback' => 'techloop_is_footer_widgets_bg_bottom_image',
			),
			'footer_widgets_bg_bottom_attachment' => array(
				'title'   => esc_html__( 'Footer Widgets Bottom Area Background Attachment', 'techloop' ),
				'section' => 'footer_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'techloop' ),
					'fixed'  => esc_html__( 'Fixed', 'techloop' ),
				),
				'type'    => 'control',
				'active_callback' => 'techloop_is_footer_widgets_bg_top_image',
			),
			'footer_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Footer Widgets Area', 'techloop' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_second_widget_area_visibility' => array(
				'title'   => esc_html__( 'Show Second Footer Widgets Area', 'techloop' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_logo_visibility' => array(
				'title'   => esc_html__( 'Show Footer Logo', 'techloop' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_menu_visibility' => array(
				'title'   => esc_html__( 'Show Footer Menu', 'techloop' ),
				'section' => 'footer_styles',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_pay_systems' => array(
				'title'   => esc_html__( 'Show Pay Systems in Footer', 'techloop' ),
				'section' => 'footer_styles',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'pay_systems_url' => array(
				'title'   => esc_html__( 'Image pay system link', 'techloop' ),
				'section' => 'footer_styles',
				'field'   => 'text',
				'default' => 'https://www.paypal.com/',
				'type'    => 'control',
			),
			'pay_systems_src' => array(
				'title'   => esc_html__( 'Image pay system upload', 'techloop' ),
				'section' => 'footer_styles',
				'field'   => 'image',
				'default' => '%s/assets/images/pay_systems.png',
				'type'    => 'control',
			),

			/** `Footer contact block` section */
			'footer_contact_block' => array(
				'title'    => esc_html__( 'Footer Contact Block', 'techloop' ),
				'priority' => 10,
				'panel'    => 'footer_options',
				'type'     => 'section',
			),
			'footer_contact_block_visibility' => array(
				'title'   => esc_html__( 'Show Footer Contact Block', 'techloop' ),
				'section' => 'footer_contact_block',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_contact_icon_1' => array(
				'title'       => esc_html__( 'Contact item 1', 'techloop' ),
				'description' => esc_html__( 'Choose icon', 'techloop' ),
				'section'     => 'footer_contact_block',
				'field'       => 'iconpicker',
				'default'     => false,
				'icon_data'   => array(
					'icon_set'    => 'techloopLinearIcons',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => techloop_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'footer_contact_label_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'techloop' ),
				'section'     => 'footer_contact_block',
				'default'     => esc_html__( 'Address:', 'techloop' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'footer_contact_text_1' => array(
				'title'       => '',
				'description' => esc_html__( 'Value (HTML formatting support)', 'techloop' ),
				'section'     => 'footer_contact_block',
				'default'     => techloop_get_default_footer_contact_information( 'address' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'footer_contact_icon_2' => array(
				'title'       => esc_html__( 'Contact item 2', 'techloop' ),
				'description' => esc_html__( 'Choose icon', 'techloop' ),
				'section'     => 'footer_contact_block',
				'field'       => 'iconpicker',
				'default'     => false,
				'icon_data'   => array(
					'icon_set'    => 'techloopLinearIcons',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => techloop_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'footer_contact_label_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'techloop' ),
				'section'     => 'footer_contact_block',
				'default'     => esc_html__( 'Phones:', 'techloop' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'footer_contact_text_2' => array(
				'title'       => '',
				'description' => esc_html__( 'Value (HTML formatting support)', 'techloop' ),
				'section'     => 'footer_contact_block',
				'default'     => techloop_get_default_footer_contact_information( 'phones' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'footer_contact_icon_3' => array(
				'title'       => esc_html__( 'Contact item 3', 'techloop' ),
				'description' => esc_html__( 'Choose icon', 'techloop' ),
				'section'     => 'footer_contact_block',
				'field'       => 'iconpicker',
				'default'     => false,
				'icon_data'   => array(
					'icon_set'    => 'techloopLinearIcons',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => techloop_get_linear_icons_set(),
				),
				'type'        => 'control',
			),
			'footer_contact_label_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Label', 'techloop' ),
				'section'     => 'footer_contact_block',
				'default'     => esc_html__( 'E-mail:', 'techloop' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'footer_contact_text_3' => array(
				'title'       => '',
				'description' => esc_html__( 'Value (HTML formatting support)', 'techloop' ),
				'section'     => 'footer_contact_block',
				'default'     => techloop_get_default_footer_contact_information( 'email' ),
				'field'       => 'textarea',
				'type'        => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'    => esc_html__( 'Blog Settings', 'techloop' ),
				'priority' => 115,
				'type'     => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'techloop' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
			),
			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'techloop' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'          => esc_html__( 'Listing', 'techloop' ),
					'grid-3-cols'      => esc_html__( 'Grid (3 Columns)', 'techloop' ),
					'grid-4-cols'      => esc_html__( 'Grid (4 Columns)', 'techloop' ),
					'masonry-3-cols'   => esc_html__( 'Masonry (3 Columns)', 'techloop' ),
					'masonry-4-cols'   => esc_html__( 'Masonry (4 Columns)', 'techloop' ),
					'vertical-justify' => esc_html__( 'Vertical Justify', 'techloop' ),
				),
				'type' => 'control',
			),
			'blog_sticky_type' => array(
				'title'   => esc_html__( 'Sticky label type', 'techloop' ),
				'section' => 'blog',
				'default' => 'icon',
				'field'   => 'select',
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'techloop' ),
					'icon'  => esc_html__( 'Font Icon', 'techloop' ),
					'both'  => esc_html__( 'Text with Icon', 'techloop' ),
				),
				'type' => 'control',
			),
			'blog_sticky_icon' => array(
				'title'           => esc_html__( 'Icon for sticky post', 'techloop' ),
				'section'         => 'blog',
				'field'           => 'iconpicker',
				'default'         => 'linearicon-star',
				'icon_data'       => array(
					'icon_set'    => 'techloopLinearIcons',
					'icon_css'    => TECHLOOP_THEME_URI . '/assets/css/linearicons.css',
					'icon_base'   => 'linearicon',
					'icon_prefix' => 'linearicon-',
					'icons'       => techloop_get_linear_icons_set(),
				),
				'type'            => 'control',
				'active_callback' => 'techloop_is_sticky_icon',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'techloop' ),
				'description'     => esc_html__( 'Label for sticky post', 'techloop' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'techloop' ),
				'field'           => 'text',
				'active_callback' => 'techloop_is_sticky_text',
				'type'            => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'techloop' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'techloop' ),
					'full'    => esc_html__( 'Full content', 'techloop' ),
					'none'    => esc_html__( 'Hide', 'techloop' ),
				),
				'type' => 'control',
			),
			'blog_featured_image' => array(
				'title'           => esc_html__( 'Featured image', 'techloop' ),
				'section'         => 'blog',
				'default'         => 'fullwidth',
				'field'           => 'select',
				'choices'         => array(
					'small'     => esc_html__( 'Small', 'techloop' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'techloop' ),
				),
				'type'            => 'control',
				'active_callback' => 'techloop_is_blog_featured_image',
			),
			'blog_read_more_text' => array(
				'title'       => esc_html__( 'Read More button text', 'techloop' ),
				'description' => esc_html__( 'Leave empty to hide button', 'techloop' ),
				'section'     => 'blog',
				'default'     => esc_html__( 'Read more', 'techloop' ),
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'techloop' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'techloop' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'techloop' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'techloop' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'techloop' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'techloop' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_type' => array(
				'title'   => esc_html__( 'Post style', 'techloop' ),
				'section' => 'blog_post',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default' => esc_html__( 'Default', 'techloop' ),
					'modern'  => esc_html__( 'Modern', 'techloop' ),
				),
				'type' => 'control',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'techloop' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'techloop' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'techloop' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'techloop' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'techloop' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'techloop' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'techloop' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'techloop' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'techloop' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'   => esc_html__( 'Related posts block title', 'techloop' ),
				'section' => 'related_posts',
				'default' => esc_html__( ' ', 'techloop' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_count' => array(
				'title'   => esc_html__( 'Number of post', 'techloop' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_grid' => array(
				'title'   => esc_html__( 'Layout', 'techloop' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'select',
				'choices' => array(
					'2' => esc_html__( '2 columns', 'techloop' ),
					'3' => esc_html__( '3 columns', 'techloop' ),
					'4' => esc_html__( '4 columns', 'techloop' ),
				),
				'type'    => 'control',
			),
			'related_posts_title' => array(
				'title'   => esc_html__( 'Show post title', 'techloop' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_title_length' => array(
				'title'   => esc_html__( 'Number of words in the title', 'techloop' ),
				'section' => 'related_posts',
				'default' => '10',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_image' => array(
				'title'   => esc_html__( 'Show post image', 'techloop' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_content' => array(
				'title'   => esc_html__( 'Display content', 'techloop' ),
				'section' => 'related_posts',
				'default' => 'hide',
				'field'   => 'select',
				'choices' => array(
					'hide'         => esc_html__( 'Hide', 'techloop' ),
					'post_excerpt' => esc_html__( 'Excerpt', 'techloop' ),
					'post_content' => esc_html__( 'Content', 'techloop' ),
				),
				'type'    => 'control',
			),
			'related_posts_content_length' => array(
				'title'   => esc_html__( 'Number of words in the content', 'techloop' ),
				'section' => 'related_posts',
				'default' => '25',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_categories' => array(
				'title'   => esc_html__( 'Show post categories', 'techloop' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_tags' => array(
				'title'   => esc_html__( 'Show post tags', 'techloop' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_author' => array(
				'title'   => esc_html__( 'Show post author', 'techloop' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_publish_date' => array(
				'title'   => esc_html__( 'Show post publish date', 'techloop' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_comment_count' => array(
				'title'   => esc_html__( 'Show post comment count', 'techloop' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Woocommerce Settings` panel */
			'woocommerce_settings' => array(
				'title'           => esc_html__( 'Woocommerce options', 'techloop' ),
				'priority'        => 120,
				'type'            => 'panel',
				'active_callback' => 'techloop_is_woocommerce_activated',
			),
			/** `Badge` section */
			'woo_badge_options' => array(
				'title'    => esc_html__( 'Woocommerce badge', 'techloop' ),
				'panel'    => 'woocommerce_settings',
				'priority' => 10,
				'type'     => 'section',
			),
			'onsale_badge_color' => array(
				'title'   => esc_html__( 'Onsale badge color', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'onsale_badge_bg' => array(
				'title'   => esc_html__( 'Onsale badge bg', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#ff6a28',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'featured_badge_color' => array(
				'title'   => esc_html__( 'Featured badge color', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'featured_badge_bg' => array(
				'title'   => esc_html__( 'Featured badge bg', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#ffc95f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'new_badge_color' => array(
				'title'   => esc_html__( 'New badge color', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#222222',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'new_badge_bg' => array(
				'title'   => esc_html__( 'New badge bg', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'in_stock_badge_color' => array(
				'title'   => esc_html__( 'In stock badge color', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#59bc6c',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'out_stock_badge_color' => array(
				'title'   => esc_html__( 'Out of stock badge color', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#ff4451',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'vendors_budge_color' => array(
				'title'   => esc_html__( 'VC vendors badge color', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'vendors_budge_bg' => array(
				'title'   => esc_html__( 'VC vendors badge background', 'techloop' ),
				'section' => 'woo_badge_options',
				'default' => '#1b1b1b',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'woo_page_options' => array(
				'title'           => esc_html__( 'Woocommerce page options', 'techloop' ),
				'panel'           => 'woocommerce_settings',
				'priority'        => 12,
				'type'            => 'section',
			),
			'woo_column_numbers_desktop' => array(
				'title'   => esc_html__( 'WooCommerce loop columns desktop', 'techloop' ),
				'section' => 'woo_page_options',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'6'   => esc_html__( '6 columns (4 columns with sidebar)', 'techloop' ),
					'4'   => esc_html__( '4 columns', 'techloop' ),
					'3'   => esc_html__( '3 columns', 'techloop' ),
					'2'   => esc_html__( '2 columns', 'techloop' ),
				),
				'type' => 'control',
			),
			'woo_column_numbers_laptop' => array(
				'title'   => esc_html__( 'WooCommerce loop columns laptop', 'techloop' ),
				'section' => 'woo_page_options',
				'default' => '3',
				'field'   => 'select',
				'choices' => array(
					'4'   => esc_html__( '4 columns', 'techloop' ),
					'3'   => esc_html__( '3 columns', 'techloop' ),
					'2'   => esc_html__( '2 columns', 'techloop' ),
				),
				'type' => 'control',
			),
			'woo_column_numbers_tablet' => array(
				'title'   => esc_html__( 'WooCommerce loop columns mobile', 'techloop' ),
				'section' => 'woo_page_options',
				'default' => '3',
				'field'   => 'select',
				'choices' => array(
					'4'   => esc_html__( '4 columns', 'techloop' ),
					'3'   => esc_html__( '3 columns', 'techloop' ),
					'2'   => esc_html__( '2 columns', 'techloop' ),
				),
				'type' => 'control',
			),
			'enable_carousel_thumbnails' => array(
				'title'    => esc_html__( 'Enable single product carousel on the thumbnails', 'techloop' ),
				'section'  => 'woo_page_options',
				'priority' => 120,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			/** `404` panel */
			'page_404_options' => array(
				'title'    => esc_html__( '404 Page', 'techloop' ),
				'priority' => 130,
				'type'     => 'section',
			),
			'page_404_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'techloop' ),
				'section' => 'page_404_options',
				'field'   => 'hex_color',
				'default' => '#f2f2f2',
				'type'    => 'control',
			),
			'page_404_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'techloop' ),
				'section' => 'page_404_options',
				'field'   => 'image',
				'default' => '%s/assets/images/bg_404.jpg',
				'type'    => 'control',
			),
			'page_404_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'techloop' ),
				'section' => 'page_404_options',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'techloop' ),
					'repeat'     => esc_html__( 'Tile', 'techloop' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'techloop' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'techloop' ),
				),
				'type' => 'control',
			),
			'page_404_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'techloop' ),
				'section' => 'page_404_options',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'techloop' ),
					'center' => esc_html__( 'Center', 'techloop' ),
					'right'  => esc_html__( 'Right', 'techloop' ),
				),
				'type' => 'control',
			),
			'page_404_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'techloop' ),
				'section' => 'page_404_options',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'techloop' ),
					'fixed'  => esc_html__( 'Fixed', 'techloop' ),
				),
				'type' => 'control',
			)
		),
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function techloop_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function techloop_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_header_logo_image( $control ) {
	return techloop_is_setting( $control, 'header_logo_type', 'image' );
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_header_logo_text( $control ) {
	return techloop_is_setting( $control, 'header_logo_type', 'text' );
}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_blog_featured_image( $control ) {
	return techloop_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_sticky_text( $control ) {
	return techloop_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_sticky_icon( $control ) {
	return techloop_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Return true if More button (in the main menu) has image type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_more_button_type_image( $control ) {

	if ( $control->manager->get_setting( 'more_button_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

/**
 * Return true if footer widgets bg top image (in the Footer Styles)
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_footer_widgets_bg_top_image( $control ) {

	if ( !$control->manager->get_setting( 'footer_widgets_bg_top_image' )->value() == '' ) {
		return true;
	}

	return false;
}

/**
 * Return true if footer widgets bg bottom image (in the Footer Styles)
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_footer_widgets_bg_bottom_image( $control ) {

	if ( !$control->manager->get_setting( 'footer_widgets_bg_bottom_image' )->value() == '' ) {
		return true;
	}

	return false;
}

/**
 * Return true if More button (in the main menu) has text type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_more_button_type_text( $control ) {

	if ( $control->manager->get_setting( 'more_button_type' )->value() == 'text' ) {
		return true;
	}

	return false;
}

/**
 * Return true if More button (in the main menu) has icon type. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function techloop_is_more_button_type_icon( $control ) {

	if ( $control->manager->get_setting( 'more_button_type' )->value() == 'icon' ) {
		return true;
	}

	return false;
}

/**
 * Get default header layouts.
 *
 * @since  1.0.0
 * @return array
 */
function techloop_get_header_layout_options() {
	return apply_filters( 'techloop_header_layout_options', array(
		'default'    => esc_html__( 'Style 1', 'techloop' ),
		'style-2'   => esc_html__( 'Style 2', 'techloop' ),
		'style-3'    => esc_html__( 'Style 3', 'techloop' ),
		'style-4'    => esc_html__( 'Style 4', 'techloop' ),
	) );
}

/**
 * Get default header layouts options for Post Meta boxes
 *
 * @return array
 */
function techloop_get_header_layout_pm_options() {
	$inherit_option = array(
		'inherit' => esc_html__( 'Inherit', 'techloop' ),
	);

	$options = techloop_get_header_layout_options();

	return array_merge( $inherit_option, $options );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'techloop_customizer_change_core_controls', 20 );
/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize Object wp_customize.
 * @return void
 */
function techloop_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'techloop_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'techloop' );
}

// Typography utility function
/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function techloop_get_font_styles() {
	return apply_filters( 'techloop_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'techloop' ),
		'italic'  => esc_html__( 'Italic', 'techloop' ),
		'oblique' => esc_html__( 'Oblique', 'techloop' ),
		'inherit' => esc_html__( 'Inherit', 'techloop' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function techloop_get_character_sets() {
	return apply_filters( 'techloop_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'techloop' ),
		'greek'        => esc_html__( 'Greek', 'techloop' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'techloop' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'techloop' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'techloop' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'techloop' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'techloop' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function techloop_get_text_aligns() {
	return apply_filters( 'techloop_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'techloop' ),
		'center'  => esc_html__( 'Center', 'techloop' ),
		'justify' => esc_html__( 'Justify', 'techloop' ),
		'left'    => esc_html__( 'Left', 'techloop' ),
		'right'   => esc_html__( 'Right', 'techloop' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function techloop_get_font_weight() {
	return apply_filters( 'techloop_get_font_weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function techloop_get_dynamic_css_options() {
	return apply_filters( 'techloop_get_dynamic_css_options', array(
		'prefix'    => 'techloop',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			TECHLOOP_THEME_DIR . '/assets/css/dynamic.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic-woo.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/header.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/forms.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/social.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/menus.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/post.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/navigation.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/misc.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/site/buttons.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/taxonomy-tiles.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/carousel.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/instagram.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/custom-posts.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/playlist-slider.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/featured-posts-block.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/news-smart-box.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/widgets/contact-information.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/plugins/cherry-popups.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/plugins/timeline.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/plugins/wc-vendor.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/plugins/cherry-team-members.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/plugins/cherry-testimonials.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/plugins/motopress-slider.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/plugins/wc-vendors.css',
			TECHLOOP_THEME_DIR . '/assets/css/dynamic/builder/icon-box.css',

		),
		'options' => array(
			'main_box_color',

			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_align',

			'meta_font_style',
			'meta_font_weight',
			'meta_font_size',
			'meta_line_height',
			'meta_font_family',
			'meta_letter_spacing',
			'meta_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_accent_color_3',
			'regular_accent_color_4',
			'regular_accent_color_5',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_accent_color_3',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'page_404_bg_color',
			'page_404_bg_repeat',
			'page_404_bg_position_x',
			'page_404_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg_top',
			'footer_widgets_bg_top_image',
			'footer_widgets_bg_top_repeat',
			'footer_widgets_bg_top_position_x',
			'footer_widgets_bg_top_attachment',

			'footer_widgets_bg_bottom',
			'footer_widgets_bg_bottom_image',
			'footer_widgets_bg_bottom_repeat',
			'footer_widgets_bg_bottom_position_x',
			'footer_widgets_bg_bottom_attachment',
			'footer_bg',

			'onsale_badge_color',
			'onsale_badge_bg',
			'featured_badge_color',
			'featured_badge_bg',
			'new_badge_color',
			'new_badge_bg',
			'in_stock_badge_color',
			'out_stock_badge_color',
			'vendors_budge_color',
			'vendors_budge_bg',
		),
	) );
}

/**
 * Return array of arguments for Google Font loader module.
 *
 * @since  1.0.0
 * @return array
 */
function techloop_get_fonts_options() {
	return apply_filters( 'techloop_get_fonts_options', array(
		'prefix'  => 'techloop',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'meta' => array(
				'family'  => 'meta_font_family',
				'style'   => 'meta_font_style',
				'weight'  => 'meta_font_weight',
				'charset' => 'meta_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		),
	) );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function techloop_get_default_footer_copyright() {
	return esc_html__( '%%site-name%% Theme is proudly powered by WordPress Entries (RSS) and Comments (RSS) &copy; %%privacy-policy%%.', 'techloop' );
}

/**
 * Get default contact information.
 *
 * @since  1.0.0
 * @return string
 */
function techloop_get_default_contact_information( $value ) {
	$contact_information = array(
		'address' => esc_html__( '7 DAYS A WEEK FROM 9:00 AM TO 7:00 PM', 'techloop' ),
		'phones'  => esc_html__( 'on orders over $99. This offer is valid on all our store items', 'techloop' ),
		'time'    => false,
		'email'   => sprintf( '<a href="mailto:%1$s">%1$s</a>', esc_html__( ' ', 'techloop' ) ),
	);

	return $contact_information[ $value ];
}

function techloop_get_default_footer_contact_information( $value ) {
	$contact_information = array(
		'address' => esc_html__( '7 Days a week from 9:00 am to 7:00 pm', 'techloop' ),
		'phones'  => sprintf( '<a href="tel:%1$s">%1$s</a>; <a href="tel:%2$s">%2$s</a>', esc_html__( '+3(800) 2345-6789', 'techloop' ), esc_html__( '+3(800) 2345-6790', 'techloop' ) ),
		'time'    => esc_html__( 'Mn-Fr: 10 am-8 pm', 'techloop' ),
		'email'   => sprintf( '<a href="mailto:%1$s">%1$s</a>', esc_html__( 'info@demolink.org', 'techloop' ) ),
	);

	return $contact_information[ $value ];
}

/**
 * Get FontAwesome icons set
 *
 * @return array
 */
function techloop_get_icons_set() {

	ob_start();

	include TECHLOOP_THEME_DIR . '/assets/js/icons.json';
	$json = ob_get_clean();

	$result = array();
	$icons = json_decode( $json, true );

	foreach ( $icons['icons'] as $icon ) {
		$result[] = $icon['id'];
	}

	return $result;
}

/**
 * Get linear icons set
 *
 * @return array
 */
function techloop_get_linear_icons_set() {

	ob_start();

	include TECHLOOP_THEME_DIR . '/assets/js/linear-icons.json';
	$json = ob_get_clean();

	$result = array();
	$icons = json_decode( $json, true );

	foreach ( $icons['icons'] as $icon ) {
		$result[] = $icon['id'];
	}

	return $result;
}
