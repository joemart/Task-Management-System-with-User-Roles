<?php

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/controllers/RegisterController.php';
require_once BASE_PATH . "/validator/UserValidator.php";

$database = Database::getInstance();
$db = $database->getConnection();
$register = new RegisterController($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    Validator::flush_errors();
    $register->register($username, $name, $email, $password, $confirmPassword);

}

