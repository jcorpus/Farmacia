<?php

class Marca {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }


function modificar_marca($id_marca2,$id_usuario2,$nmarca2,$estado_marca2,$fecha_registro){
$sql = "UPDATE alm_marca SET alm_marca.usu_id = '$id_usuario2',alm_marca.marca_desc = '$nmarca2', alm_marca.marca_freg = '$fecha_registro', alm_marca.marca_est = '$estado_marca2' WHERE alm_marca.marca_id = '$id_marca2'";
  
if ($this->db->query($sql)) {
  echo '<div class="alert alert-success alert-dismissible" id="correcto">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-check"></i>&nbsp;Modificado correctamente
    </div>';
}else{
  echo '<div class="alert alert-danger alert-dismissible" id="correcto">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fa fa-times"></i>&nbsp;Ocurrio un Error
    </div>';
}
//$this->db->liberar($sql);  
$this->db->close();
}


function listar_marca($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT * , CASE alm_marca.marca_est WHEN 1 THEN 'activo' WHEN 0 THEN 'inactivo' END  estado FROM alm_marca  WHERE alm_marca.marca_desc LIKE '%".$valor."%' ORDER BY alm_marca.marca_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT * , CASE alm_marca.marca_est WHEN 1 THEN 'activo' WHEN 0 THEN 'inactivo' END  estado FROM alm_marca  WHERE alm_marca.marca_desc LIKE '%".$valor."%' ORDER BY alm_marca.marca_id DESC";
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



  function registro_marca($id_personac,$nmarca,$estado_user,$fecha_registro){
    $consulta = "INSERT INTO alm_marca(usu_id,marca_desc,marca_freg,marca_est) VALUES('$id_personac','$nmarca','$fecha_registro','$estado_user')";

    $verificar = $this->db->query("SELECT alm_marca.marca_desc FROM alm_marca WHERE alm_marca.marca_desc = '$nmarca'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Marca registrada correctamente.
              </div>';  
        }else{
          return false;
        $this->db->liberar($consulta);
        $this->db->close();
        }
      
    }else{

      $marca_producto = $this->db->recorrer($verificar)[0];
      if(strtolower($nmarca) == strtolower($marca_producto)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;La marca ya esta registrada.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }



  }




















}












 ?>
