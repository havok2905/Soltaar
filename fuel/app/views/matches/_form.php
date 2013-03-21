<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Time', 'time'); ?>

			<div class="input">
				<?php echo Form::input('time', Input::post('time', isset($match) ? $match->time : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Score', 'score'); ?>

			<div class="input">
				<?php echo Form::input('score', Input::post('score', isset($match) ? $match->score : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Owner', 'owner'); ?>

			<div class="input">
				<?php echo Form::input('owner', Input::post('owner', isset($match) ? $match->owner : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>