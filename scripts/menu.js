let menu = document.querySelector(".main-product-menu");
let menuButton = document.querySelector(".menu-icon");

menuButton.addEventListener("mouseover",function(){
  menuOpener()
});
menu.addEventListener("mouseover",function(){menuOpener()});

function menuOpener(){
  console.log("Работает");
  menu.classList.add("display-block");
}
menu.addEventListener("mouseout", function(){
  deleteMenu()
});
document.querySelector('position-product-menu').addEventListener("mouseover")
function deleteMenu(){
  console.log("Я рак");
  menu.classList.remove("display-block");
}
