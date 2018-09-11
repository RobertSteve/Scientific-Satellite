<?php
/**
 * The Template for displaying single CPT Team.
 *
 * @package   Cherry_Team_Members
 * @author    Cherry Team
 * @license   GPL-2.0+
 * @link      http://www.cherryframework.com/
 * @copyright 2015 Cherry Team
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
/**
 * Fires before main content output started
 */
do_action( 'cherry_team_before_main_content' );
?>
<?php

while ( have_posts() ) :

	the_post(); ?>
	<div class="single-team-wrap">
		<article <?php
		if ( function_exists( 'cherry_attr' ) ) {
			cherry_attr( 'post' );
		}
		?> class="col-xs-12 col-lg-10 col-lg-push-1 col-xl-6 col-xl-push-3">
			<?php

			do_action( 'cherry_post_before' );

			$args = array(
				'id'           => get_the_ID(),
				'template'     => cherry_team_members_tools()->get_template( 'single' ),
				'custom_class' => 'team-page-single',
				'size'         => cherry_team_members()->get_option( 'single-image-size', 'thumbnail' ),
				'container'    => false,
				'item_class'   => 'team-single-item',
				'pager'        => false,
				'more'         => false,
			);
			$data = new Cherry_Team_Members_Data;
			$data->the_team( $args );
			$data->microdata_markup();

			?>
		</article>
	</div>
	<?php do_action( 'cherry_post_after' ); ?>

<?php endwhile; ?>

<?php
/**
 * Fires after main content output
 */
do_action( 'cherry_team_after_main_content' );
?>

<?php
/**
 * Hook for placing page sidebar
 */
do_action( 'cherry_team_sidebar' );
?>
