<h2>Editing Match</h2>
<br>

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
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($match) ? $match->name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::input('description', Input::post('description', isset($match) ? $match->description : ''), array('class' => 'span4')); ?>

			</div>
		</div>

		<?php foreach ($cards as $card => $value) { ?>
			
			<div class="clearfix">
				<?php echo Form::label($value["name"], 'cards[]'); ?>
				<div class="input">
					<?php echo Form::checkbox('cards[]', $value["id"]); ?>
				</div>
			</div>

		<?php } ?>

		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>

<p>
	<?php echo Html::anchor('matches/view/'.$match->id, 'View'); ?> |
	<?php echo Html::anchor('matches', 'Back'); ?></p>
