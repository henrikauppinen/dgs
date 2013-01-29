<?php

# Footer nav module

$navbar = array();

if(isset($_SESSION['oncourse'])) {
	if(isset($_SESSION['last_hole_no'])) {
		$navbar[] = array('href' => 'dgs.php?p=dgs&f=oncourse', 'name' => 'Session!', 'icon' => 'alert');
	}
	else {
		$navbar[] = array('href' => 'dgs.php?p=dgs&f=poolarea', 'name' => 'Location', 'icon' => 'info');
	
	}
}
else {
	$navbar[] = array('href' => 'dgs.php', 'name' => 'Friends', 'icon' => 'info');
}

$navbar[] = array('href' => 'dgs.php?p=courses', 'name' => 'Courses', 'icon' => 'grid');
$navbar[] = array('href' => 'dgs.php?p=profile', 'name' => 'Profile', 'icon' => 'grid');

?>

<div data-role="footer" data-position="fixed" data-id="footernav">
	<div data-role="navbar">
		<ul>
			<?php foreach($navbar as $button) { ?>
				<li><a href="<?php echo $button['href'] ?>" data-icon="<?php echo $button['icon'] ?>"><?php echo $button['name'] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>