//скрол хуеадер
let center_nav = document.querySelector('.nav-cont');
let header = document.querySelector('.page-header');
window.addEventListener('scroll', function() {
         if (pageYOffset < 150) {
            header.style.height = "9%";
            header.style.backgroundColor = "var(--header-not-scrolled)";
         }else{
            position= pageYOffset;
            header.style.backgroundColor = "var(--header-scrolled)";
            header.style.height = "9%";
         }
},true);
