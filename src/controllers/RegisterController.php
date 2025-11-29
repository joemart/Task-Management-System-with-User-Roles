<?php

require_once BASE_PATH . "models/Register.php";
require_once BASE_PATH . "validator/UserValidator.php";

class RegisterController{

    private $registerModel;

    public function __construct($db)
    {
        $this->registerModel = new Register($db);
    }

    public function confirmPassword (string $password, string $confirmPassword){
    
        if ($password !== $confirmPassword)
        {
            $_SESSION["registration_errors"] = "Passwords mismatch!";
            return false;
        }
        return true;                    
    }

    public function register($username, $name, $email, $password, $confirmPassword){
            
            //Flush errors
            Validator::flush_errors();

            //Validate Confirm passwords
            if (!(Validator::validate_all($username, $name, $email, $password) & $this->confirmPassword($password, $confirmPassword)))
                {
                    // var_dump("Not valid");
                    // die();
                    header("Location: /register");
                    exit;
                }

            //Sanitize
            Validator::sanitize_all($username, $email, $name, $password);
            
            //hashed password
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            
            
            $this->registerModel->addUser($username, $name, $email, $hashed);
    }

}