var jsonRestFavoritos =  [{
    nombre: 'Mi Ternerita Norte',
    tipo: 'Churrasqueria, Tex-mex',
    precio: 4,
    estimadoPrecio: 3,
    img: 'img/paginaPrincipal/Rest1.jpg',
    tipoRestaurante: 1,
    descripcion: 'Mi Ternerita Norte se caracteriza por una excelente atención y excelentes platos. Tiene un menú variado desde platos como pollo capresa hasta hamburguesas. Este lugar también lo hace ser reconocido por sus gran ambiente nocturno.',
    direccion: 'Fuerzas Armadas con Av. 15 Delicias'
}]
var jsonUsuario =  [{
    nombre: 'Stefano',
    apellido: 'Lagattolla',
    edad: 22,
    sexo: 'masculino',
    direccion: 'Bella Vista con Santa Rita, Torre Europa 3'
}]
let app1 = new Vue({
    el: '#app-1',
    data: {
        mejoresRestaurantes:  jsonRestFavoritos,
        },
    methods: {
        newWindow: function(id){
            window.open('../restaurante.php?id='+id+'')
        }
    }

})
let app2 = new Vue({
    el: '#app-2',
    data: {
        usuario: jsonUsuario
    }
})
