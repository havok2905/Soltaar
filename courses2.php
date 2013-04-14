<h2>Courses</h2>
<div class="courses">
<?php if ($courses): ?>
<?php foreach ($courses as $course): ?>
<h3><?php echo $course->name; ?> - Matches</h3>
<?php if ($games): ?>
<table>
	<thead>
		<tr>
		<th scope="col">Actions</th>
			<th scope="col">Game</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($games as $game):	?>
		<tr>
		<td><a href="<?php echo /* PLAY GAME LINK */ ?>">Play Game!</a></td>
			<td><dl><dt><a href="<?php /* LINK */ ?>"><?php echo $game->name; ?></a></dt>
			<dd><?php echo $game->description; ?></dd></dl></td>
		</tr>

		<?php endforeach; // end games ?>
		</tbody>
</table>
<?php else: ?>
<p>No matches for this course.</p>
<?php endif; ?>
<?php endforeach; // end courses ?>	


<?php else: ?>
<p>No Courses.</p>

<?php endif; ?>
</div>