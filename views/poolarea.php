<div data-role="page" id="poolarea">
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="?p=checkin" data-icon="check" class="ui-btn-right">Check in</a>
	</div>

	<div class="course_img">kuva</div>

	<div data-role="content">
		<div class="content_section">
			<h4><?php echo $data['course']['name'] ?></h4>
			<p><?php echo count($data['course']['holes']); ?> holes</p>
			<p><?php echo $data['course']['totaldistance']; ?> total distance (m)</p>
			
			<div data-type="horizontal" data-role="controlgroup">
				<a href="dgs.php?p=oncourse" data-role="button">Start round!</a>
				<a href="#" data-role="button" data-icon="star">Fav</a>
			</div>
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

