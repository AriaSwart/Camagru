<?php
    $DB_HOST = 'localhost';
    $DB_PASSWORD = 'tr15tan';
    $DB_ROOT = 'root';
    $DB_NAME = 'test';
    
    try{
        $conn = new PDO("mysql:host=$DB_HOST", $DB_ROOT, $DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $conn->prepare("CREATE DATABASE IF NOT EXISTS test");
        $sql->execute();
        $conn->query("USE $DB_NAME");
        
        $sql = $conn->prepare('CREATE TABLE IF NOT EXISTS `users` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL UNIQUE,
            `password` VARCHAR(255) NOT NULL,
            `verification` VARCHAR(255),
            `verified` VARCHAR(255) NOT NULL
        )');
        $sql->execute();
        
        echo 'User table created';

        $sql = $conn->prepare('CREATE TABLE IF NOT EXISTS `images` (
            `id` INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `owner` INT NOT NULL,
            FOREIGN KEY (`owner`) REFERENCES `users`(`id`),
            `image` VARCHAR(255) NOT NULL,
            `upload` DATE)');
        $sql->execute();
        
        echo 'Image table created';

        $sql = $conn->prepare('CREATE TABLE IF NOT EXISTS `comments` (
            `id` INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `owner` INT NOT NULL,
            FOREIGN KEY (`owner`) REFERENCES `users`(`id`),
            `image` INT NOT NULL,
            FOREIGN KEY (`image`) REFERENCES `images`(`id`),
            `comment` VARCHAR(255) NOT NULL,
            `upload` DATE)');
        $sql->execute();
        
        echo 'Comment table created';
        
        $sql = $conn->prepare('CREATE TABLE IF NOT EXISTS `likes` (
            `id` INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `owner` INT NOT NULL,
            FOREIGN KEY (`owner`) REFERENCES `users`(`id`),
            `image` INT NOT NULL,
            FOREIGN KEY (`image`) REFERENCES `images`(`id`))');
        $sql->execute();
        
        echo 'Like table created';
        
    } 
    catch(PDOException $fish)
    {
        echo "Error: " . $fish->getMessage();
    }

?>