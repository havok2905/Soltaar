<h2>Viewing #<?php echo $course->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $course->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $course->description; ?></p>
<p>
	<strong>Owner:</strong>
	<?php echo $course->owner; ?></p>

<ul>
<?php foreach ($users as $user => $value) { 
	echo "<li>".$value["username"]."</li>";
} ?>
</ul>

<?php echo Html::anchor('courses/edit/'.$course->id, 'Edit'); ?> |
<?php echo Html::anchor('courses', 'Back'); ?>