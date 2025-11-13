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



/*

2. Singleton Pattern (Recommended)
Database.php

php
<?php
class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        try {
            $this->connection = new PDO(
                "mysql:host=localhost;dbname=mydatabase", 
                "username", 
                "password"
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    // Prevent cloning and unserializing
    private function __clone() { }
    public function __wakeup() { }
}
?>
Usage in any file:

php
<?php
require_once 'Database.php';

// Get database instance
$database = Database::getInstance();
$db = $database->getConnection();

// Use $db directly
$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
?>

*/



?>