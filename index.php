<?php
include "data.php";

session_start();
$name = $_SESSION['name'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Camagru</title>
    <link rel="stylesheet" href="css/cama.css">
</head>
<body>
    <div class="navbar ">
        <h1 style="text-align: center;">Camagru</h1>
        <a href="feed.php">Go to your feed</a>
        <strong style="text-align: right"><?php echo"$name"?></strong>
    </div>
    <div class="top-container">
        <video id="video">Stream unavailable</video>
    <br>
        <button id="photo-button" class="btn btn-dark">Take photo</button>
        <select id="photo-filter ">
            <option value="none">Normal</option>
            <option value="grayscale(100%)">Grayscale</option>
            <option value="sepia(100%)">Sepia</option>
            <option value="invert(100%)">Invert</option>
            <option value="hue(90deg)">Hue</option>
            <option value="blur(5px)">Blur </option>
            <option value="contrast(200%)">Contrast</option>
        </select>
        <button id="clear-button">Clear</button>
    <br>
        <canvas id="canvas" style="margin-top: 10px;"></canvas>
    </div>
    <div class="bottom-container">
        <div id="photos"></div>
    </div>
    <script src="js/cama.js"></script>
</body>
</html>