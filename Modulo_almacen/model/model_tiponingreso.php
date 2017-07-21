<?php

class NotaIngreso {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }





  function reg_tiponotein($id_usuarioni,$ntiponotaingreso,$estadotiponota,$fecha_registro){
    $consulta = "INSERT INTO alm_tiponotaingreso(usu_id,tpnti_des,tpnti_freg,tpnti_est) VALUES('$id_usuarioni','$ntiponotaingreso','$fecha_registro','$estadotiponota')";

    $verificar = $this->db->query("SELECT alm_tiponotaingreso.tpnti_des FROM alm_tiponotaingreso WHERE alm_tiponotaingreso.tpnti_des = '$ntiponotaingreso'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Tipo registrado correctamente.
              </div>';  
        }else{
          return false;
        $this->db->liberar($consulta);
        $this->db->close();
        }
      
    }else{

      $tiponingreso = $this->db->recorrer($verificar)[0];
      if(strtolower($ntiponotaingreso) == strtolower($tiponingreso)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;el tipo ya esta registrado.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }



  }



function listar_tiponotai($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT *, CASE alm_tiponotaingreso.tpnti_est WHEN 1 THEN 'activo' WHEN 0 THEN 'inactivo' END estado FROM alm_tiponotaingreso WHERE alm_tiponotaingreso.tpnti_des LIKE '%".$valor."%' ORDER BY alm_tiponotaingreso.tpnti_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT *, CASE alm_tiponotaingreso.tpnti_est WHEN 1 THEN 'activo' WHEN 0 THEN 'inactivo' END estado FROM alm_tiponotaingreso WHERE alm_tiponotaingreso.tpnti_des LIKE '%".$valor."%' ORDER BY alm_tiponotaingreso.tpnti_id DESC ";
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












 ?>
