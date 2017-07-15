
function __(id){
  return document.getElementById(id);
}

function runtipo_prod(e){
  if (e.keyCode == 13) {
    reg_tipo_pro();
    alert("boton enter here");
  }
}


/********************************************************/
function reg_tipo_pro(){
  
  if (true) {

  //var emaill = document.getElementById("get_pass_user").value;
  //var formusuario = new FormData($("#formulario_categoria")[0]);

  var txtusuario = $("#usuarioa_id").val();
  var txtestado_tipo = $("#txtestado_tipo").val();
  var opcion = "registrar"
  var tipopro_nom = $("#txttipopro").val();
  //alert("datos: "+tipopro_nom+" - "+txtestado_tipo);

  var msj_cat;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_reg_tipo_pro.php',
		type: 'POST',
    data: {
      tipopro_nom:tipopro_nom,
      txtusuario:txtusuario,
      txtestado_tipo:txtestado_tipo,
      opcion:opcion
    },
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    //contentType: false, //"application / x-www-form-urlencoded"
    //processData: false, //
		beforeSend: function(){
    msj_cat = '<div class="alert alert-dismissible alert-warning"> ';
    msj_cat += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msj_cat += ' <p> Enviando .....</p>'
    msj_cat += '</div>';
    document.getElementById('msj_tipo_pro').innerHTML = msj_cat;

		},
    complete: function(){
      
      //alert("se completo el envio");
    },
		success: function(data){

    document.getElementById('msj_tipo_pro').innerHTML = data;
    listar_tipoprod('','1');

    /*

			if(respuesta.length>0){
        msjpass = '<div class="alert alert-dismissible alert-success"> ';
        msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        msjpass += ' <p> Enviado Correctamente</p>'
        msjpass += '</div>';
        document.getElementById('msj_get_pass').innerHTML = msjpass;

			}else{


			}
      */

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
  document.getElementById('msj_tipo_pro').innerHTML = msj_cat;
}

}

