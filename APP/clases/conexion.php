<?php
class ManejadorDB{
	var $conect;
	var $basedatos;
	var $servidor;
	var $usuario;
	var $clave;
	function ManejadorDB(){
		$this->servidor = "localhost";
		$this->basedatos = "gestor";
		$this->usuario = "root";
		$this->clave = "usbw";
	}
	
	function conectar(){
		if(!($con=@mysql_connect($this->servidor,$this->usuario,$this->clave))){
			echo "Error al conectar a la base de datos";
			exit();
		}
		if(!@mysql_select_db($this->basedatos,$con)){
			echo "Error al seleccionar la base de datos";
			exit();
		}
		$this->conect=$con;
		return true;
	}
}
?>