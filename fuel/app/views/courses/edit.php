<h2>Editing Course</h2>
<br>

<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($course) ? $course->name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::textarea('description', Input::post('description', isset($course) ? $course->description : ''), array('class' => 'span8', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Owner', 'owner'); ?>

			<div class="input">
				<?php echo Form::input('owner', Input::post('owner', isset($course) ? $course->owner : ''), array('class' => 'span4')); ?>

			</div>
		</div>

		<?php foreach ($users as $user => $value) { ?>
			
			<div class="clearfix">
				<?php echo Form::label($value["username"], 'users[]'); ?>
				<div class="input">
					<?php echo Form::checkbox('users[]', $value["id"]); ?>
				</div>
			</div>

		<?php } ?>

		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>
<p>
	<?php echo Html::anchor('courses/view/'.$course->id, 'View'); ?> |
	<?php echo Html::anchor('courses', 'Back'); ?></p>
