<?php

class login_controller extends controller {
	
	public function __construct()
	{
		
		$this->model = new login_model();

		$page = param('f');

		if(!(method_exists('login_controller', $page))) {
			$page = 'login';
		}

		if($page == false) {
			# default fallback
			$page = 'login';
		}

		$this->$page();
	}

	public function login($email = '', $passwd = '', $token = '')
	{
		$data['pagetitle'] = 'Login';
		$data['page'] = 'login';

		if($email == '' && $passwd == '' && $token == '') {
			$email = param('email');
			$passwd = param('passwd');
			$token = param('token');
		}

		if($email != '' && $passwd != '' && $token != '') {

			$auth = $this->model->login($email, $passwd, $token);

			if($auth['status'] == true) {
				header("Location: dgs.php?p=dgs&f=frontpage");
			}
			elseif($auth['status'] == false) {
				$data['message'] = $auth['message'];
			}
		}

		$this->view('login', $data);
	}

	public function checkSession($token = '')
	{
		if($token == '') {
			return false;
		}

		$auth = $this->model->findSession($token, session_id());

	}

	public function createaccount()
	{
		$data['pagetitle'] = 'Create Account';
		
		$func = param('task');

		if($func == 'create') {
			$email = param('email');
			$passwd = param('passwd');
			$display_name = param('name');

			$re = $this->model->createAccount($email, $passwd, $display_name);
			
			if($re['status'] == true) {
				$this->login($email, $passwd);
			}
		}

		$this->view('createaccount', $data);

	}
}