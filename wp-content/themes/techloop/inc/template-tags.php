<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Techloop
 */

/**
 * Show top panel search.
 *
 * @since  1.0.0
 *
 * @param  string $format Output formatting.
 *
 * @return void
 */
function techloop_header_search( $format = '%s' ) {
	$is_enabled = get_theme_mod( 'header_search', techloop_theme()->customizer->get_default( 'header_search' ) );

	if ( ! $is_enabled ) {
		return;
	}

	if ( techloop_is_woocommerce_activated() ) {
		printf( $format, get_product_search_form( false ) );
	} else {
		printf( $format, get_search_form( false ) );
	};
}

/**
 * Show footer logo, uploaded from customizer.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_footer_logo() {
	if ( ! get_theme_mod( 'footer_logo_visibility', techloop_theme()->customizer->get_default( 'footer_logo_visibility' ) ) ) {
		return;
	}

	$logo_url = get_theme_mod( 'footer_logo_url' );

	if ( ! $logo_url ) {
		return;
	}

	$url      = esc_url( home_url( '/' ) );
	$alt      = esc_attr( get_bloginfo( 'name' ) );
	$logo_url = esc_url( techloop_render_theme_url( $logo_url ) );
	$logo_id  = techloop_get_image_id_by_url( techloop_render_theme_url( $logo_url ) );
	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . esc_attr( $logo_src[1] ) . '" height="' . esc_attr( $logo_src[2] ) . '"';
	} else {
		$atts = '';
	}

	$logo_format = apply_filters(
		'techloop_footer_logo_format',
		'<div class="footer-logo"><a href="%2$s" class="footer-logo_link"><img src="%1$s" alt="%3$s" class="footer-logo_img" %4$s></a></div>'
	);

	printf( $logo_format, $logo_url, $url, $alt, $atts );
}

/**
 * Show pay system, uploaded from customizer.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_footer_pay_system() {
	$pay_url = get_theme_mod( 'pay_systems_url' );
	$pay_src = techloop_render_theme_url(get_theme_mod( 'pay_systems_src', techloop_theme()->customizer->get_default( 'pay_systems_src' ) ) );
	$alt     = esc_attr( get_bloginfo( 'name' ) );
	$pay_format = apply_filters(
		'techloop_pay_format',
		'<a href="%1$s" target="_blank" class="footer-pay">
			<img src="%2$s" alt="%3$s" class="footer-pay_img">
		</a>'
	);

	if ( $pay_src ) {
		printf( $pay_format, $pay_url , $pay_src ,  $alt);
	} return;

}


/**
 * Show footer copyright text.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_footer_copyright() {
	$copyright = get_theme_mod( 'footer_copyright', techloop_theme()->customizer->get_default( 'footer_copyright' ) );
	$format    = '<div class="footer-copyright">%s</div>';

	if ( empty( $copyright ) ) {
		return;
	}

	printf( $format, wp_kses( techloop_render_macros( $copyright ), wp_kses_allowed_html( 'post' ) ) );
}

/**
 * Show contact block.
 *
 * @since  1.0.0
 *
 * @param string $target Current block position: header, footer.
 */
