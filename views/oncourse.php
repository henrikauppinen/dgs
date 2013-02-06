<div data-role="page">
	<div data-role="header" data-theme="b" data-position="fixed"> 
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="#menupopup" data-rel="popup" data-icon="gear" class="ui-btn-right">Options</a>
	</div>

	<div data-role="popup" id="menupopup">
		<ul data-role="listview">
			<li><a href="#">End round</a></li>
			<li><a href="dgs.php?p=dgs&f=checkin">Change location</a></li>
			<li><a href="dgs.php?p=dgs&f=checkout" data-icon="gear" class="ui-btn-right">Check out</a></li>
		</ul>
	</div>

	<div class="ui-grid-c head_toolbar">
		<div class="ui-block-a"><span><b><?php echo $data['hole']['distance'] ?> m</b><br />DISTANCE</span></div>
		<div class="ui-block-b"><span><b><?php echo $data['holestats']['bestscore']; ?></b><br />BEST</span></div>
		<div class="ui-block-c"><span><b><?php echo $data['scoresheet']['totalscore']; ?></b><br />TOTAL</span></div>
		<div class="ui-block-d"><span><b><?php echo $data['scoresheet']['diffpar']; ?></b><br />PAR DIFF</span></div>
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