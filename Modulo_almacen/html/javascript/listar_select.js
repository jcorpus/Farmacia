$(document).ready(function(){
cargar_unidad_medida();
cargar_tipo_producto();
cargar_categoria_producto();
cargar_marca_producto();
cargar_almacenes();

//cargar_unidadm_producto();


});

function cargar_tipo_producto(){
	$.ajax({
		url:'controller/controller_tipo_producto.php',
		type:'POST',
		data:{}
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
			}
			$("#tipoprod_datos").html(cadena);
		}
		else{
			alert("no hay datos en tipo de producto");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}



function cargar_marca_producto(){
	$.ajax({
		url:'controller/controller_marca_producto.php',
		type:'POST',
		data:{}
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
			}
			$("#marcap_datos").html(cadena);
		}
		else{
			alert("no hay datos en tipo de producto");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}


function cargar_categoria_producto(){
	$.ajax({
		url:'controller/controller_categoria_producto.php',
		type:'POST',
		data:{}
		//data:"boton=buscar2",
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][0]+">"+valores[i][1]+"</option>";
			}
			$("#categoriap_datos").html(cadena);
		}
		else{
			alert("no hay datos en tipo de producto");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}






function cargar_unidad_medida(){
	$.ajax({
		url:'controller/controller_unidadm_producto.php',
		type:'POST',
		data:{}
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][1]+">"+valores[i][1]+"</option>";
			}
			$("#unidad_medida").html(cadena);
		}
		else{
			alert("no hay datos en tipo de producto");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}




function cargar_almacenes(){
	var acciona = 'listaralm_opt'
	$.ajax({
		url:'controller/controller_reg_almacen.php',
		type:'POST',
		data:{acciona:acciona}
	}).done(function(data){
		var valores = JSON.parse(data);
		//alert(valores.length);
		if(valores.length>0){
			var cadena = "";
			for(var i = 0; i < valores.length;i++){
				//cadena += "<option>Seleccionar</option>";
				cadena += "<option value="+valores[i][1]+">"+valores[i][1]+"</option>";
			}
			$("#alm_list2").html(cadena);
		}
		else{
			alert("no hay datos en tipo de producto");
		}

	}).fail(function(XMLHttpRequest,jqXHR, textStatus, errorThrown){
		alert("ocurrio un error");
	})


}


