<h2>Viewing #<?php echo $courseuser->id; ?></h2>

<p>
	<strong>Userid:</strong>
	<?php echo $courseuser->userid; ?></p>
<p>
	<strong>Courseid:</strong>
	<?php echo $courseuser->courseid; ?></p>

<?php echo Html::anchor('courseusers/edit/'.$courseuser->id, 'Edit'); ?> |
<?php echo Html::anchor('courseusers', 'Back'); ?>