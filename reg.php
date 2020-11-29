<?php
  $login = filter_var(trim($_POST['login']),
  FILTER_SANITIZE_STRING);
  $password = md5(filter_var(trim($_POST['password']),
  FILTER_SANITIZE_STRING)."zalupkaMorja228");
  $email = filter_var(trim($_POST['mail']),
  FILTER_SANITIZE_STRING);

  if (mb_strlen($login) < 5 || mb_strlen($login) > 32) {
    echo "Недопустимая длина логина";
    exit();
  } elseif ((mb_strlen($password) < 8 || mb_strlen($login) > 32)) {
    echo "Недопустимая длина пароля";
    exit();
  }

  $mysql = new mysqli('localhost','u1225152_admin','10151018Kama','u1225152_unitydb');
  $mysql->query("INSERT INTO `users` (`login`,`email`,`password`) VALUES('$login','$email','$password')");
  $mysql->close();

  header("Location: index.html");
  die();
  ?>