<?php
/**
 * The template for displaying comments.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy
 *
 * @package Techloop
 */
?>
<div class="comment-author vcard">
	<?php echo techloop_comment_author_avatar( array( 'size' => 67 ) ); ?>
</div>
<div class="comment-content-wrap">
	<footer class="comment-meta">
		<div class="comment-metadata">
			<?php echo techloop_get_comment_author_link(); ?>
			<?php echo techloop_get_comment_date( array( 'format' => 'M d, Y' ) ); ?>
		</div>
		<div class="reply">
			<?php echo techloop_get_comment_reply_link( array( 'reply_text' => esc_html__( 'Reply', 'techloop' ) ) ); ?>
		</div>
	</footer>
	<div class="comment-content">
		<?php echo techloop_get_comment_text(); ?>
	</div>
</div>
