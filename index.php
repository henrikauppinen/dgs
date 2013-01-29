<?php

header('Content-type:text/html;Charset=utf-8');

require_once 'models/db_model.php';
require_once 'models/login_model.php';
require_once 'controllers/controller.php';
require_once 'helper.php';

session_start();

if(!(isset($_SESSION['logged'])))
{
	require_once 'controllers/login_controller.php';
	$dgs = new login_controller();
}
else
{
	require_once 'models/dgs_model.php';
	require_once 'controllers/dgs_controller.php';

	$dgs = new dgs_controller();
}