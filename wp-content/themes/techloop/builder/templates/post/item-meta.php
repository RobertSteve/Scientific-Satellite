<?php
/**
 * Template part for displaying cureent item meta
 *
 * @package Techloop
 */

if ( ! $this->_var( 'meta_data' ) || 'off' === $this->_var( 'meta_data' ) ) {
	return;
}
?>
<div class="tm-posts_item_meta entry-meta"><?php

	tm_builder_core()->utility()->meta_data->get_date( array(
		'icon'    => apply_filters( 'cherry_date_icon', '' ),
		'class'   => 'post__date',
		'echo'    => true,
	) );

	tm_builder_core()->utility()->meta_data->get_comment_count( array(
		'icon'    => '<span class="linearicon linearicon-bubble"></span>',
		'html'    => '<span class="post__comments">%1$s<a href="%2$s" %3$s %4$s>%5$s <span class="text">%6$s</span></a></span>',
		'sufix'   => get_comments_number(),
		'class'   => 'post__comments-link',
		'echo'    => true,
	) );

?></div>
