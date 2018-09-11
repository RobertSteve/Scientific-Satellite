<?php
/**
 * Template part for displaying entry-meta.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Techloop
 */
?>
<?php $utility = techloop_utility()->utility; ?>

<?php if ( 'post' === get_post_type() ) : ?>

	<div class="entry-meta">

		<?php $author_visible = techloop_is_meta_visible( 'blog_post_author', 'loop' );
		$blog_featured_image  = get_theme_mod( 'blog_featured_image', techloop_theme()->customizer->get_default( 'blog_featured_image' ) );
		$blog_layout_type     = get_theme_mod( 'blog_layout_type', techloop_theme()->customizer->get_default( 'blog_layout_type' ) );
		$avatar               = '';

		if ( 'default' === $blog_layout_type && $author_visible && 'small' !== $blog_featured_image ) {
			$avatar = get_avatar( get_the_author_meta( 'user_email' ), 67, '', esc_attr( get_the_author_meta( 'nickname' ) ) );
		}

		$utility->meta_data->get_author( array(
			'visible' => $author_visible,
			'class'   => 'posted-by__author',
			'prefix'  => esc_html__( 'by ', 'techloop' ),
			'html'    => '<div class="posted-by"><div class="posted-by__avatar">' . $avatar . '</div>%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></div>',
			'echo'    => true,
		) );
		?>

		<?php $date_visible = techloop_is_meta_visible( 'blog_post_publish_date', 'loop' );

		$utility->meta_data->get_date( array(
			'visible' => $date_visible,
			'html'    => '<span class="post__date">%1$s<a href="%2$s" %3$s %4$s ><time datetime="%5$s">%6$s%7$s</time></a></span>',
			'class'   => 'post__date-link',
			'echo'    => true,
		) );
		?>

		<?php $comment_visible = techloop_is_meta_visible( 'blog_post_comments', 'loop' );

		$utility->meta_data->get_comment_count( array(
			'visible' => $comment_visible,
			'icon'    => '<span class="linearicon linearicon-bubble"></span>',
			'html'    => '<span class="post__comments">%1$s<a href="%2$s" %3$s %4$s>%5$s <span class="text">%6$s</span></a></span>',
			'sufix'   => get_comments_number(),
			'class'   => 'post__comments-link',
			'echo'    => true,
		) );
		?>

		<?php $tags_visible = techloop_is_meta_visible( 'blog_post_tags', 'loop' );

		$utility->meta_data->get_terms( array(
			'visible'   => $tags_visible,
			'type'      => 'post_tag',
			'delimiter' => ', ',
			'before'    => '<span class="post__tags">',
			'after'     => '</span>',
			'echo'      => true,
		) );

		techloop_share_buttons( 'loop' ); ?>
	</div><!-- .entry-meta -->

<?php endif; ?>
