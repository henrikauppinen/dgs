<?php

class controller {
	
	public function view ($view, $data = null)
	{
		#include "views/_header.php";
		include "views/{$view}.php";
		#include "views/_footer.php";
	}

	public function load($view, $data = null)
	{
		include "views/json_{$view}.php";
	}
}