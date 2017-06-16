
<?php


  require('Modulo_almacen/core/core.php');
  //session_start();
#obtener toda la info del usuario, nombre, email, etc
  //require('core/bin/funciones/get_users.php');
//$tipo_user = $usuarios[$_SESSION['app_id']]['DesTipoUsuario'];

$usuarios = ver_usuarios();
  if(isset($_SESSION['app_id'])){ //si no esta definida la variable session, el usuario no esta definido

    require 'Modulo_almacen/core/site_map_home.php';
    require 'Modulo_almacen/html/home/topnav.php';
    require 'Modulo_almacen/html/home/header.php';
    require $contenido_home;
    
  }else {

        header('Location: index.php');
      //echo '<script> window.location="index.php"; </script>';

  }


//if ($_SESSION['app_id'] && $tipo_user == "Administrador") {






 ?>