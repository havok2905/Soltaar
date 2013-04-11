<h2>Editing Matchcard</h2>
<br>

<?php echo render('matchcards/_form'); ?>
<p>
	<?php echo Html::anchor('matchcards/view/'.$matchcard->id, 'View'); ?> |
	<?php echo Html::anchor('matchcards', 'Back'); ?></p>
