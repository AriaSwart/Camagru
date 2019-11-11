<?php

  include 'data.php';

  session_start();
  if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    $link = 'LINK';
    $veri = 'NO';
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
      try{
        $sql = $conn->prepare('INSERT INTO `users` (`name`, `email`, `password`, `verification`, `verified`) VALUES (:name, :email, :password, :verification, :verified)');
        echo 'here';
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
        
      }    
  }
?>