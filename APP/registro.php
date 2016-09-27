<?php
	$ID =$_POST['id'];
	$AUTOR =$_POST['autor'];
	$TITULO =$_POST['titulo'];
	$FECHA =$_POST['fecha'];
	$TIPO =$_POST['tipo'];
	
	$reqlen = strlen($ID) * strlen($AUTOR) * strlen($TITULO) * strlen($FECHA) * strlen($TIPO);
	if ($reqlen > 0){
			
	require ("conexionn.php");
					
	mysql_query ("INSERT INTO documento VALUES('$ID','$AUTOR','$TITULO','$FECHA','$TIPO')");
	mysql_close($conexion);
	echo 'Se ha registrado correctamente';
			
	} else {
		echo 'Por favor rellene todos los campos.';
	}
?>