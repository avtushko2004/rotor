//скрол хуеадер
let center_nav = document.querySelector('.nav-cont');
let header = document.querySelector('.page-header');


let position = 0;
        window.addEventListener('scroll', function() {
             if (pageYOffset != 0) {
                 if (pageYOffset < 300) {
                    header.style.height = "9%";
                    header.style.backgroundColor = "var(--header-not-scrolled)";
                 }else{
                    position= pageYOffset;
                    header.style.backgroundColor = "var(--header-scrolled)";
                    header.style.height = "9%";
                 }
             }else{
                header.style.backgroundColor = "var(--header-not-scrolled)";
                header.style.height = "9%";
             }
        })
