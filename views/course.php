<div data-role="page">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a href="courses" data-icon="arrow-l" data-rel="back">Back</a>
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="editcourse&cid=<?php echo $data['course']['id'] ?>" data-icon="gear">Edit</a>
	</div>

	<div data-role="content"> 
		<h2><?php echo $data['course']['name'] ?></h2>
		<p><?php echo $data['course']['streetaddress']." ".$data['course']['postcode']." ".$data['course']['city'] ?></p>
		<p>Rating: <?php echo $data['course']['rating'] ?></p>

		<?php

		if(!(isset($data['course']['holes']))) { ?>
			<p>No holes!</p>
		<?php }
		else {
			?>
			<ul data-role="listview" data-inset="true">
			<?php
			foreach($data['course']['holes'] as $hole) {
				?>
				<li data-icon="edit">
					<a href="?p=hole&lid=<?php echo $hole['id'] ?>">
						<h3><?php echo $hole['sort'].". ".$hole['name'] ?></h3>
						<p>Par: <?php echo $hole['par'] ?></p>
						<p>Distance: <?php echo $hole['distance'] ?></p>
					</a>
				</li>
			<?php } ?>
			</ul>
		<?php
		}

		#
		# create new hole form
		# 

		?>
		<div data-role="collapsible" data-content-theme="d">
			<h3>Create new hole</h3>
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
	<?php include 'views/_footernav.php'; ?>
</div>