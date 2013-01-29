<div data-role="page" id="profile">

	<div data-role="header" data-theme="b">
		<h1>Profile</h1>
		<a href="checkin" data-icon="check" class="ui-btn-right">Check in</a>
	</div>
	<div class="ui-grid-c profile_top_stats">
		<div class="ui-block-a"><span><strong>Rounds</strong></span><span><?php echo $data['stats']['rounds'] ?></span></div>
		<div class="ui-block-b"><span><strong>Throws</strong></span><span><?php echo $data['stats']['throws'] ?></span></div>
		<div class="ui-block-c"><span><strong>Avg. per hole</strong></span> <span><?php echo $data['stats']['avg'] ?></span></div>
		<div class="ui-block-d"><span><strong>Skill</strong></span> <span><?php echo $data['stats']['skill'] ?></span></div>
	</div>
	<div data-role="content">
		<div>
			<pre>
				<?php print_r($data); ?>
			</pre>
		</div>
	</div>


	<?php include 'views/_footernav.php'; ?>
</div>