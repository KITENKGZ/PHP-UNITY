<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $password = md5(filter_var(trim($_POST['password']),
  FILTER_SANITIZE_STRING)."zalupkaMorja228");

  $mysql = new mysqli('localhost','u1225152_admin','10151018Kama','u1225152_unitydb');
  $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
  $user = $result->fetch_assoc();
  $mysql->close();
  if(count($user) == 0) {
    echo "Введены неверные данные";
    exit();
  }

  print_r($user);
  exit();

  header("Location: index.html");
  die();
  ?>