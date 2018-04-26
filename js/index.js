var selector = document.getElementById("slct");
var contPrincipal = document.getElementById("principal");
function seleccion(selector) {

switch(selector.selectedIndex) {
    case 0:
        contPrincipal.style.backgroundImage = "url('css/Maracaibo.png')";
        break;
    case 1:
        contPrincipal.style.backgroundImage = "url('css/Maracaibo.png')";
        break;
    case 2:
        contPrincipal.style.backgroundImage = "url(css/Caracas.png)";
        break;
    case 3:
        contPrincipal.style.backgroundImage = "url('css/SanCristobal.png')";
        break;
    case 4:
        contPrincipal.style.backgroundImage = "url('css/Barquisimeto.png')";
        break;
    case 5:
        contPrincipal.style.backgroundImage = "url('css/Margarita.png')";
        break;
    default:
        contPrincipal.style.backgroundImage = "url('Maracaibo.png')";
        break;
}
}
//////////////////////////////////////////////////////////////
var menu = document.getElementById('checkMenu');
var nav = document.getElementById('nav');

function mostrar(menu) {
    if (menu.checked){
        nav.style.transform = 'translateX(0%)';
    } else {
        nav.style.transform = 'translateX(100%)';
    }
}




