<?php
require 'class-conexion.php';
/**
 *
 */
class Restaurant
{
  function __construct()
  {
    $this->BD = new BD();
  }
  public function getDataRestaurant($id)
  {
    $restaurante = $this->BD->getRestaunrant(3);
    var_dump($restaurante);
  }
  public function getFavoriteRestaurantes($id_user)
  {
    $favoritos =  $this->BD->getFavoriteRestaurant($id_user);
    if($favoritos == false){
      return false;
    }
    return unserialize($favoritos['restaurantes']);
  }
  public function setFavoriteRestaurante($id_restaurant)
  {
    //Traemos el id del usuario de la session abierta.
    $id_user = 2;
    //Nos traemos los restaurantes favoritos de ese usuario
    $favoritos = $this->getFavoriteRestaurantes($id_user);
    if($favoritos == false){
      $lista_favoritos = [];
    }else {
      $lista_favoritos = $favoritos;
    }
    array_push($lista_favoritos,$id_restaurant);
    $lista_favoritos = serialize($lista_favoritos);
    if($favoritos == false){
      $this->BD->insertFavoriteRestaurant($id_user,$lista_favoritos);
    }else{
      $this->BD->updateFavoriteRestaurant($id_user,$lista_favoritos);
    }
  }
  public function deleteFavoriteRestaurante($id_restaurant)
  {
    //Traemos el id del usuario de la session abierta.
    $id_user = 2;
    $favoritos = $this->getFavoriteRestaurantes($id_user);
    if($favoritos != false){
      $lista_favoritos = $favoritos;
    }else {
      return 0;
    }
    $clave = array_search($id_restaurant,$lista_favoritos);
    array_splice($lista_favoritos, $clave, 1);
    $lista_favoritos = serialize($lista_favoritos);
    $this->BD->updateFavoriteRestaurant($id_user,$lista_favoritos);
  }
}
$restaurante = new Restaurant();
// $restaurante->getDataRestaurant(2);
// $restaurante->setFavoriteRestaurante(66623);
// $restaurante->setFavoriteRestaurante(66625);
// $restaurante->setFavoriteRestaurante(66624);
$restaurante->deleteFavoriteRestaurante(66623);