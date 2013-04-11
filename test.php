<?php
# test file

require_once 'models/db_model.php';
require_once 'controllers/controller.php';
require_once 'helper.php';

require_once 'models/dgs_model.php';

$db = new db_model();

$app = new dgs_model();

$data =  $app->getScoresheetData(36);

echo "<pre>";
print_r($data);
