<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techloop
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>
	<?php $utility = techloop_utility()->utility;
	$permalink     = $utility->satellite->get_post_permalink();
	$size          = techloop_post_thumbnail_size( array( 'class_prefix' => 'post-thumbnail--' ) );
	?>

	<div class="post-list__item-content">
		<a class="post-featured-content post-quote" href="<?php echo esc_url( $permalink ); ?>">
			<?php do_action( 'cherry_post_format_quote' ); ?>
		</a>

		<footer class="entry-footer">
			<?php get_template_part( 'template-parts/content-entry-meta-loop' ); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .post-list__item-content -->
</article><!-- #post-## -->
