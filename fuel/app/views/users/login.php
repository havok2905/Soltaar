
<div class="form">
	<p>Login</p>
	<?php if (isset($errors)){echo $errors;}?>
	<?php echo $form; ?>
</div>


<div class="container">
	<div id="menu">
		<h2>Login Information</h2>
		<ul>
			<li>
				Admin
				<ul>
					<li>username: admin</li>
					<li>password: admin</li>
				</ul>
			</li>
			<li>
				Guest
				<ul>
					<li>username: guest</li>
					<li>password: guest</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
