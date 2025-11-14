<?php

require __DIR__ . "/config/constants.php";
require BASE_PATH . "/includes/functions.php";
require "./config/database.php";

require "./includes/router.php";

session_start();


$router = new Router();
$router->route($_SERVER["REQUEST_URI"]);

