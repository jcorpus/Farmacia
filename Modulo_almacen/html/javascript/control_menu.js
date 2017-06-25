$(document).ready(function(){
	var usuario_panel = $("#tipo_usuarioo").val();

	switch(usuario_panel){

		case "Administrador":
		console.log("acceso a todo");
		break;

		case "Tecnico":
		$("#empleados_a").hide();
		break;

		case "Otro":
		break;


	}



});