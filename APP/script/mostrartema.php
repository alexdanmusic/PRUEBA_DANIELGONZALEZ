<?php
require_once('../admin/funciones.php');
require_once('../clases/seccion.php');
$objSeccion = new Seccion;
$consultaSecc = $objSeccion->mostrar($_GET['seccion_id'],$_GET['document_id']);
$seccion = mysql_fetch_array($consultaSecc);
if(isset($_GET['dato'])) {
	//se de x medio hay una busqueda
	echo "<h2>".$seccion['titulo']."</h2>";
	$string = hightlight($seccion['contenido'], $_GET['dato']);
	echo $string;
}else{
	echo "<h2>".$seccion['titulo']."</h2>".$seccion['contenido'];
	//contenidos con subcontenidos -> 05-01-11
	listar_contenidos_anidados($_GET['seccion_id'],$_GET['document_id']);
}
?>