<?php

if(!isset($_GET['p'])){
	$titulo = 'Inicio';
	$contenido = 'view/admin/admin-home.php';
}
else if($_GET['p'] == 'registrar'){
	$titulo = 'Registro';
	$contenido = 'view/usuario/registro_usuario.php';
	#$script = 'html/javascript/image_cumple.js';
}
else if($_GET['p'] == 'listar'){
	$titulo = 'Listar';
	$contenido = 'view/usuario/lista_usuario.php';
}
else if ($_GET['p'] == 'reg_producto') {
	$titulo = 'Registro de Productos';
	$contenido = 'view/producto/registro_producto.php';
}
else if($_GET['p'] =='reg_nota_ingreso'){
	$titulo = 'Nota de ingreso';
	$contenido = 'view/notas/reg_nota_ingreso.php';

}
else if($_GET['p'] =='salir'){
	
	include('core/controller/salirController.php');

}

else{
	$titulo = 'ERROR 404';
	$contenido = 'html/error/error404.html';
}


 ?>
