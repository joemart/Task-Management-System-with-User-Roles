<?php 
namespace Login;

use Error;
use Exception;

if (session_status() === PHP_SESSION_NONE)
    session_start();

class Model {

    private $db;
    
    public function __construct($db){
        $this->db = $db;
    }

    public function findByUsername($user){
            $stmt = $this->db->prepare("SELECT * from users WHERE username = :user");
            $stmt->execute(["user" => $user]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

    public function findByEmail($email){
        $stmt = $this->db->prepare("SELECT * from users WHERE email = :email");
        $stmt->execute(["email" => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }


}