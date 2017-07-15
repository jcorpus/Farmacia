<?php

require ("../model/model_present.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_usuariop = trim($_POST['txtusuario']);
$npresentacion = trim($_POST['txtnpresentacion']);
$estado_presentacion = trim($_POST['estado_present']);


if(empty($id_usuariop) || empty($npresentacion)){
	echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar una presentacion.
          </div>';
	
}else{

	$inst = new Presentacion();
	$consulta = $inst->registro_presentacion($id_usuariop,$npresentacion,$estado_presentacion,$fecha_registro);
	echo $consulta;
}

 ?>
