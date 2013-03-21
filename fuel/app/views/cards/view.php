<h2>Viewing #<?php echo $card->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $card->name; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $card->image; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $card->description; ?></p>
<p>
	<strong>Owner:</strong>
	<?php echo $card->owner; ?></p>

<?php echo Html::anchor('cards/edit/'.$card->id, 'Edit'); ?> |
<?php echo Html::anchor('cards', 'Back'); ?>