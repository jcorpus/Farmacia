<?php
require ("../model/model_producto.php");
$inst = new Producto();
$consulta = $inst->listar_marca_producto();
echo json_encode($consulta);



/*

		$opcion=$_POST['opcion'];

		switch ($opcion) {
			case 'categoria':
					$inst = new Producto();
					$consulta = $inst->listar_tipo_producto();
					echo json_encode($consulta);
				break;
	
			case 'registrar':
					
					$nombres = $_POST['nombres'];
					$apellidos = $_POST['apellidos'];
					$email = $_POST['email'];
					$password = $_POST['password'];

					$instancia = new usuario();
					if($instancia->registrar($nombres,$apellidos,$email,$password))
					{
						echo "exito";
					}
					else{
						echo "No se registro";
					}
				break;
			default:
				# code...
				break;
		}

*/










 ?>
