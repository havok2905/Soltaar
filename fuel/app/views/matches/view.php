<h2>Viewing #<?php echo $match->id; ?></h2>

<p>
	<strong>Time:</strong>
	<?php echo $match->time; ?></p>
<p>
	<strong>Score:</strong>
	<?php echo $match->score; ?></p>
<p>
	<strong>Owner:</strong>
	<?php echo $match->owner; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $match->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $match->description; ?></p>
<p>
	<strong>Course:</strong>
	<?php echo $match->course; ?></p>

<ul class="cardList">
<?php foreach ($cards as $card => $value) { 
	echo "<li>".Html::anchor('cards/view/'.$value["id"], $value["name"])."</li>";
} ?>
</ul>

<?php echo Html::anchor('matches/edit/'.$match->id, 'Edit'); ?> |
<?php echo Html::anchor('matches', 'Back'); ?>