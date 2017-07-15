<?php
require ("../model/model_producto.php");

$boton = $_POST['boton'];
if($boton==='buscar'){
  $inicio = 0;
  $limite = 5;
  if(isset($_POST['pagina'])){
    $pagina = $_POST['pagina'];
    $inicio = ($pagina -1) * $limite;
  }
  $valor = $_POST['valor'];
  $instancia = new Producto();
  $a = $instancia->listar_producto($valor);
  $b = count($a);
  $c = $instancia->listar_producto($valor,$inicio,$limite);
  
  ///se imprime para poder exponerlos con json_encode javascript
  echo json_encode($c)."*".$b;
}

/*
$instancia = new Producto();
$resp = $instancia->listar_producto("",0,1);
print_r($resp);
*/


 ?>
