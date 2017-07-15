<?php

class TipoProducto {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }

function listar_tipo_prod($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT *, CASE alm_tipo_producto.tppro_est WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END estado from alm_tipo_producto WHERE alm_tipo_producto.tppro_des LIKE '%".$valor."%' ORDER BY alm_tipo_producto.tppro_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT *, CASE alm_tipo_producto.tppro_est WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END estado from alm_tipo_producto WHERE alm_tipo_producto.tppro_des LIKE '%".$valor."%' ORDER BY alm_tipo_producto.tppro_id DESC";
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
