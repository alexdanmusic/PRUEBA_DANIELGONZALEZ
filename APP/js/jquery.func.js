// JavaScript Document
function EliminarDocumento(documento_id){
	var msg = confirm("¿Desea eliminar este dato? \n\n Se eliminaran todas las secciones y subsecciones.")
	if ( msg ) {
		$.ajax({
			url: 'eliminar.php',
			type: "GET",
			data: "id="+documento_id,
			success: function(datos){
				ListarDocumento(1);
			}
		});
	}
	return false;
}
function EliminarSeccion(documento_id,seccion_id){
	var msg = confirm("¿Desea eliminar este dato? \n\n Se eliminaran todas las subsecciones y de estas.")
	if ( msg ) {
		$.ajax({
			url: 'eliminarsecc.php',
			type: "GET",
			data: "iddoc="+documento_id+"&idsec="+seccion_id,
			success: function(datos){
				//alert(datos);
				ListarSeccion(documento_id)
			}
		});
	}
	return false;
}

function ListarSeccion(document_id){ //lista todas las secciones de un documento
	$.ajax({
		url: 'consultasec.php',
		cache: false,
		type: "GET",
		data: "documento_id="+document_id,
		success: function(datos){
			$("#listado").html(datos);
		}
	});
}

function ListarDocumento(pag_num){
	$.ajax({
		url: 'consultadoc.php',
		cache: false,
		type: "GET",
		data: "pag="+pag_num,
		success: function(datos){
			$("#list-ajax").html(datos);
		}
	});
}

// funciones del calendario
function update_calendar(){
	var month = $('#calendar_mes').attr('value');
	var year = $('#calendar_anio').attr('value');

	var valores='month='+month+'&year='+year;

	$.ajax({
		url: 'calendario_view.php',
		type: "GET",
		data: valores,
		success: function(datos){
			//alert(datos);
			$("#calendario_dias").html(datos);
		}
	});
}
	
function set_date(date){
	$('#fecha_publicacion').attr('value',date);
	show_calendar();
}
	
function show_calendar(){
	$('#calendario').toggle();
}