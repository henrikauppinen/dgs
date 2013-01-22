<div data-role="page">
	<div data-role="header">
		
		<h1><?php echo $data['pagetitle'] ?></h1> 
		<a href="?p=frontpage" data-icon="home" class="ui-btn-right">Home</a>
	</div>
	<div data-role="content">
		<?php
		if(count($data['courselist']) == 0) {
			?>
			<p>Course list is empty!</p>
			<?php
		}
		else {
			?>
			<ul data-role="listview" data-inset="true">
			<?php

			foreach($data['courselist'] as $course) {
				?>
				<li><a href="dgs.php?p=course&cid=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a></li>
				<?php
			} ?>
			</ul>
			<?php
		}
		?>
			
		<div data-role="collapsible" data-content-theme="d">
			<h3>Create new course</h3>
			<form method="post" action="dgs.php?p=courses&cid=<?php echo $course['id'] ?>">
				<label for="name">Name</label>
				<input name="name" type="text" value="" data-clear-btn="true" />
				<input type="submit" value="Add course" />
				<input type="hidden" name="f" value="create" />
			</form>
		</div>
	</div>
</div>