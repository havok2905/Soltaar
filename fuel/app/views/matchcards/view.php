<h2>Viewing #<?php echo $matchcard->id; ?></h2>

<p>
	<strong>Matchid:</strong>
	<?php echo $matchcard->matchid; ?></p>
<p>
	<strong>Cardid:</strong>
	<?php echo $matchcard->cardid; ?></p>

<?php echo Html::anchor('matchcards/edit/'.$matchcard->id, 'Edit'); ?> |
<?php echo Html::anchor('matchcards', 'Back'); ?>