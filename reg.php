<?php

require "db.php";
// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

// Пользователь нажимает на кнопку "Зарегистрировать" и код начинает выполняться
if(isset($data['do_signup'])) {

        // Регистрируем
        // Создаем массив для сбора ошибок
	$errors = array();

	// Проводим проверки
        // trim — удаляет пробелы (или другие символы) из начала и конца строки
	if(trim($data['login']) == '') {
		header('Location: index.php?error=8');
	} else if(trim($data['email']) == '') {
		header('Location: index.php?error=7');
	} else if($data['password'] == '') {
		header('Location: index.php?error=6');
	} else if(mb_strlen($data['login']) < 4 || mb_strlen($data['login']) > 12) {
	  header('Location: index.php?error=5');
	} else if (mb_strlen($data['password']) < 8 || mb_strlen($data['password']) > 32){
		header('Location: index.php?error=4');
  } else if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {
		header('Location: index.php?error=3');
	} else if(R::count('users', "login = ?", array($data['login'])) > 0) {
		header('Location: index.php?error=2');
	} else if(R::count('users', "email = ?", array($data['email'])) > 0) {
		header('Location: index.php?error=1');
	} else if(empty($errors)) {
		$user = R::dispense('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);
		header('Location: index.php');
		$_SESSION['logged_user'] = $user;
	} else {
		//header('Location: index.php?error=404');
	}
}
  ?>