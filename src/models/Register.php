<?php
require_once BASE_PATH . "/validator/UserValidator.php";


class Register {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }


    public function register(string $username, string $name, string $email, string $password, string $role_id = "Regular User"){
        
           


        try{
            
            //Flush errors
            Validator::flush_errors();

            //Validate
            Validator::validate_all($username, $name, $email, $password);

            //Sanitize
            Validator::sanitize_all($username, $email, $name, $password);

            //hashed password
            $hashed = password_hash($password, PASSWORD_DEFAULT);

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
                throw new Exception("Username already exists!");
        } catch (Exception $e){

            //catch any errors
            header("Location: /register");

        }
        exit;
    }
}