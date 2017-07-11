<?php

class Producto {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }


  function registro_producto($id_personac,$ncategoria,$estado_categoria,$fecha_registro){
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





  function registro_tipo_producto($id_usuariop,$ntipo_prod,$estado_tipo_pro,$fecha_registro){
    $consulta = "INSERT INTO alm_tipo_producto(usu_id,tppro_des,tppro_freg,tppro_est) VALUES('$id_usuariop','$ntipo_prod','$fecha_registro','$estado_tipo_pro')";

    $verificar = $this->db->query("SELECT alm_tipo_producto.tppro_des FROM alm_tipo_producto WHERE alm_tipo_producto.tppro_des = '$ntipo_prod'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Tipo de producto registrado correctamente.
              </div>';  
        }else{
          return false;
        $this->db->liberar($consulta);
        $this->db->close();
        }
      
    }else{

      $tipo_producto = $this->db->recorrer($verificar)[0];
      if(strtolower($ntipo_prod) == strtolower($tipo_producto)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;El tipo ya esta registrado.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }



  }


  function registro_presentacion($id_usuariop,$npresentacion,$estado_presentacion,$fecha_registro){
    $consulta = "INSERT INTO alm_presentacion(usu_id,pres_desc,pres_freg,pres_est) VALUES('$id_usuariop','$npresentacion','$fecha_registro','$estado_presentacion')";

    $verificar = $this->db->query("SELECT alm_presentacion.pres_desc FROM alm_presentacion WHERE alm_presentacion.pres_desc = '$npresentacion'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Presentación correctamente.
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


  function registro_lote($id_usuariop,$nlote,$estado_lote,$fecha_registro){
    $consulta = "INSERT INTO alm_lote(usu_id,lote_desc,lote_freg,lote_est) VALUES('$id_usuariop','$nlote','$fecha_registro','$estado_lote')";

    $verificar = $this->db->query("SELECT alm_lote.lote_desc FROM alm_lote WHERE alm_lote.lote_desc = '$nlote'");

    if($this->db->rows($verificar) == 0){

      if ($this->db->query($consulta)) {
        
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Lote registrado correctamente.
              </div>';  
        }else{
          return false;
        $this->db->liberar($consulta);
        $this->db->close();
        }
      
    }else{

      $lote = $this->db->recorrer($verificar)[0];
      if(strtolower($nlote) == strtolower($lote)){
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;El lote ya esta registrada.
          </div>';
      }
    $this->db->liberar($verificar);
    $this->db->close();
    }



  }




/***************lista de tipo de producto***************/
function listar_tipo_producto(){
  $sql = "SELECT  tppro_id,tppro_des FROM alm_tipo_producto";
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

/***************lista de categoria de producto***************/
function listar_categoria_producto(){
  $sql = "SELECT  cate_id,cate_desc FROM alm_categoria";
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

/***************lista de marca de producto***************/
function listar_marca_producto(){
  $sql = "SELECT  marca_id,marca_desc FROM alm_marca WHERE alm_marca.marca_est = 1";
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
/*
$instancia = new Producto();
if ($instancia->registro_producto('2','descripcion29','1','2017-06-09')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}

*/
 ?>
