<?php

  include 'data.php';

  session_start();
  if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    print_r($_POST);
    printf("name: %s\n email: %s \npassword: %s ", $name, $email, $password);
    
    $sql = $conn->prepare('SELECT COUNT(*) FROM users WHERE email=?');
    $sql->execute([$email]);
    $res = $sql->fetchColumn();
    printf($res);
    if ($res > 0) {
      echo ("TAKEN B*TCH");
    }
    else {
        $sql = $conn->prepare('INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password);');
        $sql->bindParam(':name', $name);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':password', $password);
        $sql->execute();
      }    
    //   add to DB
  }
?>