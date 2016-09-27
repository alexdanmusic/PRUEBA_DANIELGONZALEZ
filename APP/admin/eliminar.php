<?php
if(isset($_GET['id'])){
	require('../clases/documento.php');
	$objDocumento = new Documento;
	if($objDocumento->eliminar($_GET['id'])==true){
		echo "Eliminado";
	}else{
		echo "Se produjo un error";
	}
}
?>