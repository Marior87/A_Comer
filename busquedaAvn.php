<?php

include_once('conexion.php');

function estimadoPrecio($precio){
	$p = (int)$precio;

if ($p<=2) {
	return 1;
} elseif ($p==3) {
	return 2;
} else {
	return 3;
}

}



$query = "SELECT * FROM restaurant";
$queryBuscar = $mysqli->query($query);
$respuesta = array();
$resp = array();

while ($rs = mysqli_fetch_array($queryBuscar)) {

	$respuesta["id_rest"] = mb_convert_encoding($rs["id_rest"], 'UTF-8', 'ASCII');
	$respuesta["nombre"] = mb_convert_encoding($rs["nombre"], 'UTF-8', 'ASCII');
	$respuesta["direccion"] = mb_convert_encoding($rs["direccion"], 'UTF-8', 'ASCII');
	$respuesta["correo"] = mb_convert_encoding($rs["correo"], 'UTF-8', 'ASCII');
	$respuesta["tipo"] = mb_convert_encoding($rs["tipo"], 'UTF-8', 'ASCII');
	$respuesta["precio"] = mb_convert_encoding($rs["categoria_precio"], 'UTF-8', 'ASCII');
	$respuesta["img"] = mb_convert_encoding($rs["ruta_img"], 'UTF-8', 'ASCII');
	$respuesta["tipoRestaurante"] = mb_convert_encoding($rs["id_categoria_rest"], 'UTF-8', 'ASCII');
	$respuesta["estimadoPrecio"] = estimadoPrecio($respuesta["precio"]);


	$resp[] = $respuesta;
}

$mysqli->close();


header("Type: application/json");

echo json_encode($resp);


?>