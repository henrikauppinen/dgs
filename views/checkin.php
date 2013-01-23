<div data-role="page">
	<div data-role="header">
		<h1><?php echo $data['pagetitle'] ?></h1> 
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
</div>