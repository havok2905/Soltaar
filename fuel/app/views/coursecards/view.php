<h2>Viewing #<?php echo $coursecard->id; ?></h2>

<p>
	<strong>Cardid:</strong>
	<?php echo $coursecard->cardid; ?></p>
<p>
	<strong>Courseid:</strong>
	<?php echo $coursecard->courseid; ?></p>

<?php echo Html::anchor('coursecards/edit/'.$coursecard->id, 'Edit'); ?> |
<?php echo Html::anchor('coursecards', 'Back'); ?>