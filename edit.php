<?php

require "db.php";
// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

if(isset($data['do_edit'])) {

	$errors = array();

	// Проводим проверки
        // trim — удаляет пробелы (или другие символы) из начала и конца строки
	if($data['password'] == '') {
		$errors[] = "Введите пароль";
	}

         // функция mb_strlen - получает длину строки
	if(mb_strlen($data['login']) < 4 || mb_strlen($data['login']) > 12) {
			$errors[] = "Недопустимая длина логина";
    }

	// Проверка на уникальность логина
	if((array($data['login']) && R::count('users', "login = ?", array($data['login'])) > 0) {

		$errors[] = "Пользователь с таким логином существует!";
  }

  if(password_verify($data['password'], $user->password)) {

    // Все верно, пускаем пользователя
  $_SESSION['logged_user'] = $user;
  
    // Редирект на главную страницу
  header('Location: index.php');

	} else {
  
  $errors[] = 'Пароль неверно введен!';

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
        echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';

	} else {
                // array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент. 
		echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';
	}
}
  ?>