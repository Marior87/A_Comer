
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

  /**
   *
   */
  class BD
  {

    function __construct()
    {
      $host     = "localhost";
      $user     = "root";
      $password = "6419148";
      $bd_name  = "AComer";

      $this->mysqli = new mysqli($host,$user,$password,$bd_name);

      if ($this->mysqli->connect_error) {
        die('ERROR: No se estableció la conexión. '.mysqli_connect_error());
      }

    }

    public function getRestaunrant($id)
    {

      $query = "SELECT * FROM restaurant where id_rest = '{$id}' ";

      $queryBuscar = $this->mysqli->query($query);

      $restaurante = mysqli_fetch_array($queryBuscar);

      return $restaurante;

    }

    public function getFavoriteRestaurant($id_user)
    {

      $query = "SELECT * FROM restaurant_favoritos where id_user = '{$id_user}' ";

      $queryBuscar = $this->mysqli->query($query);

      if(mysqli_num_rows($queryBuscar)>0)
      {
        $favoritos = mysqli_fetch_array($queryBuscar);
        return $favoritos;
      }
      return false;



    }

    public function insertFavoriteRestaurant($id_user,$data)
    {

      $query = "INSERT INTO restaurant_favoritos (id,id_user,restaurantes) VALUES (NULL,{$id_user},'$data');";
      $this->mysqli->query($query);
      // if ($this->mysqli->query($query) === TRUE) {
      //     echo "New record created successfully";
      // } else {
      //     echo "Error: " . $query . "<br>" . $this->mysqli->error;
      // }

    }


    public function updateFavoriteRestaurant($id_user,$data)
    {
        $query = "UPDATE restaurant_favoritos SET restaurantes= '$data' WHERE id_user = $id_user";
        $this->mysqli->query($query);
        // if ($this->mysqli->query($query) === TRUE) {
        //     echo "Record Update";
        // } else {
        //     echo "Error: " . $query . "<br>" . $this->mysqli->error;
        // }

    }

    public function getDataUser($id)
    {
      $query = "SELECT * FROM usuarios where id_usuario = '{$id}' ";

      $queryBuscar = $this->mysqli->query($query);

      $datauser = mysqli_fetch_array($queryBuscar);

      return $datauser;
    }

  }




?>
