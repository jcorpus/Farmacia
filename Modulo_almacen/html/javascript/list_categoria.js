
 $(document).ready(function(){
    listar_categorias('','1');
    $(".oculto").hide();

  });


function buscar_categoria(){
	var bus = $("#buscar_categoria").val();
	listar_categorias(bus,'1');

}


function listar_categorias(valor,pagina){
	//valor = valor que el usuario escribe para mostrar los datos por apellido o nombre
	var pagina = Number(pagina);
	$.ajax({
		url:'controller/controller_list_categoria.php',
		type: 'POST',
		data:'valor='+valor+'&pagina='+pagina+'&boton=buscar',
		beforeSend: function(){
			//<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
			//alert("enviando");
			$("#loading_categoria").addClass("fa fa-refresh fa-spin fa-3x fa-fw");
			//$("#cargando").show();

		},
    complete: function(){
      $("#loading_categoria").removeClass("fa fa-refresh fa-spin fa-3x fa-fw");
    },
		success: function(resp){
			//alert("los datos: "+resp);
			if(resp.length>0){
			var datos = resp.split("*"); //separamos el json de el numero de filas que hay en la TABLA
			var valores = eval(datos[0]); //me trae solo los datos menos el numero de filas
			//alert("los valores son: "+valores.length); //son 5
			var cadena = "";
			cadena += "<table class='table table-bordered table-hover '>";
			cadena += "<thead class=''>";
			cadena += "<tr>";
			cadena += "<th>#</th>";
			cadena += "<th>Nombre Categoria</th>";
			cadena += "<th>Fecha de registro</th>";
			cadena += "<th>Estado</th>";
			cadena += "<th>Acción</th>";
			cadena += "</tr>";
			cadena += "</thead>";
			cadena += "<tbody>";

			for(var i = 0 ; i<valores.length; i++){
				datos_array =valores[i][0]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][5];
				cadena += "<tr>";
				/*cadena += "<td>"+(i+1)+"</td>";*/
				cadena += "<td>"+valores[i][0]+"</td>";
				cadena += "<td>"+valores[i][2]+"</td>";
				cadena += "<td>"+valores[i][3]+"</td>";
				cadena += "<td>"+valores[i][5]+"</td>";
				cadena += "<td><div class='btn-group'> <button type='button' class='btn btn-success ' data-toggle='dropdown' aria-expanded='false'>Acción <span class='glyphicon glyphicon-cog'></span></button> <button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-expanded='false'> <span class='caret'></span></button> <ul class='dropdown-menu' role='menu'> <li><a href='#' data-toggle='modal' data-target='#myModal_modificarmarca' onclick='mostrar_categoria("+'"'+datos_array+'"'+");'>Modificar</a></li> <li class='divider'></li> <li><a href='#' data-toggle='modal' data-target='#myModal_modificarm'  onclick='eliminar_marca("+'"'+datos_array+'"'+");' >Eliminar</a></li> </ul> </div></td>";
				cadena += "</tr>";

			}
			cadena += "</tbody>";
			cadena += "</table>";

			$("#listar").html(cadena);

			var totaldatos = datos[1];
			//alert("total de datos"+totaldatos);
			var numero_paginas = Math.ceil(totaldatos/5); //el Math.ceil acerca el resultado al próximo entero
			//alert("total de paginas"+numero_paginas);
			var buscar_categoria = $("#buscar_categoria").val();


						var paginar = "<ul class='pagination'>";
			if(pagina>1){

				//entidad html «  equivale a = &laquo
				//entidad html ‹  equivale a = &lsaquo
				//entidad html ›  equivale a = &rsaquo
				//entidad html »  equivale a = &raquo

				paginar += "<li><a href='javascript:void(0)' onclick='listar_categorias("+'"'+buscar_categoria+'","'+1+'"'+")'>&laquo;</a></li>";
				paginar += "<li><a href='javascript:void(0)' onclick='listar_categorias("+'"'+buscar_categoria+'","'+(pagina-1)+'"'+")'>Anterior</a></li>";



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
					paginar += "<li><a href='javascript:void(0)' onclick='listar_categorias("+'"'+buscar_categoria+'","'+i+'"'+")'>"+i+"</a></li>";
				}
			}
			if(pagina < numero_paginas){

				paginar += "<li><a href='javascript:void(0)' onclick='listar_categorias("+'"'+buscar_categoria+'","'+(pagina+1)+'"'+")'>Siguiente</a></li>";

				paginar += "<li><a href='javascript:void(0)' onclick='listar_categorias("+'"'+buscar_categoria+'","'+numero_paginas+'"'+")'>&raquo;</a></li>";
			}
			else{
				paginar += "<li class='disabled'><a href='javascript:void(0)'>Siguiente</a></li>";
				paginar += "<li class='disabled'><a href='javascript:void(0)'>&raquo;</a></li>";
			}

			paginar += "</ul>";
			$("#paginador_categoria").html(paginar);
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




function mostrar_categoria(datos){
	var valores=datos.split("*");
	//alert(d.length);
	$("#id_marca2").val(valores[0]);
	$("#txtmmarca2").val(valores[1]);
	console.log("el estado es: "+valores[3]);
	if (valores[3] == 1) {
		$("#nestado_marca2").val('Activoo');
		
		document.getElementById('activo').checked = true;
		//document.getElementById('inactivo').checked = false;
	}else{
		$("#nestado_marca2").val('Inactivoo');
		document.getElementById('inactivo').checked = true;
		//document.getElementById('activo').checked = false;
		
	}
}






