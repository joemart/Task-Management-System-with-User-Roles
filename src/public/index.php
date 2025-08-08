<?php
//global constants
require __DIR__ . "/../config/constants.php";
//database
require BASE_PATH . "./config/database.php";
//functions
require BASE_PATH . "./includes/functions.php";

require_once BASE_PATH . "/controllers/UserAuthenticationController.php";
$user = new UserAuthController($db);
$user->index();