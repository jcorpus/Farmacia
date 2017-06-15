<?php

if(!isset($_GET['view'])){
	$titulo = 'Iniciooo';
	$contenido_home = 'Modulo_almacen/view/home/inicio.php';

}else if ($_GET['view'] == 'salir') {
	include('Modulo_almacen/core/controller/salirController.php');
}
else if($_GET['view'] == 'perfil'){
	$titulo = 'Perfil';
	$contenido_home = 'Modulo_almacen/view/home/perfil_user.php';
}
else if($_GET['view'] == 'faq'){
	$titulo = 'FAQ';
	$contenido_home = 'Modulo_almacen/view/home/faq.php';
}
else if($_GET['view'] == 'admin'){
	$titulo = 'Panel adm';
	$contenido_home = 'Modulo_almacen/admin.php';
}

else{
	$titulo = 'ERROR 404';
	$contenido_home = 'Modulo_almacen/html/error/error404.html';
}



 ?>
