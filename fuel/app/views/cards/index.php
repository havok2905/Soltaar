<h2>Listing Cards</h2>
<br>
<?php if ($cards): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Image</th>
			<th>Description</th>
			<th>Owner</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cards as $card): ?>		<tr>

			<td><?php echo $card->name; ?></td>
			<td><?php echo $card->image; ?></td>
			<td><?php echo $card->description; ?></td>
			<td><?php echo $card->owner; ?></td>
			<td>
				<?php echo Html::anchor('cards/view/'.$card->id, 'View'); ?> |
				<?php echo Html::anchor('cards/edit/'.$card->id, 'Edit'); ?> |
				<?php echo Html::anchor('cards/delete/'.$card->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Cards.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('cards/create', 'Add new Card', array('class' => 'btn btn-success')); ?>

</p>
