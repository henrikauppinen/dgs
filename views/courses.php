<div data-role="page">
	<div data-role="header"> 
		<h1><?php echo $data['pagetitle'] ?></h1> 
	</div>
	<div data-role="content">
		<?php
		if(count($data['courselist']) == 0) {
			?>
			<p>Course list is empty!</p>
			<?php
		}
		else {
			
			?><ul data-role="listview" data-inset="true"><?php

			foreach($data['courselist'] as $course) {
				?>
				<li><a href="index.php?p=course&cid=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a></li>
				<?php
			} ?>
			</ul>
			<?php
		}
		?>
		<form method="post" action="index.php?p=courses&f=create">
			<label for="name">Name</label>
			<input name="name" type="text" value="" data-clear-btn="true" />
			<input type="submit" value="Add course" />
		</form>
</div>
</div>