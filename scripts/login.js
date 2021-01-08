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