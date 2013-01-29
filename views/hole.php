<div data-role="page" id="hole">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a href="dgs.php?p=courses&f=course&cid=<?php echo $data['course']['id'] ?>" data-icon="arrow-l">Back</a>
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="dgs.php?p=courses&f=edithole&id=<?php echo $data['hole']['id'] ?>" data-icon="gear">Edit</a>
	</div>

	<div data-role="content">
		<h2><?php echo $data['course']['name']." ".$data['hole']['sort'].". ".$data['hole']['name'] ?></h2>

		<?php
		if(!(isset($data['hole']))) { ?>
			<p>Error!</p>
		<?php }
		else {
			?>
			<p>Number: <?php echo $data['hole']['sort'] ?></p>
			<p>Course: <?php echo $data['course']['name'] ?></p>
			<p>Par: <?php echo $data['hole']['par'] ?></p>
			<p>Distance: <?php echo $data['hole']['distance'] ?></p>
			<p>Your best: 2</p>
			<p>Your average: 3.41</p>
		<?php
		}
		?>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>