<?php

class Categoria {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }

  function registro_categoria($id_personac,$ncategoria,$estado_categoria,$fecha_registro){
    $consulta = "INSERT INTO alm_categoria(usu_id,cate_desc,cate_freg,cate_est) VALUES('$id_personac','$ncategoria','$fecha_registro','$estado_categoria')";

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


/***************lista de categoria de producto***************/
function listar_categoria_producto($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT *, CASE alm_categoria.cate_est WHEN 1 THEN 'activo' WHEN 0 THEN 'inactivo' END estado FROM alm_categoria WHERE alm_categoria.cate_desc LIKE '%".$valor."%' ORDER BY alm_categoria.cate_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT *, CASE alm_categoria.cate_est WHEN 1 THEN 'activo' WHEN 0 THEN 'inactivo' END estado FROM alm_categoria WHERE alm_categoria.cate_desc LIKE '%".$valor."%' ORDER BY alm_categoria.cate_id DESC";
  }
  $resultado = $this->db->query($sql);

  $arreglo = array();
  while($re =$this->db->recorrer($resultado)){ ///MYSQL_BOTH, MYSQL_ASSOC, MYSQL_NUM
    $arreglo[] = $re;
  }
  return $arreglo;
  $this->db->liberar($sql);
  $this->db->close();

}






}


/*
$instancia = new Categoria();
$resp = $instancia->listar_categoria_producto("",0,1);
print_r($resp);
*/



 ?>
