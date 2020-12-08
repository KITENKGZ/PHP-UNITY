<?php
function dump($what) {
	echo '<pre>';print_r($what);echo '</pre>';
}

require "db.php";
// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;
$user = R::load('users', ($_SESSION['logged_user']->id));

$errors = array();

if(isset($data['login'])) {
		if(!(mb_strlen($data['login']) < 3 || mb_strlen($data['login']) > 12) && !((array($data['login']) && R::count('users', "login = ?", array($data['login']))) > 0)) {
		$user->login = $data['login'];
		}
	}
if(isset($data['firstname'])) {
	if(!(mb_strlen($data['firstname']) < 1 || mb_strlen($data['firstname']) > 16)) {
	$user->firstname = $data['firstname'];
	}
}
if(isset($data['lastname'])) {
	if(!(mb_strlen($data['lastname']) < 2 || mb_strlen($data['lastname']) > 16)) {
	$user->lastname = $data['lastname'];
	}
}
if(isset($data['password'])) {
	if(!(mb_strlen($data['password']) < 8)) {
	$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
	}
}
if(isset($data['birthday'])) {
	$user->date = $data['birthday'];
}
if(isset($data['sex'])) {
	$user->sex = $data['sex'];
	}

  
	$uploaddir = 'avatar/';
	if( ! is_dir( $uploaddir ) ) mkdir( $uploaddir, 0777 );
	$files      = $_FILES; 
	$done_files = array();

	foreach( $files as $file ){
			$file_name = date("Y-m-d") . $file['name'];
			if( move_uploaded_file( $file['tmp_name'], "$uploaddir/$file_name" ) ){
					$done_files[] = realpath( "$uploaddir/$file_name" );
					$user->avatar = $uploaddir . $file_name;
			}
	}
	

R::store($user);

$_SESSION['logged_user'] = $user;

header('Location: profile.php');
?>