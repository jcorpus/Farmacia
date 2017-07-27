<?php

require ("../model/model_inventario.php");

date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");

	$opcion = $_POST['accioni'];

		switch ($opcion) {
			case 'registrartpoi':

				$id_usuarioi = trim($_POST['txtusuario']);
				$ntipoi = trim($_POST['txttipoinventario']);
				$estado_tipoi = $_POST['txtestadoi'];

				if(empty($id_usuarioi) || empty($ntipoi)){
					echo '<div class="alert alert-warning alert-dismissible" id="correcto">
				          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar los datos
				          </div>';
					
				}else{

					$inst = new Inventario();
					$consulta = $inst->registro_tipoinventario($id_usuarioi,$ntipoi,$estado_tipoi,$fecha_registro);
					echo $consulta;
				}
				
				break;
	
			case 'listartipo_int':
					
				
				if(true){
				  $inicio = 0;
				  $limite = 5;
				  if(isset($_POST['pagina'])){
				    $pagina = $_POST['pagina'];
				    $inicio = ($pagina -1) * $limite;
				  }
				  $valor = $_POST['valor'];
				  $instancia = new Inventario();
				  $a = $instancia->listar_tipo_invent($valor);
				  $b = count($a);
				  $c = $instancia->listar_tipo_invent($valor,$inicio,$limite);
				  
				  ///se imprime para poder exponerlos con json_encode javascript
				  echo json_encode($c)."*".$b;
				}

				break;



				case 'modificar_tipoi':				
				$ntipoin2 = $_POST['nombre_tipoi'];
				$id_usuario2 = $_POST['txtusuario'];
				$id_tipoin2 = trim($_POST['id_tipoi2']);
				$estado_tipoi2 = $_POST['estado_tipoi'];

				if(empty($id_usuario2) || empty($id_tipoin2)){
					echo '<div class="alert alert-warning alert-dismissible" id="correcto">
				          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				          <i class="icon fa fa-times"></i>&nbsp;Ocurrio un error.
				          </div>';
				}else{

					$inst = new Inventario();
					$consulta = $inst->modificar_tipoinv($id_usuario2,$id_tipoin2,$ntipoin2,$estado_tipoi2,$fecha_registro);
					echo $consulta;
				}

					
				break;
			default:
				# code...
				break;
		}





 ?>
