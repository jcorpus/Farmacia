<?php

require ("../model/model_producto.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_usuariop = trim($_POST['txtusuario']);
$ntipo_prod = trim($_POST['tipopro_nom']);
$ntipo_prodd = trim($_POST['tipopro_des']);
$estado_tipo_pro = '1';



if(empty($id_usuariop) || empty($ntipo_prod)){
	echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar un tipo de usuario.
          </div>';
	
}else{

	$inst = new Producto();
	$consulta = $inst->registro_tipo_producto($id_usuariop,$ntipo_prod,$estado_tipo_pro,$fecha_registro);
	echo $consulta;
}

 ?>
