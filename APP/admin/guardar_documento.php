<?php
if(isset($_POST['submit'])){
	require('../clases/documento.php');
	
	$titulo = htmlspecialchars(trim($_POST['titulo']));
	$autor = htmlspecialchars(trim($_POST['autor']));
	$fecha_publicacion = htmlspecialchars(trim($_POST['fecha_publicacion']));
	$tipo = htmlspecialchars(trim($_POST['tipo']));
	
	if(!$titulo || !$autor || !$fecha_publicacion || !$tipo){ 
		echo "Complete los campos requeridos. Vuelva a intentarlo"; 
		die();
	}
	
	$objDocumento = new Documento;
	if ($objDocumento->grabar(array($titulo,$autor,$fecha_publicacion,$tipo))==true){
		$servidor="http://".$_SERVER['SERVER_NAME'];
		$path=dirname($servidor.$_SERVER['PHP_SELF']);
		header('Location: '.$path);
	}else{
		echo "Se produjo un error";
	}
}


?>