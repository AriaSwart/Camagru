<?php

include 'data.php';

//retrieve ID from database    
$image = 0;

    if (isset($_POST['image'])) {
        $file = "image".$image.".png";
        file_put_contents($file, base64_decode($_POST['image']));
        $image++;
    }

?>