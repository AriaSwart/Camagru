<?php

  include 'data.php';

  session_start();
  if (isset($_POST)) {
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    $sql = $conn->prepare('SELECT `password` FROM users WHERE email=?');
    $sql->execute([$email]);
    $res = $sql->fetchColumn();
    if ($res == $password) {
      $sql = $conn->prepare('SELECT `name` FROM users WHERE email=?');
      $sql->execute([$email]);
      $res = $sql->fetchColumn();
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $res;
      $sql = $conn->prepare('SELECT `ID` FROM users WHERE email=?');
      $sql->execute([$email]);
      $res = $sql->fetchColumn();
      $_SESSION['ID'] = $res;
      header('Location: /Camagru/feed.php');
    }
    else echo ("Email and password not found");
    header("refresh:5; url=/Camagru/login.php");
  }
?>