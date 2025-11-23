<?php 

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/models/Login.php';
require_once BASE_PATH . "/validator/LoginValidator.php";

use Login\Model;

$database = Database::getInstance();
$db = $database->getConnection();
$login = new Model($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($login->isUser($username, $email)){
        
        $login->login();
    }

}