<?php

////EJEMPLO
//http://www.apoyoti.com/clase-simple-en-php-para-conexion-a-base-de-datos-mysql/

class Usuario {
    private $db;
    public function __construct(){
    require_once('../core/models/model_conexion.php');
    $this->db = new Conexion2();
  }


//$this->db->rows($verificar) == 0

  function registro_user($id_persona,$usuario_nombre, $pass_encrip, $usuario_img, $fecha_registro, $estado_user,$email_usuarior){
    $verificar = $this->db->query("SELECT usuario.usu_email FROM alm_usuario usuario WHERE usu_email = '$email_usuarior' LIMIT 1");
    if ($this->db->rows($verificar) == 0) {
      $consulta = "INSERT INTO alm_usuario(perso_id,usu_nom,usu_pass,usu_email,usu_freg,usu_img,usu_est) 
        VALUES('$id_persona','$usuario_nombre','$pass_encrip','$email_usuarior',
        '$fecha_registro','$usuario_img','$estado_user')";
     
      if ($this->db->query($consulta)) {
          
          echo '<div class="alert alert-success alert-dismissible" id="correcto">
    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    			  <i class="icon fa fa-check"></i>&nbsp;Usuario registrado correctamente
    				</div>';

        return true;
      }else{
        return false;
      }
      $this->db->liberar($verificar);
      $this->db->close();
    }else{
      $email_verificar = $this->db->recorrer($verificar)[0];
      if (strtolower($email_usuarior) == strtolower($email_verificar)) {
        echo '<div class="alert alert-warning alert-dismissible" id="correcto">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="icon fa fa-times"></i>&nbsp;El usuario ya esta registrado
          </div>';
      }
    }
    $this->db->close();
  }

}

/*
$instancia = new Usuario();
$resp = $instancia->listar_user("",0,1);
print_r($resp);
*/

/*

$instancia = new Usuario();
if ($instancia->registro_user('2','45456756','corpus','mechato','2017-06-07','1','nombree','julio@gmal.com')) {
  echo "registro correcto";
}else{
  echo "ocurrio un error";
}

*/

/*

$instancia = new Usuario();

$var = $instancia->editar_user('julioo','corpus','mechato');
*/


 ?>
