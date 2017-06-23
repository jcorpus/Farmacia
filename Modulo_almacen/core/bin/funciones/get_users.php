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

    //insertando 
    $id_obtenido = $usuarios[$_SESSION['app_id']]['perso_id'];
    $fecha_bitacora = date('Y-m-d');
    //echo("valores: ".$id_obtenido);
    //echo "<script>alert('hola por aca'.$id_obtenido); </script>";
    //$sql2 = "INSERT INTO alm_bitacora(usu_id,bit_fechra) VALUES ('$id_obtenido','$fecha_bitacora')";  
    //$db->query($sql2);



  }else{
    $usuarios = false;

  }
  $db->liberar($sql);
  $db->close();

  return $usuarios;
}

 ?>
