<?php

class controller {
	
	public function view ($view, $data = null)
	{
		# detect ajax and add content accordingly
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			include "views/{$view}.php";
		}
		else {
			include "views/_header.php";
			include "views/{$view}.php";
			include "views/_footer.php";
		}
	}

	public function load($view, $data = null)
	{
		include "views/json_{$view}.php";
	}
}