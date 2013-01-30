<div data-role="page" id="course">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a href="dgs.php?p=courses" data-icon="arrow-l">Back</a>
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="dgs.php?p=courses&f=editcourse&cid=<?php echo $data['course']['id'] ?>" data-icon="gear">Edit</a>
	</div>
	<div class="head_content">
		<p><?php echo $data['course']['name'] ?></p>
	</div>
	<div class="head_toolbar">
		<div class="ui-grid-a">
			<div class="ui-block-a"><span><?php echo $data['course']['streetaddress']."<br />".$data['course']['postcode']." ".$data['course']['city'] ?></span></div>
			<div class="ui-block-b"><span><strong><?php echo $data['course']['rating'] ?></strong><br />Rating</span></div>
		</div>
		<a href="dgs.php?p=courses&f=editcourse&cid=<?php echo $data['course']['id'] ?>" data-icon="gear" data-mini="true" data-role="button" data-inline="true">Edit</a>
	</div>

	<div data-role="content"> 
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
				<li data-icon="arrow-r">
					<a href="?p=courses&f=hole&id=<?php echo $hole['id'] ?>">
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
			<form method="post" action="?p=courses&f=addhole&cid=<?php echo $data['course']['id'] ?>">
				<label for="name">Name</label>
				<input name="name" type="text" />
				
				<fieldset data-role="controlgroup" data-type="horizontal">
					<legend>Par</legend>
					<input type="radio" name="par" id="par-3" value="3" checked="checked" />
					<label for="par-3">3</label>
					<input type="radio" name="par" id="par-4" value="4" />
					<label for="par-4">4</label>
					<input type="radio" name="par" id="par-5" value="5" />
					<label for="par-5">5</label>
				</fieldset>	

				<label for="distance">Distance</label>
				<input type="text" name="distance" value="" />
				<input type="submit" value="Add" />
			</form>
		</div>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>