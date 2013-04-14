<h2>Controls</h2>
<div class="controls">
<hgroup>
<h3>User Enrollments</h3>
<h4><a href="<?php echo /* NEW USER LINK */; ?>">New User</a></h4>
</hgroup>

<?php if ($users): ?>
<ul>
<?php foreach ($users as $user): ?>
<li><?php echo $user->name; ?></li>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p>No user enrollments.</p>
<?php endif; ?>

<hr />

<hgroup>
<h3>Matches</h3>
<h4><a href="<?php echo; ?>">New Match</a></h4>
</hgroup>

<?php if ($games): ?>
<?php foreach ($games as $game): ?>

<table>
	<thead>
		<tr>
			<th scope="col">Game</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
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
<p>No matches.</p>
<?php endif; ?>
</div>