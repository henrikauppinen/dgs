<div data-role="page">
	<div data-role="header" data-theme="b" data-position="fixed"> 
		<h1><?php echo $data['pagetitle'] ?></h1>
		<a href="?p=dgs&f=checkin" data-icon="gear" class="ui-btn-right">Options</a>
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