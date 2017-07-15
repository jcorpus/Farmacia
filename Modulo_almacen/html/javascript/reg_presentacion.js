
function __(id){
  return document.getElementById(id);
}


/********************************************************/
function reg_presentacion(){
  
  if (true) {

  //var emaill = document.getElementById("get_pass_user").value;
  //var formusuario = new FormData($("#formulario_categoria")[0]);
  var txtnpresentacion = $("#txtpresentacion").val();
  var txtusuario = $("#usuarioa_id").val();
  var estado_present = $("#txtestado_pre").val();
  //alert("datos: "+txtnpresentacion+" usuario "+txtusuario+" estado "+estado_present);
  var msj_cat;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_reg_present.php',
		type: 'POST',
    data: {
      txtnpresentacion:txtnpresentacion,
      estado_present:estado_present,
      txtusuario:txtusuario
    },
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    //contentType: false, //"application / x-www-form-urlencoded"
    //processData: false, //
		beforeSend: function(){
    msj_cat = '<div class="alert alert-dismissible alert-warning"> ';
    msj_cat += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msj_cat += ' <p> Enviando .....</p>'
    msj_cat += '</div>';
    document.getElementById('msj_presentacion').innerHTML = msj_cat;

		},
    complete: function(){
      
      //alert("se completo el envio");
    },
		success: function(data){

    document.getElementById('msj_presentacion').innerHTML = data;
    listar_presentacion('','1');

		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR, vuelve a recargar la pagina");


		}

	});

}else{
  msjpass = '<div class="alert alert-dismissible alert-danger"> ';
  msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  msjpass += ' <i class="icon fa fa-times"></i>&nbsp; Faltan Datos'
  msjpass += '</div>';
  document.getElementById('msj_presentacion').innerHTML = msj_cat;
}

}

