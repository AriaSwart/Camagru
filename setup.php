<?php
    $DB_HOST = 'localhost';
    $DB_PASSWORD = 'tr15tan';
    $DB_ROOT = 'root';
    $DB_NAME = 'test';
    
    try{
        $conn = new PDO("mysql:host=$DB_HOST", $DB_ROOT, $DB_PASSWORD);
        $conn->query("USE $DB_NAME");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $conn->prepare("CREATE DATABASE IF NOT EXISTS test");
        $sql->execute();
        
        $sql = $conn->prepare('CREATE TABLE IF NOT EXISTS `users` (
                 `id` INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 `name` VARCHAR(255) NOT NULL,
                 `email` VARCHAR(255) NOT NULL UNIQUE,
                 `password` VARCHAR(255) NOT NULL);');
        $sql->execute();
        
    } 
    catch(PDOException $fish)
    {
        echo "Error: " . $fish->getMessage();
    }

?>