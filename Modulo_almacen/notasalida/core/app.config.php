<?php
define('DB_NAME', 'teamchec_farmacia');
define('DB_HOST', 'localhost');
define('DB_USER', 'teamchec_farmaci');
define('DB_PASS', '123456789');

define('MSG_INSERT', 'Se ha guardado el registro correctamente.');
define('MSG_DELETE', 'Se ha eliminado el registro correctamente.');
define('MSG_UPDATE', 'Se ha actualizado el registro correctamente.');
define('MSG_ERROR', 'Se ha producido un error, intente en unos minutos.');

function show_alert_dismissable($message, $title='Confirmación', $type='success', $icon='fa fa-check'){
    echo '<div class="alert alert-'.$type.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon '.$icon.'"></i> '.$title.'</h4>'.$message.'</div>';
}
