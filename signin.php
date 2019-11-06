<?php

  include 'data.php';

  session_start();
  if (isset($_POST)) {
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    $sql = $conn->prepare('SELECT `password` FROM users WHERE email=?');
    $sql->execute([$email]);
    print_r($sql);
    $res = $sql->fetchColumn();
    print_r($res);
    if ($res == $password) {
      $sql = $conn->prepare('SELECT `name` FROM users WHERE email=?');
      $sql->execute([$email]);
      $res = $sql->fetchColumn();
      echo ("Welcome back, $res");
    }
    else echo ("Email and password not found");
  }
?>