<?php

try{
$userDB = new PDO("pgsql:host=db;dbname=task_manager", "reader_user", "readerpass",
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
}catch (PDOException $e)
{
    die("Connection failed: " . $e->getMessage());
}