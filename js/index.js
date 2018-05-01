
//////////////////////////////////////////////////////////////
var i = 0;
var pics = ["img/Maracaibo.jpg", "img/Caracas.jpg", "img/Margarita.jpg", "img/SanCristobal.jpg", "img/Barquisimeto.jpg"];
var imgFondo = document.getElementById('imgPortada');

function rotar() {
    imgFondo.src = pics[i];
    i = (i + 1) % pics.length;
}

setInterval(rotar, 3000);

var menu = document.getElementById('checkMenu');
var nav = document.getElementById('nav');

function mostrar(menu) {
    if (menu.checked){
        nav.style.transform = 'translateX(0%)';
    } else {
        nav.style.transform = 'translateX(100%)';
    }
}




