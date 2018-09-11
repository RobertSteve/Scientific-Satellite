<?php
/**
 * Template part for carousel module displaying
 */

$super_title            = $this->_var( 'super_title' );
$title                  = $this->_var( 'title' );
$sub_title              = $this->_var( 'sub_title' );
$divider_hide_on_mobile = $this->_var( 'divider_hide_on_mobile' );
$navigate_button        = $this->_var( 'navigate_button' );
$children               = tm_builder_tools()->parse_children( $this->shortcode_content );
$children               = tm_builder_tools()->parse_children( $this->shortcode_content );

$wrapper_atts = $this->prepare_atts( array(
	'id'    => $this->_var( 'module_id' ),
	'class' => 'tm_pb_icon_box_module__wrapper ' . $this->_var( 'module_class' ),
) );

$swiper_atts = $this->prepare_atts( array(
	'data-settings' => $this->_var( 'carousel_settings' ),
	'class'         => 'tm_pb_swiper',
), true );

?>

<div<?php echo $wrapper_atts; ?>>
	<?php echo $this->html( esc_html( $super_title ), '<h3 class="tm_pb_icon_box_module__super-title">%s</h3>' ); ?>
	<?php echo $this->html( esc_html( $title ), '<h2 class="tm_pb_icon_box_module__title">%s</h2>' ); ?>
	<?php echo $this->html( esc_html( $sub_title ), '<h6 class="tm_pb_icon_box_module__sub-title">%s</h6>' ); ?>
	<?php echo $this->esc_switcher( 'divider', sprintf( '<hr class="tm_pb_icon_box_module__divider%s">', $divider_hide_on_mobile ) ); ?>

	<div<?php echo $swiper_atts; ?>>
		<div class="swiper-container tm_pb_icon_box_module__boxes">
			<div class="swiper-wrapper">
				<?php if ( ! empty( $children ) ) : ?>
					<?php echo $this->shortcode_content; ?>
				<?php endif; ?>
			</div>
			<div class="swiper-pagination"></div>
			<?php if ( 'on' === $navigate_button ) : ?>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			<?php endif; ?>
		</div>
	</div>

</div><!-- .tm_pb_icon_box_module__wrapper -->

