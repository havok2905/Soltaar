<h2>Listing Courses</h2>
<br>
<?php if ($courses): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Owner</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($courses as $course): ?>		<tr>

			<td><?php echo $course->name; ?></td>
			<td><?php echo $course->description; ?></td>
			<td><?php echo $course->owner; ?></td>
			<td>
				<?php echo Html::anchor('courses/view/'.$course->id, 'View'); ?> |
				<?php echo Html::anchor('courses/edit/'.$course->id, 'Edit'); ?> |
				<?php echo Html::anchor('courses/delete/'.$course->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Courses.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('courses/create', 'Add new Course', array('class' => 'btn btn-success')); ?>

</p>
