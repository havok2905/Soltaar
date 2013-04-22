<h2>Listing Match</h2>

<div id="soltaar">
</div>
<div id="main">
	<div id="text">
		<p>
			Sol Tarr is a memory game where paired cards are shuffled together and the objective is to select them pair by pair.  When the game starts you will be alerted to the order of the cards.  Afterwards, the cards will flip over and it's your job to flip them back over by their matching pairs.  
		</p>
		<p>
			There are two ways to select cards.  If you have a mouse, you can simply click on them to flip them.  Otherwise when using a keyboard, type in the numbers of the cards in the two text boxes.
		</p>
	</div>
	<div id="menu">
		<ul class="tempDashboard">
			<li> 
				<form>
					Skip to: <input type="text" name="skip" id="skip" /><input type="submit" value="Go" id="submit" />
				</form>
			</li>
		</ul>
		<ul class="tempDashboard">
			<li>Select Card</li>
			<li>Spacebar</li>
		</ul>
		<ul class="tempDashboard">
			<li>Select Cards</li>
			<li>Arrow keys</li>
		</ul>
		<ul class="tempDashboard">
			<li>Skip to Card Number</li>
			<li>Ctrl</li>
		</ul>
	</div>

	<div class="span16">
	<ul class="game">
		<?php foreach ($cards as $card => $value) { 
			echo "<li class='card'>".Html::anchor('cards/view/'.$value["id"], $value["name"])."</li>";
		} ?>
	</ul>
</div>

</div>
