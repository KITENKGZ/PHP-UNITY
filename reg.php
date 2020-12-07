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
		$errors[] = 1;
		header('Location: index.php?error=8');
	}
	if(trim($data['email']) == '') {
		$errors[] = 1;
		header('Location: index.php?error=7');
	}
	if($data['password'] == '') {
		$errors[] = 1;
		header('Location: index.php?error=6');
	}

         // функция mb_strlen - получает длину строки
	if(mb_strlen($data['login']) < 4 || mb_strlen($data['login']) > 12) {
		$errors[] = 1;
	  header('Location: index.php?error=5');

    }

    if (mb_strlen($data['password']) < 8 || mb_strlen($data['password']) > 32){
		$errors[] = 1;
		header('Location: index.php?error=4');

    }

    // проверка на правильность написания Email
    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {
		$errors[] = 1;
		header('Location: index.php?error=3');
    
    }

	// Проверка на уникальность логина
	if(R::count('users', "login = ?", array($data['login'])) > 0) {
		$errors[] = 1;
		header('Location: index.php?error=2');
	}

	// Проверка на уникальность email
	if(R::count('users', "email = ?", array($data['email'])) > 0) {
		$errors[] = 1;
		header('Location: index.php?error=1');
	}


	if(empty($errors)) {

		// Все проверено, регистрируем
		// Создаем таблицу users
		$user = R::dispense('users');

    // добавляем в таблицу записи
		$user->login = $data['login'];
		$user->email = $data['email'];
		// Хешируем пароль
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);

		// Сохраняем таблицу
		R::store($user);
				header('Location: index.php');

	} else {
		header('Location: index.php?error=404');
	}
}
  ?>