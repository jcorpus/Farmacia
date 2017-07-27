<?php
require_once ('module/model/model_nota_salida.php');
$model = new model_nota_salida();
$action = empty($_GET['action'])?'lista': $_GET['action'];
$url = '?controller=nota_salida&action='.$action;
if($action=='nuevo'){
    $entity = [
        'prio_id' => '',
        'tipnts_id' => '',
        'sold_id' => '',
        'nts_num' => '',
        'nts_mten' => '',
        'nts_cant' => '',
        'nts_fnt' => '',
        'nts_obs' => ''
    ];
    require_once('module/view/nota_salida/v_registro.php');
    if(isset($_POST['submit'])){
        $model->insertar();
    }
}else if($action=='editar'){
    $entity = $model->get($_GET['id'])[0];
    if(isset($_POST['submit'])){
        $model->actualizar();
    }
    require_once('module/view/nota_salida/v_registro.php');
}else if($action=='eliminar'){
    $lista = $model->eliminar();
    require_once('module/view/nota_salida/v_lista.php');
} else{
    $lista = $model->listar();
    require_once('module/view/nota_salida/v_lista.php');
}