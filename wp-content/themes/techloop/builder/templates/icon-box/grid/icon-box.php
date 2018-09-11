<?php
/**
 * Template part for grid module displaying
 */

$module_id    = trim( $this->_var( 'module_id' ) );
$module_class = trim( $this->_var( 'module_class' ) );
$module_id    = ! empty( $module_id ) ? sprintf( ' id="%s"', $module_id ) : '';
$module_class = ! empty( $module_class ) ? sprintf( ' %s', $module_class ) : '';
$template     = $this->_var( 'template' );

$super_title            = $this->_var( 'super_title' );
$title                  = $this->_var( 'title' );
$sub_title              = $this->_var( 'sub_title' );
$divider_hide_on_mobile = $this->_var( 'divider_hide_on_mobile' );
$children               = tm_builder_tools()->parse_children( $this->shortcode_content );

$wrapper_atts = $this->prepare_atts( array(
	'id'    => $this->_var( 'module_id' ),
	'class' => 'tm_pb_icon_box_module__wrapper ' . $this->_var( 'module_class' ),
) );

?>

<div<?php echo $wrapper_atts; ?>>
	<?php echo $this->html( esc_html( $super_title ), '<h3 class="tm_pb_icon_box_module__super-title">%s</h3>' ); ?>
	<?php echo $this->html( esc_html( $title ), '<h5 class="tm_pb_icon_box_module__title">%s</h5>' ); ?>
	<?php echo $this->html( esc_html( $sub_title ), '<h6 class="tm_pb_icon_box_module__sub-title">%s</h6>' ); ?>
	<?php echo $this->esc_switcher( 'divider', sprintf( '<hr class="tm_pb_icon_box_module__divider%s">', $divider_hide_on_mobile ) ); ?>

	<div class="row tm_pb_icon_box_module__boxes">
		<?php if ( ! empty( $children ) ) : ?>
			<?php echo $this->shortcode_content; ?>
		<?php endif; ?>
	</div>

</div><!-- .tm_pb_icon_box_module__wrapper -->

