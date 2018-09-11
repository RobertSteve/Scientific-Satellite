<?php
/**
 * The template part for displaying results in search pages.
 *
 * @package Techloop
 */
?>

<?php
	$classes = get_post_class( $class = '', $post_id = null );

	foreach ( $classes as $key => $value ) {
		if ( strcmp( $value, "col-" ) !== 1 ) {
			unset( $classes[ $key ] );
		}
	}
	array_push( $classes, 'posts-list__item', 'card' );
	$classes = implode( " ", $classes );
?>

<article id="post-<?php the_ID(); ?>" class="<?php echo $classes; ?>">
	<?php


	//	var_dump($string_my);
	$blog_featured_image = get_theme_mod( 'blog_featured_image', techloop_theme()->customizer->get_default( 'blog_featured_image' ) );
	$utility             = techloop_utility()->utility;
	$cats_visible        = techloop_is_meta_visible( 'blog_post_categories', 'loop' );
	?>

	<div class="post-list__item-content <?php if ( ! $cats_visible ) : echo 'no-categories'; endif; ?>">
		<header class="entry-header">
			<?php techloop_sticky_label(); ?>

			<?php $title_html = ( is_single() ) ? '<h2 %1$s>%4$s</h2>' : '<h3 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h3>';

			$utility->attributes->get_title( array(
				'class' => 'entry-title',
				'html'  => $title_html,
				'echo'  => true,
			) );
			?>
		</header>
		<!-- .entry-header -->

		<div class="entry-content">
			<?php $blog_content = get_theme_mod( 'blog_posts_content', techloop_theme()->customizer->get_default( 'blog_posts_content' ) );
			$length             = ( 'full' === $blog_content ) ? - 1 : 55;
			$content_visible    = ( 'none' !== $blog_content ) ? true : false;
			$content_type       = ( 'full' !== $blog_content ) ? 'post_excerpt' : 'post_content';


			$utility->attributes->get_content( array(
				'visible'      => $content_visible,
				'length'       => $length,
				'content_type' => $content_type,
				'echo'         => true,
			) );
			?>
		</div>
		<!-- .entry-content -->

		<?php
		if ( 'small' === $blog_featured_image ) :
			get_template_part( 'template-parts/content-entry-meta-loop' );
		endif;
		?>

		<footer class="entry-footer">
			<?php if ( 'small' !== $blog_featured_image ) :
				get_template_part( 'template-parts/content-entry-meta-loop' );
			endif; ?>

			<?php $btn_text = get_theme_mod( 'blog_read_more_text', techloop_theme()->customizer->get_default( 'blog_read_more_text' ) );
			$btn_visible    = $btn_text ? true : false;

			$utility->attributes->get_button( array(
				'visible' => $btn_visible,
				'class'   => 'btn btn-secondary',
				'text'    => $btn_text,
				'html'    => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
				'echo'    => true,
			) );
			?>
		</footer>
		<!-- .entry-footer -->
	</div>
	<!-- .post-list__item-content -->

</article><!-- #post-## -->
