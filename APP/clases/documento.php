<?php
include_once("conexion.php");

class Documento{
	//constructor
	var $conexion;
	function Documento(){
		$this->conexion = new ManejadorDB;
	}
	
	function grabar($campos){
		if($this->conexion->conectar()==true){
			return mysql_query("INSERT INTO documento (titulo, autor, fecha_publicacion, tipo) VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."')");
		}
	}

	function actualizar($campos,$id){
		if($this->conexion->conectar()==true){
			return mysql_query("UPDATE documento SET titulo = '".$campos[0]."', autor = '".$campos[1]."', fecha_publicacion = '".$campos[2]."', tipo = '".$campos[3]."' WHERE id = ".$id);
		}
	}
	
	function listado($regInicio=0,$regMostrar=10){
		if($this->conexion->conectar()==true){
			return mysql_query("SELECT * FROM documento ORDER BY id DESC LIMIT ".$regInicio.", ".$regMostrar);
		}
	}
	
	function total(){
		if($this->conexion->conectar()==true){
			return mysql_num_rows(mysql_query("SELECT * FROM documento"));
		}
	}
	
	function listado_por_tipo($tipo,$regInicio=0,$regMostrar=10){
		if($this->conexion->conectar()==true){
			return mysql_query("SELECT * FROM documento WHERE tipo = '".$tipo."' ORDER BY titulo ASC LIMIT ".$regInicio.", ".$regMostrar);
		}
	}
	
	function total_listado_por_tipo($tipo){
		if($this->conexion->conectar()==true){
			return mysql_num_rows(mysql_query("SELECT * FROM documento WHERE tipo = '".$tipo."'"));
		}
	}

	function total_busqueda($dato,$tipo){
		if($this->conexion->conectar()==true){
			$consulta="SELECT * FROM documento WHERE tipo='".$tipo."' AND titulo LIKE '%".mysql_real_escape_string($dato)."%' ORDER BY titulo ASC";
			
			return mysql_num_rows(mysql_query($consulta));
		} 
	}
	
	function busqueda($dato,$tipo,$regInicio=0,$regVisualizar=10){
		if($this->conexion->conectar()==true){
			$consulta="SELECT * FROM documento WHERE tipo='".$tipo."' AND titulo LIKE '%".mysql_real_escape_string($dato)."%' ORDER BY titulo ASC	LIMIT $regInicio,$regVisualizar";
			
			$result = @mysql_query($consulta);
		 	return $result;
		} 
	}
 
	function mostrar($id){
		if($this->conexion->conectar()==true){
			return mysql_query("SELECT * FROM documento WHERE id=".$id);
		}
	}
	
	function buscar($n,$desde,$hasta){ // para busqueda desde panel adminsitrativo
		if($this->conexion->conectar()==true){
			return mysql_query();
		}
	}
	
	function eliminar($id){
		if($this->conexion->conectar()==true){
			mysql_query("DELETE FROM documento WHERE id=".$id);
			mysql_query("DELETE FROM seccion WHERE documento_id=".$id);
			return true;
		}
	}
}
?>