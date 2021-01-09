<?php

require('base.php');
// тут данные с формы регистрации

$form_data = $_POST;
$err = false;
// Вывод на страницу для отладки
// Проверка логина
if (trim($form_data['login']) === '') {
    $err = true;
    echo '0n';
}
if (iconv_strlen(trim($form_data['login'])) < 6) {
    $err = true;
    echo '1n';
}

// Проверка пароля
if (trim($form_data['password']) === '') {
    $err = true;
    echo '2n';
}
if (!ctype_alnum($form_data['password'])) {
    $err = true;
    echo '3n';
}
if (iconv_strlen($form_data['password']) < 8) {
    $err = true;
    echo '4n';
}
if ($form_data['password'] !== $form_data['password_repeat']) {
    $err = true;
    echo '5n';
}

// Проверка эл. почты
if (trim($form_data['email']) === '') {
    $err = true;
    echo '6n';
}
if (filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
    $err = true;
    echo '7n';
}

// Проверка имени
if (trim($form_data['name']) === '') {
    $err = true;
    echo '8n';
}
if (iconv_strlen(trim($form_data['name'])) > 16) {
    $err = true;
    echo '9n';
}

// Проверка фамилии
if (trim($form_data['surname']) === '') {
    $err = true;
    echo '10n';
}
if (iconv_strlen(trim($form_data['surname'])) > 16) {
    $err = true;
    echo '11n';
}

// Проверка адреса
if (trim($form_data['address']) === '') {
    $err = true;
    echo '12n';
}
if (iconv_strlen(trim($form_data['address'])) > 100) {
    $err = true;
    echo '13n';
}

// Проверка почтового индекса
if (trim($form_data['postcode']) === '') {
    $err = true;
    echo '14n';
}
if (iconv_strlen(trim($form_data['postcode'])) > 20) {
    $err = true;
    echo '15n';
}

// Проверка, что аккаунта с такой эл почтой не существует
$pr = $db->prepare('SELECT * FROM `users` WHERE `email` = ?');
$pr->execute([$form_data['email']]);
if ($pr->fetchAll() !== []){
    $err = true;
    echo '16';
}




// Если ошибок нет генерируем код, хешируем его и отправляем в json как ответ, проверяем, что такого кода нет , также отправляем письмо с кодом на почту.
if (!$err) {
    $code = generateRandomString();
    while (true) {
        $pr = $db->prepare("SELECT * FROM `users` WHERE `code` = ?");
        $pr->execute([$code]);
        if ($pr->fetchAll() === []){
            break;
        } else {
            $code = generateRandomString();
        }
    }
    mail($form_data['email'], 'Rotor.pro', $code);
    $code = hash('sha256', $code);
    $a = ['false', $code];
    echo json_encode($a);
    // Записываем в бд данные, confirmation = 'false'
    $pr = $db->prepare("INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `surname`, `address`, `postcode`, `confirmation`) 
VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, '0', ?)");
    $pr->execute([htmlspecialchars($form_data['login']), hash('sha256', $form_data['password']), htmlspecialchars($form_data['email']),
        htmlspecialchars($form_data['name']), htmlspecialchars($form_data['surname']), htmlspecialchars($form_data['address']),
        htmlspecialchars($form_data['postcode']), $code]);
}
?>
