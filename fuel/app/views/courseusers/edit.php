<h2>Editing Courseuser</h2>
<br>

<?php echo render('courseusers/_form'); ?>
<p>
	<?php echo Html::anchor('courseusers/view/'.$courseuser->id, 'View'); ?> |
	<?php echo Html::anchor('courseusers', 'Back'); ?></p>
