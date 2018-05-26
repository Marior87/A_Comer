<?php
require 'inc/class-restaurant.php';


//Pass id restaurant for URL: example: restaurante.php?id=1

if(isset($_GET['id'])){
  $id = $_GET['id'];
}else {
  header("Location: /");
  die();
}

$restaurant =  new Restaurant();
$data_restaurant =  $restaurant->getDataRestaurant($id);
$is_favorite     =  $restaurant->isFavoriteforUser(2,$id);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Avanzada</title>
    <link rel="stylesheet" href="css/fonts/Fontastic/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/restaurante.css">
</head>
<body>
    <div class="navegadorWrapper">
        <div class="logoWrapper">
            <img src="img/logo.png" alt="" class="logo">
        </div>
        <div class="contMenu">
            <input type="checkbox" id="menu">
            <label for="menu" class="icon-bars"></label>
        </div>
        <div class="navegador" id="navegador">
            <div class="nav2">
                <li class="menuItem"><a href="paginaPrincipal.html" class="menuLink2">Regresar a Inicio</a></li>
                <div class="loginWrapper">
                    <li class="menuItem"><a href="inicioSesion.html" class="menuLink">Login</a></li>
                    <li class="menuItem"><a href="registro.html" class="menuLink">Regístrate</a></li>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedorBusqueda" id="app-1">
            <div class="busquedaWrapper" v-for="res in mejoresRestaurantes">
                <div class="contRestaurante">
                    <img src="<?php echo $data_restaurant['ruta_img']; ?>" alt="" class="imgRestaurante">
                </div>
                <div class="parrafoRestaurante">
                    <h1 class="nombreRest"><?php echo $data_restaurant['nombre']; ?></h1>
                    <p class="parrafoRest">
                        <p class="spanparr1"><b> Tipo: </b><?php echo $data_restaurant['tipo']; ?></p><br>
                        <p class="spanparr2"><b>Descripción: </b> <?php echo $data_restaurant['descripcion']; ?></p><br>
                        <p class="spanparr3"><b>Dirección:</b> <?php echo $data_restaurant['direccion']; ?></p><br>
                    <div class="dolar">
                        <span class="spanparr">
                               <div class="dolar">
                                   <div v-for="n in res.precio" >
                                        <span><b> $</b></span>
                                    </div>
                                </div>
                        </span>
                    </p>
                    <input value="true" type="checkbox" id="like" <?php echo $is_favorite; ?>/>
                      <label id="setLike" data-idres="<?php echo $data_restaurant['id_rest']; ?>" for="like">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path id="path" d="M12 21.35l-1.45-1.32c-5.15-4.67-8.55-7.75-8.55-11.53 0-3.08 2.42-5.5 5.5-5.5 1.74 0 3.41.81 4.5 2.09 1.09-1.28 2.76-2.09 4.5-2.09 3.08 0 5.5 2.42 5.5 5.5 0 3.78-3.4 6.86-8.55 11.54l-1.45 1.31z"/>
                        </svg>
                      </label>
                    </div>
            </div>
            </div>
    </div>
</body>
<script type="text/javascript">
  jQuery(document).ready(function($) {

    $('#setLike').click(function(event) {
      var favorite = 1;
      var id_rest  = $(this).data('idres');

      if( $('#like').prop('checked') ) {
          favorite = 0;
      }


      $.ajax({
        url: "favorite.php",
        type: "post",
        data: {
          favorite : favorite,
          id_rest  : id_rest,
        },
        dataType: "json"
      }).done(
        function(response){
          alert(response);
        }
        ).fail(
        function(error){

        }
      );



    });
  });
</script>
</html>
