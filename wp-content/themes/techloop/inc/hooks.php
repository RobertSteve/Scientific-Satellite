<?php
/**
 * Theme hooks.
 *
 * @package Techloop
 */
// Mega menu mobile data.
add_filter( 'tm_mega_menu_mobile_button', '__return_true' );

// Menu description.
add_filter( 'walker_nav_menu_start_el', 'techloop_nav_menu_description', 10, 4 );

// Sidebars classes.
add_filter( 'techloop_widget_area_classes', 'techloop_set_sidebar_classes', 10, 2 );

// Set footer columns.
add_filter( 'dynamic_sidebar_params', 'techloop_get_footer_widget_layout' );

// Adapt default image post format classes to current theme.
add_filter( 'cherry_post_formats_image_css_model', 'techloop_add_image_format_classes', 10, 2 );

// Enqueue sticky menu if required.
add_filter( 'techloop_theme_script_depends', 'techloop_enqueue_misc' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'techloop_post_thumb_classes' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'techloop_modify_comment_form' );

// Reorder comment fields
add_filter( 'comment_form_fields', 'techloop_reorder_comment_fields' );

// Additional body classes.
add_filter( 'body_class', 'techloop_extra_body_classes' );

// Render macros in text widgets.
add_filter( 'widget_text', 'techloop_render_widget_macros' );

// Adds the meta viewport to the header.
add_action( 'wp_head', 'techloop_meta_viewport', 0 );

// Customization for `Tag Cloud` widget.
add_filter( 'widget_tag_cloud_args', 'techloop_customize_tag_cloud' );

// Changed excerpt more string.
add_filter( 'excerpt_more', 'techloop_excerpt_more' );

// Creating wrappers for audio shortcode.
add_filter( 'wp_audio_shortcode', 'techloop_audio_shortcode', 10, 5 );

// Set specific content classes.
add_filter( 'techloop_content_classes', 'techloop_set_specific_content_classes' );

// Add custom icons font to builder.
add_filter( 'tm_builder_custom_font_icons', 'techloop_builder_custom_font_icons' );

// Remove include builder grid css file.
add_filter( 'tm_builder_front_styles', 'techloop_builder_remove_include_grid_css' );

// Customization power-builder taxonomy module.
add_filter( 'tm_pb_module_taxonomy_title_settings', 'techloop_taxonomy_module_title_settings' );
add_filter( 'tm_pb_module_taxonomy_button_settings', 'techloop_taxonomy_module_button_settings' );
add_filter( 'tm_pb_module_taxonomy_template_count_max', 'techloop_taxonomy_module_template_count_max' );

// Customization power-builder carousel module.
add_filter( 'tm_pb_module_carousel_img_settings', 'techloop_module_carousel_img_settings' );
add_filter( 'tm_pb_module_carousel_title_settings', 'techloop_module_carousel_title_settings' );
add_filter( 'tm_pb_module_carousel_author_settings', 'techloop_module_carousel_author_settings' );
add_filter( 'tm_pb_module_carousel_category_settings', 'techloop_module_carousel_category_settings' );
add_filter( 'tm_pb_module_carousel_comment_count_settings', 'techloop_module_carousel_comment_count_settings' );
add_filter( 'tm_pb_module_carousel_more_button_settings', 'techloop_module_carousel_more_button_settings' );
add_filter( 'tm_pb_module_carousel_space', 'techloop_module_carousel_space' );

// Disable mega menu plugin when minimal or modern header layout.
add_filter( 'wp_nav_menu_args', 'techloop_disable_mega_menu', 1000 );

// Add builder modules to deprecated list.
add_filter( 'tm_builder_deprecated_modules', 'techloop_builder_deprecated_modules' );

// Add custom modules to power builder.
add_action( 'tm_builder_load_user_modules', 'techloop_add_custom_modules_to_builder' );

// Include current skin dynamic css file.
add_action( 'cherry_dynamic_css_include_custom_files', 'techloop_add_skins_dynamic_css', 20, 2 );

