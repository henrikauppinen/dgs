<?php

class api_controller extends controller {
	public function __construct()
	{

		$this->model = new dgs_model();
		
		#$page = param('f');

		#if($page == FALSE) {
		#	$page = 'frontpage';
		#}

		#$this->$page();
	}
}