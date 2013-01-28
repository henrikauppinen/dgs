<div data-role="page" >

	<div data-role="header">
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="?p=frontpage" data-icon="home" class="ui-btn-right">Home</a> 
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
		<?php
		}
		?>
		<a href="?p=hole&f=del" data-role="button">Delete hole</a>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>