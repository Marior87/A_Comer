<?php
session_start();

include_once('conexion.php');

$usuario = $_POST['user'];
$contrasena = $_POST['pass'];

$query = "SELECT * FROM usuarios WHERE contrasena = '".$contrasena."' AND usuario = '".$usuario."'";

$queryBuscar = $mysqli->query($query);

if ($queryBuscar) {

	$fila = mysqli_fetch_array($queryBuscar);

	$_SESSION['nombre'] = $fila['nombre'];
	$_SESSION['id_usuario'] = $fila['id_usuario'];
	$_SESSION['correo'] = $fila['correo'];
	$_SESSION['apellido'] = $fila['apellido'];
	$_SESSION['direccion'] = $fila['direccion'];
	$_SESSION['edad'] = $fila['edad'];
	$_SESSION['id_sexo'] = $fila['id_sexo'];
	$_SESSION['id_rol'] = $fila['id_rol'];


	switch ($_SESSION['id_sexo']) {
		case '1':
			$_SESSION['sexo'] = 'mujer';
			break;
		case '2':
			$_SESSION['sexo'] = 'hombre';
			break;
	}

	switch ($_SESSION['id_rol']) {
		case '1':
			$_SESSION['rol'] = 'cliente';
			break;
		case '2':
			$_SESSION['rol'] = 'administrador';
			break;
	}


	if (!$fila['usuario']==""){

		echo "<script type='text/javascript'>window.location.href = 'paginaPrincipal.php';</script>";
	} else {
		echo "<script type='text/javascript'>alert('Usuario o contraseña inválidos, por favor intente de nuevo');
		window.location.href = 'inicioSesion.html';</script>";
	}



	//header('Location: index.php');

} else {
	die('ERROR: No se puede ejecutar query para insertar datos.'.$mysqli->error);
}


?>