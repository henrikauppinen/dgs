<div data-role="page">
	<div data-role="header" data-theme="b" data-position="fixed">
		
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
			?>
			<ul data-role="listview" data-inset="true">
			<?php

			foreach($data['courselist'] as $course) {
				?>
				<li><a href="dgs.php?p=courses&f=course&cid=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a></li>
				<?php
			} ?>
			</ul>
			<?php
		}
		?>
			
		<div data-role="collapsible" data-content-theme="d">
			<h3>Create new course</h3>
			<form method="post" action="dgs.php?p=courses&f=create">
				
				<label for="name">Name</label>
				<input name="name" type="text" value="" data-clear-btn="true" />

				<label for="streetaddress">Street address</label>
				<input name="streetaddress" type="text" value="" data-clear-btn="true" />

				<label for="postcode">Post code</label>
				<input name="postcode" type="text" value="" data-clear-btn="true" />

				<label for="city">City</label>
				<input name="city" type="text" value="" data-clear-btn="true" />

				<label for="rating">Rating</label>
				<select name="rating" id="select-rating">
					<option value="A1">A1</option>
					<option value="A2">A2</option>
					<option value="A3">A3</option>
					<option value="B1">B1</option>
					<option value="B2">B2</option>
					<option value="B3">B3</option>
					<option value="C1">C1</option>
					<option value="C2">C2</option>
					<option value="C3">C3</option>
				</select>

				<input type="submit" value="Add course" data-theme="b" />
				<input type="hidden" name="f" value="create" />
			</form>
		</div>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>