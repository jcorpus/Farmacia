<?php
require ("../model/model_present.php");

$boton = $_POST['boton'];
if($boton==='buscar'){
  $inicio = 0;
  $limite = 5;
  if(isset($_POST['pagina'])){
    $pagina = $_POST['pagina'];
    $inicio = ($pagina -1) * $limite;
  }
  $valor = $_POST['valor'];
  $instancia = new Presentacion();
  $a = $instancia->listar_present($valor);
  $b = count($a);
  $c = $instancia->listar_present($valor,$inicio,$limite);
  
  ///se imprime para poder exponerlos con json_encode javascript
  echo json_encode($c)."*".$b;
}


 ?>
