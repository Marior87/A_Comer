<?php
session_start();
require 'inc/class-restaurant.php';

$isFavorite = $_POST['favorite'];
$id_rest    = $_POST['id_rest'];
$id_user    = $_SESSION['id_usuario'];
$mensaje    = '';
$restaurant =  new Restaurant();

if($isFavorite == 1){
  $restaurant->setFavoriteRestaurante($id_rest,$id_user );
  $mensaje = "Restaurante Agregado ";
}elseif ($isFavorite == 0) {
  $restaurant->deleteFavoriteRestaurante($id_rest,$id_user );
  $mensaje = "Restaurante Eliminado";
}


header("Type: application/json");
echo json_encode($mensaje);


?>
