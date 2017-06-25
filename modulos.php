
<?php


require('Modulo_almacen/core/models/model_conexion.php');
require('Modulo_almacen/core/bin/funciones/get_users.php');
require('Modulo_almacen/core/bin/funciones/usuario_rol.php');
$usuarios = ver_usuarios();

$estado_user = $usuarios[$_SESSION['app_id']]['usu_est'];
$usuario_id_v = $usuarios[$_SESSION['app_id']]['usu_id'];

$verificar_rol = verificar_rol($usuario_id_v);
//print_r($verificar_rol);
//echo "primer valor array: ".$verificar_rol[5];
$rol_admin = $verificar_rol[1];
//echo "rol admin ".$rol_admin;
  if(isset($_SESSION['app_id'])){ //si no esta definida la variable session, el usuario no esta definido
    if($estado_user == 1){
          require 'Modulo_almacen/core/site_map_home.php';
          require 'Modulo_almacen/html/home/topnav.php';
          require 'Modulo_almacen/html/home/header.php';
          require $contenido_modulo;
          require 'Modulo_almacen/html/home/footer.php';
    }else{

        unset($_SESSION['app_id']);
        header('Location: index.php');
    }
    
  }else {

        header('Location: index.php');
      //echo '<script> window.location="index.php"; </script>';

  }


//if ($_SESSION['app_id'] && $tipo_user == "Administrador") {






 ?>