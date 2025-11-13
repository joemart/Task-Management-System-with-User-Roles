<?php

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/models/Register.php';

$database = Database::getInstance();
$db = $database->getConnection();


$register = new Register($db);
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    echo $username;
    // $register->register()
}