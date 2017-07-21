<?php

require ("../model/model_producto.php");
date_default_timezone_set('America/Lima');
$id_usuariop = $_POST['txtusuario'];
$fecha_registro = date("Y-m-d");
$nombre_prio = $_POST['txtprioridad'];
$estado_prio = $_POST['estado_prior'];

if(empty($nombre_prio)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar un nombre.
          </div>';

	}else{
	$inst = new Producto();
	$consulta = $inst->registro_prioridad($id_usuariop,$fecha_registro,$nombre_prio,$estado_prio);
	echo $consulta;
				}

				
 ?>
