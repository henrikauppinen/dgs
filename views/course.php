<div data-role="page" data-add-back-btn="true">

	<div data-role="header"> 
		<h1><?php echo $data['pagetitle'] ?></h1> 
	</div>

	<div data-role="content"> 
		<h2><?php echo $data['course']['name'] ?></h2>

		<?php

		if(!(isset($data['course']['lanes']))) { ?>
			<p>No lanes!</p>
		<?php }
		else {
			?>
			<ul data-role="listview" data-inset="true">
			<?php
			foreach($data['course']['lanes'] as $lane) {
				?>
				<li data-icon="edit">
					<a href="index.php?p=lane&lid=<?php echo $lane['id'] ?>">
						<h3><?php echo $lane['sort'].". ".$lane['name'] ?></h3>
						<p>Par: <?php echo $lane['par'] ?></p>
						<p>Distance: <?php echo $lane['distance'] ?></p>
					</a>
				</li>
			<?php } ?>
			</ul>
		<?php
		}

		#
		# create new lane form
		# 

		?>
		<div data-role="collapsible" data-content-theme="d">
			<h3>Create new lane</h3>
			<form method="POST" action="?p=course&cid=<?php echo $data['course']['id'] ?>">
				<label for="name">Name</label>
				<input name="name" type="text" />
				<label for="par">Par</label>
				<input type="range" name="par" value="3" min="2" max="7" />
				<label for="distance">Distance</label>
				<input type="range" name="distance" value="60" min="25" max="300" data-highlight="true" />
				<input type="submit" value="Add" />
				<input type="hidden" name="f" value="add" />
			</form>
		</div>
	</div>
</div>