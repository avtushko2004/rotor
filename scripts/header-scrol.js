//скрол хуеадер
let center_nav = document.querySelector('.nav-cont');
let header = document.querySelector('.page-header');


let position = 0;
        window.addEventListener('scroll', function() {
             if (pageYOffset != 0) {
                 if (pageYOffset < 300) {
                    header.style.height = "12%";
                    header.style.backgroundColor = "rgba(16, 56, 84, 0)";
                 }else{
                    position= pageYOffset;
                    header.style.backgroundColor = "rgba(16, 56, 84, 0.7)";
                    header.style.height = "12%";
                 }
             }else{
                header.style.backgroundColor = "rgba(16, 56, 84, 0)";
                header.style.height = "12%";
             }
        })
