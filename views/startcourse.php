<div data-role="header"> 
	<h1><?php echo $data['pagetitle'] ?></h1> 
</div>

<ul data-role="listview" data-filter="true">
	<?php
	foreach($data['courses'] as $course) {
		?>
		<li><a href="index.php?p=oncourse&f=start&cid=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a></li>
		<?php
	} ?>
</ul>
