<?php

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/models/Register.php';
require_once BASE_PATH . "/validator/UserValidator.php";

$database = Database::getInstance();
$db = $database->getConnection();
$register = new Register($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    Validator::flush_errors();
    $register->register($username, $name, $email, $password);

}

