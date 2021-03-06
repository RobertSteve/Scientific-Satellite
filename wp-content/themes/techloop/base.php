<?php get_header( techloop_template_base() ); ?>

	<?php techloop_site_breadcrumbs(); ?>

	<?php do_action( 'techloop_render_widget_area', 'full-width-header-area' ); ?>

	<?php techloop_single_modern_header(); ?>

	<div <?php techloop_content_wrap_class(); ?>>

		<?php do_action( 'techloop_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php techloop_primary_content_class(); ?>>

				<?php do_action( 'techloop_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include techloop_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'techloop_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

		<?php do_action( 'techloop_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'techloop_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( techloop_template_base() ); ?>
