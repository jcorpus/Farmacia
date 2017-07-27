<?php

class model_nota_salida
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::getInstance();
    }

    public function insertar(){
        $sqlformat = "INSERT INTO `alm_notasalida`(`tipnts_id`, `usu_id`, `prio_id`, `sold_id`, `nts_num`, `nts_mten`, `nts_cant`, `nts_freg`, `nts_fnt`, `nts_obs`, `nts_est`) VALUES ('%s','%s','%s','%s','%s','%s','%s',curdate(),'%s','%s','1')";
        $sql = sprintf($sqlformat);
        $result = $this->db->mysql->query($sql, $_POST['tipo'], 3, $_POST['prioridad'], $_POST['solicitud'], $_POST['numero'], $_POST['metodo'], $_POST['cantidad'], $_POST['fsalida'], $_POST['observacion']);
        if($result){
            show_alert_dismissable(MSG_INSERT);
        }else{
            show_alert_dismissable(MSG_ERROR.': <br>'.$this->db->mysql->error, 'Error', 'danger', 'fa fa-ban');
        }
    }

    public function actualizar(){
        $sqlformat = "UPDATE `alm_notasalida` SET `tipnts_id`='%s',`prio_id`='%s',`sold_id`='%s',`nts_num`='%s',`nts_mten`='%s',`nts_cant`='%s',`nts_fnt`='%s',`nts_obs`='%s' WHERE `nts_id`='%s'";
        $sql = sprintf($sqlformat, $_POST['tipo'], $_POST['prioridad'], $_POST['solicitud'], $_POST['numero'], $_POST['metodo'], $_POST['cantidad'], $_POST['fsalida'], $_POST['observacion'], $_POST['idnota']);
        $result = $this->db->mysql->query($sql);
        if($result){
            show_alert_dismissable(MSG_UPDATE);
        }else{
            show_alert_dismissable(MSG_ERROR.': <br>'.$this->db->mysql->error, 'Error', 'danger', 'fa fa-ban');
        }
    }

    public function eliminar(){
        $sql = "DELETE FROM `alm_tnotasalida` WHERE `tpnts_id`= ".$_GET['id'];
        $result = $this->db->mysql->query($sql);
        if($result){
            show_alert_dismissable(MSG_DELETE);
        }else{
            show_alert_dismissable(MSG_ERROR.': <br>'.$this->db->mysql->error, 'Error', 'danger', 'fa fa-ban');
        }
    }

    public function listar(){
        $sql = 'SELECT * FROM alm_notasalida ns INNER JOIN alm_tiponotasalida tns ON ns.tipnts_id=tns.tpnts_id';
        return $this->db->fetchAll($sql);
    }

    public function get($id){
        $sql = 'SELECT * FROM alm_notasalida ns INNER JOIN alm_tiponotasalida tns ON ns.tipnts_id=tns.tpnts_id WHERE ns.nts_id=\''.$id.'\'';
        return $this->db->fetchAll($sql);
    }

}