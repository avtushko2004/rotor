<?php
$code = 'sS12Fg'; // код приходит с js

// Подключение к бд, надо поменять host и проверить dbname
$db = new PDO('mysql:dbname=rotor.pro;host=127.0.0.1:3306', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$user = $db->prepare("UPDATE `users` SET `confirmation` = '1', `code` = NULL WHERE `users`.`code` = ?");
$user->execute([$code]);
