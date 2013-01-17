<div data-role="header"> 
	<h1><?php echo $data['pagetitle'] ?></h1> 
</div>

<?php
if(count($data['courselist']) == 0) {
	?> <p>Course list is empty!</p><?php
}
else {
	?>
	<table>
		<tr>
			<th>Name</th>
			<th>Lanes</th>
			<th>Tools</th>
		</tr>
		<?php foreach($data['courselist'] as $course) { ?>
			<tr>
				<td><a href="index.php?p=course&cid=<?php echo $course['id'] ?>"><?php echo $course['name'] ?></a></td>
				<td><a href="index.php?p=courses&f=delete&cid=<?php echo $course['id'] ?>" style="color: red">x</a></td>
			</tr>
		<?php } ?>
	</table>
<?php
}
?>
<form method="post" action="index.php?p=courses&f=create">
	<label for="name" class="ui-hidden-accessible">Name</label><input name="name" type="text" value="" />
	<input type="submit" value="Add course" />
</form>
