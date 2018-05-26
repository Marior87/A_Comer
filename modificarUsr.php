<?php

	$id = $_POST['id'];
	$id_estado = $_POST['id_estado'];

	if ($id_estado == '1'){
		$id_estado = '2';
	} else {
		$id_estado = '1';
	}


    include_once('conexion.php');
    $query = "UPDATE usuarios SET id_estado = ".$id_estado." WHERE id_usuario = ".$id;
    $queryBuscar = $mysqli->query($query);

    if ($queryBuscar){
    	$resp = 1;
    } else {
    	$resp = 0;
    }

echo json_encode($resp);

?>