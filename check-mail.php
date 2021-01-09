<?php
// Подключение к бд, надо поменять host и проверить dbname
require('base.php');

$code = 'sS12Fg'; // код приходит с js
$user = $db->prepare("UPDATE `users` SET `confirmation` = '1', `code` = NULL WHERE `users`.`code` = ?");
$user->execute([$code]);

// нужно ещё установить куки