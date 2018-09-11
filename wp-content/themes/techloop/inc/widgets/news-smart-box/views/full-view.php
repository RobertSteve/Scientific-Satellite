<?php
/**
 * Template part to display full-view news-smart-box widget.
 *
 * @package Techloop
 * @subpackage widgets
 */
?>
<div class="news-smart-box__item-inner">
	<div class="news-smart-box__item-header">
		<?php echo $image; ?>
	</div>
	<div class="news-smart-box__item-content">
		<?php echo $title; ?>
		<div class="entry-meta">
			<?php echo $author; ?>
			<?php echo $date; ?>
			<?php echo $comments; ?>
			<?php echo $terms; ?>
		</div>
		<?php echo $excerpt; ?>
		<?php echo $more_btn; ?>
	</div>
</div>
