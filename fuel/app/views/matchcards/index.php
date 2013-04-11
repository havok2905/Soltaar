<h2>Listing Matchcards</h2>
<br>
<?php if ($matchcards): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Matchid</th>
			<th>Cardid</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($matchcards as $matchcard): ?>		<tr>

			<td><?php echo $matchcard->matchid; ?></td>
			<td><?php echo $matchcard->cardid; ?></td>
			<td>
				<?php echo Html::anchor('matchcards/view/'.$matchcard->id, 'View'); ?> |
				<?php echo Html::anchor('matchcards/edit/'.$matchcard->id, 'Edit'); ?> |
				<?php echo Html::anchor('matchcards/delete/'.$matchcard->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Matchcards.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('matchcards/create', 'Add new Matchcard', array('class' => 'btn btn-success')); ?>

</p>
