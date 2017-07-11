<?php
require ("../model/model_producto.php");
$inst = new Producto();
$consulta = $inst->listar_unidadm_producto();
echo json_encode($consulta);












 ?>
