const drag = (ev) => {
    ev.preventDefault();
}
const loadPage = () =>{
    document.getElementsByTagName('body')[0].classList.add('body');
}
document.addEventListener("DOMContentLoaded", loadPage);
