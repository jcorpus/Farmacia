<?php

require ("../model/model_present.php");

date_default_timezone_set('America/Lima');
if($_POST['opcion'] =='modificar'){

$fecha_registro = date("Y-m-d");
$id_usuarioa2 = trim($_POST['txtusuario']);
$npresentacion2 = trim($_POST['txtpresent2']);
$est_present2 = $_POST['txtestadom2'];
$id_presentacion2 = $_POST['id_presentacion'];

if(empty($id_usuarioa2) || empty($npresentacion2)){
	echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar los datos
          </div>';
	
}else{

	$inst = new Presentacion();
	$consulta = $inst->modificar_present($id_presentacion2,$id_usuarioa2,$npresentacion2,$fecha_registro,$est_present2);
	echo $consulta;
}

}else{
	echo "no pasa nada";
}



















 ?>
