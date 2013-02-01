<div data-role="page" id="scoresheet">
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="dgs.php?p=dgs&f=checkin" data-role="button" class="ui-btn-right" data-icon="check">Check in</a>
	</div>

	<div data-role="content">

		<ul data-role="listview" data-inset="true">
			<li>
				<p class="ui-li-aside ui-li-desc"><?php echo $data['scoresheet']['createtime'] ?></p>
				<h3>Total score</h3>
				<p><strong><?php echo $data['scoresheet']['totalscore'] ?></strong> throws</p>
				<p><strong><?php echo $data['scoresheet']['diffpar'] ?></strong> over par</p>
				<p>Round completed in <strong><?php echo $data['scoresheet']['time'] ?></strong></p>
			</li>
		</ul>
	</div>
	
	<pre>
		<?php print_r($data); ?>
	</pre>
	<?php include 'views/_footernav.php'; ?>
</div>