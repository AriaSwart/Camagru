<?php

  include 'data.php';

  session_start();
  if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    $sql = $conn->prepare('SELECT `password` FROM users WHERE email=?');
    $sql->execute([$email]);
    print_r($sql);
    $res = $sql->fetchColumn();
    print_r($res);
    if ($res == $password) {
      echo ("Well, well, welcome back");
    }
    else echo ("Email and password not found");
  }
?>