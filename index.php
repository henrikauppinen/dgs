<?php

session_start();

require_once 'helper.php';
require_once 'models/db_model.php';
require_once 'models/login_model.php';
require_once 'controllers/controller.php';

if(!(isset($_SESSION['logged']))) {

	require_once 'controllers/login_controller.php';
	$dgs = new login_controller();
	die;
}


require_once 'models/dgs_model.php';
require_once 'controllers/dgs_controller.php';

$dgs = new dgs_controller();

?>