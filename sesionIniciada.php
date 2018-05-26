<?php

require 'inc/class-conexion.php';
session_start();

if($_SESSION['rol']!='cliente'){
    header("Location: paginaPrincipal.php");
}

$conexion = new BD();
$id_user  = $_SESSION['id_usuario']; //Esto debe venir de la sesion.

$user_active = $conexion->getDataUser($id_user);
$restaurantes_favoritos = $conexion->getFavoriteRestaurant($id_user);

$favoritos = unserialize($restaurantes_favoritos['restaurantes']);

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda Avanzada</title>
    <link rel="stylesheet" href="css/fonts/Fontastic/styles.css">
<link rel="stylesheet" href="css/sesionIniciada.css">
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
                <li class="menuItem"><a href="paginaPrincipal.php" class="menuLink2">Regresar a Inicio</a></li>
                <div class="loginWrapper">
                    <?php if (!isset($_SESSION['nombre'])){
                        echo ('

                        <li class="menuItem"><a href="inicioSesion.html" class="menuLink">Login</a></li>
                        <li class="menuItem"><a href="registro.html" class="menuLink">Regístrate</a></li>');

                    } else {

                        echo ('
                        <li class="menuItem"><a href="opciones.php" class="menuLink">Hola '.htmlentities($_SESSION['nombre']).'</a></li>
                        <li class="menuItem"><a href="cerrarSesion.php" class="menuLink">Cerrar Sesión</a></li>');

                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedorBusqueda">
            <div class="busquedaWrapper">
                <div class="wrapperUsuario" id="app-2">
                   <div v-for="user in usuario" class="divFlex">
                    <div class="contUsuario">
                        <h1 class="nombreUsuario"><?php echo $user_active['nombre'] ?> <span> </span> <?php echo $user_active['apellido'] ?></h1>
                        <div class="contInfo">
                        <p class="infoUsuario"><b>Edad: </b><?php echo $user_active['edad'] ?></p>
                        <p class="infoUsuario"><b>Sexo: </b><?php echo $_SESSION['sexo'] ?></p>
                        <p class="infoUsuario"><b>Direccion: </b><?php echo $user_active['direccion'] ?></p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="contH1">
                    <h1 class="infoH1">TUS RESTAURANTES FAVORITOS</h1>
                </div>
                <div class="wrapperRes"  id="app-1">
                <?php
                    if ($favoritos){
                        foreach ($favoritos  as $key => $id_restaurante) {
                            $restaurant = $conexion->getRestaunrant($id_restaurante);
                            //print_r($restaurant);
                            
                            $ruta = $restaurant["ruta_img"];
                            $nombre = mb_convert_encoding($restaurant["nombre"],'UTF-8','ASCII');
                            $tipo = mb_convert_encoding($restaurant["tipo"],'UTF-8','ASCII');
                            $precio = (int)$restaurant["categoria_precio"];

                            echo                        '<div v-for="res in mejoresRestaurantes" class="container2">
                            <div  class="wrapper3" v-on:click="newWindow(<?php echo $id_restaurante?>)">
                                <img src="'.$ruta.'" alt="" class="imgRes">
                                <h1 class="hRes">'.$nombre.'</h1>
                                <div class="contParrafo">
                                <p class="pRes">'.$tipo.'</p>
                                </div>
                            </div>
                        </div>';
                    } 
                    } else {
                        echo "Aun no tienes restaurantes agregados";

                    ?>



                    <?php
                  }
                 ?>
                   </div>
            </div>
    </div>
    <script src="https://unpkg.com/vue"></script>
    <script src="js/sesionIniciada.js"></script>
</body>
</html>
