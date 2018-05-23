<?php


$mysqli = new mysqli("localhost", "WebM", "1234", "AComer");
if ($mysqli->connect_error) {
die('ERROR: No se estableció la conexión. '.mysqli_connect_error());
}



?>