<div data-role="page" id="login">
	<div data-role="content">
		<?php
		if(isset($data['message'])) {
			echo "<p>{$data['message']}</p>";
		}
		?>
		<form id="loginform" method="post" action="dgs.php?p=login" data-ajax="false">
			<label for="email">Email address</label>
			<input name="email" type="text" />
			<label for="passwd">Password</label>
			<input name="passwd" type="password" />
			<input type="submit" value="Login" data-theme="b" />
			<input type="hidden" name="token" id="tokenid" value="<?php echo session_id(); ?>" />
		</form>

		<a href="dgs.php?p=login&f=createaccount" data-role="button">Create account</a>

	</div>
</div>
