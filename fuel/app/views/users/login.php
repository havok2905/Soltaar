<p>Login</p>
<?php if (isset($errors)){echo $errors;}?>
<?php echo $form; ?>


<div class="container">
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

</div>