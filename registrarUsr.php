<?php


include_once('conexion.php');

$usuario = $_POST['user'];
$correo = $_POST['email'];
$contrasena = $_POST['pass'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$estado = '1';
$id_rol = 1;

if ($sexo == 'mujer'){
	$s = 1;
} else {
	$s = 2;
}


$queryInsertar = $mysqli->query("INSERT INTO usuarios (id_usuario, usuario, correo, contrasena, nombre, apellido, direccion, edad, id_sexo, id_estado, id_rol) 
								VALUES (NULL, '$usuario', '$correo', '$contrasena', '$nombre', '$apellido', '$direccion', '$edad','$s','$estado','$id_rol')");


if ($queryInsertar) {
	echo "<script type='text/javascript'>alert('El usuario ha sido registrado exitosamente');
	window.location.href = 'paginaPrincipal.php';

	</script>";

} else {
	die('ERROR: No se puede ejecutar query para insertar datos.'.$mysqli->error);
	echo "<br><br><a href='paginaPrincipal.php'>Volver</a>";
}


?>