function techloop_contact_block( $target = 'header' ) {
	$contact_block_visibility = get_theme_mod( $target . '_contact_block_visibility', techloop_theme()->customizer->get_default( $target . '_contact_block_visibility' ) );

	if ( ! $contact_block_visibility ) {
		return;
	}

	$contact_item_count = apply_filters( 'techloop_contact_item_count', array(
		'header' => 3,
		'footer' => 3,
	) );

	$contact_info = array();

	for ( $i = 1; $i <= $contact_item_count[ $target ]; $i ++ ) {
		$icon  = get_theme_mod( $target . '_contact_icon_' . $i, techloop_theme()->customizer->get_default( $target . '_contact_icon_' . $i ) );
		$label = get_theme_mod( $target . '_contact_label_' . $i, techloop_theme()->customizer->get_default( $target . '_contact_label_' . $i ) );
		$value = get_theme_mod( $target . '_contact_text_' . $i, techloop_theme()->customizer->get_default( $target . '_contact_text_' . $i ) );
		if ( ! $icon && ! $value && ! $label ) {
			continue;
		}
		$contact_info [ 'item_' . $i ] = array(
			'icon'  => $icon,
			'label' => $label,
			'value' => $value,
		);
	}

	if ( ! $contact_info ) {
		return;
	}

	$icon_format = apply_filters( 'techloop_contact_block_icon_format', '<i class="contact-block__icon-4rzo linearicon %1$s"></i>' );

	$html = '<div class="contact-block contact-block--' . $target . '"><div class="contact-block__inner">';

	foreach ( $contact_info as $key => $value ) {
		$icon           = ( $value['icon'] ) ? sprintf( $icon_format, $value['icon'] ) : '';
		$label          = ( $value['label'] ) ? sprintf( '<span class="contact-block__label_4rzo">%1$s</span>', $value['label'] ) : '';
		$text           = ( $value['value'] ) ? sprintf( '<span class="contact-block__text">%1$s</span>', wp_kses( $value['value'], wp_kses_allowed_html( 'post' ) ) ) : '';
		$item_mod_class = ( $value['icon'] ) ? 'contact-block__item--icon' : '';

		$html .= sprintf( '<div class="contact-block__item %1$s">%2$s<div class="contact-block__value-wrap">%3$s%4$s</div></div>', $item_mod_class, $icon, $label, $text );
	}

	$html .= '</div></div>';

	echo $html;
}

/**
 * Show Social list.
 *
 * @since  1.0.0
 * @since  1.0.1 Added new param - $type.
 * @return void
 */
