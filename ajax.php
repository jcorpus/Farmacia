<?php
  if($_POST){

    require('Modulo_almacen/core/core.php');
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
      case 'login':
        require('Modulo_almacen/core/bin/ajax/go_login.php');
        break;

      case 'reg_user':
        require ('Modulo_almacen/controller/controller_user.php');
        break;
      default:
        header('Location: index.php');
        break;
    }
  }else{
    header('Location: index.php');
  }


 ?>
