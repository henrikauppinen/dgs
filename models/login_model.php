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
			$_SESSION['uid'] = $userdata['id'];
			$_SESSION['email'] = $userdata['email'];
			$_SESSION['dispname'] = 'Nimi';

			$re = $this->db->query("UPDATE user SET session = '{$sid}', token = '{$token}', lastlogin = now() WHERE id = {$userdata['id']}");

			return array('status' => true, 'message' => 'Login ok');

		}
		else {
			return array('status' => false, 'message' => 'Wrong password!');
		}
	}

	public function logout()
	{
		$_SESSION = array();

		// Finally, destroy the session.
		session_destroy();

		header('Location: dgs.php?p=login');
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

	public function findSession($token, $session_id)
	{
		$re = $this->db->query("SELECT session FROM user WHERE token = '{$token}'");

		if(mysql_num_rows($re) == 0) {
			return false;
		}

		$row = mysql_fetch_assoc($re);

		
	}

} 