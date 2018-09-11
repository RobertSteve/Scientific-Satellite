<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Techloop
 */
?>
<div class="wrap-error-404">
	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title screen-reader-text"><?php esc_html_e( '404', 'techloop' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<h3><?php esc_html_e( 'Page Not Found.', 'techloop' ); ?></h3>
			<p><?php esc_html_e( 'Unfortunately the page you were looking for could not be found. Maybe search can help.', 'techloop' ); ?></p>

			<p><a class="btn btn-secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home page', 'techloop' ); ?></a></p>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->
</div>