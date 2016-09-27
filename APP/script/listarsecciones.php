<script type="text/javascript">
$(document).ready(function() {
	//seleccionar item temas
	$(".seccionitem a").click(function(){
		$(".seccionitem a").css('font-weight','normal');
		$(this).css('font-weight','bold');
	});
	$(document).ready(function(){
    	$("#example").treeview();
  	});
});

</script>

<?php
require_once('../admin/funciones.php');
require_once('../clases/seccion.php');

$objSeccion = new Seccion;
$consultaSecc = $objSeccion->listado_raiz($_GET['id']);

if(($objSeccion->cantidad($consultaSecc))==0) {
	echo "<ul><li>No se encontraron temas</li></ul>"; 
	die();
}else{
	echo "<ul id=\"example\" class=\"filetree\"> \n";
	arbol_secciones(0,$_GET['id']);
	echo "</ul> \n";
}
?>