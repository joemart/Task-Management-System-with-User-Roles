<?php

require __DIR__ . "/config/constants.php";
require BASE_PATH . "/includes/functions.php";
require "./config/database.php";
require_once BASE_PATH . "/controllers/UserAuthenticationController.php";

require "./includes/router.php";

$database = Database::getInstance();
$db = $database->getConnection();
// $user = new UserAuthController($db);
// $user->add("joemart", "joe", "asdfa@asdf.asd", 34234);
// $user->add("joemart", "joe", "asdfa@asdf.asd", 34234);

$router = new Router();
$router->route($_SERVER["REQUEST_URI"]);

