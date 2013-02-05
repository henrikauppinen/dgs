<div data-role="page" id="checkin">
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1>Select course</h1>
		<a href="#" data-role="button" data-rel="back" data-icon="delete">Close</a>
	</div>

	<div id="map_canvas"></div>

	<div data-role="content">
		
		<ul data-role="listview">
			<?php
			foreach($data['courses'] as $course) {
				?>
				<li>
					<a href="dgs.php?p=dgs&f=poolarea&cid=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a>
				</li>
				<?php
			} ?>
		</ul>
	</div>
	<?php # include 'views/_footernav.php'; ?>
</div>