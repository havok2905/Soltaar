<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Filler</title>
	<?php echo Asset::css('reset.css'); ?>
	<?php echo Asset::css('main.css'); ?>
	<?php echo Asset::js('jquery.js'); ?>
	<?php echo Asset::js('jquery.hotkeys.js'); ?>
	<?php echo Asset::js('card.js'); ?>
	<?php echo Asset::js('deck.js'); ?>
	<?php echo Asset::js('game.js'); ?>
	<?php echo Asset::js('main.js'); ?>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="span16">
				<h1><?php echo $title; ?></h1>
				<hr>
				<?php
                    if(Auth::instance()->check())
					{
					    $link = array("Logged in as: ".Auth::instance()->get_screen_name(), Html::anchor('users/logout', 'Logout'));
					}
					else
					{
					    $link = array(Html::anchor('users/login', 'Login'), Html::anchor('users/register', 'Register'));
					}
					echo Html::ul($link);
                ?>
<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert-message error">
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="span16">
<?php echo $content; ?>
			</div>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>


</html>