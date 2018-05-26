<?php

session_start();
include_once('conexion.php');
require('fpdf/fpdf.php');


class PDF extends FPDF{

	function Header(){
		$image = "img/logo.png";
		$this->Image($image,10,8,30,30);
		$this->SetFont('Arial','B',12);
	}

	function Footer(){
		$this->SetXY(85,-10);
		$this->SetFont('Arial','B',8);
		$this->Cell(10,10,'Todos los derechos reservados','C',1);
		
	}


}

$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->SetXY(80,20);
$pdf->Cell(10,10,'Reporte de Usuarios Registrados',0);
$pdf->SetXY(5,50);
$pdf->Cell(20,10,'Nombre',1,0,'C');
$pdf->Cell(20,10,'Apellido',1,0,'C');
$pdf->Cell(20,10,'Sexo',1,0,'C');
$pdf->Cell(20,10,'Edad',1,0,'C');
$pdf->Cell(67,10,'Correo',1,0,'C');
$pdf->Cell(25,10,'Estado',1,0,'C');
$pdf->Cell(30,10,'Rol',1,0,'C');


$query1 = "SELECT * FROM usuarios";
$queryBuscar1 = $mysqli->query($query1);

if ($queryBuscar1){

$x = 5;
$y = 60;

	while($fila1 = mysqli_fetch_array($queryBuscar1)){
		$nombre = $fila1['nombre'];
		$apellido = $fila1['apellido'];
		$id_sexo = $fila1['id_sexo'];
		if ($id_sexo == 1){
			$sexo = "Mujer";
		} else {
			$sexo = "Hombre";
		}
		$edad = $fila1['edad'];
		$correo = $fila1['correo'];
		$id_estado = $fila1['id_estado'];
		switch ($id_estado) {
			case '1':
				$estado = "Activo";
				break;
			case '2':
				$estado = "Inactivo";
				break;
		}
		$id_rol = $fila1['id_rol'];
		switch ($id_rol) {
			case '1':
				$rol = "Cliente";
				break;
			case '2':
				$rol = "Administrador";
				break;
		}


		$pdf->SetXY($x,$y);
		$pdf->Cell(20,10,$nombre,0,0,'C');
		$pdf->Cell(20,10,$apellido,0,0,'C');
		$pdf->Cell(20,10,$sexo,0,0,'C');
		$pdf->Cell(20,10,$edad,0,0,'C');
		$pdf->Cell(67,10,$correo,0,0,'C');
		$pdf->Cell(25,10,$estado,0,0,'C');
		$pdf->Cell(30,10,$rol,0,0,'C');
		$x = $x;
		$y = $y + 10;
	}


}

















$pdf->Output();



?>