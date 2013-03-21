<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Cardid', 'cardid'); ?>

			<div class="input">
				<?php echo Form::input('cardid', Input::post('cardid', isset($coursecard) ? $coursecard->cardid : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Courseid', 'courseid'); ?>

			<div class="input">
				<?php echo Form::input('courseid', Input::post('courseid', isset($coursecard) ? $coursecard->courseid : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>