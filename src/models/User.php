<?php
require_once BASE_PATH . "/validator/UserValidator.php";
class User {
    
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //Get all from users
    public function getAll(){
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute([]);
        $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $fetch;
    }

    //Add user's username, email, password and role_id
    public function add($username, $name, $email, $password, $role_id = "Regular User"){
        
        try{
            
            Validator::validate_regexp("username", $username);
            Validator::validate_email($email);
            Validator::validate_regexp("name", $name);
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $this->db->prepare("INSERT INTO users 
            (username, name, email, password, role_id) 
            VALUES (:username, :name, :email, :password, :role_id)");
            
             $stmt->execute([
                ':username' => $username,
                ':name' => $name,
                ':email' => $email,
                ':password' => $hashed,
                ':role_id' => $role_id
            ]);
            
        }  catch (InvalidArgumentException $e){
            echo $e->getMessage();
        }     
        
}
}