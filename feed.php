<?php

include 'data.php';

session_start();
if ($_SESSION == NULL)
    header ("location:/Camagru/login.php");
$name = $_SESSION['name'];

echo ("$name");

?>

<a href="signout.php">Logout</a>