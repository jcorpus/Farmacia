<?php
require ("../model/model_categoria.php");

$boton = $_POST['boton'];
if($boton==='buscar'){
  $inicio = 0;
  $limite = 5;
  if(isset($_POST['pagina'])){
    $pagina = $_POST['pagina'];
    $inicio = ($pagina -1) * $limite;
  }
  $valor = $_POST['valor'];
  $instancia = new Categoria();
  $a = $instancia->listar_categoria_producto($valor);
  $b = count($a);
  $c = $instancia->listar_categoria_producto($valor,$inicio,$limite);
  
  ///se imprime para poder exponerlos con json_encode javascript
  echo json_encode($c)."*".$b;
}

/*

$instancia = new Categoria();
$resp = $instancia->listar_categoria_producto("",0,1);
print_r($resp);

*/



 ?>
