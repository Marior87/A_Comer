/*var json =  [{
    nombre: 'Mi Ternerita Norte',
    tipo: 'Churrasqueria, Tex-mex',
    precio: 4,
    img: 'img/paginaPrincipal/Steak.png',
    tipoRestaurante: 1
},
{
    nombre: 'Bon Burger',
    tipo: 'Hamburguesas',
    precio: 4,
    img: 'img/paginaPrincipal/Rest1.jpg',
    tipoRestaurante: 2 //Comida Rapida = 2
},
{
    nombre: 'Gula Coffee & Bistro',
    tipo: 'Cafe, Bistro',
    precio: 3,
    img: 'img/paginaPrincipal/Gula.png',
    tipoRestaurante: 3 //Cafe y Postres = 3
},
{
    nombre: 'Cuenta Trez',
    tipo: 'Bar, Pizzeria',
    precio: 3,
    img: 'img/paginaPrincipal/Rest2.jpg',
    tipoRestaurante: 1 //Restaurante Fancy = 1
},
{
    nombre: 'Super Arepa',
    tipo: 'Comida Rápida, Arepa',
    precio: 2,
    img: 'img/paginaPrincipal/superArepa.png',
    tipoRestaurante: 2
}
]*/


var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    var json = JSON.parse(this.response);
                    let app1 = new Vue({
                        el: '#app-1',
                        data: {
                            mejoresRestaurantes:   json
                            },
                        methods: {
                            newWindow: function(){
                                window.open('./../restaurante.html')
                            }
                        }

                    })
                    let app2 = new Vue({
                        el: "#app-2",
                        data: {
                            mejoresRestaurantes: json
                        },
                        methods: {
                            newWindow: function(){
                                window.open('./../restaurante.html')
                            }
                        }
                    })
                    let app3 = new Vue({
                        el: "#app-3",
                        data: {
                            mejoresRestaurantes: json
                        },
                        methods: {
                            newWindow: function(){
                                window.open('./../restaurante.html')
                            }
                        }
                    })
                }
        };

xhr.open("GET", "restaurantes.php", true);
xhr.send();











