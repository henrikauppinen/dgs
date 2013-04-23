<?php

# check if session exists

require_once 'config.php';
require_once 'models/db_model.php';

$db = new db_model();

$token = isset($_POST['token']) ? $_POST['token'] : false;

if($token != false) {

	$re = $db->query("SELECT session FROM user WHERE token = '{$token}'");

	if(mysql_num_rows($re) == 0) {
		echo "0";
		exit;
	}

	$row = mysql_fetch_assoc($re);

	session_id($row['session']);
	session_start();

	if(isset($_SESSION['logged'])) {
		
		$db->query("UPDATE user SET token = '{$row['session']}'");

		echo "{$row['session']}";
		exit;
	}
}

echo "0";
