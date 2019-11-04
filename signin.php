<?php

  include 'data.php';

  session_start();
  if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    print_r($_POST);
    printf("name: %s\n email: %s \npassword: %s ", $name, $email, $password);
    
    $sql = $conn->prepare('SELECT `password` FROM users WHERE email=?');
    $sql->execute([$email]);
    $res = $sql->fetchColumn();
    printf($res);
    if ($res == $password) {
      echo ("Well, well, well... Welcome back");
    }
    else echo ("No luck");

    // else {
    //     $sql = $conn->prepare('INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password);');
    //     $sql->execute();
    //   }    
    //   add to DB
  }
?>