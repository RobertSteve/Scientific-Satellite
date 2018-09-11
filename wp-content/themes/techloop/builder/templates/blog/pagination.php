<?php
/**
 * Template part for displaying posts pagination.
 *
 * @package Techloop
 */

the_posts_pagination( array(
		'prev_text' => ' Prev ' . '<i class="linearicon linearicon-chevron-left"></i>',
		'next_text' => ' Next ' . '<i class="linearicon linearicon-chevron-right"></i>',
	)
);
