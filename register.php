<?php
if ($_POST !== []) {
    // тут данные с формы
    $form_data = $_POST;

    $err = [];

    // Проверка логина
    if (trim($form_data['login']) === '') {
        $err[] = 'Введите логин';
        echo 'Введите логин';
    }
    if (iconv_strlen(trim($form_data['login'])) < 6) {
        $err[] = 'Длина логина должна быть не менее 6 символов';
        echo 'Длина логина должна быть не менее 6 символов';
    }

    // Проверка пароля
    if (trim($form_data['password']) === '') {
        $err[] = 'Введите пароль';
        echo 'Введите пароль';
    }
    if (!ctype_alnum($form_data['password'])){
        $err[] = 'Пароль может содержать только цифры и буквы латинского алфавита';
        echo 'Пароль может содержать только цифры и буквы латинского алфавита';
    }
    if (iconv_strlen($form_data['password']) < 10) {
        $err[] = 'Пароль должен содержать не менее 10 символов';
        echo 'Пароль должен содержать не менее 10 символов';
    }
    if ($form_data['password'] !== $form_data['password_repeat']) {
        $err[] = 'Пароли не совпадают';
        echo 'Пароли не совпадают';
    }

    // Проверка эл. почты
    if (true) {

    }


} else {
    // ...
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
