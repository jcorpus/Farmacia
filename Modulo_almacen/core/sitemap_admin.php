<?php

if(!isset($_GET['p'])){
	$titulo = 'Inicio';
	$contenido = 'view/admin/admin-home.php';
}
else if($_GET['p'] == 'registrar'){
	$titulo = 'Registro';
	$contenido = 'view/usuario/registro_usuario.php';
	
}
else if($_GET['p'] == 'reg_persona'){
	$titulo = 'Registro';
	$contenido = 'view/persona/registro_persona.php';
	
}
else if($_GET['p'] == 'reg_categoria'){
	$titulo = 'Registro Categoria';
	$contenido = 'view/producto/registro_categoria.php';
	
}
else if($_GET['p'] == 'reg_marca'){
	$titulo = 'Registro de Marca';
	$contenido = 'view/producto/registro_marca.php';
	
}
else if($_GET['p'] == 'reg_prioridad'){
	$titulo = 'Registro de Prioridad';
	$contenido = 'view/producto/registro_prioridad.php';
	
}
else if($_GET['p'] == 'reg_lote'){
	$titulo = 'Registro de Lote';
	$contenido = 'view/producto/registro_lote.php';
	
}
else if($_GET['p'] == 'control_ingreso'){
	$titulo = 'Control de Ingreso';
	$contenido = 'view/notas/control_ingreso.php';
	
}
else if($_GET['p'] == 'reg_kardex'){
	$titulo = 'Registro de kardex';
	$contenido = 'view/kardex/registro_kardex.php';
	
}
else if($_GET['p'] == 'reg_almacen'){
	$titulo = 'Registro de Almacen';
	$contenido = 'view/almacen/registro_almacen.php';
	
}
else if($_GET['p'] == 'list_almacen'){
	$titulo = 'Lista de Almacen';
	$contenido = 'view/almacen/listar_almacen.php';
	
}
else if($_GET['p'] == 'reg_presentacion'){
	$titulo = 'Registro de Presentacion';
	$contenido = 'view/producto/registro_presentacion.php';
	
}
else if($_GET['p'] == 'reg_tipo_prod'){
	$titulo = 'Registro de Tipo de Producto';
	$contenido = 'view/producto/registro_tipo_prod.php';
	
}
else if($_GET['p'] == 'reportes'){
	$titulo = 'Reportes';
	$contenido = 'view/producto/registro_tipo_prod.php';
	
}
else if($_GET['p'] == 'listar'){
	$titulo = 'Listar';
	$contenido = 'view/usuario/lista_usuario.php';
}
else if ($_GET['p'] == 'reg_producto') {
	$titulo = 'Registro de Productos';
	$contenido = 'view/producto/registro_producto.php';
}
else if ($_GET['p'] == 'list_producto') {
	$titulo = 'Registro de Productos';
	$contenido = 'view/producto/listar_producto.php';
}
else if($_GET['p'] =='reg_nota_ingreso'){
	$titulo = 'Nota de ingreso';
	$contenido = 'view/notas/reg_nota_ingreso.php';

}
else if($_GET['p'] =='reg_nota_salida'){
	$titulo = 'Nota de Salida';
	$contenido = 'view/notas/reg_nota_salida.php';

}
/************ INVENTARIO ***********/
else if($_GET['p'] =='reg_inventario'){
	$titulo = 'Registro de Inventario';
	$contenido = 'view/inventario/reg_inventario.php';

}
else if($_GET['p'] =='reg_tipo_inventario'){
	$titulo = 'Registro de Tipo de Inventario';
	$contenido = 'view/inventario/reg_tipo_inventario.php';

}
else if($_GET['p'] =='apertura_inventario'){
	$titulo = 'Apertura de Inventario';
	$contenido = 'view/notas/reg_nota_salida.php';

}
else if($_GET['p'] =='cierre_inventario'){
	$titulo = 'Cierre de Inventario';
	$contenido = 'view/notas/reg_nota_salida.php';

}
else if($_GET['p'] =='salir'){
	
	include('core/controller/salirController.php');

}

else{
	$titulo = 'ERROR 404';
	$contenido = 'html/error/error404.html';
}


 ?>
