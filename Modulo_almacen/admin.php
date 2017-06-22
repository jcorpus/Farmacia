<?php
require('core/core2.php');


$usuarios = ver_usuarios();
//$categoria_tesis = listar_categoria();
$estado_user = $usuarios[$_SESSION['app_id']]['usu_est'];
//print_r("el estado es: ".$estado_user);

if ($_SESSION['app_id'] && $estado_user == 1) {
  
  require 'core/sitemap_admin.php';
  require 'html/admin/topnav.php';
  require 'html/admin/header.php';
  require $contenido;
  
  require 'html/admin/footer.php';   
  
}else{
  
  header('Location: index.php');

}


 ?>
