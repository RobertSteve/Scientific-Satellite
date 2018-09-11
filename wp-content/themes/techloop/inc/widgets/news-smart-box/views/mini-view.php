<?php
/**
 * Template part to display mini-view news-smart-box widget.
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
		<div class="entry-meta">
			<?php echo $author; ?>
			<?php echo $date; ?>
		</div>
		<?php echo $title; ?>
	</div>
</div>
