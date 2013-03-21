<h2>Editing Match</h2>
<br>

<?php echo render('matches/_form'); ?>
<p>
	<?php echo Html::anchor('matches/view/'.$match->id, 'View'); ?> |
	<?php echo Html::anchor('matches', 'Back'); ?></p>
