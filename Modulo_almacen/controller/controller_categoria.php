<?php

require ("../model/model_categoria.php");

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
					//$ndescripcion = trim($_POST['txtdescripcion']);
					$ncategoria = trim($_POST['txtcategoria']);
					$estado_categoria = $_POST['txtestadocat'];
					if(empty($id_personac) || empty($ncategoria)){
						echo '<div class="alert alert-warning alert-dismissible" id="correcto">
					          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar una categoria.
					          </div>';
					}else{
						$inst = new Categoria();
						$consulta = $inst->registro_categoria($id_personac,$ncategoria,$estado_categoria,$fecha_registro);
						echo $consulta;
					}

				break;
			default:
				# code...
				break;
		}














 ?>
