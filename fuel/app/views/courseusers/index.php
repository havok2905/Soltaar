<h2>Listing Courseusers</h2>
<br>
<?php if ($courseusers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Userid</th>
			<th>Courseid</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($courseusers as $courseuser): ?>		<tr>

			<td><?php echo $courseuser->userid; ?></td>
			<td><?php echo $courseuser->courseid; ?></td>
			<td>
				<?php echo Html::anchor('courseusers/view/'.$courseuser->id, 'View'); ?> |
				<?php echo Html::anchor('courseusers/edit/'.$courseuser->id, 'Edit'); ?> |
				<?php echo Html::anchor('courseusers/delete/'.$courseuser->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Courseusers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('courseusers/create', 'Add new Courseuser', array('class' => 'btn btn-success')); ?>

</p>
