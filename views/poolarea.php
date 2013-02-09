<div data-role="page" id="poolarea">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a href="#menupopup" data-rel="popup" data-icon="gear" data-iconpos="notext">Options</a>
		<h1><?php echo $data['pagetitle'] ?></h1>
		
	</div>

	<div class="profile_head">

		<div class="title">
			<h1><?php echo $data['course']['name'] ?></h1>
		</div>

		<div class="container">
			<p><?php echo $data['course']['streetaddress']."<br />".$data['course']['postcode']." ".$data['course']['city'] ?></p>
			
		</div>
	</div>

	<div class="ribbon">
		<div class="ui-grid-c">
			<div class="ui-block-a"><span><?php echo count($data['course']['holes']) ?></span><span>holes</span></div>
			<div class="ui-block-b"><span><?php echo $data['course']['totaldistance'] ?></span><span>dist</span></div>
			<div class="ui-block-c"><span><?php echo $data['course']['rating'] ?></span><span>Rating</span></div>
			<div class="ui-block-d"><span><?php echo $data['course']['totalpar'] ?></span><span>Par</span></div>
		</div>
	</div>

	<div data-role="popup" id="menupopup">
		<ul data-role="listview">
			<li><a href="dgs.php?p=dgs&f=checkin" data-icon="gear" class="ui-btn-right">Change location</a></li>
			<li><a href="dgs.php?p=dgs&f=checkout" data-icon="gear" class="ui-btn-right">Check out</a></li>
		</ul>
	</div>

	<div data-role="content">
		<a href="dgs.php?p=dgs&f=oncourse" data-role="button" data-theme="g">Start round!</a>
		
		<br />

		<div class="people">
			<span class="title">Friends here:</span>
			<?php
				if(count($data['friends']) > 0) {
					foreach($data['friends'] as $friend) { ?>
						<div class="person">
							<img src="css/img/face.png" />
							<span><?php echo $friend['name'] ?></span>
						</div>
					<?php }
				} ?>
		</div>

		<div class="msgarea">
			<span class="title">Current activity:</span>

			<div class="msgcontainer">
				<?php
					if(isset($data['msg']) && count($data['msg']) > 0) {
						foreach($data['msg'] as $msg) { ?>
							<div class="msg">
								<div class="title">
									<img src="css/img/face.png" />
									<span><?php echo $msg[0] ?></span>
									<span><?php echo $msg[1] ?></span>
								</div>
								<div>
									<p><?php echo $msg[2] ?></p>
								</div>
							</div>
						<?php }
					} ?>
			</div>
		</div>
		
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>