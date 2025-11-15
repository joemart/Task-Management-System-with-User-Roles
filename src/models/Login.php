<?php 

namespace Login;

class Model {

    private $db;

    public function __construct($db){
        $this->$db = $db;
    }

    public function isUser($user){

        $stmt = $this->db->prepare("SELECT 1 from users WHERE name = :user");
        $inDB = $stmt->execute(["user" => $user]);
        return isset($inDB);
    }

}