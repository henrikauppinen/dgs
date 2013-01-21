<?php

function param($name)
{
	if(isset($_GET[$name])) {
		return mysql_real_escape_string($_GET[$name]);
	}
	elseif(isset($_POST[$name])) {
		return mysql_real_escape_string($_POST[$name]);
	}
	else {
		return null;
	}
}
