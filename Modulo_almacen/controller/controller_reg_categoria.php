<?php

require ("../model/model_producto.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_personac = trim($_POST['txtusuario']);
$ndescripcion = trim($_POST['txtdescripcion']);
$ncategoria = trim($_POST['txtcategoria']);
$estado_categoria = '1';



if(empty($id_personac) || empty($ncategoria)){
	echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar una categoria.
          </div>';
	
}else{

	$inst = new Producto();
	$consulta = $inst->registro_categoria($id_personac,$ncategoria,$estado_categoria,$fecha_registro);
	echo $consulta;
}

 ?>
