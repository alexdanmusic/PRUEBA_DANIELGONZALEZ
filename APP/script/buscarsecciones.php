
<script type="text/javascript">
$(document).ready(function() {
	//seleccionar item temas
	$(".seccionitem a").click(function(){
		$(".seccionitem a").css('font-weight','normal');
		$(this).css('font-weight','bold');
	});
});
</script>
<?php
require_once('../admin/funciones.php');
require_once('../clases/seccion.php');

$objSeccion = new Seccion;
$consultaSecc = $objSeccion->buscar($_GET['dato'],$_GET['iddoc']);

$cantidad = $objSeccion->total_busqueda($_GET['dato'],$_GET['iddoc']);
if($cantidad==0) {
	echo "<ul><li>No se encontraron temas</li></ul>"; 
	die();
}else{
	echo '<ul>';
	while ($row = mysql_fetch_array($consultaSecc)){
		//$cantidad_dato = $objSeccion->cantidad_busqueda_seccion($_GET['dato'],$row['id']);
		echo "<li class=\"seccionitem\">".str_repeat('&nbsp;&nbsp;', $row['nodo'])."<img src=\"img/secciones.png\" /> <a id=\"".$row['id']."\" href=\"#\" onclick=\"mostrartemabuscado(".$row['id'].",".$_GET['iddoc'].",'".$_GET['dato']."')\">".$row['titulo']."</a> </li>";
		
	}
	echo '</ul>';
	echo "<div style=\"clear:both\"";
}
?>