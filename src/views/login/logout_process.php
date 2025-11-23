<?php

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/models/Login.php';

use \Login\Model;



$database = Database::getInstance();
$db = $database->getConnection();
$logout = new Model($db);

$logout->logout();