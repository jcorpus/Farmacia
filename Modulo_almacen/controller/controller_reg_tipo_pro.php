<?php

require ("../model/model_producto.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$opcion=$_POST['opcion'];


		switch ($opcion) {
			case 'modificar':
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
			case 'listar':

					echo "listar";

					break;

			case 'registrar':
					
					$id_usuariop = trim($_POST['txtusuario']);
					$ntipo_prod = trim($_POST['tipopro_nom']);
					$estado_tipo_pro = $_POST['txtestado_tipo'];

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
				break;
			default:
				# code...
				break;
		}







 ?>
