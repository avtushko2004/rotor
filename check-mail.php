<?php
// Подключение к бд, надо поменять host и проверить dbname
require('base.php');
$code = $_GET['code']; // код приходит с js

$user = $db->prepare("SELECT `id` FROM `users` WHERE `code` = ?");
$user->execute([$code]);
$user = $user->fetchAll();

$len = rand(40, 60);
$s = generateRandomString($len);
$pr = $db->prepare("UPDATE `users` SET `secret` = ?, `confirmation` = '1', `code` = NULL WHERE `users`.`code` = ?");
$pr->execute([$s, $code]);

// нужно ещё установить куки
$arr = [$user[0]['id'], $s];
echo json_encode($arr);
