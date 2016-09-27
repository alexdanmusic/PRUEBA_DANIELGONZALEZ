<?php
	$conexion = @mysql_connect('localhost','root','usbw');
	if ($conexion){
		@mysql_select_db('gestor',$conexion);
	}
	

?>