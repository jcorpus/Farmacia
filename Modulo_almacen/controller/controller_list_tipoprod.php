<?php
require ("../model/model_tipo_prod.php");

$boton = $_POST['boton'];
if($boton==='buscar'){
  $inicio = 0;
  $limite = 5;
  if(isset($_POST['pagina'])){
    $pagina = $_POST['pagina'];
    $inicio = ($pagina -1) * $limite;
  }
  $valor = $_POST['valor'];
  $instancia = new TipoProducto();
  $a = $instancia->listar_tipo_prod($valor);
  $b = count($a);
  $c = $instancia->listar_tipo_prod($valor,$inicio,$limite);
  
  ///se imprime para poder exponerlos con json_encode javascript
  echo json_encode($c)."*".$b;
}


 ?>
