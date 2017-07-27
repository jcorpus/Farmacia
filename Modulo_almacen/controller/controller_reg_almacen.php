<?php

require ("../model/model_almacen.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");

	$opcion = $_POST['acciona'];

		switch ($opcion) {
			case 'registraralm':

				$id_personac = trim($_POST['txtusuario']);
				$nalmacen = trim($_POST['txtalmacenn']);
				$ndireccion_aml = trim($_POST['txtdireccionalm']);
				$estado_almacen = $_POST['txtestadoa'];

				if(empty($id_personac) || empty($nalmacen) || empty($ndireccion_aml)){
					echo '<div class="alert alert-warning alert-dismissible" id="correcto">
				          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar los datos
				          </div>';
					
				}else{

					$inst = new Almacen();
					$consulta = $inst->registro_almacen($id_personac,$nalmacen,$ndireccion_aml,$estado_almacen,$fecha_registro);
					echo $consulta;
				}
				
				break;
	
			case 'listaralm_opt':
					

				$inst = new Almacen();
				$consulta = $inst->listar_almacen_combo();
				echo json_encode($consulta);
					
				break;
			default:
				# code...
				break;
		}





 ?>
