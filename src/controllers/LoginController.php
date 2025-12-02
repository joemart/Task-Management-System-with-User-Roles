<?php

require_once BASE_PATH . "models/Login.php";

use Login\Model;

class LoginController {

    private $loginModel;
    private $user;

    public function __construct($db)
    {
        
        $this->loginModel = new Model($db);
        
    }

    public function isUser($user, $email){
        try{
            $this->flush_errors();

            if(isset($user)){
                $this->user = $this->loginModel->findByUsername($user);
                if($this->user) return true;
                throw new Exception("Could not find user with the name of ". $user);
            }
            if(isset($email)){
                $this->user = $this->loginModel->findByEmail($email);
                if($this->user) return true;
                throw new Exception("Could not find user with the email of ". $email);
            }

        }catch(Exception $e){
            $_SESSION["login_errors"] = $e->getMessage();
            header("Location: /login");
            exit;
        }

        return false;
    }


    public function verifyPassword(string $password){

        if(password_verify($password, $this->user["password"]))
            return true;

        $_SESSION["login_errors"] = password_verify($password, $this->user["password"]) ? "" : "Authentication failed";
        return false;

    }

        public function flush_errors(){
            $_SESSION["login_errors"] = null;
        }



        public function login(){
            foreach($this->user as $key=>$value){
                $_SESSION[$key] = $value;
            }

            header("Location: /");
            exit;
        }

        public function logout(){

            session_destroy();

            header("Location: /");
            exit;
        }
}