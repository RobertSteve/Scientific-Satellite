<?php
/*
Plugin Name: Category Products
Plugin URI: 
Description: 
Author: Robert Steve
Version: 1.0
Author URI:
*/
add_action('widgets_init', function(){
    register_widget('Category_Products');
});
class Category_Products extends WP_Widget{
    public function __construct(){
        $widget_ops = array(
            'classname' => 'category_products',
            'description' => '4rzo'
        );
        parent::__construct( 'category_products', 'Category Products', $widget_ops);
    }
    public function widget( $args, $instance ){
        $list_args   = array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'orderby' => 'id',
            'order' => 'asc',
        );
        $c = 0;
        $cats = get_categories( $list_args );
        $html .= "<section class='section py-5'>";
        $html .= "<div class='container'>";
        $html .= "<div class='row'>";
        foreach($cats as $cat){
            if( $cat->parent == 0 && $cat->term_id != 15 ){
                if ($c == 0){
                    $css = 'article-wrapper-main col-xs-12 col-md-6 col-lg-8 wow zoomIn';
                } else{
                    $css = 'article-wrapper-main col-xs-12 col-md-6 col-lg-4 wow zoomIn'
;                }
                $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
                $html .= '<div class="'.$css.'" data-wow-duration=".4s" data-wow-delay=".1s">';
                $html .= '<a href="'.get_category_link($cat->term_id).'" title="Ver productos">';
                $html .= '<div class="article-wrapper">';
                $html .= '<div class="article-category-background" style="background-image:url('.$image.');"></div>';
                $html .= '<article class="article-category d-flex align-items-end">';
                $html .= '<div class="article-category-description">';
                $html .= '<h3>'.$cat->cat_name.'</h3>';
                $html .= '<p>'.$cat->category_description.'</p>';
                $html .= '</div>';
                $html .= '</article>';
                $html .= '</div>';
                $html .= '</a>';
                $html .= '</div>';
                $c++;
            }
        }
        $html .= "</div>";
        $html .= "</div>";
        $html .= "</section>";
        echo $html;
    }
    public function form( $instance ) {
    }
    public function update ($new_instance, $old_instance){        
    }
}