
function __(id){
  return document.getElementById(id);
}



/****************Validar campos vacios*************/
function validate_trab () {
    var campos, valido, resp, radioo;

    // todos los campos .form-control en #campos
    campos = document.querySelectorAll('#formulario_trabajador input.validacion');

    valido = true; // es valido hasta demostrar lo contrario
    // recorremos todos los campos
    [].slice.call(campos).forEach(function(campo) {
        //console.log(campo.value.trim());

        if (campo.value.trim() === '') {
            valido = false;
        }
    });

    if (valido) {
      //alert("validoo");
      valido = true;
    } else {

      valido = false;
      //document.getElementsByClassName("resp_c") = resp;
    }
    return valido;
}

/********************************************************/

function reg_producto(){
  
  if (true) {

  //var emaill = document.getElementById("get_pass_user").value;
  var frmproducto = new FormData($("#formulario_producto")[0]);

  var msjpass;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
	$.ajax({
		url:'controller/controller_producto.php',
		type: 'POST',
    data: frmproducto,
    cache:false,  //si el navegador debe almacenar en cache la pagina solicitada
    contentType: false, //"application / x-www-form-urlencoded"
    processData: false, //
		beforeSend: function(){
    msjpass = '<div class="alert alert-dismissible alert-warning"> ';
    msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    msjpass += ' <p> Enviando .....</p>'
    msjpass += '</div>';
    document.getElementById('msj_res_producto').innerHTML = msjpass;

		},
    complete: function(){
      //$("#loading_user").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
      //alert("se completo el envio");
      
    },
		success: function(data){
    //alert("los datos son:"+data);
    if(data > 1){
    var codigo_producto = JSON.parse(data);
    registrar_detalle_presentacion(codigo_producto);
        msjpass = '<div class="alert alert-dismissible alert-success"> ';
        msjpass += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        msjpass += ' <p>Producto Registrado Correctamente</p>'
        msjpass += '</div>';

    document.getElementById('msj_res_producto').innerHTML = msjpass;
    $("#nombre_trabajador").val('');
    $("#apep_trabajador").val('');
    $("#apem_trabajador").val('');
    $("#domicilio_trabajador").val('');
    $("#telefono_trabajador").val('');
    $("#email_trabajador").val('');
    $("#codigo_trabajador").val('');
    $("#dni_trabajador").val('');
    }else{
      alert("faltan datos");
    }

  
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
  msjpass += ' <p><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Faltan Datos...</p>'
  msjpass += '</div>';
  document.getElementById('msj_res_producto').innerHTML = msjpass;
}

}



///////////////
function limpiar_trabajador(){
  


  
  
}


