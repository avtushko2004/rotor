<?php
// Подключение к бд
$host = "127.0.0.1:3306";
$dbname = "rotor.pro";
$username = "root";
$passwd = "root";
$db = new PDO("mysql:dbname=$dbname;host=$host", $username, $passwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);