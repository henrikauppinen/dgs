<div data-role="page" id="poolarea"> 
	<div data-role="header" data-position="fixed">
		<h1><?php echo $data['pagetitle'] ?></h1>
	</div>
	<div data-role="content">
		<p>kuva</p>
		<h3><?php $data['course']['name'] ?></h3>
		<p>18 holes</p>
		<a href="dgs.php?p=oncourse" data-role="button">Start round!</a>
		<a href="#" data-role="button">Fav</a>
		<hr />
		<h3>People already here...</h3>
		<ul data-role="listview" data-inline="true">
			<li>person 1</li>
			<li>person 2</li>
		</ul>
		<hr />
		<div>
			MAP
		</div>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>