const checkbox = document.getElementById('menu');
const navegador = document.getElementById('navegador');

checkbox.addEventListener('change', function(event) {
  if (event.target.checked) {
    navegador.style.transform = "translate(0%)";

  } else {
    navegador.style.transform = "translate(100%)";
  }
})
var json =  [{
    nombre: 'Mi Ternerita Norte',
    tipo: 'Churrasqueria, Tex-mex',
    precio: 4,
    estimadoPrecio: 3,
    img: 'img/paginaPrincipal/Rest1.jpg',
    tipoRestaurante: 1,
    descripcion: 'Mi Ternerita Norte se caracteriza por una excelente atención y excelentes platos. Tiene un menú variado desde platos como pollo capresa hasta hamburguesas. Este lugar también lo hace ser reconocido por sus gran ambiente nocturno.',
    direccion: 'Fuerzas Armadas con Av. 15 Delicias'
}]
let app1 = new Vue({
    el: '#app-1',
    data: {
        mejoresRestaurantes:   json,
        },
    methods: {
        newWindow: function(){
            window.open('../restaurante.html')
        }
    }

})
