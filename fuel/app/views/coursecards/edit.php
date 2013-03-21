<h2>Editing Coursecard</h2>
<br>

<?php echo render('coursecards/_form'); ?>
<p>
	<?php echo Html::anchor('coursecards/view/'.$coursecard->id, 'View'); ?> |
	<?php echo Html::anchor('coursecards', 'Back'); ?></p>
