<div data-role="header"> 
	<h1><?php echo $data['pagetitle'] ?></h1> 
</div>

<h2><?php echo $data['course']['name'] ?></h2>

<?php

if(!(isset($data['course']['lanes'])) OR count($data['course']['lanes']) == 0) { ?>
	<p>No lanes!</p>
<?php }
else {
	?>
	<table class="ui-responsive" id="lanes">
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Par</th>
			<th>Distance</th>
		</tr>
	<?php
	foreach($data['course']['lanes'] as $lane) { ?>
		<tr>
			<td><?php echo $lane['sort'] ?></td>
			<td><?php echo $lane['name'] ?></td>
			<td><?php echo $lane['par'] ?></td>
			<td><?php echo $lane['distance'] ?></td>
		</tr>
	<?php } ?>
</table>
<?php
}
?>

<form method="POST" action="?p=course&f=add">
	name:<input name="name" type="text" /><br />
	par:<input name="par" type="text" /><br />
	<input type="submit" value="Add" />
	<input type="hidden" name="cid" value="<?php echo $data['course']['id'] ?>" />
</form>