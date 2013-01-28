<div data-role="page">
	<div data-role="header" data-position="fixed">
		<h1>Select course</h1>
		<a data-role="button" data-rel="back" data-icon="delete">Close</a>
	</div>

	<div data-role="content">
		<ul data-role="listview" data-filter="true">
			<?php
			foreach($data['courses'] as $course) {
				?>
				<li>
					<a href="dgs.php?p=poolarea&cid=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a>
				</li>
				<?php
			} ?>
		</ul>
	</div>
	<?php # include 'views/_footernav.php'; ?>
</div>