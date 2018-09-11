<?php
/**
 * Template part for posts pagination.
 *
 * @package Techloop
 */
the_posts_pagination( apply_filters( 'techloop_content_posts_pagination',
	array(
		'prev_text' => ' Prev ' . '<i class="linearicon linearicon-chevron-left"></i>',
		'next_text' => ' Next ' . '<i class="linearicon linearicon-chevron-right"></i>',
	)
) );
