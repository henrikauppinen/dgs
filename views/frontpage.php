<div data-role="page" id="frontpage">
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="dgs.php?p=dgs&f=checkin" data-role="button" class="ui-btn-right" data-icon="check">Check in</a>
	</div>

	<div data-role="content">
		<p>Viestit...</p>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>