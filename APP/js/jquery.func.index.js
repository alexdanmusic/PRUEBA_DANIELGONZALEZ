// dimensionado de las capas
$(document).ready(function(){
	$(window).load(function(){ $(window).resize() });
	
	$(window).resize(function(){
		var hscr = $(window).height()-$('#cabecera').height()-5;
		$('#contenedor').css("height", hscr);

	});
});

// Mostrar tema en la parte principal de la pantalla
function mostrartema(seccion_id,document_id){
	$.ajax({
		url: 'script/mostrartema.php',
		cache: false,
		type: "GET",
		data: "seccion_id="+seccion_id+"&document_id="+document_id,
		success: function(datos){
			$("#contenido").html(datos);
		}
	});
}

function mostrartemabuscado(seccion_id,document_id,dato){
	$.ajax({
		url: 'script/mostrartema.php',
		cache: false,
		type: "GET",
		data: "seccion_id="+seccion_id+"&document_id="+document_id+"&dato="+dato,
		success: function(datos){
			$("#contenido").html(datos);
		}
	});
}


function listDocs(tipo,pag_num){
	$.ajax({
		url: 'script/listardocumentos.php',
		cache: false,
		type: "GET",
		data: tipo+"=&pag="+pag_num,
		success: function(datos){
			$("#arbol").html(datos);
		}
	});
}

/*function buscarDocs(tipo,pag_num){
	var dato = $("#titulo_doc").val();
	
	$.ajax({
		url: 'script/buscardocumentos.php',
		cache: false,
		type: "GET",
		data: tipo+"=&dato="+dato+"&pag="+pag_num,
		success: function(datos){
			$("#arbol").html(datos);
		}
	});
}*/