<?php

class Presentacion {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }


function modificar_present($id_presentacion2,$id_usuarioa2,$npresentacion2,$fecha_registro,$est_present2){
$sql = "UPDATE alm_presentacion SET alm_presentacion.usu_id = '$id_usuarioa2',alm_presentacion.pres_desc = '$npresentacion2', alm_presentacion.pres_freg = '$fecha_registro', alm_presentacion.pres_est = '$est_present2' WHERE alm_presentacion.pres_id = '$id_presentacion2'";
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


function listar_present($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT * , CASE alm_presentacion.pres_est WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END estado FROM alm_presentacion WHERE alm_presentacion.pres_desc LIKE '%".$valor."%' ORDER BY alm_presentacion.pres_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT * , CASE alm_presentacion.pres_est WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END estado FROM alm_presentacion WHERE alm_presentacion.pres_desc LIKE '%".$valor."%' ORDER BY alm_presentacion.pres_id DESC";
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



  function registro_presentacion($id_usuariop,$npresentacion,$estado_presentacion,$fecha_registro){
    $consulta = "INSERT INTO alm_presentacion(usu_id,pres_desc,pres_freg,pres_est) VALUES('$id_usuariop','$npresentacion','$fecha_registro','$estado_presentacion')";

    $verificar = $this->db->query("SELECT alm_presentacion.pres_desc FROM alm_presentacion WHERE alm_presentacion.pres_desc = '$npresentacion'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Presentación registrada correctamente.
              </div>';  
        }else{
          return false;
        $this->db->liberar($consulta);
        $this->db->close();
        }
      
    }else{

      $presentacion = $this->db->recorrer($verificar)[0];
      if(strtolower($npresentacion) == strtolower($presentacion)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;La presentacion ya esta registrada.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }
  }



















}












 ?>
