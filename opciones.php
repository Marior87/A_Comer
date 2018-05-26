<?php
session_start();
$rol = $_SESSION['rol'];


switch ($rol) {
	case 'cliente':
		header('Location: sesionCliente.php');
		break;
	case 'administrador':
		header('Location: sesionAdministrador.php');
		break;

}





?>