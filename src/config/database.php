<?php
$host = getenv('DB_HOST');      // 'db' (matches compose service name)
$dbname = getenv('DB_NAME');    // 'task_manager'
$user = getenv('DB_USER');      // 'postgres'
$password = getenv('DB_PASSWORD'); // 'secret'
try{

    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
}
catch(PDOException $e){
    echo "Connection error: " . $e->getMessage();
}

?>