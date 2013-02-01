<div data-role="page" id="frontpage">
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="dgs.php?p=dgs&f=checkin" data-role="button" class="ui-btn-right" data-icon="check">Check in</a>
	</div>

	<div data-role="content">

		<?php
		if(count($data['messages']) > 0) { 
			foreach($data['messages'] as $msg) { ?>
				<div>
					<ul data-role="listview" data-inset="true">
						<li>
							<a href="dgs.php?<?php echo $msg['href'] ?>">
								<p class="ui-li-aside ui-li-desc"><?php echo $msg['createtime'] ?></p>
								<p><?php echo $msg['content'] ?></p>

							</a>
						</li>
					</ul>
				</div>
			<?php }
		}
		?>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>