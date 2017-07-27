<?php
class model_tipo_nota_salida
{
    protected $db;
    public function __construct()
    {
        $this->db = Conexion::getInstance();
    }

    public function listar(){
        $sql = 'SELECT * FROM alm_tiponotasalida';
        return $this->db->fetchAll($sql);
    }

    public function guardar($descripcion){
        $sql = "INSERT INTO `alm_tiponotasalida`(`usu_id`, `tpnts_des`, `tpnts_freg`, `tpnts_est`) VALUES (3,'$descripcion',curdate(),'1')";
        $result = $this->db->mysql->query($sql);
        if($result){
            show_alert_dismissable(MSG_INSERT);
        }else{
            show_alert_dismissable(MSG_ERROR.': <br>'.$this->db->mysql->error, 'Error', 'danger', 'fa fa-ban');
        }
    }
    public function actualizar($id, $descripcion){
        $sql = "UPDATE `alm_tiponotasalida` SET `tpnts_des`='$descripcion' WHERE `tpnts_id`= '$id'";
        $result = $this->db->mysql->query($sql);
        if($result){
            show_alert_dismissable(MSG_UPDATE);
        }else{
            show_alert_dismissable(MSG_ERROR.': <br>'.$this->db->mysql->error, 'Error', 'danger', 'fa fa-ban');
        }
    }

    public function eliminar($id){
        $sql = "DELETE FROM `alm_tiponotasalida` WHERE `tpnts_id`= '$id'";
        $result = $this->db->mysql->query($sql);
        if($result){
            show_alert_dismissable(MSG_DELETE);
        }else{
            show_alert_dismissable(MSG_ERROR.': <br>'.$this->db->mysql->error, 'Error', 'danger', 'fa fa-ban');
        }
    }
}