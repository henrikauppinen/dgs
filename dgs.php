<?php

error_reporting(E_ALL);
date_default_timezone_set('Europe/Helsinki');

header('Content-type:text/html;Charset=utf-8');

require_once 'models/db_model.php';
require_once 'controllers/controller.php';
require_once 'helper.php';

session_start();

if(!(isset($_SESSION['logged'])))
{
	require_once 'models/login_model.php';
	require_once 'controllers/login_controller.php';
	$dgs = new login_controller();
	
}
else {

	$controller = $_GET['p'];

	if($controller == '') {
		$controller = 'dgs';
	}

	require_once 'models/dgs_model.php';

	require_once "controllers/{$controller}_controller.php";
	
	$classname = $controller.'_controller';
	$app = new $classname();

}
