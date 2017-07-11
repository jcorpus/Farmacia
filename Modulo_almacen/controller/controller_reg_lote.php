<?php

require ("../model/model_producto.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_usuariop = trim($_POST['txtusuario']);
$nlote = trim($_POST['txtlote']);
$nloted = trim($_POST['txtdescripcionl']);
$estado_lote = '1';



if(empty($id_usuariop) || empty($nlote)){
	echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar una lote.
          </div>';
	
}else{

	$inst = new Producto();
	$consulta = $inst->registro_lote($id_usuariop,$nlote,$estado_lote,$fecha_registro);
	echo $consulta;
}

 ?>
