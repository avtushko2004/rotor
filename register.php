<?php
require('base.php');
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

if ($_POST !== []) {
    // тут данные с формы регистрации
    $form_data = $_POST;

    $err = false;
    // Вывод на страницу для отладки
    // Проверка логина
    if (trim($form_data['login']) === '') {
        $err = true;
        echo '0 ';
    }
    if (iconv_strlen(trim($form_data['login'])) < 6) {
        $err = true;
        echo '1 ';
    }

    // Проверка пароля
    if (trim($form_data['password']) === '') {
        $err = true;
        echo '2 ';
    }
    if (!ctype_alnum($form_data['password'])) {
        $err = true;
        echo '3 ';
    }
    if (iconv_strlen($form_data['password']) < 8) {
        $err = true;
        echo '4 ';
    }
    if ($form_data['password'] !== $form_data['password_repeat']) {
        $err = true;
        echo '5 ';
    }

    // Проверка эл. почты
    if (trim($form_data['email']) === '') {
        $err = true;
        echo '6 ';
    }
    if (filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
        $err = true;
        echo '7 ';
    }

    // Проверка имени
    if (trim($form_data['name']) === '') {
        $err = true;
        echo '8 ';
    }
    if (iconv_strlen(trim($form_data['name'])) > 16) {
        $err = true;
        echo '9 ';
    }

    // Проверка фамилии
    if (trim($form_data['surname']) === '') {
        $err = true;
        echo '10 ';
    }
    if (iconv_strlen(trim($form_data['surname'])) > 16) {
        $err = true;
        echo '11 ';
    }

    // Проверка адреса
    if (trim($form_data['address']) === '') {
        $err = true;
        echo '12 ';
    }
    if (iconv_strlen(trim($form_data['address'])) > 100) {
        $err = true;
        echo '13 ';
    }

    // Проверка почтового индекса
    if (trim($form_data['postcode']) === '') {
        $err = true;
        echo '14 ';
    }
    if (iconv_strlen(trim($form_data['postcode'])) > 20) {
        $err = true;
        echo '15 ';
    }

    // Проверка, что аккаунта с такой эл почтой не существует
    $pr = $db->prepare('SELECT * FROM `users` WHERE `email` = ?');
    $pr->execute([$form_data['email']]);
    if ($pr->fetchAll() !== []){
        $err = true;
        echo '16';
    }

}
// Если ошибок нет генерируем код, хешируем его и отправляем в json как ответ, также отправляем письмо с кодом на почту.
if (!$err) {
    $code = generateRandomString();
    mail($form_data['email'], 'Rotor.pro', $code);
    $code = hash('sha256', $code);
    $a = ['false', $code];
    echo json_encode($a);
    // Записываем в бд данные, confirmation = 'false'
    $pr = $db->prepare("INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `surname`, `address`, `postcode`, `confirmation`) 
VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, '0')");
    $pr->execute([htmlspecialchars($form_data['login']), hash('sha256', $form_data['password']), htmlspecialchars($form_data['email']),
        htmlspecialchars($form_data['name']), htmlspecialchars($form_data['surname']), htmlspecialchars($form_data['address']),
        htmlspecialchars($form_data['postcode'])]);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- логин пароль повторный пароль почта имя фамилия адрес индекс-->
<form method="post">
    <!-- лейблы к полям input сделай, Костя -->
    Логин
    <input type="text" name="login" value="" required><br/>
    Пароль (может содержать только цифры и буквы латинского алфавита)
    <input type="password" name="password" value="" required><br/>
    Повтор пароля
    <input type="password" name="password_repeat" value="" required><br/>
    Эл. почта
    <input type="email" name="email" value="" required><br/>
    Имя и фамилия
    <input type="text" name="name_and_surname" value="" required><br/>
    Адрес
    <input type="text" name="adres" value="" required><br/>
    Почтовый индекс
    <input type="text" name="postcode" value="" required><br/>
    <button type="submit" name="submit_button">Отправить</button>
</form>
</body>
</html>
