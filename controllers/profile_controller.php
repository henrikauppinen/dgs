<?php

class profile_controller extends controller {
	
	public function __construct()
	{

		$this->model = new dgs_model();

		$page = param('f');

		if($page == false) {
			$page = 'profile';
		}

		$this->$page();
	}

	public function profile()
	{
		$data = $this->model->userinfo();
		$this->view('profile', $data);
	}

	public function settings()
	{
		$data = $this->model->userinfo();
		$this->view('profilesettings', $data);
	}

}