<?php
session_start();

    if (isset($_SESSION['nombre'])){
        $usuario = $_SESSION['nombre'];
        setcookie('nombreUsuario',$usuario,time()+86400,'/');
    }

    if($_SESSION['rol']!='administrador'){
        header("Location: paginaPrincipal.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión de Administrador</title>
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
                <li class="menuItem"><a href="paginaPrincipal.html" class="menuLink2">Regresar a Inicio</a></li>
                <div class="loginWrapper">
                    <?php 
                        echo ('
                        <li class="menuItem"><a href="opciones.php" class="menuLink">Hola '.htmlentities($_SESSION['nombre']).'</a></li>
                        <li class="menuItem"><a href="cerrarSesion.php" class="menuLink">Cerrar Sesión</a></li>');
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="contenedorBusqueda">
            <div class="busquedaWrapper">

                <?php

                include_once('conexion.php');
                $query = "SELECT * FROM usuarios";
                $queryBuscar = $mysqli->query($query);

                if ($queryBuscar) {
                echo '<table>

            <th>id_usuario</th><th>Usuario</th><th>Correo</th><th>Contraseña</th><th>Nombre</th><th>Apellido</th><th>Direccion</th><th>Edad</th><th>Sexo</th><th>Rol</th><th>Estado</th>';

        while($fila = mysqli_fetch_array($queryBuscar)){
            
        $id_ = $fila['id_usuario'];
        $usuario_ = $fila['usuario'];
        $correo_ = $fila['correo'];
        $contrasena_ = $fila['contrasena'];
        $nombre_ = $fila['nombre'];
        $apellido_ = $fila['apellido'];
        $direccion_ = $fila['direccion'];
        $edad_ = $fila['edad'];
        $id_sexo_ = $fila['id_sexo'];
        $id_rol_ = $fila['id_rol'];
        $id_estado_ = $fila['id_estado'];

        if ($id_estado_ == 1){
            $estado = 'Activo';
            $boton = 'Desactivar';
        } else {
            $estado = 'Inactivo';
            $boton = 'Activar';
        }

        if ($id_sexo_ == 1){
            $sexo = 'Mujer';
        } else {
            $sexo = 'Hombre';
        }

        if ($id_rol_ == 1){
            $rol = 'Cliente';
        } else {
            $rol = 'Administrador';
        }

                echo "<tr>
            <td>".$id_."</td><td>".$usuario_."</td><td>".$correo_."</td><td>".$contrasena_."</td><td>".$nombre_."</td><td>".$apellido_."</td><td>".$direccion_."</td><td>".$edad_."</td><td>".$sexo."</td><td>".$rol."</td><td>".$estado."</td><td><input type='button' value=$boton onclick='modificar(".$id_.",".$id_estado_.")'></td></tr>";

        }

            echo "<tr><input type='button' name='boton' value='Generar Reporte' onclick='reporte()'></tr>";
            }



                ?>




 
            </div>

    </div>


<script src="js/jquery.js"></script>
<script src="js/admin.js"></script>
</body>
</html>