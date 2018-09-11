<?php
/**
 * Menu Template Functions.
 *
 * @package Techloop
 */

/**
 * Show main menu.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_main_menu( $type = 'horizontal' ) {
	?>
	<nav id="site-navigation" class="main-navigation " role="navigation">

		<?php
			$args = apply_filters( 'techloop_main_menu_args', array(
				'theme_location'   => 'main',
				'container'        => '',
				'menu_id'          => 'main-menu',
				'fallback_cb'      => 'techloop_set_nav_menu',
				'fallback_message' => esc_html__( 'Set main menu', 'techloop' ),
			) );

			wp_nav_menu( $args );
		?>
	</nav><!-- #site-navigation -->
	<?php
}

function techloop_vertical_menu_active_sidebar( $is_active_sidebar, $index ) {

	if ( ! $is_active_sidebar && ( has_action( 'dynamic_sidebar_before' ) || has_action( 'dynamic_sidebar_after' ) ) ) {
		return true;
	}

	return $is_active_sidebar;
}

function techloop_vertical_main_menu( $index, $has_widgets ) {
	$sidebar_position = get_theme_mod( 'sidebar_position' );
	$header_layout = get_theme_mod( 'header_layout_type' );

	if ( is_front_page() && 'default' === $header_layout && 'fullwidth' !== $sidebar_position ){
		add_filter( 'is_active_sidebar', 'techloop_vertical_menu_active_sidebar', 10, 2 );
	}
	if ( 'sidebar' === $index && is_front_page() && 'default' === $header_layout || 'fullwidth' !== $sidebar_position && is_front_page() && 'sidebar' === $index && 'default' === $header_layout ) {

		?>
		<div id="vertical_menu" class="home_page__vertical_menu">
			<div class="header-main-menu">
				<div class="container">
					<?php techloop_main_menu( $type = 'horizontal' ); ?>
				</div>
			</div>
		</div>
		<?php
	}
}
add_action( 'dynamic_sidebar_before', 'techloop_vertical_main_menu', 10, 2 );


/**
 * Show footer menu.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_footer_menu() {
	if ( ! get_theme_mod( 'footer_menu_visibility', techloop_theme()->customizer->get_default( 'footer_menu_visibility' ) ) ) {
		return;
	} ?>
	<nav id="footer-navigation" class="footer-menu" role="navigation">
	<?php
		$args = apply_filters( 'techloop_footer_menu_args', array(
			'theme_location'   => 'footer',
			'container'        => '',
			'menu_id'          => 'footer-menu-items',
			'menu_class'       => 'footer-menu__items',
			'depth'            => 1,
			'fallback_cb'      => 'techloop_set_nav_menu',
			'fallback_message' => esc_html__( 'Set footer menu', 'techloop' ),
		) );

		wp_nav_menu( $args );
	?>
	</nav><!-- #footer-navigation -->
	<?php
}

/**
 * Show top page menu if active.
 *
 * @since  1.0.0
 * @return void
 */
function techloop_top_menu() {
	if ( ! has_nav_menu( 'top' ) ) {
		return;
	}
	wp_nav_menu( array(
		'theme_location'  => 'top',
		'container'       => 'div',
		'container_class' => 'top-panel__menu',
		'menu_class'      => 'top-panel__menu-list',
		'depth'           => 1,
	) );
}

/**
 * Get social nav menu.
 *
 * @since  1.0.0
 * @since  1.0.0  Added new param - $item.
 * @since  1.0.1  Added arguments to the filter.
 * @param  string $context Current post context - 'single' or 'loop'.
 * @param  string $type    Content type - icon, text or both.
 * @return string
 */
function techloop_get_social_list( $context, $type = 'icon' ) {
	static $instance = 0;
	$instance++;

	$container_class = array( 'social-list' );

	if ( ! empty( $context ) ) {
		$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $context ) );
	}

	$container_class[] = sprintf( 'social-list--%s', sanitize_html_class( $type ) );

	$args = apply_filters( 'techloop_social_list_args', array(
		'theme_location'   => 'social',
		'container'        => 'div',
		'container_class'  => join( ' ', $container_class ),
		'menu_id'          => "social-list-{$instance}",
		'menu_class'       => 'social-list__items inline-list',
		'depth'            => 1,
		'link_before'      => ( 'icon' == $type ) ? '<span class="screen-reader-text">' : '',
		'link_after'       => ( 'icon' == $type ) ? '</span>' : '',
		'echo'             => false,
		'fallback_cb'      => 'techloop_set_nav_menu',
		'fallback_message' => esc_html__( 'Set social menu', 'techloop' ),
	), $context, $type );

	return wp_nav_menu( $args );
}

/**
 * Set fallback callback for nav menu.
 *
 * @param  array $args Nav menu arguments.
 * @return null
 */
function techloop_set_nav_menu( $args ) {

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return null;
	}

	$format = '<div class="set-menu %3$s"><a href="%2$s" target="_blank" class="set-menu_link">%1$s</a></div>';
	$label  = $args['fallback_message'];
	$url    = esc_url( admin_url( 'nav-menus.php' ) );

	printf( $format, $label, $url, $args['container_class'] );
}

/**
 * Show menu button.
 *
 * @since  1.1.0
 * @param  string $menu_id Menu ID.
 * @return void
 */
function techloop_menu_toggle( $menu_id, $extra_class = '' ) {
	?>
	<button class="menu-toggle <?php echo $extra_class ?>" aria-controls="<?php echo esc_attr( $menu_id ) ?>" aria-expanded="false">
		<span class="menu-toggle-box">
			<span class="menu-toggle-inner"></span>
		</span>
	</button>
	<?php
}
