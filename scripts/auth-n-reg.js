let popup = document.querySelector(".popup");
let  accountButton = document.querySelector(".liked-img");

accountButton.addEventListener("click", function(){popupMaker();});

function popupMaker(){
    console.log("антон рак");
    popup.style.display = "block";
}

