<?php

class Almacen {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }




  function registro_almacen($id_personac,$nalmacen,$ndireccion_aml,$estado_almacen,$fecha_registro){
    $consulta = "INSERT INTO alm_almacen(usu_id,alm_nom,alm_dire,alm_freg,alm_est) VALUES('$id_personac','$nalmacen','$ndireccion_aml','$fecha_registro','$estado_almacen')";

    $verificar = $this->db->query("SELECT alm_almacen.alm_nom FROM alm_almacen WHERE alm_almacen.alm_nom = '$nalmacen'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Almacen registrado correctamente.
              </div>';  
        }else{
          return false;
        $this->db->liberar($consulta);
        $this->db->close();
        }
      
    }else{

      $almacen = $this->db->recorrer($verificar)[0];
      if(strtolower($nalmacen) == strtolower($almacen)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;El almacen ya esta registrado.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }



  }



function listar_almacen($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT * FROM alm_almacen WHERE alm_almacen.alm_nom LIKE '%".$valor."%' ORDER BY alm_almacen.alm_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT * FROM alm_almacen WHERE alm_almacen.alm_nom LIKE '%".$valor."%' ORDER BY alm_almacen.alm_id DESC";
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







function modificar_almacen($id_almacen2,$id_usuarioa2,$nalmacen2,$ndireccion_aml,$fecha_registro,$est_almacen2){
$sql = "UPDATE alm_almacen SET alm_almacen.usu_id = '$id_usuarioa2',alm_almacen.alm_nom = '$nalmacen2', alm_almacen.alm_dire = '$ndireccion_aml', alm_almacen.alm_freg = '$fecha_registro', alm_almacen.alm_est = '$est_almacen2' WHERE alm_almacen.alm_id = '$id_almacen2'";
  
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












}

 ?>
