<?php
require_once ('module/model/model_tipo_nota_salida.php');
$model = new model_tipo_nota_salida();
if(isset($_POST['txtidtiponotasalida']) && isset($_POST['txtdescripcion'])){
    $id = (int) $_POST['txtidtiponotasalida'];
    if($id===0){
        $model->guardar($_POST['txtdescripcion']);
    }else{
        $model->actualizar($id, $_POST['txtdescripcion']);
    }
}
if(isset($_GET['id']) && isset($_GET['action'])){
    if($_GET['action']=='eliminar'){
        $model->eliminar($_GET['id']);
    }
}

$lista = $model->listar();
require_once('module/view/tipo_nota_salida/v_lista.php');