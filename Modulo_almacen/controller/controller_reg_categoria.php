<?php

require ("../model/model_user.php");
require ("../core/bin/funciones/encriptar_pass.php");


date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_personac = trim($_POST['txtusuario']);
$ndescripcion = trim($_POST['txtdescripcion']);
$ncategoria = trim($_POST['txtcategoria']);
$estado_user = '1';



if(empty($id_personac) || empty($txtcategoria)){
	echo "ocurrio un error";
}else{
	$inst = new Producto();
	$consulta = $inst->registro_producto($id_personac,$ndescripcion,$ncategoria,$estado_user,$fecha_registro);

}




/*

if($pass_user == $pass_user2){

	$pass_encrip = encriptar2($_POST['pass_user']);

	$instancia = new Producto();
	$consulta = $instancia->registro_user($id_persona,$usuario_nombre, $pass_encrip, $usuario_img, $fecha_registro, $estado_user,$email_usuarior);

	echo $consulta;
		
}else{
	echo '<div class="alert alert-danger alert-dismissible" id="">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-times"></i>&nbsp; Debes ingresar un nombre...
			</div>';
}

*/
 ?>
