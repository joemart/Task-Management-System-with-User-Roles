<?php

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/controllers/LoginController.php';

$database = Database::getInstance();
$db = $database->getConnection();
$logout = new LoginController($db);

$logout->logout();