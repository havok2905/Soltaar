<h2>Listing Matches</h2>
<br>
<?php if ($matches): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Time</th>
			<th>Score</th>
			<th>Owner</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($matches as $match): ?>		<tr>

			<td><?php echo $match->time; ?></td>
			<td><?php echo $match->score; ?></td>
			<td><?php echo $match->owner; ?></td>
			<td>
				<?php echo Html::anchor('matches/view/'.$match->id, 'View'); ?> |
				<?php echo Html::anchor('matches/edit/'.$match->id, 'Edit'); ?> |
				<?php echo Html::anchor('matches/delete/'.$match->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Matches.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('matches/create', 'Add new Match', array('class' => 'btn btn-success')); ?>

</p>