function techloop_social_list( $context = '', $type = 'icon' ) {
	$visibility_in_header = get_theme_mod( 'header_social_links', techloop_theme()->customizer->get_default( 'header_social_links' ) );
	$visibility_in_footer = get_theme_mod( 'footer_social_links', techloop_theme()->customizer->get_default( 'footer_social_links' ) );

	if ( ! $visibility_in_header && ( 'header' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_footer && ( 'footer' === $context ) ) {
		return;
	}

	echo techloop_get_social_list( $context, $type );
}

/**
 * Show sticky menu label grabbed from options.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_sticky_label() {

	if ( ! is_sticky() || ! is_home() || is_paged() ) {
		return;
	}

	$sticky_type = get_theme_mod(
		'blog_sticky_type',
		techloop_theme()->customizer->get_default( 'blog_sticky_type' )
	);

	$content     = '';
	$icon_format = apply_filters( 'techloop_sticky_icon_format', '<i class="linearicon %1$s"></i>' );

	switch ( $sticky_type ) {

		case 'icon':
			$icon    = get_theme_mod(
				'blog_sticky_icon',
				techloop_theme()->customizer->get_default( 'blog_sticky_icon' )
			);
			$content = sprintf( $icon_format, $icon );
			break;

		case 'label':
			$label   = get_theme_mod(
				'blog_sticky_label',
				techloop_theme()->customizer->get_default( 'blog_sticky_label' )
			);
			$content = techloop_render_icons( $label );
			break;

		case 'both':
			$icon    = get_theme_mod(
				'blog_sticky_icon',
				techloop_theme()->customizer->get_default( 'blog_sticky_icon' )
			);
			$label   = get_theme_mod(
				'blog_sticky_label',
				techloop_theme()->customizer->get_default( 'blog_sticky_label' )
			);
			$content = sprintf( $icon_format, $icon ) . techloop_render_icons( $label );
			break;
	}

	if ( empty( $content ) ) {
		return;
	}

	printf( '<span class="sticky__label type-%2$s">%1$s</span>', $content, $sticky_type );
}

/**
 * Display the header logo.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_header_logo() {
	$logo = techloop_get_site_title_by_type( get_theme_mod( 'header_logo_type', techloop_theme()->customizer->get_default( 'header_logo_type' ) ) );

	if ( is_front_page() && is_home() ) {
		$tag = 'h1';
	} else {
		$tag = 'div';
	}

	$format = apply_filters(
		'techloop_header_logo_format',
		'<%1$s class="site-logo"><a class="site-logo__link" href="%2$s" rel="home">%3$s</a></%1$s>'
	);

	printf( $format, $tag, esc_url( home_url( '/' ) ), $logo );
}

/*
** 4rzo Logo Mobile
*/
function techloop_header_logo_4rzo(){
	$logo = techloop_get_site_title_by_type( get_theme_mod( 'header_logo_type', techloop_theme()->customizer->get_default( 'header_logo_type' ) ) );

	if ( is_front_page() && is_home() ) {
		$tag = 'h1';
	} else {
		$tag = 'div';
	}

	$format = apply_filters(
		'techloop_header_logo_format',
		'<%1$s class="site-logo" style="width: 120px;">
			<a class="site-logo__link" href="%2$s" rel="home">%3$s</a>
		</%1$s>'
	);

	printf( $format, $tag, esc_url( home_url( '/' ) ), $logo );
}
/**
 * Retrieve the site title (image or text).
 *
 * @since  1.0.0
 * @return string
 */
function techloop_get_site_title_by_type( $type ) {

	if ( ! in_array( $type, array( 'text', 'image' ) ) ) {
		$type = 'text';
	}

	$logo = get_bloginfo( 'name' );

	if ( 'text' === $type ) {
		return $logo;
	}

	$logo_url        = get_theme_mod( 'header_logo_url', techloop_theme()->customizer->get_default( 'header_logo_url' ) );
	$invert_logo_url = get_theme_mod( 'invert_header_logo_url', techloop_theme()->customizer->get_default( 'invert_header_logo_url' ) );
	$header_invert   = get_theme_mod( 'header_invert_color_scheme', techloop_theme()->customizer->get_default( 'header_invert_color_scheme' ) );

	if ( $header_invert && $invert_logo_url ) {
		$logo_url = $invert_logo_url;
	}

	if ( ! $logo_url ) {
		return $logo;
	}

	$logo_url               = techloop_render_theme_url( $logo_url );
	$retina_logo            = '';
	$retina_logo_url        = get_theme_mod( 'retina_header_logo_url', techloop_theme()->customizer->get_default( 'retina_header_logo_url' ) );
	$invert_retina_logo_url = get_theme_mod( 'invert_retina_header_logo_url', techloop_theme()->customizer->get_default( 'invert_retina_header_logo_url' ) );

	if ( $header_invert && $invert_retina_logo_url ) {
		$retina_logo_url = $invert_retina_logo_url;
	}

	$retina_logo_url = techloop_render_theme_url( $retina_logo_url );
	$logo_id         = techloop_get_image_id_by_url( $logo_url );

	if ( $retina_logo_url ) {
		$retina_logo = sprintf( 'srcset="%s 2x"', esc_url( $retina_logo_url ) );
	}

	$logo_src = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo_id && $logo_src ) {
		$atts = ' width="' . $logo_src[1] . '" height="' . $logo_src[2] . '"';
	} else {
		$atts = '';
	}

	$format_image = apply_filters( 'techloop_header_logo_image_format',
		'<img src="%1$s" alt="%2$s" class="site-link__img" %3$s%4$s>'
	);

	return sprintf( $format_image, esc_url( $logo_url ), esc_attr( $logo ), $retina_logo, $atts );
}

/**
 * Display the site description.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_site_description() {
	$show_desc = get_theme_mod( 'show_tagline', techloop_theme()->customizer->get_default( 'show_tagline' ) );

	if ( ! $show_desc ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( ! ( $description || is_customize_preview() ) ) {
		return;
	}

	$format = apply_filters( 'techloop_site_description_format', '<div class="site-description">%s</div>' );

	printf( $format, $description );
}

/**
 * Display box with information about author.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_post_author_bio() {
	$is_enabled = get_theme_mod( 'single_author_block', techloop_theme()->customizer->get_default( 'single_author_block' ) );

	if ( ! $is_enabled ) {
		return;
	}

	get_template_part( apply_filters( 'techloop_post_author_bio_template_part_slug', 'template-parts/content' ), 'author-bio' );
}

/**
 * Display header-box for modern single post.
 */
