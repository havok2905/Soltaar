<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
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
	<!-- Login/register div at the top if not logged in -->
	<div class="logReg">
		<!-- forge login/register stuff here-->
	</div>

	<!-- if not logged in, display demo game info -->

	<div id="text">
		<p>
			Sol Tarr is a memory game where paired cards are shuffled together and the objective is to select them pair by pair.  When the game starts you will be alerted to the order of the cards.  Afterwards, the cards will flip over and it's your job to flip them back over by their matching pairs.  
		</p>
		<p>
			There are two ways to select cards.  If you have a mouse, you can simply click on them to flip them.  Otherwise when using a keyboard, type in the numbers of the cards in the two text boxes.
		</p>
	</div>

	<!-- 0 gusts, 1 users, 50 teachers, 100 is admin -->
	<!-- that will be in the group column -->
	<!-- if roles < number..display whatever -->
	<!-- <div class="demoInfo"></div> -->
	<div class="container">

		<!-- Load in default match if ($match) -->

		<?php echo View::forge('matches/play'); ?>
	</div>

	<!-- Use dummy data and begin to display stuff -->
	<span class="tab"><!-- depending on teacher/admin/etc, change what this says --> Courses</span>
	<div id="mainContent">
		<!-- accordian  http://css-tricks.com/snippets/jquery/simple-jquery-accordion/  -->
		<!-- ALso get a lightbox that lets you load in html or append some in through js -->
		<span>Course Name -- Matches</span>
		<!-- load in matches, name of match, description -->
		<ul>
			<h2>Match name</h2>
			<p>Description sldfjsdl;fskfjdlsfj </p>
			<!-- edit link. On click, append a modal and use an ajax call inside the appended stuff. Keep updated_at in mind -->
			<!-- view will just play that specific matches/play/1 the match id is the number -->
		</ul>
	</div>
</body>
</html>