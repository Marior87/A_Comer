const checkbox = document.getElementById('menu');
const navegador = document.getElementById('navegador');

checkbox.addEventListener('change', function(event) {
  if (event.target.checked) {
    navegador.style.transform = "translate(0%)";
      
  } else {
    navegador.style.transform = "translate(100%)";
  }
})



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