// Customization sidebar settings to woo page.
add_filter( 'theme_mod_top_panel_visibility', 'techloop_woo_top_panel_visibility' );

// Upd team shortcode heading format
add_filter( 'cherry_team_shortcode_heading_format', 'techloop_team_shortcode_heading_format' );

// Remove testimonials templates list boxed
add_filter( 'tm_testimonials_templates_list', 'techloop_testimonials_templates_list' );

// Disable sidebar to single team page
add_filter( 'theme_mod_sidebar_position', 'techloop_team_sidebar_position' );

// Change Cherry PopUps subscribe form html
add_filter( 'cherry_popups_data_callbacks', 'techloop_get_popup_subscribe_form', 10, 2 );

add_filter( 'cherry_search_spinner', 'techloop_search_spinner' );


/**
 * Append description into nav items
 *
 * @param  string $item_output The menu item output.
 * @param  WP_Post $item Menu item object.
 * @param  int $depth Depth of the menu.
 * @param  array $args wp_nav_menu() arguments.
 *
 * @return string
 */
function techloop_nav_menu_description( $item_output, $item, $depth, $args ) {

	if ( 'main' !== $args->theme_location || ! $item->description ) {
		return $item_output;
	}

	$descr_enabled = get_theme_mod(
		'header_menu_attributes',
		techloop_theme()->customizer->get_default( 'header_menu_attributes' )
	);

	if ( ! $descr_enabled ) {
		return $item_output;
	}

	$current     = $args->link_after . '</a>';
	$description = '<div class="menu-item__desc">' . $item->description . '</div>';
	$item_output = str_replace( $current, $description . $current, $item_output );

	return $item_output;
}

/**
 * Set layout classes for sidebars.
 *
 * @since  1.0.0
 * @uses   techloop_get_layout_classes.
 *
 * @param  array $classes Additional classes.
 * @param  string $area_id Sidebar ID.
 *
 * @return array
 */
function techloop_set_sidebar_classes( $classes, $area_id ) {

	if ( 'sidebar' === $area_id || 'shop-sidebar' === $area_id ) {
		$classes[] .= 'sidebar';
		return techloop_get_layout_classes( 'sidebar', $classes );
	}

	if ( 'footer-area' == $area_id || 'second-footer-area' == $area_id ) {
		$columns = get_theme_mod( 'footer_widget_columns', techloop_theme()->customizer->get_default( 'footer_widget_columns' ) );

		if ( '1' !== $columns ) {
			$classes[] = sprintf( 'footer-area--%s-cols', $columns );
		} else {
			$classes[] = 'footer-area--fullwidth';
		}

		$classes[] = 'row';
	}

	return $classes;
}

/**
 * Get footer widgets layout class
 *
 * @since  1.0.0
 * @param  string $params Existing widget classes.
 * @return string
 */
function techloop_get_footer_widget_layout( $params ) {

if ( is_admin() ) {
return $params;
}

$sidebars = array(
'footer-area'        => 'footer_widget_columns',
'second-footer-area' => 'second_footer_widget_columns',
);

if ( empty( $params[0]['id'] ) || ! array_key_exists( $params[0]['id'], $sidebars ) ) {
return $params;
}

if ( empty( $params[0]['before_widget'] ) ) {
return $params;
}

$mod     = $sidebars[ $params[0]['id'] ];
$columns = get_theme_mod( $mod, techloop_theme()->customizer->get_default( $mod ) );
$columns = intval( $columns );
$classes = 'class="col-xs-12 col-sm-%3$s col-md-%2$s col-lg-%1$s %4$s ';

switch ( $columns ) {
case 4:
$lg_col = 3;
$md_col = 6;
$sm_col = 12;
$extra  = '';
break;

case 3:
$lg_col = 4;
$md_col = 4;
$sm_col = 12;
$extra  = '';
break;

case 2:
$lg_col = 6;
$md_col = 6;
$sm_col = 12;
$extra  = '';
break;

default:
$lg_col = 12;
$md_col = 12;
$sm_col = 12;
$extra  = '';
break;
}

$params[0]['before_widget'] = str_replace(
'class="',
sprintf( $classes, $lg_col, $md_col, $sm_col, $extra ),
$params[0]['before_widget']
);

return $params;
}


