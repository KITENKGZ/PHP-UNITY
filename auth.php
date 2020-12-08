<?php

require "db.php";
// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

// Пользователь нажимает на кнопку "Авторизоваться" и код начинает выполняться
if(isset($data['do_login'])) { 

// Создаем массив для сбора ошибок
$errors = array();

// Проводим поиск пользователей в таблице users
$user = R::findOne('users', 'login = ?', array($data['login']));

if($user) {

 	// Если логин существует, тогда проверяем пароль
  if(password_verify($data['password'], $user->password)) {

 		// Все верно, пускаем пользователя
    $_SESSION['logged_user'] = $user;
    
 		// Редирект на главную страницу
    header('Location: index.php');

  } else {
    
    $errors[] = '123';

  }

  } else {
    $errors[] = 'Пользователь с таким логином не найден!';
  }
  

if(!empty($errors)) {
    header('Location: index.php?errors=1');
	}

}
  ?>