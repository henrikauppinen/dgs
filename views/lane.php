<div data-role="page" >

	<div data-role="header">
		<
		<h1><?php echo $data['pagetitle'] ?></h1> 
	</div>

	<div data-role="content">
		<h2><?php echo $data['course']['name']." ".$data['lane']['sort'].". ".$data['lane']['name'] ?></h2>

		<?php

		if(!(isset($data['lane']))) { ?>
			<p>Error!</p>
		<?php }
		else {
			?>

			<p>Number: <?php echo $data['lane']['sort'] ?></p>
			<p>Course: <?php echo $data['course']['name'] ?></p>
			<p>Par: <?php echo $data['lane']['par'] ?></p>
			<p>Distance: <?php echo $data['lane']['distance'] ?></p>
		<?php
		}
		?>
		<a href="#" data-role="button">Delete lane</a>
	</div>
</div>