// * elementos del menu
var btn_menu_nav = document.getElementById("menu-nav");
var btn_menu_header = document.getElementById("menu-header");

// * EVENTOS DEL MENU, PARA MOSTRARLO Y OCULTARLO
btn_menu_header.addEventListener('click', function(){
    btn_menu_nav.classList.remove("menu--hide");
});

btn_menu_nav.addEventListener('click', function(){
    btn_menu_nav.classList.add("menu--hide");
});