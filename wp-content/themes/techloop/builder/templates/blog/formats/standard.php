<?php
/**
 * Template for displaying standard post format item content
 *
 * @package Techloop
 */
?>
<?php if ( $this->_var( 'thumb' ) ) : ?>
	<div class="tm_pb_image_container">
		<a href="<?php esc_url( the_permalink() ); ?>" class="entry-featured-image-url">
			<?php echo $this->_var( 'thumb' ); ?>
			<?php if ( 'on' === $this->_var( 'use_overlay' ) ) {
				echo $this->_var( 'item_overlay' );
			} ?>
		</a>
	</div> <!-- .tm_pb_image_container -->
<?php endif; ?>

<div class="tm_pb_content_container">
	<?php
	$title_html = ( 'list' !== $this->_var( 'blog_layout' ) ) ? '<h5 %1$s><a href="%2$s" %3$s rel="bookmark">%4$s</a></h5>' : '<h3 %1$s><a href="%2$s" %3$s rel="bookmark">%4$s</a></h3>';

	tm_builder_core()->utility()->attributes->get_title( array(
		'html'  => $title_html,
		'class' => 'entry-title',
		'echo'  => true,
	) );
	?>

	<?php echo $this->get_post_content(); ?>

	<footer class="entry-footer">
		<?php echo $this->get_template_part( 'blog/meta.php' ); ?>

		<?php
		tm_builder_core()->utility()->attributes->get_button( array(
			'text'  => esc_html__( 'Read More', 'techloop' ),
			'class' => 'btn btn-secondary',
			'html'  => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
			'echo'  => true,
		) );
		?>
	</footer><!-- .entry-footer -->
</div>