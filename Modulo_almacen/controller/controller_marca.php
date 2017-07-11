<?php

require ("../model/model_marca.php");
date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");

		$opcion=$_POST['opcion'];

		switch ($opcion) {
			case 'modificar':
				echo "case modificar";

				$id_marca2 = $_POST['id_marca'];
				$id_usuario2 = $_POST['txtusuario'];
				$nmarca2 = trim($_POST['txtmmarca2']);
				$estado_marca2 = $_POST['txtestadom2'];

				if(empty($id_usuario2) || empty($nmarca2)){
					echo '<div class="alert alert-warning alert-dismissible" id="correcto">
				          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar una marca.
				          </div>';
				}else{

					$inst = new Marca();
					$consulta = $inst->modificar_marca($id_marca2,$id_usuario2,$nmarca2,$estado_marca2,$fecha_registro);
					echo $consulta;
				}

				break;
	
			case 'registrar':
					echo "registrar";
					$id_personac = trim($_POST['txtusuario']);
					$nmarca = trim($_POST['txtmmarca']);
					$estado_marca = $_POST['txtestadom'];
					if(empty($id_personac) || empty($nmarca)){
						echo '<div class="alert alert-warning alert-dismissible" id="correcto">
					          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar una marca.
					          </div>';
					}else{

						$inst = new Marca();
						$consulta = $inst->registro_marca($id_personac,$nmarca,$estado_marca,$fecha_registro);
						echo $consulta;
					}
				break;
			default:
				# code...
				break;
		}



 ?>
