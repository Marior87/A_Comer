const checkbox = document.getElementById('menu');
const navegador = document.getElementById('navegador');

checkbox.addEventListener('change', function(event) {
  if (event.target.checked) {
    navegador.style.transform = "translate(0%)";
      
  } else {
    navegador.style.transform = "translate(120%)";
  }
})


var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
                if(this.readyState == 4 && this.status == 200) {
                    var json = JSON.parse(this.response);
                    let app1 = new Vue({
                        el: '#app-1',
                        data: {
                            mejoresRestaurantes:   json,
                            busqueda: '1'
                            },
                        methods: {
                            newWindow: function(id){
                                window.open('../A_Comer/restaurante.php?id='+id+'')
                            }
                        }

                    })
                    let app2 = new Vue({
                        el: "#app-2",
                        data: {
                            mejoresRestaurantes: json,
                            busqueda: '3'
                        },
                        methods: {
                            newWindow: function(id){
                                window.open('../A_Comer/restaurante.php?id='+id+'')
                            }
                        }
                    })
                }
            };

xhr.open("GET", "busquedaAvn.php", true);
xhr.send();