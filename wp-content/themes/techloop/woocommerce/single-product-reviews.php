<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.3.2
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title"><?php
			if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_review_count() ) ) {
				printf( _n( '%s review for %s%s%s', '%s reviews for %s%s%s', $count, 'techloop' ), $count, '<span>', get_the_title(), '</span>' );
			} else {
				esc_html_e( 'Reviews', 'techloop' );
			}
			?></h2>

		<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'techloop' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'techloop' ) : sprintf( '%s &ldquo;%s&rdquo;', esc_html__( 'Be the first to review ', 'techloop' ), get_the_title() ),
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'techloop' ),
					'comment_notes_after' => '',
					'fields'              => array(
						'author' => '<p class="comment-form-author"><label for="autohr" class="h6-style">' . esc_html__( 'Name: ', 'techloop' ) . '<span class="required">*</span></label><input id="author" class="comment-form__field" name="author" type="text" placeholder = "' . esc_html__( 'Enter your name', 'techloop' ) . '" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" size="30" aria-required="true" required /></p>',
						'email'  => '<p class="comment-form-email"><label for="autohr" class="h6-style">' . esc_html__( 'E-mail: ', 'techloop' ) . '<span class="required">*</span></label><input id="email" class="comment-form__field" name="email" type="email" placeholder = "' . esc_html__( 'Enter your e-mail', 'techloop' ) . '" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" size="30" aria-required="true" required /></p>',
					),
					'label_submit'        => esc_html__( 'Submit', 'techloop' ),
					'logged_in_as'        => '',
					'comment_field'       => ''
				);

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					$comment_form[ 'must_log_in' ] = '<p class="must-log-in">' . sprintf( '%s<a href="%s">%s</a>%s', esc_html__( 'You must be ', 'techloop' ), esc_url( $account_page_url ), esc_html__( 'logged in', 'techloop' ), esc_html__( ' to post a review.', 'techloop' ) ) . '</p>';
				}

				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
					$comment_form[ 'comment_field' ] = '<p class="comment-form-rating"><label for="rating" class="h6-style">' . esc_html__( 'Your Rating ', 'techloop' ) . '<span class="required">*</span></label><select name="rating" id="rating" aria-required="true" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'techloop' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'techloop' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'techloop' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'techloop' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'techloop' ) . '</option>
							<option value="1">' . esc_html__( 'Very Poor', 'techloop' ) . '</option>
						</select></p>';
				}

				$comment_form[ 'comment_field' ] .= '<p class="comment-form-comment"><label for="comment" class="h6-style">' . esc_html__( 'Your Review: ', 'techloop' ) . '<span class="required">*</span></label><textarea id="comment" class="comment-form__field" name="comment" placeholder = "' . esc_html__( 'Enter your review', 'techloop' ) . '" cols="45" rows="8" aria-required="true" required></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'techloop' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
