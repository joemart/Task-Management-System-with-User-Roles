<?php
require "./includes/config.php";


$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll();
$user = $stmt->fetch();
foreach($users as $user)
{
    echo "ID: {$user['id']}, Name: {$user['first']} {$user['last']}";
}

