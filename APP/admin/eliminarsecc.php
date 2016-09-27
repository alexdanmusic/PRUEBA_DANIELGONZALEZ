<?php
if(isset($_GET['iddoc']) && isset($_GET['idsec'])){
	require('../clases/seccion.php');
	$objSeccion = new Seccion;
	if($objSeccion->eliminar($_GET['iddoc'],$_GET['idsec'])==true){
		echo "Eliminado";
	}else{
		echo "Se produjo un error";
	}
}
?>