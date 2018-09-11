<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techloop
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $utility = techloop_utility()->utility; ?>
	<header class="entry-header">

		<?php $cats_visible = techloop_is_meta_visible( 'blog_post_categories', 'single' );

		$utility->meta_data->get_terms( array(
			'visible' => $cats_visible,
			'type'    => 'category',
			'before'  => '<span class="post-cats">',
			'after'   => '</span>',
			'echo'    => true,
		) ); ?>

		<?php $utility->attributes->get_title( array(
			'class' => 'entry-title',
			'html'  => '<h2 %1$s>%4$s</h2>',
			'echo'  => true,
		) );
		?>

		<?php get_template_part( 'template-parts/content-entry-meta-single' ); ?>

	</header><!-- .entry-header -->

	<?php techloop_ads_post_before_content() ?>

	<figure class="post-thumbnail">
		<?php $size = techloop_post_thumbnail_size(); ?>

		<?php $utility->media->get_image( array(
			'size'        => $size['size'],
			'html'        => '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s">',
			'placeholder' => false,
			'echo'        => true,
		) );
		?>

		<?php do_action( 'cherry_post_format_link', array( 'render' => true ) ); ?>
	</figure><!-- .post-thumbnail -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( [
			'before'      => '<div class="page-links"><span class="page-links__title">' . esc_html__( 'Pages:', 'techloop' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-links__item">',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'techloop' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		] );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php techloop_share_buttons( 'single' ); ?>

		<div class="entry-meta">
			<?php $tags_visible = techloop_is_meta_visible( 'single_post_tags', 'single' );

			$utility->meta_data->get_terms( array(
				'visible'   => $tags_visible,
				'type'      => 'post_tag',
				'delimiter' => ', ',
				'before'    => '<span class="post__tags">',
				'after'     => '</span>',
				'echo'      => true,
			) );
			?>
		</div>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
