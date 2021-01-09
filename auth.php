<?php
// Подключение к бд, надо поменять host и проверить dbname
require('base.php');

$auth_data = ['email' => 'krab@gmail.com', 'password' => 'qwerty12345']; // тут данные с формы авторизации
$pr = $db->prepare('SELECT * FROM `users` WHERE `email` = ?');
$pr->execute([$auth_data['email']]);
$user = $pr->fetchAll();
if ($user === []) {
    die('Неверная почта или пароль');
}
if ($user[0]['password'] !== $auth_data['password']){
    die('Неверная почта или пароль');
}

// нужно ещё установить куки