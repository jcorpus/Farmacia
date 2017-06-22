<?php

require ("../model/model_user.php");
require ("../core/bin/funciones/encriptar_pass.php");


date_default_timezone_set('America/Lima');
$fecha_registro = date("Y-m-d");
$id_persona = trim($_POST['id_persona']);
$dni_persona = trim($_POST['dni_persona']);
$usuario_nombre = trim($_POST['dni_persona']);
$usuario_img = 'html/img_server/user-default.png';
$pass_user = $_POST['pass_user'];
$pass_user2 = $_POST['pass2_user'];
$email_usuarior = $_POST['email_usuarior'];
$estado_user = '1';




if($pass_user == $pass_user2){

	$pass_encrip = encriptar2($_POST['pass_user']);

	$instancia = new Usuario();
	$consulta = $instancia->registro_user($id_persona,$usuario_nombre, $pass_encrip, $usuario_img, $fecha_registro, $estado_user,$email_usuarior);

	echo $consulta;
		
}else{
	echo '<div class="alert alert-danger alert-dismissible" id="">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fa fa-times"></i>&nbsp;Las contraseñas deben ser iguales...
			</div>';
}







 ?>
