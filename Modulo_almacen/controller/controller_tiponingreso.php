<?php

require ("../model/model_tiponingreso.php");
date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
		$opcion=$_POST['opcion'];

		switch ($opcion) {	
			case 'registrar':

					$id_usuarioni = trim($_POST['txtusuario']);
					$ntiponotaingreso = trim($_POST['tpnotaingreso']);
					$estadotiponota = $_POST['tpnotaestado'];
					if(empty($id_usuarioni) || empty($ntiponotaingreso)){
						echo '<div class="alert alert-warning alert-dismissible" id="correcto">
					          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					          <i class="icon fa fa-times"></i>&nbsp;Debes ingresar datos.
					          </div>';
					}else{

						$inst = new NotaIngreso();
						$consulta = $inst->reg_tiponotein($id_usuarioni,$ntiponotaingreso,$estadotiponota,$fecha_registro);
						echo $consulta;
					}
				break;


				case 'buscar':
					if(true){
					  $inicio = 0;
					  $limite = 5;
					  if(isset($_POST['pagina'])){
					    $pagina = $_POST['pagina'];
					    $inicio = ($pagina -1) * $limite;
					  }
					  $valor = $_POST['valor'];
					  $instancia = new NotaIngreso();
					  $a = $instancia->listar_tiponotai($valor);
					  $b = count($a);
					  $c = $instancia->listar_tiponotai($valor,$inicio,$limite);
					  
					  ///se imprime para poder exponerlos con json_encode javascript
					  echo json_encode($c)."*".$b;
					}

				break;
			default:
				# code...
				break;
		}



 ?>
