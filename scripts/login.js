const blurPage = (props) => {
    const login = document.getElementById('login');
    const main = document.getElementsByTagName('main')[0];
    const header = document.getElementsByTagName('header')[0];
    const body = document.getElementsByTagName('body')[0];
    if (props) {
        login.classList.toggle('displayWindow');
        main.classList.toggle('blurWindow');
        header.classList.toggle('blurWindow');
        body.style.overflowY = "visible";
    }else{
        login.classList.toggle('displayWindow');
        main.classList.toggle('blurWindow');
        header.classList.toggle('blurWindow');
        body.style.overflowY = "hidden";
    }
}
const useLoader = (none, block, time) =>{
    document.getElementsByClassName(none)[0].style.display = "none";
    document.getElementsByClassName('lds-ring')[0].style.display = "block";
    setTimeout(function() {
        document.getElementsByClassName('lds-ring')[0].style.display = "none";
        document.getElementsByClassName(block)[0].style.display = "block";
    }, time);
}
function authMake(){
    document.getElementById('reg-form').style.display = "none";
    document.getElementById('auth-form').style.display = "flex";
    document.getElementById('submit-btn').innerText = "Войти";
    document.getElementById('go-auth').style.display = "none";
    document.getElementById('go-reg').style.display = "block";
}
function regMake(){
    document.getElementById('reg-form').style.display = "block";
    document.getElementById('auth-form').style.display = "none";
    document.getElementById('submit-btn').innerText = "Зарегистрироваться";
    document.getElementById('go-auth').style.display = "block";
    document.getElementById('go-reg').style.display = "none";
}