function techloop_single_modern_header() {
	$single_post_type = get_theme_mod( 'single_post_type', techloop_theme()->customizer->get_default( 'single_post_type' ) );

	if ( ! is_singular( 'post' ) ) {
		return;
	}

	if ( 'modern' !== $single_post_type ) {
		return;
	}
	while ( have_posts() ) : the_post();
		get_template_part( apply_filters( 'techloop_single_modern_header_template_part_slug', 'template-parts/post/single/content-single-modern-header' ) );
	endwhile;
}

/**
 * Display a link to all posts by an author.
 *
 * @since  1.0.0
 * @return string An HTML link to the author page.
 */
function techloop_get_the_author_posts_link() {
	ob_start();
	the_author_posts_link();
	$author = ob_get_clean();

	return $author;
}

/**
 * Display the breadcrumbs.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_site_breadcrumbs() {
	$breadcrumbs_visibillity       = get_theme_mod( 'breadcrumbs_visibillity', techloop_theme()->customizer->get_default( 'breadcrumbs_visibillity' ) );
	$breadcrumbs_page_title        = get_theme_mod( 'breadcrumbs_page_title', techloop_theme()->customizer->get_default( 'breadcrumbs_page_title' ) );
	$breadcrumbs_path_type         = get_theme_mod( 'breadcrumbs_path_type', techloop_theme()->customizer->get_default( 'breadcrumbs_path_type' ) );
	$breadcrumbs_front_visibillity = get_theme_mod( 'breadcrumbs_front_visibillity', techloop_theme()->customizer->get_default( 'breadcrumbs_front_visibillity' ) );

	$breadcrumbs_settings = apply_filters( 'techloop_breadcrumbs_settings', array(
		'wrapper_format'    => '<div class="container"><div class="row"><div class="breadcrumbs__title">%1$s</div><div class="breadcrumbs__items">%2$s</div></div></div>',
		'page_title_format' => '<h5 class="page-title">%s</h5>',
		'show_title'        => $breadcrumbs_page_title,
		'path_type'         => $breadcrumbs_path_type,
		'show_on_front'     => $breadcrumbs_front_visibillity,
		'separator'         => '&#124;',
		'labels'            => array(
			'browse'         => '',
			'error_404'      => esc_html__( '404 Not Found', 'techloop' ),
			'archives'       => esc_html__( 'Archives', 'techloop' ),
			/* Translators: %s is the search query. The HTML entities are opening and closing curly quotes. */
			'search'         => esc_html__( 'Search results for &#8220;%s&#8221;', 'techloop' ),
			/* Translators: %s is the page number. */
			'paged'          => esc_html__( 'Page %s', 'techloop' ),
			/* Translators: Minute archive title. %s is the minute time format. */
			'archive_minute' => esc_html__( 'Minute %s', 'techloop' ),
			/* Translators: Weekly archive title. %s is the week date format. */
			'archive_week'   => esc_html__( 'Week %s', 'techloop' ),
		),
		'date_labels'       => array(
			'archive_minute_hour' => esc_html_x( 'g:i a', 'minute and hour archives time format', 'techloop' ),
			'archive_minute'      => esc_html_x( 'i', 'minute archives time format', 'techloop' ),
			'archive_hour'        => esc_html_x( 'g a', 'hour archives time format', 'techloop' ),
			'archive_year'        => esc_html_x( 'Y', 'yearly archives date format', 'techloop' ),
			'archive_month'       => esc_html_x( 'F', 'monthly archives date format', 'techloop' ),
			'archive_day'         => esc_html_x( 'j', 'daily archives date format', 'techloop' ),
			'archive_week'        => esc_html_x( 'W', 'weekly archives date format', 'techloop' ),
		),
		'css_namespace'     => array(
			'module'    => 'breadcrumbs',
			'content'   => 'breadcrumbs__content',
			'wrap'      => 'breadcrumbs__wrap',
			'browse'    => 'breadcrumbs__browse',
			'item'      => 'breadcrumbs__item',
			'separator' => 'breadcrumbs__item-sep',
			'link'      => 'breadcrumbs__item-link',
			'target'    => 'breadcrumbs__item-target',
		),
	) );


	if ( $breadcrumbs_visibillity ) {
		techloop_theme()->get_core()->init_module( 'cherry-breadcrumbs', $breadcrumbs_settings );

		do_action( 'cherry_breadcrumbs_render' );
	}
}


