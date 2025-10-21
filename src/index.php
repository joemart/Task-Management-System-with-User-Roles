<?php

require __DIR__ . "/config/constants.php";
require BASE_PATH . "/includes/functions.php";
require "./config/database.php";
require_once BASE_PATH . "/controllers/UserAuthenticationController.php";

require "./includes/router.php";
// dd($db);
// require "./views/home/index.view.php";

$router = new Router();
$router->route($_SERVER["REQUEST_URI"]);