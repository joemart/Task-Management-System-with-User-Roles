<?php
require_once BASE_PATH . "/validator/UserValidator.php";

session_start();
class Register {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function userAvailable($user){
        $stmt = $this->db->prepare("SELECT ? FROM users");
        $stmt->execute([$user]);
        $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
        return isset($fetch);
    }

    public function register($username, $name, $email, $password, $role_id){
        
            //Validate

            Validator::validate_all($username, $name, $email, $password);
            
            //Sanitize
            Validator::sanitize_all($username, $email, $name, $password);

            //hashed password
            $hashed = password_hash($password, PASSWORD_DEFAULT);
        
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
            
        }  catch (PDOException $e){
            if($e->getCode() == "42710")
                throw new Exception("Username already exists!");
            
        } catch (Exception $e){

            //catch any errors
            $_SESSION["register_error"] = $e->getMessage();
        }
    }
}