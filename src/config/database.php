<?php

class Database {
    private static $instance = null;
    private $connection;

    private $host;      // 'db' (matches compose service name)
    private $dbname;    // 'task_manager'
    private $user;      // 'postgres'
    private $password; // 'secret'

    private function __construct()
        {
                $this->host = getenv('DB_HOST');      // 'db' (matches compose service name)
                $this->dbname = getenv('DB_NAME');    // 'task_manager'
                $this->user = getenv('DB_USER');      // 'postgres'
                $this->password = getenv('DB_PASSWORD'); // 'secret'
            try{

            $this->connection = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
        
        }
        catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
}
        }

    function getConnection(){
        return $this->connection;
    }

    static function getInstance(){
        if(self::$instance == null)
            self::$instance = new Database();
        return self::$instance;
    }
}




?>