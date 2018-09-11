<?php
/**
 * Template part for displaying icon box item
 */

$icon_box_url = $this->_var( 'icon_box_url' );
$url_new_window = $this->_var( 'url_new_window' );
$icon_box_name = $this->html( $this->_var( 'icon_box_name' ), '<span class="tm_pb_icon_box_module__item__title">%s</span>' );
$icon_box_title = $this->html( $this->_var( 'icon_box_name' ) );
$icon_box_description = sprintf( '<span class="tm_pb_icon_box_module__item__description">%s</span>', $this->_var( 'icon_box_description' ) );
$children             = tm_builder_tools()->parse_children( $this->shortcode_content );
$module_class = $this->shortcode_atts['module_class'];
$module_class = TM_Builder_Element::add_module_order_class( $module_class, $this->function_name );

$wrapper_atts = $this->prepare_atts( array(
	'id'    => $this->_var( 'id' ),
	'class' => 'swiper-slide tm_pb_icon_box_module__item__wrapper',
), true );

$anchor_atts = $this->prepare_atts( array(
	'href'   => tm_builder_tools()->render_url( $icon_box_url ),
	'target' => array( $url_new_window, 'blank' ),
	'title'  => $icon_box_title,
	'class'  => 'tm_pb_icon_box_module__item' . $module_class,
), true );

?>
<?php if ( ! empty( $children ) ) : ?>

	<div<?php echo $wrapper_atts; ?>>
		<a<?php echo $anchor_atts; ?>>
			<?php echo $this->get_icon(); ?>
			<?php echo $icon_box_name; ?>
			<?php echo $icon_box_description; ?>
		</a>
	</div>

<?php endif; ?>
