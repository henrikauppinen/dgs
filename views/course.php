<div data-role="page" id="course">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a href="dgs.php?p=courses" data-icon="arrow-l">Back</a>
		<h1><?php echo $data['pagetitle'] ?></h1>

	</div>

	<div class="profile_head">

		<div class="title">
			<h1><?php echo $data['course']['name'] ?></h1>
		</div>

		<div class="container">
			<p><?php echo $data['course']['streetaddress']." ".$data['course']['postcode']." ".$data['course']['city'] ?></p>
			<a href="dgs.php?p=courses&f=editcourse&cid=<?php echo $data['course']['id'] ?>" data-role="button" data-icon="gear" data-mini="true" data-inline="true">edit</a>
		</div>


		<div class="ribbon">
			<div class="ui-grid-c">
				<div class="ui-block-a"><span><?php echo $data['course']['rating'] ?></span><span>RATING</span></div>
				<div class="ui-block-b"><span><?php echo "18" ?></span><span>HOLES</span></div>
				<div class="ui-block-c"><span><?php echo "-" ?></span><span>Avg.</span></div>
				<div class="ui-block-d"><span><?php echo "-" ?></span><span>Sk.</span></div>
			</div>
		</div>
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