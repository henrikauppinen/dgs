<?php

class login_model {

	public function __construct()
	{
		$this->db = new db_model();
	}

	public function login($email, $passwd, $token)
	{
		if($email == '' OR $passwd == '' OR $token == '') {
			return array('status' => false, 'message' => 'System error');
		}

		$re = $this->db->query("SELECT * FROM user WHERE email = '{$email}'");

		if(mysql_num_rows($re) == 0) {
			return array('status' => false, 'message' => 'Email account not found');
		}

		$userdata = mysql_fetch_assoc($re);

		if($userdata['passwd'] == md5($passwd)) {

			$sid = session_id();

			$_SESSION['logged'] = 'true';

			$re = $this->db->query("UPDATE user SET session = '{$sid}', token = '{$token}', lastlogin = now() WHERE id = {$userdata['id']}");

			return array('status' => true, 'message' => 'Login ok');

		}
		else {
			return array('status' => false, 'message' => 'Wrong password '.$userdata['passwd'].'/'.md5($passwd));
		}
	}

	public function logout()
	{
		# code...
	}

	public function createAccount($email, $passwd, $name = '')
	{

		if($passwd == '' OR $email == '') {
			return array('status' => false, 'message' => 'System error');
		}

		$passwd = md5($passwd);

		# check if user exists
		$re = $this->db->query("SELECT id FROM user WHERE email = '{$email}'");
		
		if(mysql_num_rows($re) > 0) {
			return array('status' => false, 'message' => 'Email already exists! Did you forgot your password?');
		}		

		$qu = "INSERT INTO user (name, passwd, email) VALUES ('{$name}', '{$passwd}', '{$email}')";

		$re = $this->db->query($qu);

		return array('status' => true);
	}

} 