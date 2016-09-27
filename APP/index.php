<?php
require('admin/funciones.php');
require('global.php');

require_once(ABSPATH.'clases/documento.php');

$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname($servidor.$_SERVER['PHP_SELF']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Construktec Publicaciones</title>
<link type="text/css" rel="stylesheet" href="<?php echo $path ?>/css/mainweb.css" />
<script type="text/javascript" src="<?php echo $path ?>/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/js/jquery.func.index.js"></script>

  <link rel="stylesheet" href="http://jquery.bassistance.de/treeview/demo/screen.css" type="text/css" />
  <link rel="stylesheet" href="http://jquery.bassistance.de/treeview/jquery.treeview.css" type="text/css" />
  <script type="text/javascript" src="http://jquery.bassistance.de/treeview/jquery.treeview.js"></script>



<?php
if(isset($_GET['libro'])){
	$tipo = "libro";
}
if(isset($_GET['manual'])){
	$tipo = "manual";
}
if(isset($_GET['reglamento'])){
	$tipo = "reglamento";
}
?>
<script type="text/javascript">
$(document).ready(function() {
	//botones de activar busqueda
	$("#btnbusdoc").click(function(){
		$("#frmbusdoc").toggle();
	});
	$("#btnbussec").click(function(){
		$("#frmbussec").toggle();
	});
	
	//iniciar busqueda de documentos
	$('#button_doc').click(function(){
		var dato = $("#titulo_doc").val();

		$.ajax({
			url: 'script/buscardocumentos.php',
			cache: false,
			type: "GET",
			data: "<?php echo $tipo ?>=&dato="+dato,
			success: function(datos){
				$("#arbol").html(datos);
			}
		});
	});
	
	//iniciar busqueda de secciones
	$('#button_sec').click(function(){
		var dato = $("#titulo_seccion").val();
		var iddoc = $("#codigo_sec").val();
		
		if(dato==""){
			$.ajax({
				type: "GET",
				url: 'script/listarsecciones.php?id='+iddoc,
				success: function(datos){
					$("#list_subtemas").html(datos);
				}
			});
		}else{
			$.ajax({
				url: 'script/buscarsecciones.php',
				cache: false,
				type: "GET",
				data: "dato="+dato+"&iddoc="+iddoc,
				success: function(datos){
					$("#list_subtemas").html(datos);
				}
			});
		}
	});
});
</script>

</head>
<body>
<div id="cabecera">
<h1>CMS</h1>
<h3>Gestor simple</h3>
</div>
<div id="estructura">
	<div id="panelbusqueda">
    
    	<!-- botones  de tipo de documento -->
    	<div id="tipo">
        <a href="?libro" title="Mostrar Libros"><img <?php if(isset($_GET['libro'])) echo "style=\"border:2px solid blue;\"" ?> src="img/nuevo_libro.png" alt="Libro" title="Libro" /></a>
        <a href="?reglamento" title="Mostrar Reglamentos"><img <?php if(isset($_GET['reglamento'])) echo "style=\"border:2px solid blue;\"" ?>src="img/nuevo_reglamento.png" alt="Reglamento" title="Reglamento" /></a>
        <a href="?manual" title="Mostrar Manual"><img <?php if(isset($_GET['manual'])) echo "style=\"border:2px solid blue;\"" ?>src="img/nuevo_manual.png" alt="Manual" title="Manual" /></a>
        <a href="registro.php" title="Registrar libro">
        </div>
        
        <h2>Documentos <a id="btnbusdoc1" href="#"><img src="img/search.png" align="busqueda" /></a></h2>
        <h2><a href="registro_d.php">Registrar documento</a> <a id="btnbusdoc1" href="registro.php"></a></h2>
      <!-- formulario busqueda documento -->
	  	<form id="frmbusdoc" onsubmit="return false" name="frmbusqueda" style="display:none;">
	    	<label for="titulo">Documento a buscar</label><br />
	    	<input type="text" name="titulo" id="titulo_doc" class="caja" />
            <input type="hidden" name="codigo" id="codigo_doc" />
       	 	<input type="button" name="button" id="button_doc" class="" value="Buscar" />
	 	</form>
        
        <!-- litado de documentos  por tipo -->
        <div id="arbol">
        <?php
		include('script/listardocumentos.php');
		?>
        </div>
        
		<!-- contenedor de subtitulos -->
        <div id="cont_subtemas" style="display:none;">
	        <h2>Temas <a id="btnbussec" href="#"><img src="img/search.png" align="busqueda" /></a></h2>	
            <p id="iddoc"></p>
            <form id="frmbussec" onsubmit="return false" name="frmbusqueda" style="display:none;">
                <label for="titulo">Subtema o contenido a buscar</label><br />
                <input type="text" name="titulo" id="titulo_seccion" class="caja" />
                <input type="hidden" name="codigo" id="codigo_sec" value="" />
                <input type="button" name="button" id="button_sec" class="" value="Buscar" />
            </form>
            
            <!-- listado de subtemas por documento -->
            <div id="list_subtemas">
            </div>
        </div>
    </div>
    <div id="contenedor">
    	<div id="contenido">
        </div>
    </div>
</div>
<div id="footer"></div>
</body>
</html>