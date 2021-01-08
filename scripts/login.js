const blurPage = () => {
    document.getElementById('login').classList.toggle('displayWindow');
    document.getElementsByTagName('main')[0].classList.toggle('blurWindow');
    document.getElementsByTagName('header')[0].classList.toggle('blurWindow');
    document.getElementsByTagName('body')[0].style.overflowY = "hidden";
}