
function __(id){
  return document.getElementById(id);
}


/********************************************************/
function reg_categoria(){
  
  if (true) {

  //var emaill = document.getElementById("get_pass_user").value;
  //var formusuario = new FormData($("#formulario_categoria")[0]);
  var txtcategoria = $("#txtcategoria").val();
  //var txtdescripcion = $("#txtdescripcion").val();
  var txtusuario = $("#usuarioa_id").val();
  var txtestadocat = $("#txtestado_categoria").val();
 
  //    data: 'tipo_usuario='+tipo_usuario+'&dato=r_titpo_user',
  var opcion = "registrar";

  var msj_cat;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_categoria.php',
		type: 'POST',
    data: {
      txtcategoria:txtcategoria,
      txtdescripcion:txtdescripcion,
      txtusuario:txtusuario,
      txtestadocat:txtestadocat,
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
    document.getElementById('msj_categoria').innerHTML = msj_cat;

		},
    complete: function(){
      
      //alert("se completo el envio");
    },
		success: function(data){

    document.getElementById('msj_categoria').innerHTML = data;

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
  document.getElementById('msj_categoria').innerHTML = msj_cat;
}

}

