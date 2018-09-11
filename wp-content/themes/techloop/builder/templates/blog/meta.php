<?php
/**
 * Template part for displaying post meta in Blog module
 *
 * @package Techloop
 */
if ( ! $this->is_meta_visible() ) {
	return;
}
?>
<div class="tm_pb_post_meta entry-meta"><?php

	if ( ( 'list' === $this->_var( 'blog_layout' ) ) && ( 'on' === $this->_var( 'show_author' ) ) ) {
		echo '<span class="author vcard posted-by"><div class="posted-by__avatar">' . get_avatar( get_the_author_meta( 'user_email' ), 67, '', esc_attr( get_the_author_meta( 'nickname' ) ) ) . '</div>' . esc_html__( 'by ', 'techloop' ) . tm_pb_get_the_author_posts_link() . '</span>';
	} else if ( 'on' === $this->_var( 'show_author' ) ) {
		echo '<span class="author vcard posted-by">' . esc_html__( 'by ', 'techloop' ) . tm_pb_get_the_author_posts_link() . '</span>';
	}

	if ( 'on' === $this->_var( 'show_date' ) ) {
		echo tm_get_safe_localization( sprintf( esc_html__( '%s', 'techloop' ), '<span class="published">' . esc_html( get_the_date( $this->_var( 'meta_date' ) ) ) . '</span>' ) );
	}

	if ( 'on' === $this->_var( 'show_comments' ) ) {
		echo '<span class="post__comments"><span class="linearicon linearicon-bubble"></span><span class="text">' . number_format_i18n( get_comments_number() ) . '</span></span>';
	}

	if ( 'on' === $this->_var( 'show_categories' ) ) {
		echo '<span class="post__tags">' . get_the_category_list( ', ' ) . '</span>';
	}
?>
</div>
