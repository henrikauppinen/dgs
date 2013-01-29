<div data-role="page" id="edithole">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a href="dgs.php?p=courses&f=hole&id=<?php echo $data['hole']['id'] ?>" data-icon="arrow-l">Back</a>
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a data-role="button" href="#" id="editholesave">Save</a>
	</div>

	<div data-role="content">
		<form method="post" action="?p=courses&f=updatehole" id="editholeform">
			<label for="name">Name</label>
			<input name="name" type="text" value="<?php echo $data['hole']['name'] ?>" />
			<label for="par">Par</label>
			<input name="par" type="text" value="<?php echo $data['hole']['par'] ?>" />
			<label for="distance">Distance</label>
			<input name="distance" type="text" value="<?php echo $data['hole']['distance'] ?>" />
			<input name="id" type="hidden" value="<?php echo $data['hole']['id'] ?>" />
		</form>
		<br />
		<a href="#" data-role="button" data-theme="f" id="deleteholebutton">Delete hole</a>
	</div>

	<div data-role="popup" id="confirmdelete">
		<div data-role="header">
			<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
			<h3>Delete hole?</h3>
		</div>
		<div class="ui-content">
			<p>This action cannot be cancelled!</p>
			<a data-role="button" href="?p=courses&f=deletehole&&cid=<?php echo $data['course']['id'] ?>&id=<?php echo $data['hole']['id'] ?>" data-theme="f">Confirm</a>
			<a data-role="button" href="#" data-rel="back">Cancel</a>
		</div>
	</div>

</div>