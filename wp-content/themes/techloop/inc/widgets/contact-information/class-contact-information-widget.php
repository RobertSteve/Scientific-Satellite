<?php
/*
Widget Name: Contact Information widget
Description: This widget is used to display a list of your social networks
Settings:
 Title - Widget's text title
 Add Contact Information - Click to add a new contact information
 Choose icon - Choose an icon for your social network
 Value - Describe your social network contact
*/

/**
 * @package Techloop
 */

if ( ! class_exists( 'Techloop_Contact_Information_Widget' ) ) {

	/**
	 * Class Techloop_Contact_Information_Widget.
	 */
	class Techloop_Contact_Information_Widget extends Cherry_Abstract_Widget {

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->widget_cssclass    = 'contact-information-widget';
			$this->widget_description = esc_html__( 'Display an contact-information.', 'techloop' );
			$this->widget_id          = 'techloop_contact_information_widget';
			$this->widget_name        = esc_html__( 'Contact Information', 'techloop' );

			$this->settings           = array(
				'title'  => array(
					'type'  => 'text',
					'value' => 'Contact Information',
					'label' => esc_html__( 'Title:', 'techloop' ),
				),
				'contact_information' => array(
					'type'         => 'repeater',
					'add_label'    => esc_html__( 'Add Contact Information', 'techloop' ),
					'title_field'  => 'value',
					'hidden_input' => true,
					'fields'       => array(
						'icon'  => array(
							'type'      => 'iconpicker',
							'id'        => 'icon',
							'name'      => 'icon',
							'label'     => esc_html__( 'Choose icon', 'techloop' ),
							'icon_data' => array(
								'icon_set'    => 'cherryWidgetLinearicon',
								'icon_css'    => TECHLOOP_THEME_CSS . '/linearicons.css',
								'icon_base'   => 'linearicon',
								'icon_prefix' => 'linearicon-',
								'icons'       => $this->get_icons_set(),
							),
						),
						'value' => array(
							'type'        => 'textarea',
							'id'          => 'value',
							'name'        => 'value',
							'placeholder' => esc_html__( 'Value', 'techloop' ),
							'label'       => esc_html__( 'Value', 'techloop' ),
						),
					),
				),
			);

			parent::__construct();
		}

		/**
		 * Returns social icons set
		 *
		 * @return array
		 */

		public function get_icons_set() {

			static $linear_icons;

			if ( ! $linear_icons ) {

				ob_start();

				include TECHLOOP_THEME_DIR . '/assets/js/linear-icons.json';
				$json = ob_get_clean();

				$linear_icons = array();
				$icons        = json_decode( $json, true );

				foreach ( $icons['icons'] as $icon ) {
					$linear_icons[] = $icon['id'];
				}
			}

			return $linear_icons;
		}



		/**
		 * Widget function.
		 *
		 * @see   WP_Widget
		 * @since 1.0.1
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {

			$template = locate_template( 'inc/widgets/contact-information/views/contact-information-view.php', false, false );

			if ( empty( $template ) ) {
				return;
			}


			$this->setup_widget_data( $args, $instance );
			$this->widget_start( $args, $instance );

			echo '<ul class="contact-information-widget__inner">';

			if( ! empty( $instance['contact_information'] ) ){

				foreach ( $instance['contact_information'] as $key => $value ) {
					$icon           = ( $value['icon'] ) ? '<span class="icon linearicon ' . $value['icon'] . '"></span>' : '';
					$text           = $value['value'];
					$item_mod_class = ( $value['icon'] ) ? 'contact-information__item--icon' : '';

					include $template;
				}
			}

			echo '</ul>';

			$this->widget_end( $args );
			$this->reset_widget_data();

		}
	}
}

add_action( 'widgets_init', 'techloop_register_contact_information_widget' );
/**
 * Register contact information widget.
 */
function techloop_register_contact_information_widget() {
	register_widget( 'Techloop_Contact_Information_Widget' );
}
