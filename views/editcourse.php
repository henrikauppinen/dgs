<div data-role="page" id="editcourse">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a data-role="button" href="dgs.php?p=courses&f=course&cid=<?php echo $data['course']['id'] ?>">Close</a>
		<h1>Edit</h1>
		<a data-role="button" href="#" id="editcoursesave">Save</a>
	</div>

	<div data-role="content">
		<div class="msg">
		<form method="post" action="dgs.php?p=courses&f=update" id="editcourseform" data-ajax="false">
			<label for="name">Name</label>
			<input name="name" type="text" value="<?php echo $data['course']['name'] ?>" data-clear-btn="true" />

			<label for="streetaddress">Street address</label>
			<input name="streetaddress" type="text" value="<?php echo $data['course']['streetaddress'] ?>" data-clear-btn="true" />

			<label for="postcode">Post code</label>
			<input name="postcode" type="text" value="<?php echo $data['course']['postcode'] ?>" data-clear-btn="true" />

			<label for="city">City</label>
			<input name="city" type="text" value="<?php echo $data['course']['city'] ?>" data-clear-btn="true" />

			<label for="rating">Rating</label>
			<select name="rating" id="select-rating">
				<?php 
				
				$sel = '';

				foreach($data['ratings'] as $rating) {
					if($data['course']['rating'] == $rating) {
						$sel = 'selected="selected"';
					}
					else {
						$sel = '';
					} ?>
					<option value="<?php echo $rating ?>" <?php echo $sel ?>><?php echo $rating ?></option>
				<?php } ?>
			</select>

			<input type="hidden" name="cid" value="<?php echo $data['course']['id'] ?>" />
		</form>
		<br />
		<?php if($data['usagecount'] == 0) { ?>
			<a data-role="button" data-theme="f" href="#" id="deletecoursebutton">Delete course</a>
		<?php } ?>
		</div>
	</div>

	<div data-role="popup" id="confirmdelete">
		<div data-role="header">
			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
			<h3>Delete course?</h3> 
		</div>
		<div class="ui-content">
			<p>This action cannot be cancelled?</p>
			<a data-role="button" href="?p=courses&f=delete&cid=<?php echo $data['course']['id'] ?>" data-theme="f">Confirm</a>
			<a data-role="button" href="#" data-rel="back">Cancel</a>
		</div>
	</div>
</div>