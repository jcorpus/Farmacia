
 $(document).ready(function(){
    listar_tipoprod('','1');
    $(".oculto").hide();

  });


function buscar_tipo_prod(){
	var bus = $("#buscar_tipoprod").val();
	listar_tipoprod(bus,'1');

}


function listar_tipoprod(valor,pagina){
	//valor = valor que el usuario escribe para mostrar los datos por apellido o nombre
	var pagina = Number(pagina);
	$.ajax({
		url:'controller/controller_list_tipoprod.php',
		type: 'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar',
		beforeSend: function(){
			//<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
			//alert("enviando");
			$("#loading_tipoprod").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
			//$("#cargando").show();

		},
    complete: function(){
      $("#loading_tipoprod").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
    },
		success: function(resp){
			if(resp.length>0){
			var datos = resp.split("*"); //separamos el json de el numero de filas que hay en la TABLA
			var valores = eval(datos[0]); //me trae solo los datos menos el numero de filas
			//alert("los valores son: "+valores.length); //son 5
			var cadena = "";
			cadena += "<table class='table table-bordered table-hover '>";
			cadena += "<thead class=''>";
			cadena += "<tr>";
			cadena += "<th>#</th>";
			cadena += "<th>Nombre</th>";
			cadena += "<th>Fecha de registro</th>";
			cadena += "<th>Estado</th>";
			cadena += "<th>Acción</th>";
			cadena += "</tr>";
			cadena += "</thead>";
			cadena += "<tbody>";

			for(var i = 0 ; i<valores.length; i++){
				datos_array =valores[i][0]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5];
				cadena += "<tr>";
				/*cadena += "<td>"+(i+1)+"</td>";*/
				cadena += "<td>"+valores[i][0]+"</td>";
				cadena += "<td>"+valores[i][2]+"</td>";
				cadena += "<td>"+valores[i][3]+"</td>";
				cadena += "<td>"+valores[i][5]+"</td>";
				cadena += "<td><div class='btn-group'> <button type='button' class='btn btn-success ' data-toggle='dropdown' aria-expanded='false'>Acción <span class='glyphicon glyphicon-cog'></span></button> <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-expanded='false'> <span class='caret'></span></button> <ul class='dropdown-menu' role='menu'> <li><a href='#' data-toggle='modal' data-target='#myModal_modificara' onclick='mostrar_almacen("+'"'+datos_array+'"'+");'>Modificar</a></li> <li class='divider'></li> <li><a href='#' data-toggle='modal' data-target='#myModal_eliminar'  onclick='eliminar_almacen("+'"'+datos_array+'"'+");' >Eliminar</a></li> </ul> </div></td>";
				cadena += "</tr>";

			}
			cadena += "</tbody>";
			cadena += "</table>";

			$("#listar").html(cadena);

			var totaldatos = datos[1];
			//alert("total de datos"+totaldatos);
			var numero_paginas = Math.ceil(totaldatos/5); //el Math.ceil acerca el resultado al próximo entero
			//alert("total de paginas"+numero_paginas);
			var buscar_tipoprod = $("#buscar_tipoprod").val();


			var paginar = "<ul class='pagination'>";
			if(pagina>1){

				//entidad html «  equivale a = &laquo
				//entidad html ‹  equivale a = &lsaquo
				//entidad html ›  equivale a = &rsaquo
				//entidad html »  equivale a = &raquo

				paginar += "<li><a href='javascript:void(0)' onclick='listar_tipoprod("+'"'+buscar_tipoprod+'","'+1+'"'+")'>&laquo;</a></li>";
				paginar += "<li><a href='javascript:void(0)' onclick='listar_tipoprod("+'"'+buscar_tipoprod+'","'+(pagina-1)+'"'+")'>Anterior</a></li>";



			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&laquo;</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Anterior</a></li>";

			}

			limite = 10;
			div = Math.ceil(limite/2);
			pagina_inicio = (pagina > div) ? (pagina - div):1;
			if(numero_paginas > div){
				pagina_restante = numero_paginas - pagina;
				pagina_fin = (pagina_restante > div) ? (pagina + div) : numero_paginas;

			}
			else{
				pagina_fin = numero_paginas;

			}

			////////////////////////////////////////////////////////
			for(i = pagina_inicio;i<=pagina_fin;i++){
				if(i==pagina){
					paginar +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				}
				else{
					paginar += "<li><a href='javascript:void(0)' onclick='listar_tipoprod("+'"'+buscar_tipoprod+'","'+i+'"'+")'>"+i+"</a></li>";
				}


			}

			if(pagina < numero_paginas){

				paginar += "<li><a href='javascript:void(0)' onclick='listar_tipoprod("+'"'+buscar_tipoprod+'","'+(pagina+1)+'"'+")'>Siguiente</a></li>";

				paginar += "<li><a href='javascript:void(0)' onclick='listar_tipoprod("+'"'+buscar_tipoprod+'","'+numero_paginas+'"'+")'>&raquo;</a></li>";

			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
			}

			paginar += "</ul>";
			$("#paginador_tipopro").html(paginar);

			//http://codepen.io/Manoz/pen/pydxK

			}
			else{
				var nodatos = " NO HAY DATOS QUE MOSTRAR";
      	alert(nodatos);
				console.log(notados);
			}


		},
		error: function(XMLHttpRequest, textStatus, errorThrown, jqXHR){
			alert("SE PRODUJO UN ERROR");


		}




	});



}


function mostrar_almacen(datos){
	var valores=datos.split("*");
	//alert(d.length);
	$("#id_almacen2").val(valores[0]);
	$("#txtalmacen2").val(valores[1]);
	$("#txtdireccionalm2").val(valores[2]);
	$("#nestado_almacen2").val(valores[4]);


if (valores[4] == 1) {
		$("#nestado_almacen2").val('Activoo');
		
		document.getElementById('activo').checked = true;
		//document.getElementById('inactivo').checked = false;
	}else{
		$("#nestado_almacen2").val('Inactivoo');
		document.getElementById('inactivo').checked = true;
		//document.getElementById('activo').checked = false;
		
	}



}


//****************IMAGEN PREVIEW**************/
 $('.file-input').on('change', function() {
    previewImage(this);
});



/********************************************************/
function mod_almacen(){

  if (true) {

  var txtalmacen2 = $("#txtalmacen2").val();
  var id_almacen2 = $("#id_almacen2").val();
  var txtusuario = $("#usuarioa_id").val();
  var txtdireccionalm2 = $("#txtdireccionalm2").val();
  var txtestadom2 = $("input[name='estado_alm']:checked"). val();



  var opcion = "modificar_alm";
  alert("estado: "+txtestadom2+txtdireccionalm2+txtusuario+id_almacen2,txtalmacen2);

  var msj_cat;
  /// metodos de ajax aqui http://www.w3schools.com/jquery/ajax_ajaxsetup.asp
  $.ajax({
    url:'controller/controller_mod_almacen.php',
    type: 'POST',
    data: {
      txtalmacen2:txtalmacen2,
      id_almacen2:id_almacen2,
      txtusuario:txtusuario,
      txtdireccionalm2:txtdireccionalm2,
      txtestadom2:txtestadom2,
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
    document.getElementById('msj_mod_almacen').innerHTML = msj_cat;

    },
    complete: function(){
      
      //alert("se completo el envio");
    },
    success: function(data){

    document.getElementById('msj_mod_almacen').innerHTML = data;

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
  document.getElementById('msj_mod_almacen').innerHTML = msj_cat;
}

}