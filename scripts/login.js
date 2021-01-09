const blurPage = (props) => {
    const login = document.getElementById('login');
    const main = document.getElementsByTagName('main')[0];
    const header = document.getElementsByTagName('header')[0];
    body = document.getElementsByTagName('body')[0];
    let pageY = pageYOffset + window.screen.height/2.3;
    if (props) {
        login.classList.toggle('displayWindow');
        main.classList.toggle('blurWindow');
        header.classList.toggle('blurWindow');
        body.style.overflowY = "visible";
    }else{
        login.style.top = `${pageY}px`;
        login.classList.toggle('displayWindow');
        main.classList.toggle('blurWindow');
        header.classList.toggle('blurWindow');
        body.style.overflowY = "hidden";
    }
}
let regLabel = document.getElementById('reg-h1');
let authLabel = document.getElementById('auth-h1');
let regForm = document.getElementById('reg-form');
let authForm = document.getElementById('auth-form');
let regButton = document.getElementById('submit-btn');



function authMake(){
    console.log("антон рак");
    regLabel.classList.remove('disabled-h1');
    authLabel.classList.add('disabled-h1');
    regForm.classList.add('disabled-form');
    authForm.classList.remove('disabled-form');
    regButton.classList.add('auth-btn');
    regButton.classList.remove('reg-btn');
    regButton.innerText = "Войти";
}
function regMake(){
    console.log("антон рак");
    regLabel.classList.add('disabled-h1');
    authLabel.classList.remove('disabled-h1');
    regForm.classList.remove('disabled-form');
    authForm.classList.add('disabled-form');
    regButton.classList.remove('auth-btn');
    regButton.classList.add('reg-btn');
    regButton.innerText = "Зарегистрироваться";
}
