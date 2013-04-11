<div data-role="page" id="oncourse">
	<div data-role="header" data-theme="b" data-position="fixed">
		<a href="#menupopup" data-rel="popup" data-icon="gear" data-iconpos="notext">Options</a>
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="#right-panel" data-icon="info" data-iconpos="notext">Stats</a>
	</div>

	<div data-role="popup" id="menupopup">
		<ul data-role="listview">
			<li><a href="#">End round</a></li>
			<li><a href="dgs.php?p=dgs&f=checkin">Change location</a></li>
			<li><a href="dgs.php?p=dgs&f=checkout" data-icon="gear" class="ui-btn-right">Check out</a></li>
		</ul>
	</div>

	<div data-role="panel" data-position="right" data-display="push" id="right-panel" data-theme="b">
		<ul data-role="listview">
			<?php
			foreach($data['friends'] as $friend) {
				echo "<li>{$friend['name']} / {$friend['currentstatus']}</li>";
			}
			?>
		</ul>

		<a data-role="button" href="#oncourse" data-rel="close">Close panel</a>
	</div>
	
	<div class="ribbon">
		<div class="ui-grid-c">
			<div class="ui-block-a"><span><?php echo $data['hole']['distance'] ?></span><span>Dist</span></div>
			<div class="ui-block-b"><span><?php echo $data['holestats']['bestscore'] ?></span><span>best</span></div>
			<div class="ui-block-c"><span><?php echo $data['scoresheet']['totalscore'] ?></span><span>total</span></div>
			<div class="ui-block-d"><span><?php echo $data['scoresheet']['diffpar'] ?></span><span>par diff</span></div>
		</div>
	</div>

	<div data-role="content">
		<form method="post" action="dgs.php?p=dgs&f=oncourse">
			<fieldset data-role="controlgroup">
				<legend>Score</legend>
				<?php

				foreach($data['score_select'] as $sel) {
					if($data['hole']['par'] == $sel) {
						$highlight = 'data-theme="e"';
					}
					else {
						$highlight = '';
					}
					?>
					<input type="radio" name="score" id="radio-choice-<?php echo $sel ?>" value="<?php echo $sel ?>" <?php echo $highlight ?> />
					<label for="radio-choice-<?php echo $sel ?>"><?php echo $sel ?></label>
					<?php
				}
			?>
			</fieldset>

			<input type="submit" value="Continue" />
			<input type="hidden" name="hole" value="<?php echo $data['hole']['id'] ?>" />
			
		</form>
	</div>
	<?php include 'views/_footernav.php'; ?>
</div>