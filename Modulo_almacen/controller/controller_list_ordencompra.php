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
  $a = $instancia->listar_ordencompra($valor);
  $b = count($a);
  $c = $instancia->listar_ordencompra($valor,$inicio,$limite);
  
  ///se imprime para poder exponerlos con json_encode javascript
  echo json_encode($c)."*".$b;
}


 ?>
