<div data-role="page">
	<div data-role="header">
		<div data-role="navbar">
			<ul>
				<li><a href="#">One</a></li>
				<li><a href="#">Two</a></li>
				<li><a href="#">Three</a></li>
			</ul>
		</div>
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
	<?php include 'views/_footernav.php'; ?>
</div>