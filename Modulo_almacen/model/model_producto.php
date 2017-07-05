<?php

class Producto {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }


//$this->db->rows($verificar) == 0
  /*
INSERT INTO `alm_categoria` (`cate_id`, `usu_id`, `cate_desc`, `cate_freg`, `cate_est`) VALUES (NULL, '2', 'categora nombre', '2017-07-04', '1');
  */

  function registro_producto($id_personac,$ncategoria,$estado_user,$fecha_registro){
    $consulta = "INSERT INTO alm_categoria(usu_id,cate_desc,cate_freg,cate_est) VALUES('$id_personac','$ncategoria','$fecha_registro','$estado_user')";

    $verificar = $this->db->query("SELECT alm_categoria.cate_desc FROM alm_categoria WHERE alm_categoria.cate_desc = '$ncategoria'");

    if($this->db->rows($verificar) == 0){

    if ($this->db->query($consulta)) {
      
          echo '<div class="alert alert-success alert-dismissible" id="correcto">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>&nbsp;Categoria registrada correctamente.
            </div>';  
      }else{
        return false;
      $this->db->liberar($consulta);
      $this->db->close();
      }
      
    }else{

      $categoria_producto = $this->db->recorrer($verificar)[0];
      if(strtolower($ncategoria) == strtolower($categoria_producto)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;La categoria ya esta registrada.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }



  }







}

/*
$instancia = new Usuario();
$resp = $instancia->listar_user("",0,1);
print_r($resp);
*/

/*

$instancia = new Usuario();
if ($instancia->registro_user('2','45456756','corpus','mechato','2017-06-07','1','nombree','julio@gmal.com')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}

*/

$instancia = new Producto();
if ($instancia->registro_producto('2','descripcion29','1','2017-06-09')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}


 ?>
