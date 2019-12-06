<?php

include 'data.php';

session_start();
$USER_ID = $_SESSION['ID'];

$image = 0;

    if (isset($_POST['image'])) {
        //create new image entry
        try{
            $sql = $conn->prepare('INSERT INTO `images` (`owner`, `upload`) VALUES (:owner, :upload)');
            $sql->bindParam(':owner', $_SESSION['ID']);
            $sql->bindParam(':upload', DATE);
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