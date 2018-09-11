<?php
/**
 * Template for displaying read more button
 *
 * @package Techloop
 */
?>
<?php
	tm_builder_core()->utility()->attributes->get_button( array(
		'text'  => esc_html__( 'Read More', 'techloop' ),
		'icon'  => '<i class="linearicon linearicon-chevron-right"></i>',
		'class' => 'more-link link',
		'html'  => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
		'echo'  => true,
	) );
