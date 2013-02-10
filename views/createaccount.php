<div data-role="page" id="createaccount">
	<div data-role="header">
		<h1><?php echo $data['pagetitle'] ?></h1>
	</div>
	<div data-role="content">
		<?php
		if(isset($data['message'])) {
			echo "<p>{$data['message']}</p>";
		}
		?>
		<form id="login" method="post" action="dgs.php?p=login&f=createaccount">
			<label for="email">Email address</label>
			<input name="email" type="text" />
			<label for="passwd">Password</label>
			<input name="passwd" type="password" />
			<label for="name">Display name</label>
			<input name="name" type="text" />
			<input type="submit" value="Create account" data-theme="b" />
			<input name="task" type="hidden" value="create" />
		</form>
	</div>
</div>
