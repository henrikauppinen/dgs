<?php

class login_controller extends controller {
	
	public function __construct()
	{
		
		$this->model = new login_model();

		$page = param('p');

		if($page == FALSE) {
			$page = 'login';
		}

		$this->$page();
	}

	public function login($email = '', $passwd = '')
	{
		$data['pagetitle'] = 'Login';

		if($email == '' && $passwd == '') {
			$email = param('email');
			$passwd = param('passwd');
		}

		if($email != '' && $passwd != '') {
			# check credentials

			$auth = $this->model->login($email, $passwd);

			if($auth['status'] == true) {
				header('Location: index.php?p=frontpage');
				die;
			}
			elseif($auth['status'] == false) {
				$data['message'] = $auth['message'];
			}
		}

		$this->view('login', $data);
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