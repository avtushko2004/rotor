<?php
function generateRandomString($length = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

// Подключение к бд
$host = "127.0.0.1:3306";
$dbname = "rotor.pro";
$username = "root";
$passwd = "root";
$db = new PDO("mysql:dbname=$dbname;host=$host", $username, $passwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);