/**
 * Filter image CSS model
 *
 * @param  array $css_model Default CSS model.
 * @param  array $args Post formats module arguments.
 *
 * @return array
 */
function techloop_add_image_format_classes( $css_model, $args ) {
	$blog_featured_image = get_theme_mod( 'blog_featured_image', techloop_theme()->customizer->get_default( 'blog_featured_image' ) );
	$css_model['link'] .= ' post-thumbnail--' . $blog_featured_image;

	return $css_model;
}

/**
 * Add jQuery Stickup to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 *
 * @return array
 */
function techloop_enqueue_misc( $depends ) {
	$header_menu_sticky = get_theme_mod( 'header_menu_sticky', techloop_theme()->customizer->get_default( 'header_menu_sticky' ) );

	if ( $header_menu_sticky && ! wp_is_mobile() ) {
		$depends[] = 'jquery-stickup';
	}

	$totop_visibility = get_theme_mod( 'totop_visibility', techloop_theme()->customizer->get_default( 'totop_visibility' ) );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function techloop_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 *
 * @return array
 */
function techloop_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Submit', 'techloop' );

	$args['fields']['author'] = '<p class="comment-form-author"><label for="autohr" class="h6-style">' . esc_html__( 'Name: ', 'techloop' ) . '<span class="required">*</span></label><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_html__( 'Enter your name', 'techloop' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><label for="autohr" class="h6-style">' . esc_html__( 'E-mail: ', 'techloop' ) . '<span class="required">*</span></label><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Enter your e-mail', 'techloop' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><label for="autohr" class="h6-style">' . esc_html__( 'Website:', 'techloop' ) . '</label><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_html__( 'Enter your website', 'techloop' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><label for="autohr" class="h6-style">' . esc_html__( 'Your Comments: ', 'techloop' ) . '<span class="required">*</span></label><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_html__( 'Enter your comments', 'techloop' ) . '" cols="45" rows="8" aria-required="true" required="required"></textarea></p>';

	$args['title_reply_before'] = '<h5 id="reply-title" class="comment-reply-title">';

	$args['title_reply_after'] = '</h5>';

	$args['title_reply'] = esc_html__( 'Leave a reply', 'techloop' );

	return $args;
}

/**
 * Reorder comment fields
 *
 * @param  array $fields Comment fields.
 *
 * @return array
 */
function techloop_reorder_comment_fields( $fields ) {

	if ( is_singular( 'product' ) ) {
		return $fields;
	}

	$new_fields_order = array();
	$new_order        = array( 'author', 'email', 'url', 'comment' );

	foreach ( $new_order as $key ) {
		$new_fields_order[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	return $new_fields_order;
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function techloop_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a options-based classes.
	$header_layout  = get_theme_mod( 'header_container_type', techloop_theme()->customizer->get_default( 'header_container_type' ) );
	$content_layout = get_theme_mod( 'content_container_type', techloop_theme()->customizer->get_default( 'content_container_type' ) );
	$footer_layout  = get_theme_mod( 'footer_container_type', techloop_theme()->customizer->get_default( 'footer_container_type' ) );
	$blog_layout    = get_theme_mod( 'blog_layout_type', techloop_theme()->customizer->get_default( 'blog_layout_type' ) );
	$sb_position    = get_theme_mod( 'sidebar_position', techloop_theme()->customizer->get_default( 'sidebar_position' ) );
	$sidebar        = get_theme_mod( 'sidebar_width', techloop_theme()->customizer->get_default( 'sidebar_width' ) );
	$single_type    = get_theme_mod( 'single_post_type', techloop_theme()->customizer->get_default( 'single_post_type' ) );
	$header_type    = get_theme_mod( 'header_layout_type', techloop_theme()->customizer->get_default( 'header_layout_type' ) );
	$footer_type    = get_theme_mod( 'footer_layout_type', techloop_theme()->customizer->get_default( 'footer_layout_type' ) );

	if ( is_singular( 'post' ) ) {
		$classes[] = 'single-post-' . sanitize_html_class( $single_type );;
	}

	if ( function_exists( 'tm_pb_is_pagebuilder_used' ) ) {
		if ( tm_pb_is_pagebuilder_used( get_the_ID() ) && ! is_search() ) {
			$classes[] = 'use-tm-pb-builder';
		}
	}

	return array_merge( $classes, array(
		'header-layout-' . $header_layout,
		'content-layout-' . $content_layout,
		'footer-layout-' . $footer_layout,
		'blog-' . $blog_layout,
		'position-' . $sb_position,
		'sidebar-' . str_replace( '/', '-', $sidebar ),
		'header-' . $header_type,
		'footer-' . $footer_type,
	) );
}

/**
 * Replace macroses in text widget.
 *
 * @param  string $text Default text.
 *
 * @return string
 */
function techloop_render_widget_macros( $text ) {
	$uploads = wp_upload_dir();

	$data = array(
		'/%%uploads_url%%/' => $uploads['baseurl'],
		'/%%home_url%%/'    => esc_url( home_url( '/' ) ),
		'/%%theme_url%%/'   => get_stylesheet_directory_uri(),
	);

	return preg_replace( array_keys( $data ), array_values( $data ), $text );
}

/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.1
 */
function techloop_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />' . "\n";
}

/**
 * Customization for `Tag Cloud` widget.
 *
 * @since  1.0.1
 *
 * @param  array $args Widget arguments.
 *
 * @return array
 */
function techloop_customize_tag_cloud( $args ) {
	$args['smallest'] = 12;
	$args['largest']  = 12;
	$args['unit']     = 'px';

	return $args;
}

/**
 * Replaces `[...]` (appended to automatically generated excerpts) with `...`.
 *
 * @since  1.0.1
 *
 * @param  string $more The string shown within the more link.
 *
 * @return string
 */
function techloop_excerpt_more( $more ) {

	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip;';
}

/**
 * Creating wrappers for audio shortcode.
 */
function techloop_audio_shortcode( $html, $atts, $audio, $post_id, $library ) {

	$html = '<div class="mejs-container-wrapper">' . $html . '</div>';

	return $html;
}

/**
 * Upd team shortcode heading format
 *
 * @param $array
 *
 * @return array
 */
function techloop_team_shortcode_heading_format( $array ) {

	$array = array(
		'super_title' => '<h3 class="team-heading_super_title">%s</h3>',
		'title'       => '<h5 class="team-heading_title">%s</h5>',
		'subtitle'    => '<h6 class="team-heading_subtitle">%s</h6>',
	);

	return $array;
}

/**
 * Set specific content classes for blog listing
 */
function techloop_set_specific_content_classes( $layout_classes ) {
	$sidebar_position = get_theme_mod( 'sidebar_position' );

	if ( ( 'fullwidth' === $sidebar_position && is_singular( 'post' ) ) ) {
		$layout_classes = array( 'col-xs-12', 'col-md-12', 'col-xl-6', 'col-xl-push-3' );
	}

	return $layout_classes;
}

/**
 * Add custom icon fonts to builder.
 */
function techloop_builder_custom_font_icons( $icons ) {
	$icons['linearicons'] = array(
		'src'  => TECHLOOP_THEME_CSS . '/linearicons.css',
		'base' => 'linearicon',
	);
	$icons['construction'] = array(
		'src'  => TECHLOOP_THEME_CSS . '/construction.css',
		'base' => 'construction',
	);

	return $icons;
}

/**
 * Remove include builder grid css file
 */
function techloop_builder_remove_include_grid_css( $styles ) {
	unset( $styles['tm-builder-modules-grid'] );

	return $styles;
}

/**
 * Customization title settings to taxonomy module.
 *
 * @param array $title Title settings.
 *
 * @return array
 */
function techloop_taxonomy_module_title_settings( $title ) {
	$title['class'] = 'tm_pb_taxonomy__title';
	$title['html']  = '<h5 %1$s><a href="%2$s" %3$s>%4$s</a></h5>';

	return $title;
}

/**
 * Customization button settings to taxonomy module.
 *
 * @param array $button Button settings.
 *
 * @return array
 */
function techloop_taxonomy_module_button_settings( $button ) {
	$button['class'] = 'link';
	$button['html']  = '<span class="button--holder"><a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a></span>';

	return $button;
}

/**
 * Customization template count max to taxonomy module.
 *
 * @return int
 */
function techloop_taxonomy_module_template_count_max() {
	$template_count_max = 5;

	return $template_count_max;
}

/**
 * Customization image settings to carousel module.
 *
 * @param array $image Image settings.
 *
 * @return array
 */
function techloop_module_carousel_img_settings( $image ) {
	$image['mobile_size'] = 'techloop-thumb-m';

	return $image;
}

/**
 * Customization title settings to carousel module.
 *
 * @param array $post_title Title settings.
 *
 * @return array
 */
function techloop_module_carousel_title_settings( $post_title ) {

	$post_title['class'] = 'entry-title';
	$post_title['html']  = '<h5 %1$s><a href="%2$s" %3$s>%4$s</a></h5>';

	return $post_title;
}

/**
 * Customization author meta settings to carousel module.
 *
 * @param array $author Author meta settings.
 *
 * @return array
 */
function techloop_module_carousel_author_settings( $author ) {

	$author['prefix'] = esc_html__( 'by ', 'techloop' );

	return $author;
}

/**
 * Customization category meta settings to carousel module.
 *
 * @param array $category Author meta settings.
 *
 * @return array
 */
function techloop_module_carousel_category_settings( $category ) {

	$category['delimiter'] = '';
	$category['before']    = '<div class="post-cats">';

	return $category;
}


/**
 * Customization comment meta settings to carousel module.
 *
 * @param array $comment Author meta settings.
 *
 * @return mixed
 */
function techloop_module_carousel_comment_count_settings( $comment ) {

	$comment['icon']  = '<span class="linearicon linearicon-bubble"></span>';
	$comment['html']  = '<span class="post__comments">%1$s<a href="%2$s" %3$s %4$s>%5$s <span class="text">%6$s</span></a></span>';
	$comment['sufix'] = get_comments_number();

	return $comment;
}

/**
 * Customization more button settings to carousel module.
 *
 * @param array $more_button More button settings.
 *
 * @return array
 */
function techloop_module_carousel_more_button_settings( $more_button ) {

	$more_button_settings = array(
		'class' => 'carousel__more-btn btn btn-secondary',
		'html'  => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
	);

	$more_button = array_merge( $more_button, $more_button_settings );

	return $more_button;
}

/**
 * Customization space between slides to carousel module.
 *
 * @return int
 */
function techloop_module_carousel_space() {
	$space_between_slides = 50;

	return $space_between_slides;
}

/**
 * Disable mega menu plugin when minimal or modern header layout
 *
 * @param $args
 *
 * @return mixed
 */

function techloop_disable_mega_menu( $args ) {
	$header_layout_type = get_theme_mod( 'header_layout_type', techloop_theme()->customizer->get_default( 'header_layout_type' ) );
	$menu               = has_nav_menu( 'main' );

	if ( $menu && ( $header_layout_type === 'minimal' || $header_layout_type === 'modern' ) ) {
		$args['walker'] = '';

		return $args;
	}

	return $args;
}

/**
 * Add builder modules to deprecated list.
 *
 * @param $deprecated_modules Deprecated modules.
 *
 * @return array
 */
function techloop_builder_deprecated_modules( $deprecated_modules ) {

	$new_deprecated_modules = array(
		'Tm_Builder_Module_Countdown_Timer',
	);

	return array_merge( $deprecated_modules, $new_deprecated_modules );
}

/**
 * Add custom modules to power builder.
 */
function techloop_add_custom_modules_to_builder( $modules_loader ) {

	$custom_modules = apply_filters( 'techloop_power_builder_theme_modules', array(
		'Techloop_Builder_Module_Icon'            => trailingslashit( TECHLOOP_THEME_DIR ) . 'builder/class-builder-module-icon.php',
		'Techloop_Builder_Module_Countdown_Timer' => trailingslashit( TECHLOOP_THEME_DIR ) . 'builder/class-builder-module-countdown-timer.php',
		'Techloop_Builder_Module_Icon_Box'        => trailingslashit( TECHLOOP_THEME_DIR ) . 'builder/class-builder-module-icon-box.php',
		'Techloop_Builder_Module_Icon_Box_Item'   => trailingslashit( TECHLOOP_THEME_DIR ) . 'builder/class-builder-module-icon-box-item.php',
	) );

	foreach ( $custom_modules as $module_class => $module_path ) {

		include_once $module_path;
		$modules_loader->add_module( $module_class, $module_path );

	}
}

/**
 * Enable top panel to woo page.
 */
function techloop_woo_top_panel_visibility( $value ) {

	if ( techloop_is_woocommerce_activated() && is_woocommerce() ) {
		return true;
	}

	return $value;
}

/**
 * Remove testimonials templates list boxed
 *
 * @param $array
 *
 * @return array
 */
function techloop_testimonials_templates_list( $array ) {
	unset( $array['boxed.tmpl'] );

	return $array;
}

/**
 * Disable sidebar to single team page.
 */
function techloop_team_sidebar_position( $value ) {

	if ( is_singular( 'team' ) || is_404() ) {
		return 'fullwidth';
	}

	return $value;
}

/**
 * Wostroid get popup subscribe form
 *
 * @param  $array
 *
 * @return $array
 */
function techloop_get_popup_subscribe_form( $array ) {
	$array['subscribeform'] = 'techloop_get_subscribe_form';

	return $array;
}


/**
 * Techloop get subscribe form
 *
 * @param array $attr
 *
 * @return string
 */
function techloop_get_subscribe_form( $attr = array() ) {

	$default_attr = array(
		'submit_text'      => esc_html__( 'Subscribe', 'techloop' ),
		'placeholder_text' => esc_html__( 'Your email', 'techloop' ),
	);

	$attr = wp_parse_args( $attr, $default_attr );

	$html = '<div class="cherry-popup-subscribe">';
	$html .= '<form method="POST" action="#" class="cherry-popup-subscribe__form">';
	$html .= '<div class="cherry-popup-subscribe__message"><span></span></div>';
	$html .= '<div class="cherry-popup-subscribe__input-group">';
	$html .= '<label class="cherry-popup-subscribe__input-label" for="subscribe-mail">';
	$html .= '<i class="linearicon linearicon-envelope-open"></i>';
	$html .= '<input class="cherry-popup-subscribe__input" type="email" name="subscribe-mail" value="" placeholder="' . $attr['placeholder_text'] . '">';
	$html .= '</label>';
	$html .= '<div class="cherry-popup-subscribe__submit">' . $attr['submit_text'] . '</div>';
	$html .= '</div>';
	$html .= '</form>';
	$html .= '</div>';

	return $html;
}

function techloop_search_spinner(){
	$html = '<div class="cherry-search__spinner"><svg version="1.1" id="cherry-search-loader" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"><path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/></path></svg></div>';

	return $html;
}
