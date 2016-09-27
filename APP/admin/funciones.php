<?php
function listar_contenidos_anidados($id_padre,$documento_id){  
	$servidor = "http://".$_SERVER['SERVER_NAME'];	
	$path=dirname($servidor.$_SERVER['PHP_SELF']);
	$objSeccion = new Seccion;
	$consultaSecc = $objSeccion->listado_raiz($documento_id,$id_padre);
	
	if(mysql_num_rows($consultaSecc)){
	
	while ( $seccion = mysql_fetch_assoc($consultaSecc) ){
		$seccion_array[$seccion["id"]] = array(
			"id" => $seccion["id"],
			"titulo" => $seccion["titulo"],
			"seccion_id" => $seccion["seccion_id"],
			"nodo" => $seccion['nodo'],
			"contenido" => $seccion['contenido']);
	}
	
	foreach($seccion_array as $key => $value){
		if ($value["seccion_id"] == $id_padre){
			if($id_padre == 0){
				echo "<h2>".$value['titulo']."</h2>".$value['contenido'];
				
				listar_contenidos_anidados($key,$documento_id);
			}else{
				$nodo = $value['nodo']+1; //incrementar el nodo para hacer la tabulacion
				echo "<h2>".$value['titulo']."</h2>".$value['contenido'];
				listar_contenidos_anidados($key,$documento_id);
			}
		}
	}
	}// end if
}

function listar_secciones($id_padre,$documento_id){  
	$servidor = "http://".$_SERVER['SERVER_NAME'];	
	$path=dirname($servidor.$_SERVER['PHP_SELF']);
	$objSeccion = new Seccion;
	$consultaSecc = $objSeccion->listado_raiz($documento_id,$id_padre);
	
	if(mysql_num_rows($consultaSecc)){
	
	while ( $seccion = mysql_fetch_assoc($consultaSecc) ){
		$seccion_array[$seccion["id"]] = array("id" => $seccion["id"],"titulo" => $seccion["titulo"],"seccion_id" => $seccion["seccion_id"],"nodo" => $seccion['nodo']);
	}
	
	foreach($seccion_array as $key => $value){
		if ($value["seccion_id"] == $id_padre){
			if($id_padre == 0){
				echo "
				 <tr>
      				<td><strong>".$value['titulo']."</strong></td>
      				<td width=\"130px\"><a href=\"nuevasecc.php?iddoc=".$documento_id."&amp;nodo=1&amp;idsec=".$value['id']."\"><img src=\"../img/nuevo.png\" alt=\"Nuevo\" title=\"Nuevo\" /> Nueva subseccion</a></td>
      				<td width=\"65px\"><a href=\"editarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/editar.png\" alt=\"Editar\" title=\"Editar\" /> Editar</a></td>
      				<td width=\"65px\"><a onClick=\"EliminarSeccion(".$documento_id.",".$value['id']."); return false\" href=\"eliminarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/eliminar.png\" alt=\"Eliminar\" title=\"Eliminar\" /> Eliminar</a></td>
    			</tr>";
				listar_secciones($key,$documento_id);
			}else{
				$nodo = $value['nodo']+1; //incrementar el nodo para hacer la tabulacion
				echo "
				 <tr>
      				<td>".str_repeat('&nbsp;&nbsp;', $value['nodo']).$value['titulo']."</td>
      				<td width=\"130px\"><a href=\"nuevasecc.php?iddoc=".$documento_id."&amp;nodo=".$nodo."&amp;idsec=".$value['id']."\"><img src=\"../img/nuevo.png\" alt=\"Nuevo\" title=\"Nuevo\" /> Nueva subseccion</a></td>
      				<td width=\"50px\"><a href=\"editarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/editar.png\" alt=\"Editar\" title=\"Editar\" /> Editar</a></td>
      				<td width=\"65px\"><a onClick=\"EliminarSeccion(".$documento_id.",".$value['id']."); return false\" href=\"eliminarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/eliminar.png\" alt=\"Eliminar\" title=\"Eliminar\" /> Eliminar</a></td>
    			</tr>";
				listar_secciones($key,$documento_id);
			}
		}
	}
	}// end if
}

