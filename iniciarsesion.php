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


	switch ($_SESSION['id_sexo']) {
		case '1':
			$_SESSION['sexo'] = 'mujer';
			break;
		case '2':
			$_SESSION['sexo'] = 'hombre';
			break;
	}

	if (!$fila['usuario']==""){

		echo "<script type='text/javascript'>window.location.href = 'paginaPrincipal.php';</script>";
	} else {
		echo "<script type='text/javascript'>alert('El usuario no existe');
		window.location.href = 'registrarUsr.php';</script>";
	}



	//header('Location: index.php');

} else {
	die('ERROR: No se puede ejecutar query para insertar datos.'.$mysqli->error);
}


?>