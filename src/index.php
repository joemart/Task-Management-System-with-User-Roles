<?php
require "./db_connect.php";


$stmt = $userDB->query("SELECT * FROM users");
$users = $stmt->fetchAll();
$user = $stmt->fetch();
foreach($users as $user)
{
    echo "ID: {$user['id']}, Name: {$user['first']} {$user['last']}";
}

echo "\n";
echo "{$user['first']}";