<?php

include 'data.php';

session_start();
$USER_ID = $_SESSION['ID'];

$image = 0;

    if (isset($_POST['image'])) {
        //create new image entry
        try{
            $sql = $conn->prepare('INSERT INTO `images` (`name`, `email`, `password`, `verification`, `verified`) VALUES (:name, :email, :password, :verification, :verified)');
            $sql->bindParam(':name', $name);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':password', $password);
            $sql->bindParam(':verification', $link);
            $sql->bindParam(':verified', $veri);
            $sql->execute();
        } 
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        $file = "img/image".$image.".png";
        file_put_contents($file, base64_decode($_POST['image']));
    }

?>