<?php


include "../core/models/model_conexion.php";
//require ("../model/model_persona.php");
require ("../core/bin/funciones/encriptar_pass.php");


$fecha_actual = date("Y-m-d");

$dni_persona = trim($_POST['dni_persona']);
//$nombre_persona = trim($POST_['nombre_persona']);
//$ape_persona = $POST_['ape_persona'];
//$usuario_nombre = $_POST['usuario_nombre'];
//$pass_user = $_POST['pass_user'];
//$pass_user2 = $_POST['pass_user2'];


/*
if($pass_user == $pass_user2){

	$pass_user = encriptar2($_POST['pass_user']);
	return true;

}
*/
$respuesta = verificar_datos($dni_persona);

echo json_encode($respuesta);

function verificar_datos($dni_persona){
	$db = new Conexion2;
	$sql = $db->query("CALL sp_perso_buscar($dni_persona)");
	if ($db->rows($sql) > 0) {

		/*
		echo '<div class="alert alert-success alert-dismissible" id="">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-check"></i>&nbsp;El dni<strong style="color:#e8e8e8"> '.$dni_persona.' </strong>Es válido...
			</div>';
		*/

		  $arreglo = array();
		  while($re = $db->recorrer($sql)){
		    $arreglo[] = $re;
		  }
		  return $arreglo;
		  $db->liberar($sql);
		  $db->close();

	}else{
		/*
		$sql2 = $db->query("SELECT alm_usuario.usu_nom FROM alm_usuario WHERE alm_usuario.usu_nom = '$nombre_usuario' LIMIT 1 ");
		if ($db->rows($sql2) > 0) {
			echo '<div class="alert alert-danger alert-dismissible" id="correcto">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fa fa-times"></i>&nbsp;El usuario<strong style="color:#e8e8e8"> '.$nombre_usuario.' </strong>ya esta registrado...
				</div>';
			return false;
		}else{
			//echo  "no repetido";
			return true;
		}
		*/
		


		
		echo '<div class="alert alert-danger alert-dismissible" id="">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-times"></i>&nbsp;El dni<strong style="color:#e8e8e8"> '.$dni_persona.' </strong>es No existe en el sistema...
			</div>';

		
		return false;
	}
	$db->liberar();
	$db->close();
}





 ?>
