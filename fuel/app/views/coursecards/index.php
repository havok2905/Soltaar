<h2>Listing Coursecards</h2>
<br>
<?php if ($coursecards): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Cardid</th>
			<th>Courseid</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($coursecards as $coursecard): ?>		<tr>

			<td><?php echo $coursecard->cardid; ?></td>
			<td><?php echo $coursecard->courseid; ?></td>
			<td>
				<?php echo Html::anchor('coursecards/view/'.$coursecard->id, 'View'); ?> |
				<?php echo Html::anchor('coursecards/edit/'.$coursecard->id, 'Edit'); ?> |
				<?php echo Html::anchor('coursecards/delete/'.$coursecard->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Coursecards.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('coursecards/create', 'Add new Coursecard', array('class' => 'btn btn-success')); ?>

</p>
