<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Matchid', 'matchid'); ?>

			<div class="input">
				<?php echo Form::input('matchid', Input::post('matchid', isset($matchcard) ? $matchcard->matchid : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Cardid', 'cardid'); ?>

			<div class="input">
				<?php echo Form::input('cardid', Input::post('cardid', isset($matchcard) ? $matchcard->cardid : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>