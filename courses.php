<h2>Courses</h2>
<div class="courses">
<?php if ($courses): ?>
<?php foreach ($courses as $course): ?>
<hgroup>
<h3><?php echo $course->name; ?></h3>
<h4><a href="<?php echo; ?>">New Match</a></h4>
</hgroup>
<?php if ($games): ?>
<table>
	<thead>
		<tr>
			<th scope="col">Game</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($games as $game):	?>
		<tr>
			<td><dl><dt><?php echo $game->name; ?></dt>
			<dd><?php echo $game->description; ?></dd></dl></td>
			<td><ul><li><a href="<?php echo Html::anchor('courses/edit/'.$course->id, 'Edit'); ?>">Edit</a></li>
			<li><a href="<?php echo /* VIEW LINK */; ?>">View</a></li></ul></td>

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