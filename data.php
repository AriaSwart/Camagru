<?php
    $DB_HOST = 'localhost';
    $DB_PASSWORD = 'tr15tan';
    $DB_ROOT = 'root';
    $DB_NAME = 'test';
    
    try{
    
        $conn = new PDO("mysql:host=$DB_HOST", $DB_ROOT, $DB_PASSWORD);
        $conn->query("USE $DB_NAME");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    
    
    
?>