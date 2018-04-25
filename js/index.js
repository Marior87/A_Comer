var selector = document.getElementById("slct");
var contPrincipal = document.getElementById("principal");
function seleccion() {

switch(selector.selectedIndex) {
    case 0:
        contPrincipal.style.backgroundImage = "url('../img/Maracaibo.png')";
        break;
    case 1:
        contPrincipal.style.backgroundImage = "url('../img/Maracaibo.png')";
        break;
    case 2:
        contPrincipal.style.backgroundImage = "url('../img/Caracas.png')";
        break;
    case 3:
        contPrincipal.style.backgroundImage = "url('../img/SanCristobal.png')";
        break;
    case 4:
        contPrincipal.style.backgroundImage = "url('../img/Barquisimeto.png')";
        break;
    case 5:
        contPrincipal.style.backgroundImage = "url('../img/Margarita.png')";
        break;
    default:
        contPrincipal.style.backgroundImage = "url('../img/Maracaibo.png')";
        break;
}
}