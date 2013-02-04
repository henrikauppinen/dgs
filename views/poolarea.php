<div data-role="page" id="poolarea">
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="#menupopup" data-rel="popup" data-icon="gear" class="ui-btn-right">Options</a>
	</div>

	<div data-role="popup" id="menupopup">
		<ul data-role="listview">
			<li><a href="?p=dgs&f=checkin" data-icon="gear" class="ui-btn-right">Change location</a></li>
			<li><a href="?p=dgs&f=checkout" data-icon="gear" class="ui-btn-right">Check out</a></li>
		</ul>
	</div>

	<div class="course_img">kuva</div>

	<div data-role="content">
		<div class="content_section">
			<h4><?php echo $data['course']['name'] ?></h4>
			<p><?php echo count($data['course']['holes']); ?> holes</p>
			<p><?php echo $data['course']['totaldistance']; ?> total distance (m)</p>
			
			<div data-type="horizontal" data-role="controlgroup">
				<a href="dgs.php?p=dgs&f=oncourse" data-role="button">Start round!</a>
				<a href="#" data-role="button" data-icon="star">Fav</a>
			</div>
		</div>
		<div>
			<h3>Log</h3>
			<ul data-role="listview">
				<?php foreach($data['rounds'] as $round) { ?>
					<li>
						<p class="ui-li-aside ui-li-desc"><?php echo $round['createtime'] ?></p>
						<h3>Latest round</h3>
						<p><strong><?php echo $round['totalscore'] ?></strong> throws</p>
						<p><strong><?php echo $round['diffpar'] ?></strong> over par</p>
						<p>Round completed in <strong><?php echo $round['time'] ?></strong></p>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div>
			<h3>People currently here</h3>
			<ul data-role="listview" data-inline="true">
				<li>person 1</li>
				<li>person 2</li>
			</ul>
		</div>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>