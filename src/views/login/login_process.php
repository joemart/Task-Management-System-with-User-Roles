<?php 

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/controllers/LoginController.php';
require_once BASE_PATH . "/validator/LoginValidator.php";


$database = Database::getInstance();
$db = $database->getConnection();
$login = new LoginController($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($login->isUser($username, $email) & $login->verifyPassword($password)){
        
        $login->login();
    }else{
        header("Location: /login");
        exit;
    }

}