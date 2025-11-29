<?php
require_once BASE_PATH . "/validator/UserValidator.php";


class Register {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }



    public function addUser(string $username, string $name, string $email, string $hashed, string $role_id = "Regular User"){

        try{
            //Query

            $stmt = $this->db->prepare("INSERT INTO users 
            (username, name, email, password, role_id) 
            VALUES (:username, :name, :email, :password, :role_id)");
            
            //Execute query

             $stmt->execute([
                ':username' => $username,
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashed,
                ':role_id' => $role_id
            ]);
            
            header("Location: /");
            
        }  catch (PDOException $e){
            if($e->getCode() == "42710")
                $_SESSION["registration_errors"] = "Username already exists!";

            header("Location: /register");
            
        }
        exit;
    }
}