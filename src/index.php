<?php

require __DIR__ . "/config/constants.php";
require BASE_PATH . "/includes/functions.php";
require "./config/database.php";
require_once BASE_PATH . "/controllers/UserAuthenticationController.php";

$user = new UserAuthController($db);
$user->add();


