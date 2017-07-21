
function __(id){
  return document.getElementById(id);
}


/********************************************************/
function reg_tpntingreso(){
  
  if (true) {
  //var formusuario = new FormData($("#formulario_categoria")[0]);
  var tpnotaingreso = $("#txttiponotaingreso").val();
  var tpnotaestado = $("#estadonotaingreso").val();
  var txtusuario = $("#usuarioa_id").val();
  alert("datos: "+tpnotaingreso+" - "+tpnotaestado);
  //    data: 'tipo_usuario='+tipo_usuario+'&dato=r_titpo_user',
  var opcion = "registrar";
  var msj_cat;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_tiponingreso.php',
		type: 'POST',
    data: {
      tpnotaingreso:tpnotaingreso,
      tpnotaestado:tpnotaestado,
      txtusuario:txtusuario,
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
    document.getElementById('msj_rnotaingre').innerHTML = msj_cat;

		},
    complete: function(){
      
      //alert("se completo el envio");
    },
		success: function(data){

    document.getElementById('msj_rnotaingre').innerHTML = data;


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
  document.getElementById('msj_rnotaingre').innerHTML = msj_cat;
}

}

