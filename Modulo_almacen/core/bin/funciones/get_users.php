<?php
function ver_usuarios(){
  $db = new Conexion();
  //$sql = $db->query("SELECT * FROM usuarios");
  //$sql = $db->query("SELECT* FROM usuarios inner join persona on persona.id_persona = usuarios.id_persona ");
  $sql = $db->query("call sp_listar_usuarios()");
  if ($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)){
      $usuarios[$d['perso_id']] = array(
        'perso_id' => $d['perso_id'],
        'perso_nom' => $d['perso_nom'],
        'usu_nom' => $d['usu_nom'],
        'perso_email' => $d['perso_email'],       
        'usu_est' =>$d['usu_est'],
        'usu_img' =>$d['usu_img'],
        'usu_id' =>$d['usu_id']
      );
    }
  }else{
    $usuarios = false;

  }
  $db->liberar($sql);
  $db->close();

  return $usuarios;
}

 ?>
