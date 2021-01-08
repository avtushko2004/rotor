<?php
$auth_data = ['email' => 'krab@gmail.com', 'password' => 'qwerty12345']; // тут данные с формы авторизации

// Подключение к бд, надо поменять host и проверить dbname
$db = new PDO('mysql:dbname=rotor.pro;host=127.0.0.1:3306', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$pr = $db->prepare('SELECT * FROM `users` WHERE `email` = ?');
$pr->execute([$auth_data['email']]);
$user = $pr->fetchAll();
if ($user === []) {
    die('Неверная почта или пароль');
}
if ($user[0]['password'] !== $auth_data['password']){
    die('Неверная почта или пароль');
}
