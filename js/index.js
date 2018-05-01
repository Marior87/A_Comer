
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




