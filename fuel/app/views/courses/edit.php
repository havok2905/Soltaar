<h2>Editing Course</h2>
<br>

<?php echo render('courses/_form'); ?>
<p>
	<?php echo Html::anchor('courses/view/'.$course->id, 'View'); ?> |
	<?php echo Html::anchor('courses', 'Back'); ?></p>