function listar_secciones2($id_padre,$documento_id,$ul=0){  
	$servidor = "http://".$_SERVER['SERVER_NAME'];	
	$path=dirname($servidor.$_SERVER['PHP_SELF']);
	$objSeccion = new Seccion;
	$consultaSecc = $objSeccion->listado_raiz($documento_id,$id_padre);
	
	if(mysql_num_rows($consultaSecc)){
		if($ul==0){$ul1="";$ul2="";
		}else{$ul1="<ul> \n";$ul2="</ul> \n";}
	
	while ( $seccion = mysql_fetch_assoc($consultaSecc) ){
		$seccion_array[$seccion["id"]] = array("id" => $seccion["id"],"titulo" => $seccion["titulo"],"seccion_id" => $seccion["seccion_id"],"nodo" => $seccion['nodo']);
	}
	
	echo $ul1;
	foreach($seccion_array as $key => $value){
		if ($value["seccion_id"] == $id_padre){
			if($id_padre == 0){
				echo "
				 <li>
      				<div><strong>".$value['titulo']."</strong></div>
      				<div class=\"alinear\" width=\"65px\"><a onClick=\"EliminarSeccion(".$documento_id.",".$value['id']."); return false\" href=\"eliminarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/eliminar.png\" alt=\"Eliminar\" title=\"Eliminar\" /> Eliminar</a></div>
      				<div class=\"alinear\" width=\"65px\"><a href=\"editarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/editar.png\" alt=\"Editar\" title=\"Editar\" /> Editar</a></div>
					<div class=\"alinear\" width=\"130px\"><a href=\"nuevasecc.php?iddoc=".$documento_id."&amp;nodo=1&amp;idsec=".$value['id']."\"><img src=\"../img/nuevo.png\" alt=\"Nuevo\" title=\"Nuevo\" /> Nueva subseccion</a></div>
    			";
				listar_secciones2($key,$documento_id,$ul=1);
				echo " </li> \n";
			}else{
				echo "
				 <li>
      				<div>".$value['titulo']."</div>
      				<div class=\"alinear\" width=\"65px\"><a onClick=\"EliminarSeccion(".$documento_id.",".$value['id']."); return false\" href=\"eliminarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/eliminar.png\" alt=\"Eliminar\" title=\"Eliminar\" /> Eliminar</a></div>
      				<div class=\"alinear\" width=\"50px\"><a href=\"editarsecc.php?idsec=".$value['id']."&amp;iddoc=".$documento_id."\"><img src=\"../img/editar.png\" alt=\"Editar\" title=\"Editar\" /> Editar</a></div>
					<div class=\"alinear\" width=\"130px\"><a href=\"nuevasecc.php?iddoc=".$documento_id."&amp;nodo=".$nodo."&amp;idsec=".$value['id']."\"><img src=\"../img/nuevo.png\" alt=\"Nuevo\" title=\"Nuevo\" /> Nueva subseccion</a></div>
    			";
				listar_secciones2($key,$documento_id,$ul=1);
				echo " </li> \n";
			}
		}
	}
	echo $ul2;
	}// end if
}


function arbol_secciones($id_padre,$documento_id,$ul=0){  
	$servidor = "http://".$_SERVER['SERVER_NAME'];	
	$objSeccion = new Seccion;
	$consultaSecc = $objSeccion->listado_raiz($documento_id,$id_padre);
	
	if(mysql_num_rows($consultaSecc)){
		if($ul==0){$ul1="";$ul2="";
		}else{$ul1="<ul> \n";$ul2="</ul> \n";}
	
	while ( $seccion = mysql_fetch_assoc($consultaSecc) ){
		$seccion_array[$seccion["id"]] = array("id" => $seccion["id"],"titulo" => $seccion["titulo"],"seccion_id" => $seccion["seccion_id"],"nodo" => $seccion['nodo']);
	}
	
	echo $ul1;
	foreach($seccion_array as $key => $value){
		
		if ($value["seccion_id"] == $id_padre){
			if($id_padre == 0){
				echo " <li class=\"closed seccionitem\"><span class=\"file\"> <a id=\"".$value['id']."\" href=\"#\" onclick=\"mostrartema(".$value['id'].",".$_GET['id'].")\">".$value['titulo']."</a> </span> \n";
				arbol_secciones($key,$documento_id,$ul=1);
				echo " </li> \n";
			}else{
				echo " <li class=\"seccionitem\"><span class=\"file\"> <a id=\"".$value['id']."\" href=\"#\" onclick=\"mostrartema(".$value['id'].",".$_GET['id'].")\">".$value['titulo']."</a> </span> \n";
				arbol_secciones($key,$documento_id,$ul=1);
				echo " </li> \n";
			}
		} // end if
	} // end foreach
	echo $ul2;
	
	}// end if consulta

}

function hightlight($str, $keywords = ''){
	$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter
	
	$style = 'highlight';
	$style_i = 'highlight_important';
	
	/* Apply Style */
	
	$var = '';
	
	foreach(explode(' ', $keywords) as $keyword)
	{
	$replacement = "<span class='".$style."'>".$keyword."</span>";
	$var .= $replacement." ";
	
	$str = str_ireplace($keyword, $replacement, $str);
	}
	
	/* Apply Important Style */
	
	$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
	
	return $str;
}

function tipodocumento($caracter){
	$servidor = "http://".$_SERVER['SERVER_NAME'];
	switch ($caracter){
		case "L":
			return "<img src=\"../img/libro.png\" alt=\"Libro\" title=\"Libro\" /> Libro";
			break;
		case "R":
			return "<img src=\"../img/reglamento.png\" alt=\"Reglamento\" title=\"Reglamento\" /> Reglamento";
			break;
		case "M":
			return "<img src=\"../img/manual.png\" alt=\"Manual\" title=\"Manual\" /> Manual";
			break;
	}
}
?>