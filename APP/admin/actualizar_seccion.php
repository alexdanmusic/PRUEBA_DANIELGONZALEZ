<?php
$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname($servidor.$_SERVER['PHP_SELF']);

if(isset($_POST['submit'])){
	require('../clases/seccion.php');
	
	$seccion_id = htmlspecialchars(trim($_POST['seccion_id']));
	$documento_id = htmlspecialchars(trim($_POST['documento_id']));
	$titulo = addslashes(htmlspecialchars(trim($_POST['titulo'])));
	$contenido = addslashes(trim($_POST['contenido']));

	if(!$titulo || !$contenido){ 
		echo "Complete los campos requeridos. Vuelva a intentarlo"; 
		die();
	}
		
	$objSeccion = new Seccion;
	if ($objSeccion->actualizar(array($documento_id,$titulo,$contenido),$seccion_id)==true){
		$enlace=$path."/editarsecc.php?idsec=".$seccion_id."&iddoc=".$documento_id;
		header('Location: '.$enlace);
	}else{
		echo "Se produjo un error";
	}
}


?>