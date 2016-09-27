<?php
include_once("conexion.php");
class Seccion{
	//constructor
	var $conexion;
	function Seccion(){
		$this->conexion = new ManejadorDB;
	}
	
	function grabar($campos){
		if($this->conexion->conectar()==true){
			return mysql_query("INSERT INTO seccion (documento_id, titulo, contenido, seccion_id, nodo) VALUES ('".$campos[0]."','".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."')");
		}
	}

	function actualizar($campos,$id){
		if($this->conexion->conectar()==true){
			return mysql_query("UPDATE seccion SET documento_id = '".$campos[0]."', titulo = '".$campos[1]."', contenido = '".$campos[2]."' WHERE id = ".$id);
		}
	}
	
	function listado_raiz($documento_id,$seccion_padre=0){
		if($this->conexion->conectar()==true){
			return mysql_query("SELECT * FROM seccion WHERE documento_id=".$documento_id." AND seccion_id=".$seccion_padre." ORDER BY id ASC");
		}
	}
	
	function mostrar($idsec,$iddoc){
		if($this->conexion->conectar()==true){
			return mysql_query("SELECT * FROM seccion WHERE id=".$idsec." AND documento_id=".$iddoc);
		}
	}
	
	function buscar($dato,$iddoc){
		if($this->conexion->conectar()==true){
			$trozos=explode(" ",$dato);
			$numero=count($trozos);
			if ($numero==1) { 
				$consulta="SELECT * FROM seccion 
				WHERE documento_id=$iddoc AND (titulo LIKE '%".mysql_real_escape_string($dato)."%' OR contenido LIKE '%".mysql_real_escape_string($dato)."%') ORDER BY id ASC";
			} elseif($numero>1) {
				$consulta="SELECT * FROM seccion 
				WHERE documento_id=$iddoc AND MATCH ( titulo, contenido ) AGAINST ( '".mysql_real_escape_string($dato)."' ) ORDER BY id ASC";
			}
			$result = mysql_query($consulta);
			return $result;
		}
	}
	
	function eliminar($iddoc,$idsec){
		if($this->conexion->conectar()==true){
			//eliminar padre
			mysql_query("DELETE FROM seccion WHERE documento_id=".$iddoc." AND id=".$idsec);
			//elimina hijos
			mysql_query("DELETE FROM seccion WHERE documento_id=".$iddoc." AND seccion_id=".$idsec);
			
			return true;
		}
	}
	
	function cantidad($consulta){
		return mysql_num_rows($consulta);
	}
	
	function total_busqueda($dato,$iddoc){
		if($this->conexion->conectar()==true){
			$trozos=explode(" ",$dato);
			$numero=count($trozos);
			if ($numero==1) { 
				$consulta="SELECT * FROM seccion 
				WHERE documento_id=$iddoc AND titulo LIKE '%".mysql_real_escape_string($dato)."%' OR contenido LIKE '%".mysql_real_escape_string($dato)."%' ORDER BY id ASC";
			} elseif($numero>1) {
				$consulta="SELECT * FROM seccion 
				WHERE documento_id=$iddoc AND MATCH ( titulo, contenido ) AGAINST ( '".mysql_real_escape_string($dato)."' ) ORDER BY id ASC";
			}
			
			return @mysql_num_rows( mysql_query($consulta));
		}
	}
	
	//funcion para buscar dentro de la seccion
	function cantidad_busqueda_seccion($dato,$idsec){
		if($this->conexion->conectar()==true){
			$trozos=explode(" ",$dato);
			$numero=count($trozos);
			if ($numero==1) { 
				$consulta="SELECT * FROM seccion 
				WHERE id=$idsec AND contenido LIKE '%".mysql_real_escape_string($dato)."%' ORDER BY id ASC";
			} elseif($numero>1) {
				$consulta="SELECT * FROM seccion 
				WHERE id=$idsec AND MATCH ( contenido ) AGAINST ( '".mysql_real_escape_string($dato)."' ) ORDER BY id ASC";
			}
			
			return @mysql_num_rows( mysql_query($consulta));
		}
	}
}
?>