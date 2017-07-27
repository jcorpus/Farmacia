<?php

class Inventario {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }




  function registro_tipoinventario($id_usuarioi,$ntipoi,$estado_tipoi,$fecha_registro){
    $consulta = "INSERT INTO alm_tipoinventario(usu_id,tpiv_des,tpiv_freg,tpiv_est) VALUES('$id_usuarioi','$ntipoi','$fecha_registro','$estado_tipoi')";

    $verificar = $this->db->query("SELECT alm_tipoinventario.tpiv_des FROM alm_tipoinventario WHERE alm_tipoinventario.tpiv_des = '$ntipoi'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Tipo de inventario registrado correctamente.
              </div>';  
        }else{
          return false;
        $this->db->liberar($consulta);
        $this->db->close();
        }
      
    }else{

      $tipoinvent = $this->db->recorrer($verificar)[0];
      if(strtolower($ntipoi) == strtolower($tipoinvent)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;El tipo ya esta registrado.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }



  }


function listar_tipo_invent($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT *, CASE alm_tipoinventario.tpiv_est WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END estado FROM alm_tipoinventario WHERE alm_tipoinventario.tpiv_des LIKE '%".$valor."%' ORDER BY alm_tipoinventario.tpiv_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT *, CASE alm_tipoinventario.tpiv_est WHEN 1 THEN 'Activo' WHEN 0 THEN 'Inactivo' END estado FROM alm_tipoinventario WHERE alm_tipoinventario.tpiv_des LIKE '%".$valor."%' ORDER BY alm_tipoinventario.tpiv_id DESC";
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







function modificar_tipoinv($id_usuario2,$id_tipoin2,$ntipoin2,$estado_tipoi2,$fecha_registro){
$sql = "UPDATE alm_tipoinventario SET alm_tipoinventario.usu_id = '$id_usuario2',alm_tipoinventario.tpiv_des = '$ntipoin2', alm_tipoinventario.tpiv_freg = '$fecha_registro', alm_tipoinventario.tpiv_est = '$estado_tipoi2' WHERE alm_tipoinventario.tpiv_id = '$id_tipoin2'";
  
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


function listar_almacen_combo(){
  $sql = "SELECT alm_id,alm_nom FROM alm_almacen WHERE alm_almacen.alm_est = 1";
  $consulta = $this->db->query($sql);
  $arreglo = array();
  if($this->db->rows($consulta) > 0){
    while($consulta_b =$this->db->recorrer($consulta)){
      $arreglo[] = $consulta_b;
    }

  }else{
    echo "no hay datos a mostrar";
  }

  $this->db->liberar($consulta);
  $this->db->close();
  return $arreglo;
}









}

 ?>
