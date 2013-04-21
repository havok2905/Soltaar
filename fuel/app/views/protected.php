<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('reset.css'); ?>
	<?php echo Asset::css('bootstrap.css'); ?>
	
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
		<div class="navbar navbar-fixed-top">  
		  <div class="navbar-inner">  
		    <div class="container">  
		    	<a href="welcome" class="brand">Soltaar</a>
		    	<ul class="nav">
		    		<li><?php echo Html::anchor("welcome", "Home");?></li>

		    		<?php
		    			$role = Auth::instance()->get_groups();
		    			$role = $role[0][1];

		    			if($role >= 50)
		    			{
		    				echo "<li>".Html::anchor("cards", "Cards")."</li>";
		    				echo "<li>".Html::anchor("courses", "Courses")."</li>";
		    				echo "<li>".Html::anchor("matches", "Matches")."</li>";
		    				echo "<li>".Html::anchor("users", "Users")."</li>";
		    			}
		    		?>
		    	
		    	</ul> 
		    </div>  
		  </div>  
		</div> 
		<div class="row">
			<div class="span16" id="loggedIn">
				<h1><?php echo $title; ?></h1>
				<hr class="dashes">
				<?php
                    if(Auth::instance()->check())
					{
					    $link = array("Logged in as: ".Auth::instance()->get_screen_name(), Html::anchor('login/logout', 'Logout'));
						echo Html::ul($link);
					}	
					else
					{
					    Response::redirect('login/login');
					}
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
			<div class="span16" id="loggedInContent">
<?php echo $content; ?>
			</div>
		</div>
		<footer>
			<p class="pagination-centered">Created by Chris McClean, Bryce Ruppel, Sherry B., and Elizabeth Williams</p>
		</footer>
	</div>
</body>
</html>