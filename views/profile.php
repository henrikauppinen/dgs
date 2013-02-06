<div data-role="page" id="profile">
	<div data-role="header" data-theme="b" data-position="fixed">
		
		<h1>Profile</h1>

	</div>

	<div class="profile_head">
		<img src="css/img/face.png" />
		<div class="title">
			<h1><?php echo $data['user']['name'] ?></h1>
		</div>

		<div class="container">
			<p><?php echo $data['user']['email'] ?></p>
			<a href="#" data-role="button" data-icon="gear" data-mini="true" data-inline="true">edit</a>
		</div>
	</div>

	<div class="ribbon">
		<div class="ui-grid-c">
			<div class="ui-block-a"><span><?php echo $data['stats']['rounds'] ?></span><span>Rounds</span></div>
			<div class="ui-block-b"><span><?php echo $data['stats']['throws'] ?></span><span>Throws</span></div>
			<div class="ui-block-c"><span><?php echo $data['stats']['avg'] ?></span><span>Avg.</span></div>
			<div class="ui-block-d"><span><?php echo $data['stats']['skill'] ?></span><span>Sk.</span></div>
		</div>
	</div>

	<div data-role="content" id="msgcontainer">
		<div class="msg">
			<div class="title">
				<img src="css/img/face.png" />
				<span>Henri Kauppinen</span>
				<span>22 minutes ago</span>
			</div>
			<div>
				<p>Round completed in Siltamäki <b>NEW HIGH SCORE!</b></p>
			</div>
		</div>
		<div class="msg">
			<div class="title">
				<img src="css/img/face.png" />
				<span>Henri Kauppinen</span>
				<span>2 hours ago</span>
			</div>
			<div>
				<p>Won a group round in Siltamäki!</p>
			</div>
		</div>

		<div class="msg">
			<div class="title">
				<img src="css/img/face.png" />
				<span>Henri Kauppinen</span>
				<span>2 days ago</span>
			</div>
			<div>
				<p>Round completed in Siltamäki</p>
			</div>
		</div>

		<div class="msg">
			<div class="title">
				<img src="css/img/face.png" />
				<span>Henri Kauppinen</span>
				<span>3 hours ago</span>
			</div>
			<div>
				<p>Round completed in Siltamäki</p>
			</div>
		</div>
	</div>


	<?php include 'views/_footernav.php'; ?>
</div>