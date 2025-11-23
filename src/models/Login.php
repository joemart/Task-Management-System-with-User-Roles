<?php 
namespace Login;

use Error;
use Exception;

if (session_status() === PHP_SESSION_NONE)
    session_start();

class Model {

    private $db;
    private $user;

    public function __construct($db){
        $this->db = $db;
    }


    //Add password verification

    public function isUser($user, $email){
        try{
            $this->flush_errors();

                    if(isset($user)){
                    $stmt = $this->db->prepare("SELECT * from users WHERE username = :user");
                    $stmt->execute(["user" => $user]);
                    $this->user = $stmt->fetch(\PDO::FETCH_ASSOC);
                    if($this->user) return true;
                    throw new Exception("Could not find user with the name of ". $user);
            }

                if(isset($email)){
                    $stmt = $this->db->prepare("SELECT * from users WHERE email = :email");
                    $stmt->execute(["email" => $email]);
                    $this->user = $stmt->fetch(\PDO::FETCH_ASSOC);
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

    public function flush_errors(){
        $_SESSION["login_errors"] = [];
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