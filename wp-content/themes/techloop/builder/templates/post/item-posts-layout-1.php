<?php
/**
 * Template part for displaying posts listing item
 *
 * @package Techloop
 */
?>
<div class="<?php echo tm_builder_tools()->get_col_classes( $this ); ?>">
	<div class="tm-posts_item">
		<div class="tm-posts_item_content_wrap">
			<?php
			tm_builder_core()->utility()->media->get_image( array(
				'html'        => '<a href="%1$s" %2$s><img src="%3$s" alt="%4$s"></a>',
				'class'       => 'tm-posts_img',
				'size'        => esc_attr( $this->_var( 'image_size' ) ),
				'echo'        => true,
			) );

			tm_builder_core()->utility()->attributes->get_title( array(
				'visible'      => true,
				'trimmed_type' => 'word',
				'ending'       => '&hellip;',
				'html'         => '<h5 %1$s><a href="%2$s" %3$s rel="bookmark">%4$s</a></h5>',
				'class'        => 'tm-posts_item_title',
				'echo'         => true,
			) );

			echo $this->get_template_part( 'post/item-meta.php' );

			tm_builder_core()->utility()->attributes->get_content( array(
				'visible'      => ( $this->_var( 'excerpt' ) && 0 < $this->_var( 'excerpt' ) ) ? true : false,
				'content_type' => 'post_content',
				'length'       => $this->_var( 'excerpt' ),
				'trimmed_type' => 'word',
				'ending'       => '&hellip;',
				'html'         => '<div %1$s>%2$s</div>',
				'class'        => 'tm-posts_item_excerpt',
				'echo'         => true,
			) );
			?>
		</div>
		<div class="posts_item_content_footer">
			<?php
			tm_builder_core()->utility()->attributes->get_button( array(
				'visible'   => apply_filters( 'techloop_pb_module_posts_layout_1_more_btn_visible', true ),
				'text'      => esc_html__( 'Read More', 'techloop' ),
				'class'     => 'btn btn-secondary',
				'html'      => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
				'echo'      => true,
			) );
			?>
		</div>
	</div>
</div>
