<?php

class Producto {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion();
  }


  function registrar_producto($id_usuario2,$fecha_registro,$nombre_prod,$marca_prod,$tipo_prod,$categoria_prod,$fraccion_prod,$presentacion_prod,$concentracion_prod,$codigolote_prod,$reglasanitaria_prod,$fechavencimiento_prod,$unidadm_prod,$stockmin_prod,$preciocomp_prod,$stockmax_prod,$preciovent_prod,$cantidad_prod,$estado_prod){
    $consulta = "INSERT INTO glb_producto(prod_Nom,marca_id,tppro_id,cate_id,lote_id,usu_id,prod_umed,prod_nrsa,prod_fvc,prod_stmx,prod_stmin,prod_prcm,prod_prvt,prod_cant,prod_freg,prod_est) VALUES('$nombre_prod','$marca_prod','$tipo_prod','$categoria_prod','$codigolote_prod','$id_usuario2','$unidadm_prod','$reglasanitaria_prod','$fechavencimiento_prod','$stockmax_prod','$stockmin_prod','$preciocomp_prod','$preciovent_prod','$cantidad_prod','$fecha_registro','$estado_prod')";

    $consulta2 = "INSERT INTO alm_detpresentacion(prod_id,pres_id,dtpre_Concet,dtpre_fraccion)
        VALUES(LAST_INSERT_ID(),'$presentacion_prod','$concentracion_prod','$fraccion_prod')";

      if ($this->db->query($consulta)) {
          if($this->db->query($consulta2)){
            echo '<div class="alert alert-success alert-dismissible" id="correcto">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="icon fa fa-check"></i>&nbsp;Producto registrada correctamente.
              </div>'; 

          }else{echo "error";}
         
        }else{
        
          echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;ocurrio un error.
          </div>';
        return false;
        $this->db->liberar($consulta);
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


/***************** lista de productos ****************/
function listar_producto($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT * FROM glb_producto WHERE glb_producto.prod_Nom LIKE '%".$valor."%' ORDER BY glb_producto.prod_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT * FROM glb_producto WHERE glb_producto.prod_Nom LIKE '%".$valor."%' ORDER BY glb_producto.prod_id DESC";
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


function listar_unidadm_producto(){
  $sql = "SELECT  uni_id,uni_des FROM alm_unidad_medida WHERE alm_unidad_medida.uni_est = 1";
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



function listar_lotes($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT *, CASE alm_lote.lote_est WHEN 1 THEN 'activo' WHEN 0 THEN 'inactivo' END estado FROM alm_lote  WHERE alm_lote.lote_desc LIKE '%".$valor."%' ORDER BY alm_lote.lote_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT * FROM alm_lote WHERE alm_lote.lote_desc LIKE '%".$valor."%' ORDER BY alm_lote.lote_id DESC";
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


function listar_ordencompra($valor, $inicio=FALSE,$limite=FALSE){
  if ($inicio!==FALSE && $limite!==FALSE) {
    $sql = "SELECT *  FROM com_ordencompra  WHERE com_ordencompra.coti_id LIKE '%".$valor."%' ORDER BY com_ordencompra.ocom_id DESC LIMIT $inicio,$limite";
  }else{
    $sql = "SELECT *  FROM com_ordencompra  WHERE com_ordencompra.coti_id LIKE '%".$valor."%' ORDER BY com_ordencompra.ocom_id DESC";
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
$instancia = new Producto();
$resp = $instancia->listar_unidadm_producto();
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
