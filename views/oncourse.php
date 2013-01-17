<div data-role="header"> 
	<h1><?php echo $data['pagetitle'] ?></h1> 
</div>

<form method="post" action="index.php?p=oncourse&sid=9">
	<fieldset data-role="controlgroup">
		<legend>Score</legend>
	<?php

		foreach($data['score_select_list'] as $key => $sel) {
			?>
			<input type="radio" name="radio-choice" id="radio-choice-<?php echo $key ?>" value="choice-<?php echo $key ?>" />
	     	<label for="radio-choice-<?php echo $key ?>"><?php echo $sel ?></label>
			<?php
		}
	?>
	</fieldset>

	<input type="submit" value="Continue" />
	
</form>