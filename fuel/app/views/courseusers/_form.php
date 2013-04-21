<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Userid', 'userid'); ?>

			<div class="input">
				<?php echo Form::input('userid', Input::post('userid', isset($courseuser) ? $courseuser->userid : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Courseid', 'courseid'); ?>

			<div class="input">
				<?php echo Form::input('courseid', Input::post('courseid', isset($courseuser) ? $courseuser->courseid : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>