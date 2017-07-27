<?php

require ("../model/model_producto.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");

$fraccion = $_POST['fraccio'];
$concentracion = $_POST['concent'];
$id_producto = $_POST['id_producto'];

$id_presentacion = $_POST['arrayprent'];

$array_presentacion = explode(",",$id_presentacion);
$array_fraccion = explode(",",$fraccion);
$array_concentracion = explode(",",$concentracion);

$inst = new Producto();

for($i=0; $i < count($array_presentacion); $i++){
	$consulta = $inst->registrar_detalle_presentacion($id_producto,$array_presentacion[$i],$array_concentracion[$i],$array_fraccion[$i]);
}

echo $consulta;


 ?>
