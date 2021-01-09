const reg = () => {

    const codes = ['Введите логин', 'Длина логина должна быть не менее 6 символов', 'Введите пароль',  'Пароль может содержать только цифры и буквы латинского алфавита', 'Пароль должен содержать не менее 8 символов', 'Пароли не совпадают',  'Введите email', 'Введите корректный email', 'Введите имя', 'Длина имени не должна быть более 16 символов', 'Введите фамилию', 'Длина фамилии не должна быть более 16 символов',  'Введите адрес', 'Длина адреса на должна быть более 100 символов', 'Введите почтовый индекс', 'Длина почтового индекса не должна быть более 20 символов',  'Аккаунт с таким email уже существует'];
    const login = document.getElementsByName('login')[0].value;
    const email = document.getElementsByName('email')[0].value;
    const name = document.getElementsByName('name')[0].value;
    const surname = document.getElementsByName('surname')[0].value;
    const password = document.getElementsByName('password')[0].value;
    const password_repeat = document.getElementsByName('password_repeat')[0].value;
    const adres = document.getElementsByName('adres')[0].value;
    const postcode = document.getElementsByName('postcode')[0].value;

    const xhr = new XMLHttpRequest();
    const request = `login=${login}&email=${email}&name=${name}&surname=${surname}&password=${password}&password_repeat=${password_repeat}&adres=${adres}&postcode=${postcode}`;
    xhr.open("POST", './register.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
           let res = xhr.responseText;
           res = res.split("n");
           for(i in res){
               console.log(codes[i] + '\n');
           }
        }
    }
    xhr.send(request);
}