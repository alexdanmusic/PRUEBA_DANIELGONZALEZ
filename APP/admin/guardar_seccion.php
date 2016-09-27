<?php
/*
Documentacion
=============
string addslashes ( string $str )

Devuelve una cadena con barras invertidas delante de los carácteres que necesitan escaparse en situaciones como consultas de bases de datos, etc. Los carácteres que se escapan son la comilla simple ('), comilla doble ("), barra invertida (\) y NUL (el byte NULL). 

htmlspecialchars — Convert special characters to HTML entities
*/
$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname($servidor.$_SERVER['PHP_SELF']);

if(isset($_POST['submit'])){
	require('../clases/seccion.php');
	
	$documento_id = htmlspecialchars(trim($_POST['documento_id']));
	$titulo = addslashes(htmlspecialchars(trim($_POST['titulo'])));
	$contenido = addslashes(trim($_POST['contenido']));
	$seccion_id = htmlspecialchars(trim($_POST['idsec']));
	$nodo = htmlspecialchars(trim($_POST['nodo']));
	if($nodo==0) $titulo = strtoupper($titulo);
	
	if(!$titulo || !$contenido){ 
		echo "Complete los campos requeridos. Vuelva a intentarlo"; 
		die();
	}
		
	$objSeccion = new Seccion;
	if ($objSeccion->grabar(array($documento_id,$titulo,$contenido,$seccion_id,$nodo))==true){
		$ultimo_id=mysql_insert_id();
		$enlace=$path."/editarsecc.php?idsec=".$ultimo_id."&iddoc=".$documento_id;
		header('Location: '.$enlace);
	}else{
		echo "Se produjo un error";
	}
}


?>