<?php
/*
Widget Name: Custom Posts widget
Description: This widget is used to display a list of posts from a category, tag or a single post format
Settings:
 Title - Widget's text title
 Choose taxonomy type - Choose the posts source type
 Select cateogory / tag / post format - Choose the posts source
 Posts Count - Limit the posts
 Offset Post - Specify the offset
 Title words length - Specify post title length
 Excerpt words length - Specify post content length
 Display post meta data - Choose which meta data should be displayed to the user
 Post read more button label - Specify a read more button label
*/

/**
 * @package Techloop
 */

if ( ! class_exists( 'Techloop_Custom_Posts_Widget' ) ) {

	/**
	 * Class Techloop_Custom_Posts_Widget.
	 */
	class Techloop_Custom_Posts_Widget extends Cherry_Abstract_Widget {

		/**
		 * Contain utility module from Cherry framework
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private $utility = null;

		/**
		 * Constructor
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			$this->widget_name        = esc_html__( 'Custom Posts', 'techloop' );
			$this->widget_description = esc_html__( 'Display custom posts your site.', 'techloop' );
			$this->widget_id          = apply_filters( 'techloop_custom_posts_widget_ID', 'widget-custom-posts' );
			$this->widget_cssclass    = apply_filters( 'techloop_custom_posts_widget_cssclass', 'widget-custom-posts custom-posts' );
			$this->utility            = techloop_utility()->utility;
			$this->settings           = array(
				'title' => array(
					'type'  => 'text',
					'value' => esc_html__( 'Custom Posts', 'techloop' ),
					'label' => esc_html__( 'Title', 'techloop' ),
				),
				'terms_type' => array(
					'type'    => 'radio',
					'value'   => 'category_name',
					'options' => array(
						'category_name' => array(
							'label' => esc_html__( 'Category', 'techloop' ),
							'slave' => 'terms_type_post_category',
						),
						'tag'           => array(
							'label' => esc_html__( 'Tag', 'techloop' ),
							'slave' => 'terms_type_post_tag',
						),
						'post_format'   => array(
							'label' => esc_html__( 'Post Format', 'techloop' ),
							'slave' => 'terms_type_post_format',
						),
					),
					'label'   => esc_html__( 'Choose taxonomy type', 'techloop' ),
				),
				'category_name' => array(
					'type'             => 'select',
					'size'             => 1,
					'value'            => '',
					'options_callback' => array( $this->utility->satellite, 'get_terms_array', array( 'category', 'slug' ) ),
					'options'          => false,
					'label'            => esc_html__( 'Select category', 'techloop' ),
					'multiple'         => true,
					'placeholder'      => esc_html__( 'Select category', 'techloop' ),
					'master'           => 'terms_type_post_category',
				),
				'tag' => array(
					'type'             => 'select',
					'size'             => 1,
					'value'            => '',
					'options_callback' => array( $this->utility->satellite, 'get_terms_array', array( 'post_tag', 'slug' ) ),
					'options'          => false,
					'label'            => esc_html__( 'Select tags', 'techloop' ),
					'multiple'         => true,
					'placeholder'      => esc_html__( 'Select tags', 'techloop' ),
					'master'           => 'terms_type_post_tag',
				),
				'post_format' => array(
					'type'             => 'select',
					'size'             => 1,
					'value'            => '',
					'options_callback' => array( $this->utility->satellite, 'get_terms_array', array( 'post_format', 'slug' ) ),
					'options'          => false,
					'label'            => esc_html__( 'Select post format', 'techloop' ),
					'multiple'         => true,
					'placeholder'      => esc_html__( 'Select post format', 'techloop' ),
					'master'           => 'terms_type_post_format',
				),
				'posts_per_page' => array(
					'type'      => 'stepper',
					'value'     => 7,
					'max_value' => 50,
					'min_value' => 0,
					'label'     => esc_html__( 'Posts count ( Set 0 to show all. )', 'techloop' ),
				),
				'post_offset' => array(
					'type'       => 'stepper',
					'value'      => '0',
					'max_value'  => '10000',
					'min_value'  => '0',
					'step_value' => '1',
					'label'      => esc_html__( 'Offset post', 'techloop' ),
				),
				'title_length' => array(
					'type'       => 'stepper',
					'value'      => '10',
					'max_value'  => '500',
					'min_value'  => '0',
					'step_value' => '1',
					'label'      => esc_html__( 'Title words length ( Set 0 to hide title. )', 'techloop' ),
				),
				'excerpt_length' => array(
					'type'       => 'stepper',
					'value'      => '0',
					'max_value'  => '500',
					'min_value'  => '0',
					'step_value' => '1',
					'label'      => esc_html__( 'Excerpt words length ( Set 0 to hide excerpt. )', 'techloop' ),
				),
				'orientation' => array(
					'type'    => 'select',
					'size'    => 1,
					'value'   => 'post-orientation-top',
					'options' => array(
						'post-orientation-left' => esc_html__( 'Left', 'techloop' ),
						'post-orientation-top'   => esc_html__( 'Top', 'techloop' ),
					),
					'label'   => esc_html__( 'Post orientation', 'techloop' ),
				),
				'meta_data' => array(
					'type'    => 'checkbox',
					'value'   => array(
						'image'         => 'false',
						'date'          => 'true',
						'author'        => 'false',
						'comment_count' => 'true',
						'category'      => 'true',
						'tag'           => 'false',
						'more_button'   => 'false',
					),
					'options' => array(
						'image'         => esc_html__( 'Image', 'techloop' ),
						'date'          => esc_html__( 'Date', 'techloop' ),
						'author'        => esc_html__( 'Author', 'techloop' ),
						'comment_count' => esc_html__( 'Comment count', 'techloop' ),
						'category'      => esc_html__( 'Category', 'techloop' ),
						'post_tag'      => esc_html__( 'Tag', 'techloop' ),
						'more_button'   => esc_html__( 'More Button', 'techloop' ),
					),
					'label'   => esc_html__( 'Display post meta data', 'techloop' ),
				),
				'media_size' => array(
					'type'             => 'select',
					'value'            => 'full',
					'options_callback' => array( $this, 'get_image_sizes' ),
					'options'          => false,
					'label'            => esc_html__( 'Select image size', 'techloop' ),
					'placeholder'      => esc_html__( 'Select image size', 'techloop' ),
				),
				'button_text' => array(
					'type'  => 'text',
					'value' => esc_html__( 'Read More', 'techloop' ),
					'label' => esc_html__( 'Post read more button label', 'techloop' ),
				),
			);

			parent::__construct();
		}

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 *
		 * @since  1.0.0
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {

			$template = locate_template( apply_filters( 'techloop_custom_posts_widget_view_dir', 'inc/widgets/custom-posts/views/custom-post-view.php' ), false, false );

			if ( empty( $template ) ) {
				return;
			}

			$this->setup_widget_data( $args, $instance );
			$this->widget_start( $args, $instance );

			$terms_type     = $instance['terms_type'];
			$post_offset    = $instance['post_offset'];
			$title_length   = $instance['title_length'];
			$excerpt_length = $instance['excerpt_length'];
			$meta_data      = $instance['meta_data'];
			$button_text    = $instance['button_text'];
			$media_size     = isset( $instance['media_size'] ) ? $instance['media_size'] : 'full';
			$orientation    = isset( $instance['orientation'] ) ? $instance['orientation'] : 'post-orientation-top';

			if ( ! isset( $instance[ $terms_type ] ) || ! $instance[ $terms_type ] ) {
				return;
			}

			$posts_per_page = ( '0' === $instance['posts_per_page'] ) ? - 1 : ( int ) $instance['posts_per_page'];
			$post_args      = array(
				'post_type'   => 'post',
				'offset'      => (int) $post_offset,
				'numberposts' => $posts_per_page,
			);
			$post_args[ $terms_type ] = implode( ',', $instance[ $terms_type ] );
			$footer_columns = get_theme_mod( 'footer_widget_columns', techloop_theme()->customizer->get_default( 'footer_widget_columns' ) );
			$grid_class_array = array(
				'default'             => 'col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3',
				'before-content-area' => 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-4',
				'after-content-area'  => 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-4',
				'sidebar'             => 'col-xs-12 col-sm-6 col-md-6 col-lg-12 col-xl-12',
				'before-loop-area'    => 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6',
				'after-loop-area'     => 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6',
				'footer-area'         => ( '1' !== $footer_columns ) ? 'col-xs-12 col-sm-6 col-md-12 col-lg-12 col-xl-12' : 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-4',
			);
			$grid_class = isset( $grid_class_array[ $args['id'] ] ) ? $grid_class_array[ $args['id'] ] : $grid_class_array['default'];

			$posts = get_posts( $post_args );

			if ( $posts ) {
				global $post;

				echo '<div class="custom-posts__holder row ' . $orientation . '" >';


				foreach ( $posts as $post ) {
					setup_postdata( $post );

					$excerpt_visible = ( '0' === $excerpt_length ) ? false : true;

					$excerpt = $this->utility->attributes->get_content( array(
						'visible'      => $excerpt_visible,
						'length'       => $excerpt_length,
						'content_type' => 'post_excerpt',
					) );

					$title_visible = ( '0' === $title_length ) ? false : true;

					$title = $this->utility->attributes->get_title( array(
						'visible' => $title_visible,
						'length'  => $title_length,
						'class'   => 'entry-title',
						'html'    => '<h6 %1$s><a href="%2$s" %3$s>%4$s</a></h6>',
					) );

					$permalink = $this->utility->attributes->get_post_permalink();

					$image = $this->utility->media->get_image( array(
						'visible'     => $meta_data['image'],
						'size'        => $media_size,
						'mobile_size' => $media_size,
						'class'       => 'post-thumbnail__link',
						'html'        => '<div class="post-thumbnail"><a href="%1$s" %2$s><img class="post-thumbnail__img" src="%3$s" alt="%4$s" %5$s></a></div>',
					) );

					$date = $this->utility->meta_data->get_date( array(
						'visible' => $meta_data['date'],
						'html'    => '<span class="post__date">%1$s<a href="%2$s" %3$s %4$s><time datetime="%5$s">%6$s%7$s</time></a></span>',
						'class'   => 'post__date-link',
					) );

					$count = $this->utility->meta_data->get_comment_count( array(
						'visible' => $meta_data['comment_count'],
						'icon'    => '<span class="linearicon linearicon-bubble"></span>',
						'html'    => '<span class="post__comments">%1$s<a href="%2$s" %3$s %4$s>%5$s <span class="text">%6$s</span></a></span>',
						'sufix'   => get_comments_number(),
						'class'   => 'post__comments-link',
					) );

					$author = $this->utility->meta_data->get_author( array(
						'visible' => $meta_data['author'],
						'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
						'class'   => 'posted-by__author',
						'prefix'  => esc_html__( 'by ', 'techloop' ),
					) );

					$category = $this->utility->meta_data->get_terms( array(
						'delimiter' => ', ',
						'type'      => 'category',
						'visible'   => $meta_data['category'],
						'before'    => '<span class="post__cats">',
						'after'     => '</span>',
					) );

					$tag = $this->utility->meta_data->get_terms( array(
						'delimiter' => ', ',
						'type'      => 'post_tag',
						'visible'   => $meta_data['post_tag'],
						'before'    => '<span class="post__tags">',
						'after'     => '</span>',
					) );

					$button = $this->utility->attributes->get_button( array(
						'visible' => $meta_data['more_button'],
						'text'    => $button_text,
						'class'   => 'link',
						'html'    => '<a href="%1$s" %3$s><span class="link__text">%4$s</span>%5$s</a>',
					) );

					include $template;
				}

				echo '</div>';
			}

			$this->widget_end( $args );
			$this->reset_widget_data();

			wp_reset_postdata();

		}

		/**
		 * Get register image sizes.
		 *
		 * @return array
		 */
		public function get_image_sizes() {

			global $_wp_additional_image_sizes;

			$sizes  = get_intermediate_image_sizes();
			$result = array();

			foreach ( $sizes as $size ) {
				if ( in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
					$result[ $size ] = ucwords( trim( str_replace( array( '-', '_' ), array( ' ', ' ' ), $size ) ) );
				} else {
					$result[ $size ] = sprintf(
						'%1$s (%2$sx%3$s)',
						ucwords( trim( str_replace( array( '-', '_' ), array( ' ', ' ' ), $size ) ) ),
						$_wp_additional_image_sizes[ $size ]['width'],
						$_wp_additional_image_sizes[ $size ]['height']
					);
				}
			}

			$result = array_merge( $result, array( 'full' => esc_html__( 'Full', 'techloop' ) ) );

			return $result;
		}
	}

	add_action( 'widgets_init', 'techloop_register_custom_posts_widget' );
	/**
	 * Register custom-posts widget.
	 */
	function techloop_register_custom_posts_widget() {
		register_widget( 'Techloop_Custom_Posts_Widget' );
	}
}
