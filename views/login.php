<div data-role="page">
	<div data-role="header">
		<h1>Disc golf score Alpha</h1>
	</div>
	<div data-role="content">
		<?php
		if(isset($data['message'])) {
			echo "<p>{$data['message']}</p>";
		}
		?>
		<form id="login" method="post" action="index.php?p=login">
			<label for="email">Email address</label>
			<input name="email" type="text" />
			<label for="passwd">Password</label>
			<input name="passwd" type="password" />
			<input type="submit" value="Login" data-theme="b" />
		</form>

		<a href="index.php?p=createaccount" data-role="button">Create account</a>

	</div>
</div>
