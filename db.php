<?php
// Подключаем библиотеку RedBeanPHP
require "libs/rb.php";

// Подключаемся к БД
R::setup( 'mysql:host=localhost;dbname=u1225152_unitydb',
        'root', 'root' );

// Проверка подключения к БД
if(!R::testConnection()) die('No DB connection!');

session_start(); // Создаем сессию для авторизации

?>