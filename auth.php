<?php
// Подключение к бд, надо поменять host и проверить dbname
require('base.php');

$auth_data = json_decode(file_get_contents("php://input")); // тут данные с формы авторизации
$pr = $db->prepare('SELECT `id`, `secret` FROM `users` WHERE `email` = ?');
$pr->execute([$auth_data['email']]);
$user = $pr->fetchAll();
if ($user === []) {
    die('error');
}
if ($user[0]['password'] !== hash('sha256', $auth_data['password'])){
    die('error');
}

// нужно ещё установить куки
$arr = [$user[0]['id'], $user[0]['secret']];
echo json_encode($arr);