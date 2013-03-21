<h2>Viewing #<?php echo $match->id; ?></h2>

<p>
	<strong>Time:</strong>
	<?php echo $match->time; ?></p>
<p>
	<strong>Score:</strong>
	<?php echo $match->score; ?></p>
<p>
	<strong>Owner:</strong>
	<?php echo $match->owner; ?></p>

<?php echo Html::anchor('matches/edit/'.$match->id, 'Edit'); ?> |
<?php echo Html::anchor('matches', 'Back'); ?>