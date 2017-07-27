<?php

require ("../model/model_producto.php");
date_default_timezone_set('America/Lima');
$id_usuario2 = $_POST['usuarioa_id'];
$fecha_registro = date("Y-m-d");
$nombre_prod = $_POST['txtproducto'];
$marca_prod = trim($_POST['marcap_datos']);
$tipo_prod = $_POST['tipoprod_datos'];
$categoria_prod = $_POST['categoriap_datos'];
$codigolote_prod = $_POST['txtcod_lote'];
$reglasanitaria_prod = $_POST['txtregla_sanitaria'];
$fechavencimiento_prod = $_POST['fecha_vencimiento'];
$unidadm_prod = $_POST['unidad_medida'];
/*$imagen_prod = $_POST['imagen_producto'];*/
$stockmin_prod = $_POST['txtstockmin'];
$preciocomp_prod = $_POST['txtprecio_comp'];
$stockmax_prod = $_POST['txtstockmax'];
$preciovent_prod = $_POST['txtpreciovent'];
$cantidad_prod = $_POST['txtcantidadprod'];
$estado_prod = $_POST['estado_producto'];
///
$presentacion_prod = $_POST['id_presentacion'];
$fraccion_prod = $_POST['txtfraccion'];
$concentracion_prod = $_POST['txtconcentracion'];
$almacenn_prod = $_POST['alm_list2'];

/*
if (true) {
	$verificar =$_FILES["imagen_producto"]['name'];
	if (!empty($verificar)){
	$valor = true;
	$nombre =uniqid()."-".$_FILES['imagen_producto']['name']; //archivo que subi
	$tipo = $_FILES['imagen_producto']['type']; // tipo de archivo
	$ruta_imagen = $_FILES['imagen_producto']['tmp_name']; //donde esta almacenado el archivo
	$tamano = $_FILES['imagen_producto']['size']; //tamaño del archivo

	$dimensiones = getimagesize($ruta_imagen);
	$width = $dimensiones[0];
	$height = $dimensiones[1];
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");

		if (!in_array($tipo,$permitidos)) {
			echo '<div class="alert alert-danger alert-dismissible" id="correcto">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fa fa-times"></i>&nbsp;Archivo no permitido
				</div>';
				$valor = false;
			}else if($tamano > 5242880){
				echo '<div class="alert alert-danger alert-dismissible" id="correcto">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="icon fa fa-times"></i>&nbsp;el tamaño permitido es 5Mb
					</div>';
					$valor = false;
			}
			else if($width > 2500 || $height > 2500){
				echo '<div class="alert alert-danger alert-dismissible" id="correcto">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="icon fa fa-times"></i>&nbsp;La altura y anchura maxima es de 2500 px
					</div>';
					$valor = false;

			}
			else if($width < 10 || $height < 10){
				echo '<div class="alert alert-danger alert-dismissible" id="correcto">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="icon fa fa-times"></i>&nbsp;Error la anchura y la altura mínima permitida es 10px
					</div>';
					$valor = false;
			}
			else{
				$ruta_copia = '../html/img_server/'.$nombre;
				$ruta_registro = 'html/img_server/'.$nombre;
				move_uploaded_file($ruta_imagen,$ruta_copia);
				$valor = true;
			}

		}else{
					
				$ruta_registro = "html/img_server/user-default.png";
				$valor = true;
				//echo "no enviaste una imagen";

		}

}else{
	echo "errorrrr";
	$valor = false;
}



*/








if(empty($nombre_prod)){
	echo '<div class="alert alert-warning alert-dismissible" id="correcto">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×<button>
			<i class="icon fa fa-times"></i>&nbsp;Debes ingresar una nombre.
			 </div>';
	}else{
	$inst = new Producto();
	$consulta = $inst->registrar_producto($id_usuario2,$fecha_registro,$nombre_prod,$marca_prod,$tipo_prod,$categoria_prod,$fraccion_prod,$presentacion_prod,$concentracion_prod,$codigolote_prod,$reglasanitaria_prod,$fechavencimiento_prod,$unidadm_prod,$stockmin_prod,$preciocomp_prod,$stockmax_prod,$preciovent_prod,$cantidad_prod,$estado_prod,$almacenn_prod);
	echo $consulta;
				}

				
 ?>
