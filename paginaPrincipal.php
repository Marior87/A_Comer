<?php
session_start();

    if (isset($_SESSION['nombre'])){
        $usuario = $_SESSION['nombre'];
        setcookie('nombreUsuario',$usuario,time()+86400,'/');
    }

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<script src="js/jquery.js"></script>
<head>
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <title>A Comer!</title>
    <link rel="stylesheet" href="css/fonts/Fontastic/styles.css">
    <link rel="stylesheet" href="css/paginaPrincipal.css">
</head>
<body>

    <div class="navegadorWrapper">
        <div class="logoWrapper">
            <img src="img/paginaPrincipal/logoblanco.png" alt="" class="logo">
        </div>
         <div class="contMenu">
            <input type="checkbox" id="menu">
            <label for="menu" class="icon-bars"></label>
        </div>
        <div class="navegador" id="navegador">
            <nav class="nav2">
                <li class="menuItem"><a href="#inicio" class="menuLink">Inicio</a></li>
                <li class="menuItem"><a href="#nosotros" class="menuLink">Nosotros</a></li>
                <li class="menuItem"><a href="#busqueda" class="menuLink">Búsqueda</a></li>
                <li class="menuItem"><a href="#contacto" class="menuLink">Contacto</a></li>
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
            </nav>
        </div>
    </div>
     <div class="contenedorPortada" id="inicio">
        <img src="img/paginaPrincipal/portada1.png" alt="" class="imgPortada">
        <div class="conthPortada">
            <h1 class="headerPortada">A COMER!</h1>
            <p class="parrafoPortada">ELIGE TU RESTAURANTE</p>
        </div>
    </div>
    <div class="contNosotros" id="nosotros">
            <div class="contTexto">
                <h1 class="headerNosotros"><span>¿</span>QUIENES SOMOS<span>?</span></h1>
                <p class="parrafoNosotros"><span>A Comer!</span> Nace de la necesidad de las personas en medio de la ola de cafés y restaurantes en la ciudad por eso creamos un lugar para recomendar a dónde ir, pero que te mostrara las cosas en orden, lo que está cerca de ti y exactamente que vende.</p>
                <p class="parrafoNosotros">¿No te pasa que alguien te dice que quiere ir a comer y justo en ese momento se te olvida todo?<br> Bueno, ahí es donde entramos en acción, al iniciar en nuestra plataforma podrás ver los mejores lugares cerca de ti y usando los filtros podrás encontrar el lugar, con el ambiente y los precios que más se adapten a ti, porque sabemos lo que quieres y te ayudamos a encontrarlo, para que en cuestión de minituos te sientes <span>A Comer!</span></p>
            </div>
            <div class="contTexto">
                <img src="img/paginaPrincipal/Nosotros.png" alt="">
            </div>
    </div>
    <img class="imgBusqueda" src="img/paginaPrincipal/busqueda.png" alt="">
    <div class="contenedorBusqueda">
        <h1 class="headerBusqueda" id="busqueda">¿QUÉ QUIERES COMER?</h1>
        <a href="busqueda.php" class="avanzado">Búsqueda Avanzada</a>
    </div>
    <div class="contH1">
            <h1 class="infoH1">TOP RESTAURANTES<span>by A COMER!</span></h1>
    </div>
    <div class="wrapperRes"  id="app-1">
       <div v-for="res in mejoresRestaurantes" class="container2">
            <div  class="wrapper3" v-on:click="newWindow(res.id_rest)">
                <img v-bind:src="res.ruta_img" alt="" class="imgRes">
                <h1 class="hRes">{{ res.nombre }}</h1>
                <div class="contParrafo">
                <div v-for="n in parseInt(res.categoria_precio)">
                    <span><b>$</b></span>
                </div>
                <p class="pRes">{{ res.tipo }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="contH1">
            <h1 class="infoH1">TOP RESTAURANTES COMIDA RÁPIDA<span>by A COMER!</span></h1>
    </div>
    <div class="wrapperRes"  id="app-2">
       <div v-for="res in mejoresRestaurantes" v-if="parseInt(res.id_categoria_rest) == 2" class="container2">
            <div  class="wrapper3" v-on:click="newWindow(res.id_rest)">
                <img v-bind:src="res.ruta_img" alt="" class="imgRes">
                <h1 class="hRes">{{ res.nombre }}</h1>
                <div class="contParrafo">
                <div v-for="n in parseInt(res.categoria_precio)">
                    <span><b>$</b></span>
                </div>
                <p class="pRes">{{ res.tipo }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="contH1">
            <h1 class="infoH1">TOP RESTAURANTES CON MEJORES PRECIOS<span>by A COMER!</span></h1>
    </div>
    <div class="wrapperRes"  id="app-3">
       <div v-for="res in mejoresRestaurantes" v-if="parseInt(res.categoria_precio) < 4" class="container2">
            <div  class="wrapper3" v-on:click="newWindow(res.id_rest)">
                <img v-bind:src="res.ruta_img" alt="" class="imgRes">
                <h1 class="hRes">{{ res.nombre }}</h1>
                <div class="contParrafo">
                <div v-for="n in parseInt(res.categoria_precio)">
                    <span><b>$</b></span>
                </div>
                <p class="pRes">{{ res.tipo }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="backgroundContacto">
            <div class="shadowContainer">
            <div class="containerHeaderCont">
             <h1 class="headerContacto" id="contacto">CONTÁCTENOS!</h1>
             <p class="parrIntroContacto">Llámanos, envíanos un correo electrónico o envíanos una carta. Nosotros estamos aquí para ayudarte en lo que podamos!</p>
             </div>
            <div class="containerContacto">
                <div class="parrafoContacto">
                    <h2 class="hPrimerContacto">Oficinas A Comer!</h2>
                    <p class="parrafo">Prolongación Circunvalación No. 2 ocn Av. 16 Guajira, <br>al lado de la Plaza de Toros <br> 6, Maracaibo 4005, Zulia. <br> T: 0261-7412723 | 0414-6242580 <br> E: <a href=""> stefanolagattolla.s@gmail</a> | <a href="">acomeroficinas@gmail.com</a> </p>
                    <h2 class="hPrimerContacto">Redes Sociales, Media Contact</h2>
                    <p class="parrafo"><b>Instragram: </b>@AComerInstragramOficial<br><b>Twitter: </b>@AComerInstragramOficial <br><b>Facebook: </b>Página A Comer!</p>
                </div>
                <div class="imgContactoContainer">
                    <img src="img/paginaPrincipal/imgContacto.png" alt="" class="imgContacto">
                </div>
            </div>
            </div>
        </div>
        <footer class="footer">
                <div class="contFooter">
                   <h3 class="headerFooter">STEFANO LAGATTOLLA <br> MARIO RIVAS <br> MARIA LABARCA</h3>
                   <span>c Copyright 2018.<br></span>
                   <span>Todos los derechos reservados. Hecho por Diplomado URBE.</span>
                </div>
        </footer>
    <script src="https://unpkg.com/vue"></script>
    <script src="js/paginaPrincipal.js"></script>
</body>
</html>