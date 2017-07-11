<?php

require ("../model/model_almacen.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_usuarioa2 = trim($_POST['txtusuario']);
$nalmacen2 = trim($_POST['txtalmacen2']);
$ndireccion_aml = trim($_POST['txtdireccionalm2']);
$est_almacen2 = $_POST['txtestadom2'];
$id_almacen2 = $_POST['id_almacen2'];

if(empty($id_usuarioa2) || empty($nalmacen2) || empty($ndireccion_aml)){
	echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar los datos
          </div>';
	
}else{

	$inst = new Almacen();
	$consulta = $inst->modificar_almacen($id_almacen2,$id_usuarioa2,$nalmacen2,$ndireccion_aml,$fecha_registro,$est_almacen2);
	echo $consulta;
}





















 ?>
