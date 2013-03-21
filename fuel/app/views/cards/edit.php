<h2>Editing Card</h2>
<br>

<?php echo render('cards/_form'); ?>
<p>
	<?php echo Html::anchor('cards/view/'.$card->id, 'View'); ?> |
	<?php echo Html::anchor('cards', 'Back'); ?></p>