/**
 * Display the page preloader.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_get_page_preloader() {
	$page_preloader = get_theme_mod( 'page_preloader', techloop_theme()->customizer->get_default( 'page_preloader' ) );
	$preloader_img  = get_theme_mod( 'preloader_img', techloop_theme()->customizer->get_default( 'preloader_img' ) );

	if ( $preloader_img ) {
		$page_preloader_img_html = '<div class="page-preloader"><div class="page-preloader-image"><img src="' . esc_url( techloop_render_theme_url( $preloader_img ) ) . '"></div></div>';
	} else {
		$page_preloader_img_html = '<div class="page-preloader no-image"></div>';
	}

	if ( $page_preloader ) {
		echo '<div class="page-preloader-cover">' . $page_preloader_img_html . '</div>';
	}
}


/**
 * Check if top panel visible or not
 *
 * @return bool
 */
function techloop_is_top_panel_visible() {
	$header_layout_type            = get_theme_mod( 'header_layout_type', techloop_theme()->customizer->get_default( 'header_layout_type' ) );
	$menu                          = has_nav_menu( 'top' );
	$contact_block_visibility      = get_theme_mod( 'header_contact_block_visibility', techloop_theme()->customizer->get_default( 'header_contact_block_visibility' ) );
	$social_menu_visibility        = get_theme_mod( 'header_social_links', techloop_theme()->customizer->get_default( 'header_social_links' ) );
	$top_panel_visibility          = get_theme_mod( 'top_panel_visibility', techloop_theme()->customizer->get_default( 'top_panel_visibility' ) );
	$currency_switcher_visibility  = shortcode_exists( 'woocs' );
	$is_woocommerce_activated      = techloop_is_woocommerce_activated();

	$conditions = apply_filters( 'techloop_top_panel_visibility_conditions', array(
		'default' => array(
			$social_menu_visibility,
			$contact_block_visibility,
			$currency_switcher_visibility
		),
		'style-2' => array( $menu, $social_menu_visibility, $contact_block_visibility, $currency_switcher_visibility, $is_woocommerce_activated ),
		'style-3' => array( $menu, $social_menu_visibility, $contact_block_visibility, $currency_switcher_visibility, $is_woocommerce_activated ),
		'style-4' => array( $social_menu_visibility, $contact_block_visibility ),
	) );

	$is_visible = false;

	if ( ! $top_panel_visibility ) {
		return $is_visible;
	}

	foreach ( $conditions[ $header_layout_type ] as $condition ) {
		if ( ! empty( $condition ) ) {
			$is_visible = true;
		}
	}

	return $is_visible;
}


/**
 * Display the ads.
 *
 * @since  1.0.0
 *
 * @param  string $location location of ads in theme.
 *
 * @return void
 */
function techloop_ads( $location ) {
	$ads    = trim( get_theme_mod( 'ads_' . $location, techloop_theme()->customizer->get_default( 'ads_' . $location ) ) );
	$format = '<div class="' . $location . '-ads">%s</div>';

	if ( empty( $ads ) ) {
		return;
	}

	printf( $format, wp_specialchars_decode( $ads, ENT_QUOTES ) );
}

/**
 * Display the header ads.
 */
function techloop_ads_header() {
	techloop_ads( 'header' );
}

/**
 * Display ads for before loop location.
 */
function techloop_ads_home_before_loop() {
	techloop_ads( 'home_before_loop' );
}

/**
 * Display ads for before loop content.
 */
function techloop_ads_post_before_content() {
	techloop_ads( 'post_before_content' );
}

/**
 * Display ads for before comments.
 */
function techloop_ads_post_before_comments() {
	techloop_ads( 'post_before_comments' );
}