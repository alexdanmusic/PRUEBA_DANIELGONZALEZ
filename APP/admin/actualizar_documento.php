<?php
if(isset($_POST['submit'])){
	require('../clases/documento.php');
	
	$id = htmlspecialchars(trim($_POST['id']));
	$titulo = htmlspecialchars(trim($_POST['titulo']));
	$autor = htmlspecialchars(trim($_POST['autor']));
	$fecha_publicacion = htmlspecialchars(trim($_POST['fecha_publicacion']));
	$tipo = htmlspecialchars(trim($_POST['tipo']));
	
	if(!$titulo || !$autor || !$fecha_publicacion || !$tipo){ 
		echo "Complete los campos requeridos. Vuelva a intentarlo"; 
		die();
	}
	
	$objDocumento = new Documento;
	if ($objDocumento->actualizar(array($titulo,$autor,$fecha_publicacion,$tipo),$id)==true){
		$servidor="http://".$_SERVER['SERVER_NAME'];
		$path=dirname($servidor.$_SERVER['PHP_SELF']);
		$path=$path.'/editar.php?id='.$id;
		header('Location: '.$path);
	}else{
		echo "Se produjo un error";
	}
}


?>