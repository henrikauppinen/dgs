<div data-role="page">
	<div data-role="header" data-theme="b" data-position="fixed"> 
		<h1>Course completed!</h1> 
	</div>
	<div data-role="content">
		<h2>Summary</h2>
		<ul data-role="listview" data-inset="true">
			<li>
				<p class="ui-li-aside ui-li-desc">23/1/2013 14:43</p>
				<h3>Total score</h3>
				<p><strong><?php echo $data['totalscore'] ?></strong> throws</p>
				<p><?php # echo $data['pardiff'] ?> <strong>20</strong> over par</p>
				<p>Round completed in <strong>46 minutes</strong></p>
			</li>
			<li>
				<h3>Your best</h3>
				<p><strong>35</strong> throws</p>
				<p>In 22/1/2013 12:18</p>
			</li>
			<li>
				<h3>Your best</h3>
				<p><strong>35</strong> throws</p>
				<p>In 22/1/2013 12:18</p>
			</li>
		</ul>
		<div>
			<a href="?p=poolarea" data-role="button">Close</a>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>